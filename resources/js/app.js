require('./bootstrap');

import Alpine from 'alpinejs';
import Pusher from "pusher-js"

window.Alpine = Alpine;

Alpine.start();

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;
