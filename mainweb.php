<?php
  session_start();
  include('server.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>main</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/w3_css.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Raleway", Arial, Helvetica, sans-serif
    }

    .myLink {
      display: none
    }

    body {
      background-image: url('img/background.png');
    }
  </style>
</head>

<body class="w3-light-grey">

  <!-- Navigation Bar -->
  <div class="w3-bar w3-white w3-border-bottom w3-xlarge">
    <a href="mainweb.php" class="w3-bar-item w3-button w3-text-blue w3-hover-blue"><b><i
          class="fa fa-plane w3-margin-right"></i>FlightToGo</b></a>
    <!-- <a href="#" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-grey"><i class="fa fa-search"></i></a> -->
  </div>
  <br><br><br>
  <!-- Header -->
  <header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
    <center>
      <div style="width:65%; text-align: left;">
        <div class="w3-bar w3-black">
          <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Flight');"><i
              class="fa fa-plane w3-margin-right"></i>Flight</button>
          <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Ticket');"><i
              class="fa fa-ticket w3-margin-right"></i>Ticket</button>
          <!-- <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Car');"><i class="fa fa-car w3-margin-right"></i>Rental</button> -->
        </div>

        <!-- Tabs -->
        <div id="Flight" class="w3-container w3-white w3-padding-16 myLink">
          <!-- <h3>Travel the world with us</h3> -->
          <h3>เลือกเที่ยวบินที่ต้องการ</h3>
          <form action = "nextflight.php" method="GET">
          <div class="w3-row-padding" style="margin:0 -16px;">
          
            <div class="w3-half">
              <label>From</label>
              <select class="w3-input w3-border" id="start" name="start" placeholder="Departing from">
                <option value="BKK">&nbsp สุวรรณภูมิ &nbsp</option>
                <option value="DMK">&nbsp ดอนเมือง &nbsp</option>
                <option value="CEI">&nbsp แม่ฟ้าหลวง เชียงราย &nbsp</option>
                <option value="HGN">&nbsp แม่ฮ่องสอน &nbsp</option>
                <option value="CNX">&nbsp เชียงใหม่ &nbsp</option>
                <option value="NNT">&nbsp น่านนคร &nbsp</option>
                <option value="PRH">&nbsp แพร่ &nbsp</option>
                <option value="LPT">&nbsp ลำปาง &nbsp</option>
                <option value="MAQ">&nbsp แม่สอด &nbsp</option>
                <option value="THS">&nbsp สุโขทัย &nbsp</option>
                <option value="PHS">&nbsp พิษณุโลก &nbsp</option>
                <option value="UTH">&nbsp อุดรธานี &nbsp</option>
                <option value="KOP">&nbsp นครพนม &nbsp</option>
                <option value="KKC">&nbsp ขอนแก่น &nbsp</option>
                <option value="ROI">&nbsp ร้อยเอ็ด &nbsp</option>
                <option value="UBP">&nbsp อุบลราชธานี &nbsp</option>
                <option value="PXR">&nbsp สุรินทร์ภักดี &nbsp</option>
                <option value="UNN">&nbsp ระนอง &nbsp</option>
                <option value="URT">&nbsp สุราษฎร์ธานี &nbsp</option>
                <option value="USM">&nbsp สมุย &nbsp</option>
                <option value="NST">&nbsp นครศรีธรรมราช &nbsp</option>
                <option value="HKT">&nbsp ภูเก็ต &nbsp</option>
                <option value="KBV">&nbsp กระบี่ &nbsp</option>
                <option value="TST">&nbsp ตรัง &nbsp</option>
                <option value="HDY">&nbsp หาดใหญ่ &nbsp</option>
                <option value="NAW">&nbsp นราธิวาส &nbsp</option>
              </select>

            </div>
            <div class="w3-half">
              <label>To</label>
              <select class="w3-input w3-border" id="end" name="end" placeholder="Arriving at">
                <option value="BKK">&nbsp สุวรรณภูมิ &nbsp</option>
                <option value="DMK">&nbsp ดอนเมือง &nbsp</option>
                <option value="CEI">&nbsp แม่ฟ้าหลวง เชียงราย &nbsp</option>
                <option value="HGN">&nbsp แม่ฮ่องสอน &nbsp</option>
                <option value="CNX" selected>&nbsp เชียงใหม่ &nbsp</option>
                <option value="NNT">&nbsp น่านนคร &nbsp</option>
                <option value="PRH">&nbsp แพร่ &nbsp</option>
                <option value="LPT">&nbsp ลำปาง &nbsp</option>
                <option value="MAQ">&nbsp แม่สอด &nbsp</option>
                <option value="THS">&nbsp สุโขทัย &nbsp</option>
                <option value="PHS">&nbsp พิษณุโลก &nbsp</option>
                <option value="UTH">&nbsp อุดรธานี &nbsp</option>
                <option value="KOP">&nbsp นครพนม &nbsp</option>
                <option value="KKC">&nbsp ขอนแก่น &nbsp</option>
                <option value="ROI">&nbsp ร้อยเอ็ด &nbsp</option>
                <option value="UBP">&nbsp อุบลราชธานี &nbsp</option>
                <option value="PXR">&nbsp สุรินทร์ภักดี &nbsp</option>
                <option value="UNN">&nbsp ระนอง &nbsp</option>
                <option value="URT">&nbsp สุราษฎร์ธานี &nbsp</option>
                <option value="USM">&nbsp สมุย &nbsp</option>
                <option value="NST">&nbsp นครศรีธรรมราช &nbsp</option>
                <option value="HKT">&nbsp ภูเก็ต &nbsp</option>
                <option value="KBV">&nbsp กระบี่ &nbsp</option>
                <option value="TST">&nbsp ตรัง &nbsp</option>
                <option value="HDY">&nbsp หาดใหญ่ &nbsp</option>
                <option value="NAW">&nbsp นราธิวาส &nbsp</option>
              </select>

            </div>
          
          </div>
          <p><button type = "submit" class="w3-button w3-dark-grey">Search and find dates</button></p>
        </div>
        </form>

        <div id="Ticket" class="w3-container w3-white w3-padding-16 myLink">
          <h3>Find your ticket</h3>
          <form action="info.php" method="GET">
          <input class="w3-input w3-border" type="text" name="bookingId" placeholder="BookingID">
          <p><button type="submit" id="main_flightID" class="w3-button w3-dark-grey">Search Ticket</button></p>
  </form>
        </div>
  </header>

  <div class="w3-content" style="max-width:1100px;">


  </div>
  </center>

  <script>
    // Tabs
    function openLink(evt, linkName) {
      var i, x, tablinks;
      x = document.getElementsByClassName("myLink");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
      }
      document.getElementById(linkName).style.display = "block";
      evt.currentTarget.className += " w3-red";
    }

    // Click on the first tablink on load
    document.getElementsByClassName("tablink")[0].click();
  </script>

</body>

</html>