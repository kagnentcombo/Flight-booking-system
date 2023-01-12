<!DOCTYPE html>
<html>

<head>
	<title>Search</title>
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


<body class="w3-light-grey" onload="loadDoc()">
	<div class="w3-bar w3-white w3-border-bottom w3-xlarge">
		<a href="#" class="w3-bar-item w3-button w3-text-blue w3-hover-blue"><b><i
					class="fa fa-plane w3-margin-right"></i>FlightToGo</b></a>
	</div>
	<br><br><br>
	<header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
		<center>
			<div style="width:65% ; text-align: left;">
				<div class="w3-bar w3-black">
					<botton class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Detail');">
						<i class="fa fa-pencil w3-margin-right"></i>Detail
					</botton>

				</div>

				<div id="Detail" class="w3-container w3-white w3-padding-16 myLink">
					<div class="w3-row-padding" style="margin: 0-16px;"></div>
					<div class="w3-half">
						<h3>Find your ticket</h3>
						<input class="w3-input w3-border" id="searchNum" type="text" placeholder="FightID">
						<br>
						<button type="button" onclick="search()" class="w3-button w3-dark-grey">Search Ticket</button>
					

					<h3 style="color: aliceblue;">TicketList</h3>
					<ul style="color: aliceblue;" id="TicketList">

					</ul>
					<br><br>

					<p><button class="w3-button w3-red">ยืนยัน</button></p>
				</div>
				</div>
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

		<script src='js/search.js'></script>
</body>



</html>