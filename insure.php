<?php
  session_start();
  include('server.php');

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

  for($i = 2; $i <= $numofpass + 1; $i++) {
    isset( $_GET["title$i"]) ? $title["title$i"] = $_GET["title$i"] : $title["title$i"] = "" ;
    isset( $_GET["fname$i"]) ? $fname["fname$i"] = $_GET["fname$i"] : $fname["fname$i"] = "" ;
    isset( $_GET["sname$i"]) ? $sname["sname$i"] = $_GET["sname$i"] : $sname["sname$i"] = "" ;
    isset( $_GET["ID$i"]) ? $ID["ID$i"] = $_GET["ID$i"] : $ID["ID$i"] = "" ;
    isset( $_GET["bdate$i"]) ? $bdate["bdate$i"] = $_GET["bdate$i"] : $bdate["bdate$i"] = "" ;
  }

  $first = "payment.php?flightId=$flightId&seat=$seat&numofpass=$numofpass&title1=$title1&fname1=$fname1&sname1=$sname1&ID1=$ID1&bdate1=$bdate1&tel=$tel&email=$email&addr=$addr" ;

  for($i = 2; $i <= $numofpass + 1; $i++) {
    $str1 = $title["title$i"] ;
    $str2 = $fname["fname$i"] ;
    $str3 = $sname["sname$i"] ;
    $str4 = $ID["ID$i"] ;
    $str5 = $bdate["bdate$i"] ;
    $fornext["next$i"] = "&title$i=$str1&fname$i=$str2&sname$i=$str3&ID$i=$str4&bdate$i=$str5" ;
  }

  for($i = 2; $i <= $numofpass + 1; $i++) {
    $first = $first . $fornext["next$i"] ;
  }

?>


<!DOCTYPE html>
<html>

<head>
    <title>FlightToGo Insure</title>
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
            <div style="width:65%; text-align: left;">
                <div class="w3-bar w3-black">
                    <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Insure');"><i
                            class="fa fa-medkit w3-margin-right"></i>Insure</button>
                </div>

                <div id="Insure" class="w3-container w3-white w3-padding-16 myLink">
                    <div class="w3-row-padding" style="margin: 0- 16px; font-size: 35px;"></div>
                    <div class="w3-half">
                        <h2>คุ้มครองประกันภัย</h2>
                        <label>ประกันภัยการเดินทาง 120.00 บาท/คน คุ้มครองกรณีเกิดอุบัติเหตุ 30,000 บาท
                            คุ้มครองกระเป๋าเดินทางและทรัพย์สินส่วนตัว 15,000 บาท นาน 3 วัน
                            ตามข้อตกลงและเงื่อนไขที่กำหนด มีประกันภัยคุ้มครองอุ่นใจขึ้นอีกเยอะ
                        </label>
                        <br>
                        <br>
                        <a href = "<?php echo $first; ?>&insureId=JAK">
                        <input onclick="ok()" type="button" class="w3-button w3-red" value = "ตกลง"></a>
                        <a href = "<?php echo $first; ?>">
                        <input onclick="notOk()" type="button" class="w3-button w3-dark-grey" value = "ข้าม"></a>
                        

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

            function ok() {
                alert("คุณตกลงที่จะทำประกันการเดินทาง\nราคาประกันจะถูกนำไปรวมกับราคาทั้งหมดที่คุณต้องจ่าย");
            }

            function notOk() {
                alert("คุณไม่ทำประกันการเดินทาง");
            }

            // Click on the first tablink on load
            document.getElementsByClassName("tablink")[0].click();
        </script>



</body>

</html>