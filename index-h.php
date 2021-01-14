<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="style2.css" />
</head>
<?php
require('header.php');?>
<div class="container-fluid">
<div class="row">
  <div class="col-md-12">
    <!-- section 2 - a banner -->
    <div class="section2">
        <div class="section2-text">
            <h1>50% OFF</h1>
            <h4>on all new arrivals of winter season</h4>
            <button>SHOP NOW</button>
            <p>English <span>French</span></p>
        </div>

        <div class="section2-video">
            <video autoplay loop muted>
                <source src="images/banner.mp4" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
        </div>
    </div></div>
	<div class="col-md-12">
    <!-- section 3 layout grid -->
    <div class="offer-heading">
        <h1>Our Latest Offers</h1>
        <p>These offers are valid till stock lasts</p>
    </div>
    <div class="grid">

        <img class="image1" src="images/grid1.jpg" alt="" />
        <img class="image2" src="images/grid2.jpg" alt="" />
        <img class="image3" src="images/grid3.jpg" alt="" />
    </div>
</div></div>
<?php require('footer.php');?>