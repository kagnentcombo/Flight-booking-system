<?php 
    session_start();
    include('server.php');

    $errors = array();

    $bookingId = rand(100000000, 1000000000) ;
    isset( $_GET['flightId']) ? $flightId = $_GET['flightId'] : $flightId = "" ;
    isset( $_GET['seat']) ? $seat = $_GET['seat'] : $seat = "" ;
    isset( $_GET['numofpass']) ? $numofpass = $_GET['numofpass'] : $numofpass = "" ;
    isset( $_GET['title1']) ? $title1 = $_GET['title1'] : $title1 = "" ;
    isset( $_GET['fname1']) ? $fname1 = $_GET['fname1'] : $fname1 = "" ;
     isset( $_GET['sname1']) ? $sname1 = $_GET['sname1'] : $sname1 = "" ;
     isset( $_GET['ID1']) ? $ID1 = $_GET['ID1'] : $ID1 = "" ;
     isset( $_GET['bdate1']) ? $bdate1 = $_GET['bdate1'] : $bdate1 = "" ;
     isset( $_GET['tel']) ? $tel = $_GET['tel'] : $tel = "" ;
     isset( $_GET['email']) ? $email = $_GET['email'] : $email = "" ;
     isset( $_GET['addr']) ? $addr = $_GET['addr'] : $addr = "" ;
     isset( $_GET['insureId']) ? $insureId = $_GET['insureId'] : $insureId = "" ;

     for($i = 1; $i <= $numofpass + 1; $i++) {
        isset( $_GET["title$i"]) ? $title["title$i"] = $_GET["title$i"] : $title["title$i"] = "" ;
        isset( $_GET["fname$i"]) ? $fname["fname$i"] = $_GET["fname$i"] : $fname["fname$i"] = "" ;
        isset( $_GET["sname$i"]) ? $sname["sname$i"] = $_GET["sname$i"] : $sname["sname$i"] = "" ;
        isset( $_GET["ID$i"]) ? $ID["ID$i"] = $_GET["ID$i"] : $ID["ID$i"] = "" ;
        isset( $_GET["bdate$i"]) ? $bdate["bdate$i"] = $_GET["bdate$i"] : $bdate["bdate$i"] = "" ;
      }

    $sql = "SELECT `Plane_ID` FROM `flight` WHERE `Flight_ID` = '$flightId'" ;
    $result = $conn->query($sql) ;
    while($row = $result->fetch_assoc()):
      $planeID = $row['Plane_ID'] ;
    endwhile ;

    $sqlSeat = "UPDATE Plane SET Seat = $seat - ($numofpass + 1) WHERE Plane_ID = '$planeID'" ;
    mysqli_query($conn,$sqlSeat) ;
    

    $sqlBook = "INSERT INTO Booking (Booking_ID) VALUES ('$bookingId')" ;
    mysqli_query($conn,$sqlBook);

    $sqlFlightBook = "INSERT INTO Flight_booking (Flight_ID, Booking_ID, Price, SeatQty)
    VALUES ('$flightId', '$bookingId', ($numofpass + 1) * 1200, ($numofpass + 1))" ;
    mysqli_query($conn,$sqlFlightBook);

    $sqlBooker = "INSERT INTO Booker (ID, Booking_ID, Tel, Address, Email) VALUES ('$ID1', '$bookingId', '$tel', '$addr', '$email')" ;
    mysqli_query($conn,$sqlBooker);

    for($i = 1; $i <= $numofpass + 1; $i++) {
        $str1 = $title["title$i"] ;
        $str2 = $fname["fname$i"] ;
        $str3 = $sname["sname$i"] ;
        $str4 = $ID["ID$i"] ;
        $str5 = $bdate["bdate$i"] ;
        $fornext["next$i"] = "('$str4', '$flightId', '$str1', '$str2', '$str3', '$str5', '$bookingId')" ;
        $forinsure["in$i"] = "('$str4', '$insureId', '2022-05-10')" ;
        if($i < $numofpass + 1) {
            $fornext["next$i"] = $fornext["next$i"] . ", " ;
            $forinsure["in$i"] = $forinsure["in$i"] . ", " ;
        }
            
      }

    $sql = "INSERT INTO Passenger (ID, Flight_ID, Title, Fname, Sname, BDate, Booking_ID) VALUES ";
    for($i = 1; $i <= $numofpass + 1; $i++) {
        $sql = $sql . $fornext["next$i"] ;
      }
    mysqli_query($conn,$sql);

    if($insureId != "") {
        $sqlInsure = "INSERT INTO Passenger_insure (ID, Insure_ID, PolicyExp) VALUES " ;
        for($i = 1; $i <= $numofpass + 1; $i++) {
            $sqlInsure = $sqlInsure . $forinsure["in$i"] ;
          }
        mysqli_query($conn,$sqlInsure);
    }
    

    header("location: info.php?bookingId=$bookingId");

?>