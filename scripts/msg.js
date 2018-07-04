/* -----------------------------------------
    File: msg.js calculates the height of all the
			messages then scrolls to the bottom for usability
    Project: Wai-Message
    Standard: AS2.43
    School: Waimea College
    Author: Lachlan Drummond
-------------------------------------------- */  

var e = document.getElementById("msg-msgs-feed");
e.scrollTop = e.scrollHeight;