<!DOCTYPE html>
<html>
  <head>
    <title>Generate 6-Digit Unique Number</title>
    <script>
      function generateNumber() {
        var uniqueNumber = Math.floor(Math.random() * 900000) + 100000;
        document.getElementById('IDNumber').value = uniqueNumber;
      }
    </script>
  </head>
  <body>
    <h1>Generate 6-Digit Unique Number</h1>
    <input type="text" id="IDNumber" readonly>
    <a onclick="generateNumber()" style="cursor: pointer; text-decoration: underline; color: #004280;">Generate</a>
  </body>
</html>