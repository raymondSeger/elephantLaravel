<!doctype html>
<html>
  <head>
    <title>User chat to other User</title>
    <style>
      * { margin: 0; padding: 0; box-sizing: border-box; }
      body { font: 13px Helvetica, Arial; }
      #form1 { background: #000; padding: 3px; position: fixed; bottom: 0; width: 100%; }
      #form1 input { border: 0; padding: 10px; width: 29%; margin-right: .5%; }
      #form1 button { width: 9%; background: rgb(130, 224, 255); border: none; padding: 10px; }

      #messages { list-style-type: none; margin: 0; padding: 0; }
      #messages li { padding: 5px 10px; }
      #messages li:nth-child(odd) { background: #eee; }
    </style>
  </head>
  <body>
    <ul id="messages"></ul>
    <form id="form1" method="post" action="{{ url('/send_msg') }}">
      <input id="username" name="username" autocomplete="off" placeholder="Username Destination" />
      <input id="theMessage" name="theMessage" autocomplete="off" placeholder="The Message" />
      <input id="delay" name="delay" autocomplete="off" placeholder="the delay before the message is sent" />
      <button>Send</button>
    </form>

    <script src="https://cdn.socket.io/socket.io-1.2.1.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <script>
      var socket = io.connect('http://192.168.10.10:9900');

      ////////////////////////// Script to detect User's Browser //////////////////////////
      // check browser name
      var nVer = navigator.appVersion;
      var nAgt = navigator.userAgent;
      var browserName  = navigator.appName;
      var fullVersion  = ''+parseFloat(navigator.appVersion); 
      var majorVersion = parseInt(navigator.appVersion,10);
      var nameOffset,verOffset,ix;

      // In Opera 15+, the true version is after "OPR/" 
      if ((verOffset=nAgt.indexOf("OPR/"))!=-1) {
       browserName = "Opera";
       fullVersion = nAgt.substring(verOffset+4);
      }
      // In older Opera, the true version is after "Opera" or after "Version"
      else if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
       browserName = "Opera";
       fullVersion = nAgt.substring(verOffset+6);
       if ((verOffset=nAgt.indexOf("Version"))!=-1) 
         fullVersion = nAgt.substring(verOffset+8);
      }
      // In MSIE, the true version is after "MSIE" in userAgent
      else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
       browserName = "Microsoft Internet Explorer";
       fullVersion = nAgt.substring(verOffset+5);
      }
      // In Chrome, the true version is after "Chrome" 
      else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
       browserName = "Chrome";
       fullVersion = nAgt.substring(verOffset+7);
      }
      // In Safari, the true version is after "Safari" or after "Version" 
      else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
       browserName = "Safari";
       fullVersion = nAgt.substring(verOffset+7);
       if ((verOffset=nAgt.indexOf("Version"))!=-1) 
         fullVersion = nAgt.substring(verOffset+8);
      }
      // In Firefox, the true version is after "Firefox" 
      else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
       browserName = "Firefox";
       fullVersion = nAgt.substring(verOffset+8);
      }
      // In most other browsers, "name/version" is at the end of userAgent 
      else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < 
                (verOffset=nAgt.lastIndexOf('/')) ) 
      {
       browserName = nAgt.substring(nameOffset,verOffset);
       fullVersion = nAgt.substring(verOffset+1);
       if (browserName.toLowerCase()==browserName.toUpperCase()) {
        browserName = navigator.appName;
       }
      }
      // trim the fullVersion string at semicolon/space if present
      if ((ix=fullVersion.indexOf(";"))!=-1)
         fullVersion=fullVersion.substring(0,ix);
      if ((ix=fullVersion.indexOf(" "))!=-1)
         fullVersion=fullVersion.substring(0,ix);

      majorVersion = parseInt(''+fullVersion,10);
      if (isNaN(majorVersion)) {
       fullVersion  = ''+parseFloat(navigator.appVersion); 
       majorVersion = parseInt(navigator.appVersion,10);
      }
      ////////////////////////// END of Script to detect User's Browser //////////////////////////

      // Get the User's browser
      var user_browser_user_agent = browserName;

      // Give the Server the user's browser agent
      socket.emit('giveUserComputerData FROM CLIENT', user_browser_user_agent);

      // Give the server the user's username
      socket.emit('giveUsername FROM CLIENT', $('#username').val());

      
      socket.on('connect', function(){
        console.log('connected to server!');
      });

      socket.on('reconnect', function(numberofTimesTriedToReconnect){
        console.log('reconnected!');
        console.log(numberofTimesTriedToReconnect);
      });

      // Listen to server
      socket.on('giveUserHisBrowserAgent FROM SERVER', function(user_browser_user_agent, socketID){
        $('#messages').append($('<li>').text('You are using ' + user_browser_user_agent + ' , your ID is ' + socketID));
      });

      // Listen to server
      socket.on('giveUserHisUsername FROM SERVER', function(username, socketID){
        $('#messages').append( $('<li>').text('Your username is ' + username + ' , your ID is ' + socketID) );
      });

       // Listen to server
      socket.on('user disconnected FROM SERVER', function(userSessionID, userBrowserAgent){
        $('#messages').append($('<li>').text('User with ID of ' + userSessionID + ' and browser agent of ' + userBrowserAgent + ' just left.'));
      });

      // Listen to server
      socket.on('private message FROM SERVER', function(destination, msg, delay, username) {
        if(username == null || username == '') {
          $('#messages').append($('<li>').text('user with ID of ' + destination + ' got a message. The content is: ' + msg + ' , delay is: ' + delay+ ' . It was sent by guest'));
        } else {
          $('#messages').append($('<li>').text('user with ID of ' + destination + ' got a message. The content is: ' + msg + ' , delay is: ' + delay + ' . It was sent by ' + username));
        }
      });

      // Listen to server
      socket.on('private message to username FROM SERVER', function(usernameDestination, theMessage, delay, usernameThatSentTheMessage) {
          if(usernameThatSentTheMessage == null || usernameThatSentTheMessage == '') {
            $('#messages').append($('<li>').text('user with username of  ' + usernameDestination + ' got a message. The content is: ' + theMessage + ' , delay is: ' + delay + ' . It was sent by guest'));
          } else {
            $('#messages').append($('<li>').text('user with username of  ' + usernameDestination + ' got a message. The content is: ' + theMessage + ' , delay is: ' + delay + ' . It was sent by ' + usernameThatSentTheMessage));
          }
      });


    </script>
  </body>
</html>