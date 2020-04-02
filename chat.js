/* 
Name: Chat Engine
*/

var instanse = false;
var state;
var mes;
var file;
var idUser;
function Chat (name) {
    this.update = updateChat;
    this.send = sendChat;
	this.getState = getStateOfChat;
	idUser = name;
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
function updateChat(){
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
							console.log('user', user);
							console.log('id', idUser);
							if (user == idUser){
								
								$('#chat-area').append($("<p class = 'me'>"+ data.text[i] +"</p>"));	
							} else{
								$('#chat-area').append($("<p class = 'other'>"+ data.text[i] +"</p>"));
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

var name = getCookie("chat_username");
if (name != "") {
    welcome_message("Welcome back " + name+" ^_^ we are happy to see you again!");
} else {
    // ask user for name with popup prompt
    setUsername();
}

if(name === undefined){
    name = 'Guest';
}

// kick off chat
var chat =  new Chat(name);
$(function() {

    chat.getState();

    // watch textarea for key presses
    $("#sendie").keydown(function(event) {

        var key = event.which;

        //all keys including return.
        if (key >= 33) {

            var maxLength = $(this).attr("maxlength");
            var length = this.value.length;

            // don't allow new content if length is maxed out
            if (length >= maxLength) {
                event.preventDefault();
            }
        }
    });
    // watch textarea for release of key press
    $('#sendie').keyup(function(e) {

        if (e.keyCode == 13) {

            var text = $(this).val();
            var maxLength = $(this).attr("maxlength");
            var length = text.length;

            // send
            if (length <= maxLength + 1) {

                chat.send(text, name);
                $(this).val("");

            } else {

                $(this).val(text.substring(0, maxLength));

            }
        }
    });

});

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function welcome_message(message) {
    document.getElementById("welcome_message").innerText = message;
}



function setUsername() {
    var name = prompt("Enter your chat name:", "Guest");

    // default name is 'Guest'
    if (!name || name === ' ') {
        name = "Guest";
    }

    // strip tags
    name = name.replace(/(<([^>]+)>)/ig,"");

    if (name != "" && name != null) {
        welcome_message("Welcome " + name+" ^_^ enjoy!");
        setCookie("chat_username", name, 365);
    }
}