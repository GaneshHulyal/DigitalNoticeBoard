<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<script>
</script>
</head>

<div id="txt"></div>

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#element1 {float:left;}
#element2 {float:right;}
.slideshow-container, h2,h5{
    color: White;
    text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
}
.mySlides {display:none;}
{
    box-sizing: border-box;
}

body {
    font-family: Algerian, Helvetica, sans-serif;
}

/* Style the header */
header {
    background-image: url("123.jpg");
    padding: 1px;
    text-align: center;
    font-size: 28px;
    color: white;
}

/* Create two columns/boxes that floats next to each other */
nav {
    float: left;
    width: 40%;
    height: 340px; /* only for demonstration, should be removed */
    background-image: url("1234.jpg");
    padding: 25	px;
}

/* Style the list inside the menu */
nav ul {
    list-style-type: none;
    padding: 0;
}

article {
	padding: 40%;
    float: left;
    padding: 20px;
    width: 57%;
    background-image: url("1234.jpg");
    height: 300px; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section:after {
    content: "";
    display: table;
    clear: both;
}

/* Style the footer */
footer {
    background-color: #777;
    padding: 30px;
    text-align: center;
    color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
    nav, article {
        width: 100%;
        height: auto;
    }
.marquee {
    width: 450px;
    margin: 0 auto;
    overflow: hidden;
    white-space: nowrap;
    box-sizing: border-box;
    animation: marquee 50s linear infinite;
}

.marquee:hover {
    animation-play-state: paused
}

/* Make it move */
@keyframes marquee {
    0%   { text-indent: 27.5em }
    100% { text-indent: -105em }
}
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

}
</style>
</head>
<body>
</script>

<header>
<body onload="startTime()">
<h5><font size="5" face="" >Department of Technical Education</font></h5>
<h2>Government Polytechnic Bagalkot</h2>
<table><tr><td>
<div><h2> <marquee bgcolor="khaki" width="100%"><font face="Broadway" color="white" size="20%">Digital Notice Board</marquee></h2></div></td>
<td><div>
<canvas id="canvas" width="170" height="170"
style="background-image: url("123.jpg");">
</canvas>

<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>
</div>
</td>
</tr>
</table>
</header>

<section>
  <nav>
    <?php

error_reporting(1);

$con=mysql_connect("localhost","root","");

mysql_select_db("demo1",$con);

extract($_POST);
$target_dir = "test_upload/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

if($upd)
{
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg" && $imageFileType != "webm")
{
    echo "File Format Not Suppoted";
} 

else
{

$video_path=$_FILES['fileToUpload']['name'];

mysql_query("insert into video(video_name) values('$video_path')");

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);

//echo "uploaded ";

}

}
if($disp)
{
	$delete=mysql_query("delete from video");
}
//display all uploaded video

if($upd)

{

$query=mysql_query("select * from video");

	while($all_video=mysql_fetch_array($query))

	{
?>
	 
	 <video width="640" height="340" controls="controls">
	<source src="<?php echo $all_video['video_name']; ?>" type="video/mp4" >
	</video> 
	
	<?php } } ?>
	
	
  </nav>
  
 <article>
<div class="slideshow-container" align="center">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="123.jpg"  width="430">
  <div class="text">Government Polytechnic Bagalkot</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="logo.jpg" width="450" height="270">
  <div class="text">Do It Yourself</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="back.jpg" width="400" height="270" >
  <div class="text">Test Caption</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 8000); // Change image every 2 seconds
}
</script>


  </article>
</section>

<footer>
<?php
  $notice1=nt1;
  $notice2=nt2;
  $notice3=nt3;
  ?>
  <marquee bgcolor="purple">Flash News :  <?php echo $_POST["nt1"]; ?></marquee>
  <hr/>
  <marquee bgcolor="green">flash news :  <?php echo $_POST["nt2"]; ?></marquee>
  <hr/	>
  <marquee bgcolor="purple"><?php echo $_POST["nt3"]; ?></marquee>
  <hr/>
  <marquee bgcolor="blue"><?php echo $_POST["nt4"]; ?></marquee>
  <hr/>
</footer>

</body>
</html>
