<?php
if(!(isset($_SESSION['sid']) && !empty($_SESSION['sid']))){
    header("location: ../Guest/Login.php");}
?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <title>Bus Link</title>

  <!-- Bootstrap core CSS -->
  <link href="../ASSETS/Templates/User/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../ASSETS/Templates/User/assets/css/fontawesome.css">
  <link rel="stylesheet" href="../ASSETS/Templates/User/assets/css/templatemo-tale-seo-agency.css">
  <link rel="stylesheet" href="../ASSETS/Templates/User/assets/css/owl.css">
  <link rel="stylesheet" href="../ASSETS/Templates/User/assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--

TemplateMo 582 Tale SEO Agency

https://templatemo.com/tm-582-tale-seo-agency

-->
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Pre-Header Area Start ***** -->
  <!-- <div class="pre-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-9">
          <div class="left-info">
            <ul>
            <li><a href="#"><i class="fa fa-phone"></i>0485-2243474 , 2243424, 2265400</a></li>
              <li><a href="mailto:collegebusmanagementsystem@gmail.com"><i class="fa fa-envelope"></i>collegebusmanagementsystem@gmail.com</a></li>
              <li><a href="https://maps.app.goo.gl/eWC3451pfLyYiviK9"><i class="fa fa-map-marker"></i>Illikkamukkada,piravom</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-sm-3">
          <div class="social-icons">
            <ul>
            <li><a href="https://www.facebook.com/BPCCPIRAVOM/"><i class="fab fa-facebook"></i></a></li>
              <li><a href="https://www.youtube.com/channel/UClRcXpyLd3JYn0IAd5z1z3A"><i class="fab fa-youtube"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- ***** Pre-Header Area End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky" style="background-color: mediumpurple;">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
           
            <img src="../ASSETS/Templates/Admin/assets/img/bus-link-high-resolution-logo-transparent.png" alt="logo">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="StudentHome.php" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="Choosestop.php">Choose Route</a></li>
              <li class="scroll-to-section"><a href="PaymentCard.php"><?php echo date('Y') ?>&nbsp; PaymentCard</a></li>
              <li class="has-sub">
                <a href="javascript:void(0)">Pages</a>
                <ul class="sub-menu">
                  <li><a href="https://bpccollege.ac.in/college-bus/">About Us</a></li>
                  <li><a href="faqs.html">FAQs</a></li>
                </ul>
              </li>
              <li class="scroll-to-section"><a href="#infos">Infos</a></li>
              <li class="scroll-to-section"><a href="#contact">Contact</a></li>
              <?php  $sel="select stu_pic from tbl_studentreg where stureg_id=".$_SESSION['sid'];
              $res=$conn->query($sel);
              $row=$res->fetch_assoc();?>
              <li style="
    display: flex;
    align-items: center;
"><a href="StudentProfile.php"><img src="../ASSETS/File/User/<?php  echo $row['stu_pic'] ?>" width="100" class="avatar avatar-sm"
                  alt="avatar"/></a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <div style="padding-top:180px;">
  <!-- ***** Header Area End ***** -->

  <!-- <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="caption header-text">
            <h6>SEO DIGITAL AGENCY</h6>
            <div class="line-dec"></div>
            <h4>Dive <em>Into The SEO</em> World <span>With Tale</span></h4>
            <p>Tale is the best SEO agency website template using Bootstrap v5.2.2 CSS for your company. It is a free
              download provided by TemplateMo. There are 3 HTML pages, <a href="index.html">Home</a>, <a
                href="about.html">About</a>, and <a href="faqs.html">FAQ</a>.</p>
            <div class="main-button scroll-to-section"><a href="#services">Discover More</a></div>
            <span>or</span>
            <div class="second-button"><a href="faqs.html">Check our FAQs</a></div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
