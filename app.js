var app = require('express')();
var http = require('http').Server(app);


var io = require('socket.io')(http);


var man_count = 0;

io.on('connection', function(socket){
    console.log('a user connected');
    man_count ++;
    socket.on("disconnect", function() {
        console.log("a user go out");
        man_count --;
    });


    socket.on("message", function(obj) {


            io.emit("message",obj);


    });
});

http.listen(5555, function(){
    console.log('listening on *:5555');
});

setInterval(function () {
    io.emit("message",{type:"count",msg:man_count})
},5000);
