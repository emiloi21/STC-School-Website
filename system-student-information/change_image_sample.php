<!DOCTYPE html>

<html>
   <head>
      <title>change picture</title>
      <script type = "text/javascript">
          function displayNextImage() {
              x = (x === images.length - 1) ? 0 : x + 1;
              document.getElementById("img").src = images[x];
          }

          function displayPreviousImage() {
              x = (x <= 0) ? images.length - 1 : x - 1;
              document.getElementById("img").src = images[x];
          }

          function startTimer() {
              setInterval(displayNextImage, 15000);
          }

          var images = [], x = -1;
          images[0] = "img/rfid_female.jpg";
      </script>
   </head>

   <body onload = "startTimer()">
       <img id="img" src="img/rfid_male.jpg"/>
       <button type="button" onclick="displayPreviousImage()">Previous</button>
       <button type="button" onclick="displayNextImage()">Next</button>
   </body>
</html>