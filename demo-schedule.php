<?php
// hello
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Example of electronic scheduler integration with Virtual Classroom">
    <meta name="keywords" content="sketchpad.pro / draw.chat integration example">
    <meta name="author" content="timescraper.com">

    <title>Plan zajęć</title>

    <script src="js/sketchpad.pro.js"></script>

    <!-- Custom CSS -->
    <link href="css/schedule.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <?php include(__DIR__."/php/schedule.php"); ?>
    </div>
    <div class="footer">
      <div class="button-outer"><button class="button" id="invite-by-email">Wyślij zaproszenie na prywatne konsultacje przez e-mail</button></div>
    </div>
    <script>
      document.getElementById("invite-by-email").onclick = function () {
        var newRoomUrl = 'https://draw.chat/' + generateUUID() +':' + generatePASSWD(8);
        sendEmail("","Zaproszenie na konsultacje", `Zapraszam na konsultacje\n\nData i godzina:\n\nSala: ${newRoomUrl}\n\nPozdrawiam,\n\n`);
      };

      Array.prototype.slice.call(document.querySelectorAll(".open-room")).forEach(function (roomBtn) {
        var room = roomBtn.dataset.room;
        roomBtn.onclick = function () {
          openSketchpadInWindow(room);
        };
      });

    </script>
  </body>
</html>
