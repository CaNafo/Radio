/* 
Name: Chat Engine
*/

var instanse = false;
var state;
var mes;
var file;

function Chat (name) {
    this.update = updateChat;
    this.send = sendChat;
	this.getState = getStateOfChat;
	this.id = name
}

//gets the state of the chat
function getStateOfChat(){
	if(!instanse){
		 instanse = true;
		 $.ajax({
			   type: "POST",
			   url: "process.php",
			   data: {  
			   			'function': 'getState',
						'file': file
						},
			   dataType: "json",
			
			   success: function(data){
				   state = data.state;
				   instanse = false;
			   },
			});
	}	 
}

//Updates the chat
function updateChat(id){
	 if(!instanse){
		 instanse = true;
	     $.ajax({
			   type: "POST",
			   url: "process.php",
			   data: {  
			   			'function': 'update',
						'state': state,
						'file': file
						},
			   dataType: "json",
			   success: function(data){
				   if(data.text){
						for (var i = 0; i < data.text.length; i++) {
							//gets user of incoming...
							let user = data.text[0].substring(0, data.text[0].indexOf(":"));
							if (user != id){
								console.log('user', user);
								console.log('id', this.id);
								$('#chat-area').append($("<p class = 'other'>"+ data.text[i] +"</p>"));	
							} else{
								$('#chat-area').append($("<p class = 'me'>"+ data.text[i] +"</p>"));
							}
                            
                        }								  
				   }
				   document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
				   instanse = false;
				   state = data.state;
			   },
			});
	 }
	 else {
		 setTimeout(updateChat, 1500);
	 }
}

//send the message
function sendChat(message, nickname)
{       
    updateChat();
     $.ajax({
		   type: "POST",
		   url: "process.php",
		   data: {  
		   			'function': 'send',
					'message': message,
					'nickname': nickname,
					'file': file
				 },
		   dataType: "json",
		   success: function(data){
			   updateChat();
		   },
		});
}
