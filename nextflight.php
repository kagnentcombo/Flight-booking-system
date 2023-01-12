<?php
   session_start();
   include('server.php');

   isset( $_GET['start']) ? $start = $_GET['start'] : $start = "" ;
   isset( $_GET['end']) ? $end = $_GET['end'] : $end = "" ;
  
  //$sql = "SELECT * FROM flight WHERE `Route_ID` = (SELECT `Route_ID` FROM `route`
  //WHERE `Airport_ID_Start` = '$start' AND `Airport_ID_End` = '$end')" ;
  $sql = "SELECT flight.*, plane.Seat
  FROM flight
  JOIN plane ON flight.Plane_ID = plane.Plane_ID
  WHERE flight.Route_ID = (SELECT `Route_ID` FROM `route` WHERE `Airport_ID_Start` = '$start' AND `Airport_ID_End` = '$end')" ;
  $result = $conn->query($sql) ;

  if($result->num_rows == 0) {
    echo '<script type ="text/JavaScript">';  
    echo 'alert("ไม่พบเที่ยวบินที่คุณเลือก\nกรุณาเลือกสนามบินปลายทางที่ใกล้เคียงกับสนามบินปลายทางของคุณ") ;';
    echo 'window.location = "mainweb.php" ;' ;
    echo '</script>'; 
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>NextFlight</title>
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
    <div class="w3-bar w3-white w3-border-bottom w3-xlarge">
        <a href="mainweb.php" class="w3-bar-item w3-button w3-text-blue w3-hover-blue"><b><i
                    class="fa fa-plane w3-margin-right"></i>FlightToGo</b></a>
    </div>
    <br><br><br>
    <header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
        <center>
            <div style="width:65% ; text-align: left;">
                <div class="w3-bar w3-black">
                    <botton class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Detail');">
                        <i class="fa fa-book w3-margin-right"></i>Detail
                    </botton>

                </div>

                <div id="Detail" class="w3-container w3-white w3-padding-16 myLink">
                    <div class="w3-row-padding" style="margin: 0-16px;"></div>
                    <div class="w3-half">
                        <h2>SELECT THE AIRLINE YOU CHOOSE TO TRAVEL TO.</h2>
                        <br>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <div id="block1">
                                    <a href = "flight3.php?flightId=<?php echo $row['Flight_ID']; ?>&seat=<?php echo $row['Seat']; ?>">
                                    <h>FLIGHT ID : </h><h><?php echo $row['Flight_ID']; ?></h><br>
                                    <h>BOARDING TIME : </h><h><?php echo $row['DepartureTime']; ?></h><br>
                                    <h> To </h><?php echo $row['LandingTime']; ?><br>
                                    <h>REMAINING SEATS : </h><?php echo $row['Seat']; ?><br>
                                    <h>PRICE : 1200</h>
                                    </a>
                                </div>
                        <br><br>
                            <?php endwhile ?>
                        <a href = "mainweb.php"><input type="button" class="w3-button w3-red" value = "ย้อนกลับ"></a>

                    </div>
                </div>
            </div>

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