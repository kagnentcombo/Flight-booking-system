<?php 
    session_start();
    include('server.php'); 

    isset( $_GET['flightId']) ? $flightId = $_GET['flightId'] : $flightId = "" ;
    isset( $_GET['seat']) ? $seat = $_GET['seat'] : $seat = "" ;

?>

<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html>

<head>
  <title>formbook</title>
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
    <a href="#" class="w3-bar-item w3-button w3-text-blue w3-hover-blue"><b><i
          class="fa fa-plane w3-margin-right"></i>FlightToGo</b></a>
    <!-- <a href="#" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-grey"><i class="fa fa-search"></i></a> -->
  </div>

  <!-- Header -->
  <br><br><br>
  <header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
    <center>
      <div style="width:65%; text-align: left;">
        <div class="w3-bar w3-black">
          <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Booker');"><i
              class="fa fa-address-book w3-margin-right"></i>Booker</button>
          <!-- <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Car');"><i class="fa fa-car w3-margin-right"></i>Rental</button> -->
        </div>

        <!-- Tabs -->
        <div id="Booker" class="w3-container w3-white w3-padding-16 myLink">
          <!-- <h3>Travel the world with us</h3> -->
          <!-- <h3>เลือกเที่ยวบินที่ต้องการ</h3> -->
          <div class="w3-row-padding" style="margin:16px;">
              <h3>กรุณากรอกข้อมูลของผู้จอง</h3>
              <form action="insure.php" method="get">
              <input type="hidden" class="w3-input w3-border" type="text" id="flightId" name="flightId" value="<?php echo $flightId; ?>">
              <input type="hidden" class="w3-input w3-border" type="text" id="seat" name="seat" value="<?php echo $seat; ?>">
              <label for='title'>คำนำหน้าชื่อ</label>
              <input class="w3-input w3-border" type="text" id="title1" name="title1" placeholder="กรุณากรอกคำนำหน้าชื่อ" require>
              <label>ชื่อ</label>
              <input class="w3-input w3-border" type="text" id="fname1" name="fname1"  placeholder="กรุณากรอกชื่อ" require>
              <label>นามสกุล</label>
              <input class="w3-input w3-border" type="text" id="sname1" name="sname1" placeholder="กรุณากรอกนามสกุล" require>
              <label>รหัสบัตรประชาชน</label>
              <input class="w3-input w3-border" type="text" id="ID1" name="ID1" placeholder="กรุณากรอกรหัสบัตรประชาชน 13 หลัก">
              <label>วันเกิด</label>
              <input class="w3-input w3-border" type="date" id="bdate1" name="bdate1" placeholder="กรุณากรอกวัดเกิด" require>
              <label>เบอร์โทรศัพท์</label>
              <input class="w3-input w3-border" type="text" id="tel" name="tel" placeholder="กรุณากรอกหมายเลขโทรศัพท์ที่ติดต่อได้" require>
              <label>Email</label>
              <input class="w3-input w3-border" type="text" id="email" name="email" placeholder="กรุณากรอก Email" require>
              <label>ที่อยู่</label>
              <input class="w3-input w3-border" type="text" id="addr" name="addr" placeholder="กรุณากรอกที่อยู่" require>
              <div class="w3-row-padding" style="margin:0 -16px;">
              <p>

                 <h3>หากต้องการเดินทางมากกว่า 1 ท่าน กรุณากรอกข้อมูลของผู้โดยสารคนอื่น</h3>
                <label>จำนวนผู้โดยสารคนอื่นๆ</label>
                <select class="w3-input w3-border" id="numofpass" name="numofpass" placeholder="ระบุจำนวนผู้โดยสาร">
                  <option value="0" selected = "selected">&nbsp 0 &nbsp</option>
                  <option value="1">&nbsp 1 &nbsp</option>
                  <option value="2">&nbsp 2 &nbsp</option>
                  <option value="3">&nbsp 3 &nbsp</option>
                  <option value="4">&nbsp 4 &nbsp</option>
                  <option value="5">&nbsp 5 &nbsp</option>
                  <option value="6">&nbsp 6 &nbsp</option>
                  <option value="7">&nbsp 7 &nbsp</option>
                  <option value="8">&nbsp 8 &nbsp</option>
                  <option value="9">&nbsp 9 &nbsp</option>
                  <option value="10">&nbsp 10 &nbsp</option>
                  </select>
                <div id="list">

                </div><br>
              <button type="submit" id="book_info" class="w3-button w3-red">ต่อไป</button></p>
             </form>
              </div>
          </div>
          
        </div>
        <script>
          var b = document.getElementById("numofpass");
          b.onchange = function () {
            var c = b.options[b.selectedIndex].text;
            a(parseInt(c) + 1);
          }

          function a(i) {
            document.getElementById("list").innerHTML = "";
            let s = 1;
            if (i >= 0) {
              for (let x = 1; x < i; x++) {
                s += 1;
                var title = document.createElement('p');
                title.innerText = `ข้อมูลผู้โดยสารคนที่ ${s}`;
                document.getElementById('list').appendChild(title);

                var label = document.createElement("label");
                label.innerText = "คำนำหน้าชื่อ";
                var input = document.createElement("input");
                input.type = "text";
                input.className = "w3-input w3-border";
                input.name = "title" + s;
                input.innerHTML = "";
                input.require ;
                document.getElementById('list').appendChild(label).appendChild(input);

                var label = document.createElement("label");
                label.innerText = "ชื่อ";
                var input = document.createElement("input");
                input.type = "text";
                input.className = "w3-input w3-border";
                input.name = "fname" + s;
                input.innerHTML = "";
                input.require ;
                document.getElementById('list').appendChild(label).appendChild(input);

                var label = document.createElement("label");
                label.innerText = "นามสกุล";
                var input = document.createElement("input");
                input.type = "text";
                input.className = "w3-input w3-border";
                input.name = "sname" + s;
                input.innerHTML = "";
                input.require ;
                document.getElementById('list').appendChild(label).appendChild(input);

                var label = document.createElement("label");
                label.innerText = "รหัสบัตรประชาชน";
                var input = document.createElement("input");
                input.type = "text";
                input.className = "w3-input w3-border";
                input.name = "ID" + s;
                input.innerHTML = "";
                input.require ;
                document.getElementById('list').appendChild(label).appendChild(input);

                var label = document.createElement("label");
                label.innerText = "วันเกิด";
                var input = document.createElement("input");
                input.type = "date";
                input.className = "w3-input w3-border";
                input.name = "bdate" + s;
                input.innerHTML = "";
                input.require ;
                document.getElementById('list').appendChild(label).appendChild(input);


              }
              
            }
          }

        </script>

        <!-- Page content -->
        </form>
    </center>

    <script>

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

      document.getElementsByClassName("tablink")[0].click();
    </script>

</body>

</html>