/*global window, alert*/

var PROVIDER = "https://sketchpad.pro/"; // or "https://draw.chat/"

function generatePASSWD(length) {
  "use strct";
  var alphabet = "abcdefghijklmnopqrstuwxyz1234567890";
  var password = "";
  var i;
  for (i = 0; i < length; i += 1) {
      password += alphabet.charAt(Math.floor(Math.random() * alphabet.length));
  }
  return password;
}

function generateUUID() {
  'use strict';
  var e = new Date().getTime(),
  var randomRoomKey = o.replace(/[xdy]/g, function (o) {
      var t = (e + 16 * Math.random()) % 16 | 0,
          n = (e + 10 * Math.random()) % 10 | 0,
          a = (e + 6 * Math.random()) % 6 | 0;
      switch (o) {
      case "d":
          return n;
      case "y":
          return parseInt(10 + a).toString(16);
      default:
          return t.toString(16);
      }
  }).toUpperCase();
  return randomRoomKey;
}

function getEmailLink(to, subject, body) {
  "use strict";
  to = String(to);
  subject = String(subject);
  body = String(body);
  var link = "mailto:";
  var params = [];
  if (to) {
      link += encodeURIComponent(String(to));
  }
  if (subject) {
      params.push("subject=" + encodeURIComponent(String(subject)));
  }
  if (body) {
      params.push("body=" + encodeURIComponent(String(body)));
  }
  if (params.length) {
      link += "?" + params.join("&");
  }
  return link;
}

function sendEmail(to, subject, body) {
  "use strict";
  document.location.href = getEmailLink(to, subject, body);
  return false;
}

function openNewRoom() {
  'use strict';
  var newRoomUrl = PROVIDER + generateUUID() +':' + generatePASSWD(8);
  alert('Store your unique URL: ' + newRoomUrl);
  location.href = newRoomUrl;
}

function openNewRoomInWindow() {
  'use strict';
  var newRoomUrl = PROVIDER + generateUUID() +':' + generatePASSWD(8);
  alert('Store your unique URL: ' + newRoomUrl);
  window.open(newRoomUrl, 'whiteboard', 'toolbar=no');
}

function openSketchpadInWindow(token) {
  'use strict';
  var newRoomUrl = PROVIDER + token;
  window.open(newRoomUrl, 'whiteboard', 'scrollbars=yes,resizable=yes,top=100,left=100,width=1024,height=800,toolbar=no');
}

// exports
window.generateUUID = generateUUID;
window.getEmailLink = getEmailLink;
window.openNewRoom = openNewRoom;
window.openNewRoomInWindow = openNewRoomInWindow;
window.openSketchpadInWindow = openSketchpadInWindow;
window.sendEmail = sendEmail;