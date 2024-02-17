<?php include("../ASSETS/connections/connection.php");
session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php  $updateq="update tbl_alert set alert_status=1 where alert_status=0";
$conn->query($updateq);?>
<head>
  <style>
    body{background-color:mediumpurple;}
    </style>

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
  <div class="pre-header">
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
  </div>
  <!-- ***** Pre-Header Area End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky" style="background-color: mediumpurple;">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="StudentHome.php" class="logo">
             
            <img src="../ASSETS/Templates/Admin/assets/img/bus-link-high-resolution-logo-transparent.png" alt="logo">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="../index.php" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="Choosestop.php">Choose Route And Stop</a></li>
              <li class="scroll-to-section"><a href="#infos"><?php echo date('Y') ?>&nbsp; PaymentCard</a></li>
          
              <li class="scroll-to-section"><a href="#contact">COMPLAINT</a></li>
              
              <li class="scroll-to-section"><a href="#contact">Contact</a></li>
               <?php //
//                 $sel = "select * from tbl_stdstp s inner join tbl_stop p on p.stop_id=s.stop_id inner join tbl_route r on s.stureg_id=" . $_SESSION['sid'];
//                 $res = $conn->query($sel);
//                 $row = $res->fetch_assoc();
//                 $route_id = $row['route_id']; // Assuming $row['route_id'] contains the route ID

// $selQry = "SELECT COUNT(alert_id) AS notification FROM tbl_alert WHERE route_id = '$route_id'";
// $res = $conn->query($selQry);
      
//               $data = $res->fetch_assoc();
//               $notification_count = $data['notification'];
//               ?>
              <!-- <li class="scroll-to-section">  <a href="Alertnotification.php" style="text-decoration: none;">
                <span class="fa-stack fa-lg" data-count="<?php // echo $notification_count ?>">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
                </span>
              </a>
</li>  -->
<li class="nav-item dropdown pe-2 d-flex align-items-center">
              <?php
              $selQry = 'select count(alert_status) as notification from tbl_alert where alert_status=0';
              $res = $conn->query($selQry);
              $data = $res->fetch_assoc();
              $notification_count = $data['notification'];
              ?>
              <a href="Alertnotification.php" style="text-decoration: none;">
                <span class="fa-stack fa-lg" data-count="<?php echo $notification_count ?>">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
              
              <li style="
    display: flex;
    align-items: center;">
    <?php 
       $sel = "select stu_pic from tbl_studentreg where stureg_id=" . $_SESSION['sid'];
      if($res = $conn->query($sel))
      { $row = $res->fetch_assoc();
      
      ?>
         <a href="StudentProfile.php">   <img src="../ASSETS/File/User/<?php echo $row['stu_pic'] ?>" width="100" class="avatar avatar-sm" alt="avatar"/></a>
   <?php } else { ?> 

    <a href="StudentProfile.php">       <img src="../ASSETS/File/User/3d-cube.png" width="100" class="avatar avatar-sm" alt="avatar"/>
              
    </a><?php } ?>
</li>


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
  <!-- ***** Header Area End ***** -->

  <div class="main-banner" id="top" style="background-image:url('../ASSETS/Templates/User/assets/images/imgbus.png'); background-size: 100%; background-repeat: no-repeat;">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="caption header-text">
          
            <div class="line-dec"></div>
            <h4>Welcome&nbsp;<em style="color:white"><?php echo $_SESSION['sname'] ?></em></span></h4>
            <p style="color:white; font-weight:18px;">Welcome to the College Management System, your gateway to a seamless travel experience! Whether you're a student,
                this user-friendly platform has been designed with your needs in mind. Our cutting-edge system is here to simplify and enhance your journey through academic life,
                For more info  about this website,feel free to contact us .. 
              </p>
            <div class="main-button scroll-to-section"><a href="mailto:collegebusmanagementsystem@gmail.com">Mail us</a></div>
            <span>or</span>
            <div class="second-button">
              <a href="StudentHome.php#top">Telephone</a></div>
              
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- 
  <div class="services section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <h2>We Provide <em>Different Services</em> &amp;
                  <span>Features</span> For Your Agency
                </h2>
                <div class="line-dec"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doers eiusmod.</p>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="../ASSETS/Templates/User/assets/images/services-01.jpg" alt="discover SEO" class="templatemo-feature">
                </div>
                <h4>Discover More on Latest SEO Trends</h4>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="../ASSETS/Templates/User/assets/images/services-02.jpg" alt="data analysis" class="templatemo-feature">
                </div>
                <h4>Real-Time Big Data Analysis</h4>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="../ASSETS/Templates/User/assets/images/services-03.jpg" alt="precise data" class="templatemo-feature">
                </div>
                <h4>Precise Data Analysis &amp; Prediction</h4>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="../ASSETS/Templates/User/assets/images/services-04.jpg" alt="SEO marketing" class="templatemo-feature">
                </div>
                <h4>SEO Marketing &amp; Social Media</h4>
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
            <h2>Discover Our <em>Work</em> &amp; <span>Projects</span></h2>
            <div class="line-dec"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doers eiusmod.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-features owl-carousel">
            <div class="item">
              <img src="../ASSETS/Templates/User/assets/images/projects-01.jpg" alt="">
              <div class="down-content">
                <h4>Digital Agency HTML Templates</h4>
                <a href="#"><i class="fa fa-link"></i></a>
              </div>
            </div>
            <div class="item">
              <img src="../ASSETS/Templates/User/assets/images/projects-02.jpg" alt="">
              <div class="down-content">
                <h4>Admin Dashboard CSS Templates</h4>
                <a href="#"><i class="fa fa-link"></i></a>
              </div>
            </div>
            <div class="item">
              <img src="../ASSETS/Templates/User/assets/images/projects-03.jpg" alt="">
              <div class="down-content">
                <h4>Best Responsive Website Layouts</h4>
                <a href="#"><i class="fa fa-link"></i></a>
              </div>
            </div>
            <div class="item">
              <img src="../ASSETS/Templates/User/assets/images/projects-04.jpg" alt="">
              <div class="down-content">
                <h4>HTML CSS Layouts for your websites</h4>
                <a href="#"><i class="fa fa-link"></i></a>
              </div>
            </div>
            <div class="item">
              <img src="../ASSETS/Templates/User/assets/images/projects-02.jpg" alt="">
              <div class="down-content">
                <h4>Bootstrap 5 Themes for Free</h4>
                <a href="#"><i class="fa fa-link"></i></a>
              </div>
            </div>
            <div class="item">
              <img src="../ASSETS/Templates/User/assets/images/projects-03.jpg" alt="">
              <div class="down-content">
                <h4>Mobile Friendly Website Layouts</h4>
                <a href="#"><i class="fa fa-link"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <div class="infos section" id="infos">
      <div class="row">
      <div class="container" id="pri">
        <?php
        $sel = "select * from tbl_stdstp s inner join tbl_stop p on p.stop_id=s.stop_id inner join tbl_route r on s.stureg_id=" . $_SESSION['sid'];
        $res = $conn->query($sel);
        if ($row = $res->fetch_assoc()) {
            ?>
            <h1 style="color:black">Payment Card</h1>
            <form method="post">
             <div style="color:black">   Route Name:<?php echo $row['source_name'] . " - " . $row['desti_name'] ?></div>
              <table class="table table-bordered text-black">
    <thead class="thead-dark">
        <tr>
            <th>Sl No</th>
            <th>Month Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        $paymentDue = 0; 
        foreach ($months as $index => $month) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>";
            echo "<td>" . $month . "</td>";

            
            $currentYear = date('Y');
            $s = "SELECT * FROM tbl_payment WHERE stureg_id=" . $_SESSION['sid'] . " AND pay_month='" . $month . "' AND YEAR(pay_datetime)='" . $currentYear . "' ";
            $res1 = $conn->query($s);
            if ($res1->num_rows > 0) {
              echo '<td style="color:black;">Paid</td>';
            } else {
              echo '<td><a style="color: red;" href="paymentinfo.php?did=' . $month . '&iid=' . ($index + 1) . '">Pay</a></td>';

                $k = "SELECT r.route_rate FROM tbl_route r INNER JOIN tbl_stop s ON r.route_id = s.route_id INNER JOIN tbl_stdstp stp ON s.stop_id = stp.stop_id WHERE stp.stureg_id = '" . $_SESSION['sid'] . "'";
                $res2 = $conn->query($k);
                $row2 = $res2->fetch_assoc();
 
               
                $paymentDue += $row2['route_rate']; 
            }
            echo "</tr>";
        }

        echo "<tr>";
        echo "<td></td>";
        echo "<td>Total Due:</td>"; 
        if($paymentDue==0)
        echo "<td>" . date('Y') . " Payment Completed <button onclick=\"printDiv('pri')\">Print</button></td>";

            else
            echo "<td>$paymentDue</td>";
        echo "</tr>";
        ?>
    </tbody>
</table>

            </form>
        <?php
        } else {?>
          <div style="color:Black;"> 
       <center>    <?php  echo "You haven't Choosed a Route Yet";?></center>
            </div><?php 
        }
        ?>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
       <!-- <div class="col-lg-12">
          <div class="main-content">
            <div class="row">
              <div class="col-lg-6">
                <div class="left-image">
                  <img src="../ASSETS/Templates/User/assets/images/left-infos.jpg" alt="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="section-heading">
                  <h2>More <em>About Us</em> &amp; What <span>We Offer</span></h2>
                  <div class="line-dec"></div>
                  <p>You are free to use this template for any purpose. You are not allowed to redistribute the
                    downloadable ZIP file of Tale SEO Template on any other template website. Please contact us. Thank
                    you.</p>
                </div>
                <div class="skills">
                  <div class="skill-slide marketing">
                    <div class="fill"></div>
                    <h6>Marketing</h6>
                    <span>90%</span>
                  </div>
                  <div class="skill-slide digital">
                    <div class="fill"></div>
                    <h6>Ditigal Media</h6>
                    <span>80%</span>
                  </div>
                  <div class="skill-slide media">
                    <div class="fill"></div>
                    <h6>Social Media Managing</h6>
                    <span>95%</span>
                  </div>
                </div>
                <p class="more-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doers eiusmod tempor
                  incididunt ut labore et dolore dolor dolor sit amet, consectetur adipiscing elit, sed doers eiusmod.
                </p>
              </div>
            </div>
          </div>
        </div>-->
      </div>
    </div>
  </div>

  <div class="contact-us section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="contact-us-content">
            <div class="row">
              <div class="col-lg-4">
               
              </div>
              <div class="col-lg-8">
                <form id="contact-form" action="" method="post">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="section-heading">
                        <h2><em>Let Us</em>Your<span>Complaints </span></h2>
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
    <form method="post" action="">
                      <?php 
                      
	   date_default_timezone_set('Asia/Kolkata');
	  $date=date('d-m-y H:i');   echo "Current Date & Time:&nbsp;". $date;?>
                      
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset style= "width: 100%;
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
                      <select id="txttitle" name="txttitle" required>
            <option value="0">---Select Complaint Title---</option>
            <option value="bus-delay">Bus Delay</option>
            <option value="bus-cancellation">Bus Cancellation</option>
            <option value="bus-overcrowding">Bus Overcrowding</option>
            <option value="bus-condition">Bus Condition</option>
            <option value="other">Other</option>
        </select>
                      </fieldset>
                    </div>
                   
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="txtcontent" id="txtcontent" placeholder="Your Complaint..."></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit"  name="btnsub1" id="form-submit" class="orange-button">Send Complaint</button>
                      </fieldset>
                    </div>
                    <?php   if(isset($_POST["btnsub1"]))
{
	$ct=$_POST['txttitle'];
	$cc=$_POST['txtcontent'];
	$cd=$_SESSION['sid'];
	if($ct==0)
	{echo "Select a complaint title";}
	else
	{
	$ins="insert into tbl_complaints(cmp_title,cmp_content,stureg_id,cmp_date)values('".$ct."','".$cc."','".$cd."',now())";
	$conn->query($ins);}
	 
}?><br>
                    <div class="col-lg-12">
                      <div class="section-heading">
                        <h2><em>Send Us</em>Your<span>Feedback </span></h2>
                      </div>
                
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="message" id="message" placeholder="Your feedback"></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" name="btnsub" id="btnsub" class="orange-button">Send feedback Now</button>
                      </fieldset>
                    <?php  if(isset($_POST['btnsub']))
{
	$fb=$_POST['message']; 
	$id=$_SESSION['sid'];
	
	$ins="insert into tbl_feedback(feed_content,stureg_id)values('".$fb."','".$id."')";
	$conn->query($ins);} ?>
	

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
      <div class="col-lg-12" >
        <p style="color:white" >Copyright © 2023 <a href="#">BPC COLLEGE</a>. All rights reserved.

          <br>Design: <a href="https://bpccollege.ac.in/" target="_blank">BPC</a> 
        </p>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="../ASSETS/Templates/User/vendor/jquery/jquery.min.js"></script>
  <script src="../ASSETS/Templates/User/vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="../ASSETS/Templates/User/assets/js/isotope.min.js"></script>
  <script src="../ASSETS/Templates/User/assets/js/owl-carousel.js"></script>
  <script src="../ASSETS/Templates/User/assets/js/tabs.js"></script>
  <script src="../ASSETS/Templates/User/assets/js/popup.js"></script>
  <script src="../ASSETS/Templates/User/assets/js/custom.js"></script>


</body>

</html>
