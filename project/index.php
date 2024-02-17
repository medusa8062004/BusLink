<!DOCTYPE html>
<?php include("ASSETS/connections/connection.php");
session_start();?>
<html lang="en"><?php 
use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;	
			 
	require 'ASSETS/phpMail/src/Exception.php';
	require 'ASSETS/phpMail/src/PHPMailer.php';
	require 'ASSETS/phpMail/src/SMTP.php';
?>
<head>
  <style>
    .card {
  width: 210px;
  height: 254px;
  border-radius: 4px;
  background: #212121;
  display: flex;
  gap: 5px;
  padding: .4em;
}

.card p {
  height: 100%;
  flex: 1;
  overflow: hidden;
  cursor: pointer;
  border-radius: 2px;
  transition: all .5s;
  background: #212121;
  border: 1px solid #ff5a91;
  display: flex;
  justify-content: center;
  align-items: center;
}

.card p:hover {
  flex: 4;
}

.card p span {
  min-width: 14em;
  padding: .5em;
  text-align: center;
  transform: rotate(-90deg);
  transition: all .5s;
  text-transform: uppercase;
  color: #ff568e;
  letter-spacing: .1em;
}

.card p:hover span {
  transform: rotate(0);
}
    </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <title>Bus Link</title>

  <!-- Bootstrap core CSS -->
  <link href="ASSETS/Templates/User/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="ASSETS/Templates/User/assets/css/fontawesome.css">
  <link rel="stylesheet" href="ASSETS/Templates/User/assets/css/templatemo-tale-seo-agency.css">
  <link rel="stylesheet" href="ASSETS/Templates/User/assets/css/owl.css">
  <link rel="stylesheet" href="ASSETS/Templates/User/assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <link rel="stylesheet" href="ASSETS/Templates/User/assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="ASSETS/Templates/User/assets/css/owl.theme.default.min.css">
<script src="ASSETS/Templates/User/assets/js/owl.carousel.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   -->
  <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js">
</script>
 <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js">
   </script>


</head>

<body style="background:linear-gradient(to right,rgb(9 9 47),#131355);">

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
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.php" class="logo">
            
              <img src="ASSETS/Templates/Admin/assets/img/bus-link-high-resolution-logo-transparent.png" alt="logo">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              
              <li class="has-sub">
                <a href="javascript:void(0)">Signup</a>
                <ul class="sub-menu">
                  <li><a href="Guest/Driverregistration.php">Driver</a></li>
                  <li><a href="Guest/Studentregistration.php">Student</a></li>
                </ul>
              </li>
              <li class="scroll-to-section"><a href="Guest/login.php">Login</a></li>
              
              
              <li class="has-sub">
                <a href="javascript:void(0)">Pages</a>
                <ul class="sub-menu">
                  <li><a href="https://bpccollege.ac.in/college-bus/">About Us</a></li>
                
                </ul>
              </li>
              <li class="scroll-to-section"><a href="#infos">Bus Fare Calculator</a></li>
              <li class="scroll-to-section"><a href="#contact">Feedback</a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>d
  <!-- ***** Header Area End ***** -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="2000">
      <div class="main-banner" id="top" style="background-image:url('ASSETS/Templates/User/assets/images/pre-comp_3_6.gif'); background-size: 100%; background-repeat: no-repeat;">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <div class="caption header-text">
                <h4 style="color: floralwhite">BUS LINK</h4>
                <div class="line-dec"></div>
                <h4 style="color: ghostwhite">Navigating&nbsp;&nbsp;<em>your&nbsp;</em>Campus&nbsp;<span>Journey</span></h4>
                <p style="font-size: 18px; line-height: 30px; color: white;">This college bus management system is a software application or system designed for our students to streamline and optimize the operations related to the transportation of students to and from a college or educational institution. This system leverages technology to enhance the efficiency, safety, and overall management of the college bus fleet.</p>
              </div>
            </div>
          </div>
        </div>BusLin
      </div>
    </div>

    <div class="carousel-item">
      <div class="main-banner" id="top" style="background-image:url('ASSETS/Templates/User/assets/images/newimg.jpg'); background-size: cover; background-repeat: no-repeat;">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <div class="caption header-text">
                <h4 style="color: floralwhite">On-Time, On-Track<br> On-Campus</h4>
                <div class="line-dec"></div>
        
                <h4 style="color: ghostwhite">Enhancing&nbsp;&nbsp;<em>&nbsp;</em>Campus&nbsp;<span>Experience</span></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="carousel-item">
      <div class="main-banner" id="top" style="background-image:url('ASSETS/Templates/User/assets/images/e1d0b670bf733710de2e3212f70aaed7.png'); background-size: cover; background-repeat: no-repeat;">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <div class="caption header-text">
                <h4 style="color: floralwhite">Streamline Your <br>Campus Commute</h4>
                <div class="line-dec"></div>
                
                <h4 style="color: black">Your Ride to&nbsp;&nbsp;<em>&nbsp;</em>Success&nbsp;<span style="color:white">Begins Here</span></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


  <div class="services section" id="services">
    <div class="container" style="background-image:url('ASSETS/Templates/User/assets/images/excellent.png'); 
  background-repeat:no-repeat;
  background-size:contain;">
      <div class="row">
        <div class="col-lg-6 offset-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <h2 style="color:white">We Provide <em>Different Services</em> &amp;
                  <span>Features</span> For Students
                </h2>
                <div class="line-dec"></div>
          
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="ASSETS/Templates/User/assets/images/services-01.jpg" alt="discover SEO" class="templatemo-feature">
                </div>
                <h4>Route Management</h4>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="ASSETS/Templates/User/assets/images/services-02.jpg" alt="data analysis" class="templatemo-feature">
                </div>
                <h4>Notifications and Alerts</h4>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon"><br>
                  <img src="ASSETS/Templates/User/assets/images/services-03.jpg" alt="precise data" class="templatemo-feature">
                </div>
                <h4>Driver Management </h4>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="ASSETS/Templates/User/assets/images/services-04.jpg" alt="SEO marketing" class="templatemo-feature">
                </div>
                <h4>Cost Tracking &amp; Managing</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="projects section" id="projects">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h2><span style="color:white">Upcoming</span> <em>Features of our</em> <span>Website</span></h2>
            <div class="line-dec"></div>
            <p>
Colleges are providing high quality education, cutting-edge infrastructure, highly educated and experienced faculty, and bright students.College transportation has gained a lot in importance due to increased safety threats to students. However, 
colleges are facing a stiff challenge in providing high class transportation facilities to ensure better security to students.</p>
          </div>
        </div>
      </div>
    </div>

          <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <!-- <div class="owl-features owl-carousel" > -->
          <div class="owl-carousel  owl-features  owl-loaded ">
            
            <div class="owl-stage-outer">
              
              <div class="owl-stage" style="transform: translate3d(-1527px, 0px, 0px); transition: all 0.25s ease 0s; width: 3334px;">
         
            <div class="owl-item">
              <img src="ASSETS/Templates/User/assets/images/10780477_19197121.jpg" alt="">
              <div class="down-content">
                <h4 style="color:white">Real-Time GPS Tracking</h4><br>
                <p style="color:white;  font-weight:16px">Implement real-time GPS tracking of college buses to allow students and staff to
                 track the location of buses on a map, helping them plan their commutes more efficiently.</p>
              
              </div>
            </div>
            <div class="owl-item">
              <img src="ASSETS/Templates/User/assets/images/one.jpg"   alt="">
              <div class="down-content">
                <h4 style="color:white">Parent Portal</h4><br>
                <p style="color:white;font-weight:16px">Create a secure portal for parents to access bus-related information,
                   track their child's bus, and receive notifications.</p>
              
              </div>
            </div>
            <div class="owl-item ">
              <img src="ASSETS/Templates/User/assets/images/12083119_Wavy_Bus-06-K_Single-04.jpg" alt="">
              <div class="down-content">
                <h4 style="color:white">Mobile App Integration</h4><br>
                <p style="color:white;  font-weight:16px"> Develop a mobile app that integrates with the website,
                 enabling students and parents to access bus schedules, real-time tracking, and receive notifications.</p>
               
              </a>

              
              </div>
            </div>
            <div class="owl-item ">
              <img src="ASSETS/Templates/User/assets/images/8785470_3991843.jpg" alt="">
              <div class="down-content">
                <h4 style="color:white">Attendence Tracking</h4><br>
                <p style="color:white;  font-weight:16px">  Allow bus drivers or attendants to take attendance of students as they board or exit the bus,
                 with this data accessible to parents and school administrators.</p>
              

              </div>
            </div>
            <div class="owl-item">
              <img src="ASSETS/Templates/User/assets/images/23182510_1906.i121.022.P.m005.c30.isometric biometric identification set-01.jpg" alt="">
              <div class="down-content">
                <h4 style="color:white">Biometric Verification</h4><br>
               <p style="color:white font-weight:16px "> Each student is enrolled with their biometric data, such as fingerprints, facial recognition, or iris scans, 
                which serves as their unique identification. This ensures that only authorized students can access the bus service.</p>
               <hr>
              </div>
            </div>
            <div class="owl-item">
              <img src="ASSETS/Templates/User/assets/images/12085796_20944283.jpg" alt="">
              <div class="down-content">
                <h4 style="color:white">Weather Integration</h4><br>
                <p style="color:white font-weight:16px;">Integrate weather data to inform students and drivers about
                 adverse weather conditions that might affect the bus schedule.</p>
              
              </div>
            </div>
         
            <div class="owl-item">
              <img src="ASSETS/Templates/User/assets/images/10783851_19198864.jpg" alt="">
              <div class="down-content">
                <h4 style="color:white"><br>Voice Assistants</h4>
               <p style="color:white font-weight:16px"> Voice assistants can provide real-time updates on bus
                 locations, delays, and cancellations. Users can ask, "Is my bus running late?"</p>
              
              </div>
              
  
            </div>
   



          </div>
        </div>
      </div>
    </div>

  </div>
  <script>
var owl = $('.owl-carousel');
owl.owlCarousel({
    items:4, 
  // items change number for slider display on desktop
  
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true
});
</script>
<hr style="color:white;">
<br>
<h2 style="color:white">Affordable Commutes Await!<span style="color:purple"> Calculate Your Bus Fare Here</span></h2>


  <div class="infos section" id="infos" >
    <div class="container" id="fare" style="display:flex;  width:700px; height:300px; background-color:linear-gradient(to right,rgb(9 9 47),#131355);
}; border-radius:10px;    box-shadow: 0 0 15px rgba(0, 0, 0, 0.7);
      backdrop-filter: blur(5px);">
      <?php
if(isset($_POST['btnsub']))
{?>
<div>
<table border="2" style="float:right;">
  <tr>
    <td>Stop Name</td>
<td>Stop Rate</td>
</tr>
<?php $sl="select * from tbl_route r inner join tbl_stop stp on stp.route_id=r.route_id where r.route_id=".$_POST['ddlroute']; 
$r1=$conn->query($sl);
while($ro1=$r1->fetch_assoc())  {?>
<tr>
  <td><?php echo  $ro1['stop_name']?></td>
  <?php  if($ro1['stp_no']<=5) {?>
  <td><?php echo $ro1['route_rate'] ?></td> <?php } else { ?>
    <td><?php echo $ro1['route_rate']+100?></td>
</tr>
<?php }  } ?>
</table>
  </div>

<?php  }

?>
  <div style=" width:300px;" >
    <div style="padding-top:30px; ">
    <form method="post" action="BusFareCalculator.php">

  
    <div style="color:white"> Select Route &nbsp;</div><br>
            
             <select name="ddlroute" onChange="getStop(this.value)" id="ddlroute" style="
    border: 1px solid;
    border-color: white;
    background-color: transparent;
    color: white;
    border-radius: 7px;
    width: 300px;
    height: 40px;
  "

 > 
                <option value="0" style="
     background-color: #131355;,

    color: white;
  ">---Select Route---</option>
                <?php
                $a = "SELECT * FROM tbl_route";
                $ares = $conn->query($a);
                while ($row = $ares->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['route_id'] ?>" style="
   background-color: #131355;,
    color: white;
  ">
                        <?php echo $row['source_name'], "-", $row['desti_name'] ?>
                    </option>
                <?php } ?> 
            </select> <br><br>
 
           &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; <input type="submit" name="btnsub" id="btnsub" value="Submit" class="btn btn-outline-light" />
            <input type="reset" name="btncan" id="btncan" value="Cancel" class="btn btn-outline-light" />
                </div>
              </form>      
                </div>

 
</center>
<script src="ASSETS/JQ/jQuery.js"></script>
<script>
  function getStop(rid) {
    $.ajax({
      url: "ASSETS/Ajaxpages/AjaxStop.php?rid=" + rid,
      success: function (html) {
        $("#ddlstop").html(html);

      }
    });
  }
</script>

      </div>
    </div>
</div>
<hr>
  

  <div class="contact-us section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="contact-us-content">
            <div class="row">
              <div class="col-lg-4">
                <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5316.340147502112!2d76.51556721507006!3d9.865639765221601!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b07d910540b4869%3A0x64fed0c4f2ffaa31!2sBaselios%20Poulose%20II%20Catholicos%20College!5e1!3m2!1sen!2sin!4v1698508713092!5m2!1sen!2sin"width="100%" height="670px" frameborder="0" style="border:0; border-radius: 23px;" allowfullscreen=""></iframe>
               
                </div>
              </div>
              <div class="col-lg-8">
                <form id="contact-form" action="" method="post">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="section-heading">
                        <h2><em>Send Us</em> Your <span>Feedback</span></h2>
                      </div>
                    </div>
                   
                    <div class="col-lg-6">
                    <fieldset style=
                    "width: 100%;
    height: 46px;
    border-radius: 23px;
    background-color: #f9ebff;
    border: none;
    outline: none;
    padding: 0px 15px;
    font-size: 14px;
    color: #2a2a2a;
    font-weight: 600;
    margin-bottom:15px;">
    <form method="post" action="Feedback.php">
                      <?php 
                      
	   date_default_timezone_set('Asia/Kolkata');
	  $date=date('d-m-y H:i');   echo "Current Date & Time:&nbsp;". $date;?>
                      
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..."
                          required="">
                      </fieldset>
                    </div>
                   
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="txtcontent" id="message" placeholder="Give Us Your Feedback.."></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" name="btnsub2" id="form-submit" class="orange-button">Send Feedback</button>
                </form>
                        <?php  if (isset($_POST['btnsub2']))
                        {
                     $email=$_POST['email'];
                       $feedback=$_POST['txtcontent'];
                              $mail = new PHPMailer(true);
                          
                              $mail->isSMTP();
                              $mail->Host = 'smtp.gmail.com';
                              $mail->SMTPAuth = true;
                              $mail->Username = 'collegebusmanagementsystem@gmail.com'; // Your gmail
                              $mail->Password = 'xjeqrhiyibfqgsrn'; // Your gmail app password
                              $mail->SMTPSecure = 'ssl';
                              $mail->Port = 465;
                            
                              $mail->setFrom($email); // Your gmail
                           
                              $s1="SELECT MAX(admin_mail) AS max_admin_mail FROM tbl_admin";
                              $s2=$conn->query($s1);
                              $s3=$s2->fetch_assoc();
                              $mail->addAddress($s3['max_admin_mail']);
                            
                              $mail->isHTML(true);
                            
                              $mail->Subject = "Feedback from $email";
                              $mail->Body = "
                              <p>Dear Admin,</p>
                              <p>You have received feedback from a user:</p>
                              <p><strong>User Email:</strong> $email</p>
                              <p><strong>Feedback:</strong> $feedback</p>
                              <p>Thank you.</p>
                  ";
                            if($mail->send())
                            {
                            
                              ?>
                            <script>alert("Thankyou for your Feedback..")</script>
                            
                              <?php
                            }
                            else
                            {
                              ?>   <script>alert("Feedback sending failed.Please try again later.")
                              	window.location="index.php";</script> <?php
                            }
                          
                          }
                        ?>
                      </fieldset>
                    </div>
                  </div>
                </form>
                <div class="more-info">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="info-item">
                        <i class="fa fa-phone"></i>
                        <h4><a href="#">0485-2243474 , 2243424, 2265400</a></h4>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-item"><br>
                       
                        <h4><a href="mailto:collegebusmanagementsystem@gmail.com"><i class="fa fa-envelope"></i>collegebusmanagementsystem@gmail.com</a></h4>
                       
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-item">
                        <i class="fa fa-map-marker"></i>
                        <h4><a href="https://maps.app.goo.gl/eWC3451pfLyYiviK9"></i>Illikkamukkada,piravom</a></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer  style="background: linear-gradient(90deg, rgba(85,0,227,1) 0%, rgba(198,61,255,1) 100%);color:white;">>
    <div class="container">
      <div class="col-lg-12" style="color:white">
        <p style="color:white">Copyright © 2023 <a href="#">BPC COLLEGE</a>. All rights reserved.

          <br>Design: <a href="https://bpccollege.ac.in/" target="_blank">BPC</a> 
        </p>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="ASSETS/Templates/User/vendor/jquery/jquery.min.js"></script>
  <script src="ASSETS/Templates/User/vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="ASSETS/Templates/User/assets/js/isotope.min.js"></script>
  <script src="ASSETS/Templates/User/assets/js/owl-carousel.js"></script>
  <script src="ASSETS/Templates/User/assets/js/tabs.js"></script>
  <script src="ASSETS/Templates/User/assets/js/popup.js"></script>
  <script src="ASSETS/Templates/User/assets/js/custom.js"></script>


</body>

</html>