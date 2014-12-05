// Default Modules from nodeJS, etc
var http  = require('http');
var colors = require('colors');

//this is connection server listen on port
var server = http.createServer(function(request, response){
  //console.log('Server active');
}).listen(9900, function(){
  console.log('listening on *:9900');
});

// Make the server into Socket IO enabled
var io = require('socket.io').listen(server);
var users_connected_user_agents = [];
var users_username = [];

// When there is a user that is connected
io.on('connection', function(socket){	

	// Get data from CLIENT and send back data to ONLY that client
	// And then SEND data to ONLY one CLIENT
	socket.on('giveUserComputerData FROM CLIENT', function(user_browser_user_agent) {

		// Storing the user data to the array, the key is the user's session
		users_connected_user_agents[socket.id] = user_browser_user_agent;
		// DEBUG
		console.log('DEBUG, current array content is: '.underline.red); 
		console.log(users_connected_user_agents); 

		console.log('user connected! ' + ' the session ID is: ' + socket.id + ' the user browser is ' + user_browser_user_agent);
		// SEND data to ONLY one CLIENT
		io.to(socket.id).emit('giveUserHisBrowserAgent FROM SERVER', user_browser_user_agent, socket.id);
	});

    socket.on('giveUsername FROM CLIENT', function(username){
        users_username[socket.id] = username;
        // DEBUG
        console.log('DEBUG, current array content is: '.underline.red);
        console.log(users_username);
        console.log('user connected! ' + ' the session ID is: ' + socket.id + ' the username is ' + username);

        // SEND data to ONLY one CLIENT
        io.to(socket.id).emit('giveUserHisUsername FROM SERVER', username, socket.id);
    });


	socket.on('private message FROM CLIENT', function (data) {
		if(data.username != null || data.username != '') {
			console.log('Username: ' + data.username + ' UserID ' + socket.id + ' wanted to send message to ' + data.userIDDestination + ' , the content is ' + data.theMessage + ' , delay is ' + data.delay);
		} else {
			console.log('UserID ' + socket.id + ' wanted to send message to ' + data.userIDDestination + ' , the content is ' + data.theMessage + ' , delay is ' + data.delay);
		}
		
		
		// SEND data to ONLY one CLIENT
		if(data.delay == 0 || data.delay == null) {
			setTimeout(function(){
				io.to(data.userIDDestination).emit('private message FROM SERVER', data.userIDDestination, data.theMessage, 0, data.username);
			}, 0);
		} else {
			setTimeout(function(){
				io.to(data.userIDDestination).emit('private message FROM SERVER', data.userIDDestination, data.theMessage, data.delay, data.username);
			}, data.delay * 1000);
		}

	});

    socket.on('private message to username FROM CLIENT', function(data){
        var usernameDestination = data.usernameDestination;
        var theMessage = data.theMessage;
        var delay = data.delay;
        var usernameThatSentTheMessage = data.username;

        if(usernameThatSentTheMessage != null || usernameThatSentTheMessage != '') {
            console.log('Username: ' + usernameThatSentTheMessage + ' with UserID ' + socket.id + ' wanted to send message to ' + usernameDestination + ' , the content is ' + theMessage + ' , delay is ' + delay);
        } else {
            console.log('UserID ' + socket.id + ' wanted to send message to ' + usernameDestination + ' , the content is ' + theMessage + ' , delay is ' + delay);
        }

        console.log(users_username.length);

        // SEND data to ONLY one CLIENT, and to THAT usernameDestination
        for(var i = 0; i < users_username.length;i++){
            console.log(users_username);
        }

        // console.log(data);

    });

	// User disconnected
	socket.on('disconnect', function(){
		console.log('user with ID of ' + socket.id + ' is disconnected, his browser is ' + users_connected_user_agents[socket.id]);
		// Send data to ALL CLIENT
		io.emit('user disconnected FROM SERVER', socket.id, users_connected_user_agents[socket.id]);
		delete users_connected_user_agents[socket.id];
		// DEBUG
		console.log('DEBUG, current array content is: '.underline.red);
		console.log(users_connected_user_agents);
	});

});