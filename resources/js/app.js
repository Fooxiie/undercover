require('./bootstrap');

import Alpine from 'alpinejs';
import Pusher from "pusher-js"

window.Alpine = Alpine;

Alpine.start();

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

function myFunction() {
    let copyText = document.getElementById("link");
    navigator.clipboard.writeText(copyText.innerHTML);
    let tooltip = document.getElementById("myTooltip");
    tooltip.innerHTML = "Copied !"
}

function outFunc() {
    var tooltip = document.getElementById("myTooltip");
    tooltip.innerHTML = "Copy to clipboard";
}
