<?php
session_start();
include("../ASSETS/connections/Connection.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../Assets/Templates/Admin/assets//img/apple-icon.png">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
  <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
  <script src="jquery.min.js"></script>
  <script src="owlcarousel/owl.carousel.min.js"></script>
  <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css"
    rel="stylesheet">
  <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css"
    rel="stylesheet">
  <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js">
  </script>
  <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js">
  </script>

  <link rel="icon" type="image/png" href="../Assets/Templates/Admin/assets/img/favicon.png">
  <title>
    BUS Link
  </title>
  <!--     Fonts and icons     -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700"
    rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../Assets/Templates/Admin/assets//css/nucleo-icons.css" rel="stylesheet" />
  <link href="../Assets/Templates/Admin/assets//css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
  <link href="../Assets/Templates/Admin/assets//css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../Assets/Templates/Admin/assets//css/corporate-ui-dashboard.css?v=1.0.0"
    rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 bg-slate-900 fixed-start " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand d-flex align-items-center m-0"
        href=" https://demos.creative-tim.com/corporate-ui-dashboard/pages/dashboard.html " target="_blank">
        <span class="font-weight-bold text-lg"><img
            src="../ASSETS/Templates/Admin/assets/img/bus-link-high-resolution-logo-transparent.png" style=" width: 100%;
  overflow: hidden;"></span>
      </a>
    </div>
    <div class="collapse navbar-collapse px-4  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  active" href="../index.php">
            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
              <svg width="30px" height="30px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>dashboard</title>
                <g id="dashboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="template" transform="translate(12.000000, 12.000000)" fill="#FFFFFFs" fill-rule="nonzero">
                    <path class="color-foreground"
                      d="M0,1.71428571 C0,0.76752 0.76752,0 1.71428571,0 L22.2857143,0 C23.2325143,0 24,0.76752 24,1.71428571 L24,5.14285714 C24,6.08962286 23.2325143,6.85714286 22.2857143,6.85714286 L1.71428571,6.85714286 C0.76752,6.85714286 0,6.08962286 0,5.14285714 L0,1.71428571 Z"
                      id="Path"></path>
                    <path class="color-background"
                      d="M0,12 C0,11.0532171 0.76752,10.2857143 1.71428571,10.2857143 L12,10.2857143 C12.9468,10.2857143 13.7142857,11.0532171 13.7142857,12 L13.7142857,22.2857143 C13.7142857,23.2325143 12.9468,24 12,24 L1.71428571,24 C0.76752,24 0,23.2325143 0,22.2857143 L0,12 Z"
                      id="Path"></path>
                    <path class="color-background"
                      d="M18.8571429,10.2857143 C17.9103429,10.2857143 17.1428571,11.0532171 17.1428571,12 L17.1428571,22.2857143 C17.1428571,23.2325143 17.9103429,24 18.8571429,24 L22.2857143,24 C23.2325143,24 24,23.2325143 24,22.2857143 L24,12 C24,11.0532171 23.2325143,10.2857143 22.2857143,10.2857143 L18.8571429,10.2857143 Z"
                      id="Path"></path>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">HOME</span>
          </a>
        </li>

        <li class="nav-item mt-2">
          <div class="d-flex align-items-center nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="ms-2" viewBox="0 0 24 24"
              fill="currentColor" class="w-6 h-6">
              <path fill-rule="evenodd"
                d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                clip-rule="evenodd" />
            </svg>
          
            <span class="font-weight-normal text-md ms-2">Manage Students</span>
          </div>
        </li>
        <li class="nav-item border-start my-0 pt-2">
          <a class="nav-link position-relative ms-0 ps-2 py-2 " href="Place.php">
            <span class="nav-link-text ms-1">Add new Place</span>
          </a>
        </li>
        <li class="nav-item border-start my-0 pt-2">
          <a class="nav-link position-relative ms-0 ps-2 py-2 " href="Department.php">
            <span class="nav-link-text ms-1">Add new Department</span>
          </a>
        </li>
        <li class="nav-item border-start my-0 pt-2">
          <a class="nav-link position-relative ms-0 ps-2 py-2 " href="Course.php">
            <span class="nav-link-text ms-1">Add new Course</span>
          </a>
        </li>
        <li class="nav-item border-start my-0 pt-2">
          <a class="nav-link position-relative ms-0 ps-2 py-2 " href="Studentcomplaint.php">
            <span class="nav-link-text ms-1">Student Complaints</span>
          </a>
        </li>
        <li class="nav-item border-start my-0 pt-2">
          <a class="nav-link position-relative ms-0 ps-2 py-2 " href="Studentverification.php">
            <span class="nav-link-text ms-1">Student Verification</span>
          </a>
        </li>

        <li class="nav-item mt-2">
          <div class="d-flex align-items-center nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="ms-2" viewBox="0 0 24 24"
              fill="currentColor" class="w-6 h-6">
              <path fill-rule="evenodd"
                d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                clip-rule="evenodd" />
            </svg>
            <span class="font-weight-normal text-md ms-2">Manage Driver</span>
          </div>
        </li>
        <li class="nav-item border-start my-0 pt-2">
          <a class="nav-link position-relative ms-0 ps-2 py-2 " href="Driververification.php">
            <span class="nav-link-text ms-1">Driver Verification</span>
          </a>
        </li>
        <li class="nav-item border-start my-0 pt-2">
          <a class="nav-link position-relative ms-0 ps-2 py-2 " href="Driveralerts.php">
            <span class="nav-link-text ms-1">View Driver alerts</span>
          </a>
        </li>
        <li class="nav-item border-start my-0 pt-2">
          <a class="nav-link position-relative ms-0 ps-2 py-2 " href="Drivercomplaints.php">
            <span class="nav-link-text ms-1">Driver Complaints</span>
          </a>
        </li>



        <li class="nav-item mt-2">
          <div class="d-flex align-items-center nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="ms-2" viewBox="0 0 24 24"
              fill="currentColor" class="w-6 h-6">
              <path fill-rule="evenodd"
                d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                clip-rule="evenodd" />
            </svg>
            <span class="font-weight-normal text-md ms-2">Manage Transportation</span>
          </div>
        </li>
        <li class="nav-item border-start my-0 pt-2">
          <a class="nav-link position-relative ms-0 ps-2 py-2 " href="Route.php">
            <span class="nav-link-text ms-1">Add new Route</span>
          </a>
        </li>
        <li class="nav-item border-start my-0 pt-2">
          <a class="nav-link position-relative ms-0 ps-2 py-2 " href="Stop.php">
            <span class="nav-link-text ms-1">Add new Stop</span>
          </a>
        </li>
        <li class="nav-item border-start my-0 pt-2">
          <a class="nav-link position-relative ms-0 ps-2 py-2 " href="AssignDriver.php">
            <span class="nav-link-text ms-1">Assign Route to Driver</span>
          </a>
        </li>


        <li class="nav-item mt-2">
          <div class="d-flex align-items-center nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="ms-2" viewBox="0 0 24 24"
              fill="currentColor" class="w-6 h-6">
              <path fill-rule="evenodd"
                d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                clip-rule="evenodd" />
            </svg>
            <span class="font-weight-normal text-md ms-2">Reports</span>
          </div>
        </li>
        <li class="nav-item border-start my-0 pt-2">
          <a class="nav-link position-relative ms-0 ps-2 py-2 " href="Paymentreport.php">
            <span class="nav-link-text ms-1">Paid Report</span>
          </a>
        </li>
        <li class="nav-item border-start my-0 pt-2">
          <a class="nav-link position-relative ms-0 ps-2 py-2 " href="Paymentreport2.php">
            <span class="nav-link-text ms-1">Not paid Report</span>
          </a>
        </li>
        <li class="nav-item border-start my-0 pt-2">
          <a class="nav-link position-relative ms-0 ps-2 py-2 " href="ReportList.php">
            <span class="nav-link-text ms-1">Due Report</span>
          </a>
        </li>
        <li class="nav-item border-start my-0 pt-2">
          <a class="nav-link position-relative ms-0 ps-2 py-2 " href="Feedback.php">
            <span class="nav-link-text ms-1">Feedback</span>
          </a>
        </li>



<!-- 
        <li class="nav-item">
          <a class="nav-link  " href="../pages/wallet.html">
            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
              <svg width="30px" height="30px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>wallet</title>
                <g id="wallet" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="credit-card" transform="translate(12.000000, 15.000000)" fill="#FFFFFF">
                    <path class="color-background"
                      d="M3,0 C1.343145,0 0,1.343145 0,3 L0,4.5 L24,4.5 L24,3 C24,1.343145 22.6569,0 21,0 L3,0 Z"
                      id="Path" fill-rule="nonzero"></path>
                    <path class="color-foreground"
                      d="M24,7.5 L0,7.5 L0,15 C0,16.6569 1.343145,18 3,18 L21,18 C22.6569,18 24,16.6569 24,15 L24,7.5 Z M3,13.5 C3,12.67155 3.67158,12 4.5,12 L6,12 C6.82842,12 7.5,12.67155 7.5,13.5 C7.5,14.32845 6.82842,15 6,15 L4.5,15 C3.67158,15 3,14.32845 3,13.5 Z M10.5,12 C9.67158,12 9,12.67155 9,13.5 C9,14.32845 9.67158,15 10.5,15 L12,15 C12.82845,15 13.5,14.32845 13.5,13.5 C13.5,12.67155 12.82845,12 12,12 L10.5,12 Z"
                      id="Shape"></path>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Wallet</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../pages/rtl.html">
            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
              <svg width="30px" height="30px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>rtl</title>
                <g id="rtl" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="menu-alt-3" transform="translate(12.000000, 14.000000)" fill="#FFFFFF">
                    <path class="color-foreground"
                      d="M0,1.71428571 C0,0.76752 0.76752,0 1.71428571,0 L22.2857143,0 C23.2325143,0 24,0.76752 24,1.71428571 C24,2.66105143 23.2325143,3.42857143 22.2857143,3.42857143 L1.71428571,3.42857143 C0.76752,3.42857143 0,2.66105143 0,1.71428571 Z"
                      id="Path"></path>
                    <path class="color-background"
                      d="M0,10.2857143 C0,9.33894857 0.76752,8.57142857 1.71428571,8.57142857 L22.2857143,8.57142857 C23.2325143,8.57142857 24,9.33894857 24,10.2857143 C24,11.2325143 23.2325143,12 22.2857143,12 L1.71428571,12 C0.76752,12 0,11.2325143 0,10.2857143 Z"
                      id="Path"></path>
                    <path class="color-background"
                      d="M10.2857143,18.8571429 C10.2857143,17.9103429 11.0532343,17.1428571 12,17.1428571 L22.2857143,17.1428571 C23.2325143,17.1428571 24,17.9103429 24,18.8571429 C24,19.8039429 23.2325143,20.5714286 22.2857143,20.5714286 L12,20.5714286 C11.0532343,20.5714286 10.2857143,19.8039429 10.2857143,18.8571429 Z"
                      id="Path"></path>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li>

      </ul>
    </div> -->
    <!-- <div class="sidenav-footer mx-4 ">
      <div class="card border-radius-md" id="sidenavCard">
        <div class="card-body  text-start  p-3 w-100">
          <div class="mb-3">
           Wallet
          </div>
          <div class="docs-info">
          <i class="fa-duotone fa-wallet fa-xl" style="--fa-primary-color: #9fa2d6; --fa-secondary-color: #8198c1;"></i>
          </div>
        </div>
      </div>
    </div> -->
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-2">
        <nav aria-label="breadcrumb">
          <!--<ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Admin Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Bus Link</li>
          </ol>-->
          <h6 class="font-weight-bold mb-0">Admin DashBoard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body bg-white  border-end-0 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
              </span>
              <input type="text" class="form-control ps-0" placeholder="Search">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                  class="fixed-plugin-button-nav cursor-pointer" viewBox="0 0 24 24" fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"
                    clip-rule="evenodd" />
                </svg>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <?php
              $selQry = 'select count(noti_status) as notification from tbl_stdstp where noti_status=1';
              $res = $conn->query($selQry);
              $data = $res->fetch_assoc();
              $notification_count = $data['notification'];
              ?>
              <a href="notification.php" style="text-decoration: none;">
                <span class="fa-stack fa-lg" data-count="<?php echo $notification_count ?>">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="nav-item ps-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">

                <?php $sql = "SELECT admin_pic FROM tbl_admin WHERE admin_id =" . $_SESSION['aid'];
                $res = $conn->query($sql);
                $row = $res->fetch_assoc(); ?>
                <img src="../ASSETS/File/User/<?php echo $row['admin_pic'] ?>" width="100" class="avatar avatar-sm"
                  alt="avatar" />
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4 px-5">
      <div class="row">
        <div class="col-md-12">
          <div class="d-md-flex align-items-center mb-3 mx-2">
            <div class="mb-md-0 mb-3">
              <h3 class="font-weight-bold mb-0">Hello,
                <?php echo $_SESSION['aname']; ?>
              </h3>
              <!-- <p class="mb-0">Apps you might like!</p> -->
            </div>
            <button type="button"
              class="btn btn-sm btn-white btn-icon d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
              <span class="btn-inner--icon">
                <span class="p-1 bg-success rounded-circle d-flex ms-auto me-2">
                  <span class="visually-hidden">New</span>
                </span>
              </span>
              <span class="btn-inner--text">Messages</span>
            </button>
            <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0">
              <span class="btn-inner--icon">
                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
              </span>
              <span class="btn-inner--text">Sync</span>
            </button>
          </div>
        </div>
      </div>
      <hr class="my-0">



      <!-- STart -->

      <!--  
      <div class="row">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="5000">

        <div class="col-xl-3 col-sm-6 mb-xl-0">
          <div class="card border shadow-xs mb-4">
            <div class="card-body text-start p-3 w-100">
              <div
                class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z" />
                  <path fill-rule="evenodd"
                    d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"
                    clip-rule="evenodd" />
                </svg>
              </div> -->


      <div class="row" style="padding:20px">


      <div class="owl-carousel owl-features  owl-loaded owl-drag">


      <div class="owl-stage-outer">

<div class="owl-stage"
  style="transform: translate3d(-1527px, 0px, 0px); transition: all 0.25s ease 0s; width: 3334px;">
  <div  class="owl-item">

        <div class="col-xl-3 col-sm-6 mb-xl-0">



                <div class="card border shadow-xs mb-4" style="width:300px">
                  <div class="card-body text-start p-3 w-100" style="width:400px;">
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                      <?php
                      $selQry = 'select count(noti_status) as notification from tbl_studentreg where noti_status=0;';
                      $res = $conn->query($selQry);
                      $data = $res->fetch_assoc();
                      $notification_count = $data['notification'];
                      ?>
                      <a href="Studentverification.php" style="text-decoration: none;">
                        <span class="fa-stack fa-lg" data-count="<?php echo $notification_count ?>" style="left:200px;">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
                        </span>
                      </a>
                    </li>
                    <div
                      class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                      <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                          d="M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                          clip-rule="evenodd" />
                        <path
                          d="M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z" />
                      </svg>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="w-100">
                          <p class="text-sm text-secondary mb-1">Registered Students</p>

                          <div class="d-flex align-items-center">

                            <span class="text-sm text-success font-weight-bolder">
                              <?php
                              $sel = "SELECT count(stureg_id) as cid FROM tbl_studentreg WHERE stud_status = 1";
                              $result = $conn->query($sel);
                              $row = $result->fetch_assoc();

                              ?>
                              <h4 class="mb-2 font-weight-bold"><i class="fa-solid fa-graduation-cap">&nbsp;
                                  <?php echo $row['cid']; ?>
                                </i></h4>
                            </span>


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
</div>



<div  class="owl-item ">

              <div class="col-xl-3 col-sm-6 mb-xl-0">
                <div class="card border shadow-xs mb-4" style="width:300px">
                  <div class="card-body text-start p-3 w-100" style="width:400px;">
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                      <?php
                      $selQry1 = 'select count(noti_status) as notification from tbl_driver where noti_status=0;';
                      $res1 = $conn->query($selQry1);
                      $data1 = $res1->fetch_assoc();
                      $notification_count1 = $data1['notification'];
                      ?>
                      <a href="Driververification.php" style="text-decoration: none;">
                        <span class="fa-stack fa-lg" data-count="<?php echo $notification_count1 ?>"
                          style="left:200px;">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
                        </span>
                      </a>
                    </li>
                    <div
                      class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                      <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                          d="M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                          clip-rule="evenodd" />
                        <path
                          d="M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z" />
                      </svg>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="w-100">
                          <p class="text-sm text-secondary mb-1">Registered Drivers</p>

                          <div class="d-flex align-items-center">

                            <span class="text-sm text-success font-weight-bolder">
                              <?php
                              $sel = "SELECT count(driver_id) as id FROM tbl_driver WHERE d_status = 1";
                              $result = $conn->query($sel);
                              $row = $result->fetch_assoc();

                              ?>
                              <h4 class="mb-2 font-weight-bold"><i class="fa-solid fa-user">&nbsp;
                                  <?php echo $row['id']; ?>
                                </i></h4>
                            </span>


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              

</div>
<div  class="owl-item">
              <div class="col-xl-3 col-sm-6 mb-xl-0">
                <div class="card border shadow-xs mb-4" style="height:187px;width:300px">
                  <div class="card-body text-start p-3 w-100">
                    <div
                      class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                      <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                          d="M3 6a3 3 0 013-3h12a3 3 0 013 3v12a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm4.5 7.5a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0v-2.25a.75.75 0 01.75-.75zm3.75-1.5a.75.75 0 00-1.5 0v4.5a.75.75 0 001.5 0V12zm2.25-3a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0V9.75A.75.75 0 0113.5 9zm3.75-1.5a.75.75 0 00-1.5 0v9a.75.75 0 001.5 0v-9z"
                          clip-rule="evenodd" />
                      </svg>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="w-100">
                          <p class="text-sm text-secondary mb-1">Added Buses</p>

                          <div class="d-flex align-items-center">

                            <span class="text-sm text-success font-weight-bolder">
                              <?php
                              $sel = "SELECT count(bus_id) as bid FROM tbl_bus";
                              $result = $conn->query($sel);
                              $row = $result->fetch_assoc();

                              ?>
                              <h4 class="mb-2 font-weight-bold"><i class="fa-solid fa-van-shuttle">&nbsp;
                                  <?php echo $row['bid']; ?>
                                </i></h4>

                            </span>



                          </div>
                        </div>
                      </div>
                      <a href="Bus.php"><button class="btn btn-light" style="top:190px;">ADD NEW BUS</a>
                    </div>
                  </div>
                </div>
              </div>
</div>
<div  class="owl-item">
              <div class="col-xl-3 col-sm-6 mb-xl-0">
                <div class="card border shadow-xs mb-4" style="height:187px;width:300px">
                  <div class="card-body text-start p-3 w-100">
                    <div style="display:flex; align-items:center">
                      <div
                        class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                          <path
                            d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                        </svg>
                      </div>
                      <div style="margin-left: 20px;">
                        <h4>
                          <?php echo date("F/Y") ?>
                        </h4>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12">

                        <div class="w-100">
                          <p class="text-sm text-secondary mb-1">Current Month Payment NUmber</p>


                          <div class="d-flex align-items-center">

                            <span class="text-sm text-success font-weight-bolder">
                              <?php
                              $currentMonth = date("m"); // Get the current month in numeric format (e.g., "10" for October)
                              $sel = "SELECT COUNT(DISTINCT stureg_id) as p FROM tbl_payment WHERE pay_month=date('m');";
                              $res = $conn->query($sel);
                              $row = $res->fetch_assoc();
                              ?>

                              <h4 class="mb-2 font-weight-bold"><i class="fa-solid fa-wallet"></i>
                                <?php echo $row['p']; ?><br><br>
                            </span>


                          </div>
                        </div>
                      </div>
                      <a href="Studentpayment.php"><button class="btn btn-light">View Paid Students</a>
                    </div>
                  </div>
                </div>
              </div></div>







              <div  class="owl-item">
              <div class="col-xl-3 col-sm-6 mb-xl-0">
                <div class="card border shadow-xs mb-4"style="width:300px">
                  <div class="card-body text-start p-3 w-100">
                    <div
                      class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                      <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                          d="M3 6a3 3 0 013-3h12a3 3 0 013 3v12a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm4.5 7.5a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0v-2.25a.75.75 0 01.75-.75zm3.75-1.5a.75.75 0 00-1.5 0v4.5a.75.75 0 001.5 0V12zm2.25-3a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0V9.75A.75.75 0 0113.5 9zm3.75-1.5a.75.75 0 00-1.5 0v9a.75.75 0 001.5 0v-9z"
                          clip-rule="evenodd" />
                      </svg>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="w-100">
                          <p class="text-sm text-secondary mb-1">Complaints</p>

                          <div class="d-flex align-items-center">

                            <span class="text-sm text-success font-weight-bolder">
                              <?php
                              $sel = "SELECT count(cmp_id) as cid FROM tbl_complaints";
                              $result = $conn->query($sel);
                              $row = $result->fetch_assoc();

                              ?>
                              <h4 class="mb-2 font-weight-bold"><i class="fa-solid fa-van-shuttle">&nbsp;
                                  <?php echo $row['cid']; ?>
                                </i></h4>

                            </span>


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
</div>
<script>
  var owl = $('.owl-carousel');
owl.owlCarousel({
    items:3, 
  // items change number for slider display on desktop
  
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true
});
  </script>




            <!--  End-->




            <div class="row" id="mydiv">

              <div class="col-lg-6" id="n1">

                <div class="card shadow-xs border">
                  <div class="card-header pb-0">
                    <div class="d-sm-flex align-items-center mb-3">
                      <div>
                        <h6 class="font-weight-semibold text-lg mb-0" style="font-weight: bold;">Student Route Report
                        </h6><br>

                        <!--  <p class="text-sm mb-sm-0 mb-2">Here you have details about the balance.</p> -->
                      </div>
                      <div class="ms-auto d-flex">

                        <button class="btn btn-sm btn-white mb-0 me-2" id="printButton">
                          Print report
                        </button><br>
                      </div>
                    </div>
                    <div class="d-sm-flex align-items-center">


                      </span>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    <div class="chart mt-n6">

                      <!-- <canvas id="chart-line" class="chart-canvas" height="300"></canvas>-->
                      <canvas id="chart-line" style="width:100%;max-width:350px"></canvas>


                    </div>
                  </div>
                </div>


              </div>
              <div class="col-lg-6" id="n1">

                <div class="card shadow-xs border">
                  <div class="card-header pb-0">

                    <div class="d-sm-flex align-items-center mb-3">

                      <div>
                        <button class="btn btn-sm btn-white mb-0 me-2" id="printButton" align="right"
                          onclick="printChart()">
                          Print report
                        </button><br>
                        <center>
                          <h6 class="font-weight-semibold text-lg mb-0" style="font-weight: bold;">Monthly Payment
                            Report</h6>
                        </center><br>

                        <canvas id="myChart" style="width:100%;max-width:600px;height:350px"></canvas>
                        <?php
                        $xValues = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                        $yValues = [];

                        foreach ($xValues as $month) {
                          $sel = "SELECT COUNT(*) AS student_count FROM tbl_payment WHERE pay_month = '$month'";
                          $result = $conn->query($sel);
                          $data = $result->fetch_assoc();
                          $yValues[] = $data["student_count"];
                        }
                        ?>
                        <script>
                          var xValues = <?php echo json_encode($xValues); ?>;
                          var yValues = <?php echo json_encode($yValues); ?>;

                          function generateRandomColor() {
                            var letters = "0123456789ABCDEF";
                            var color = "#";
                            for (var i = 0; i < 6; i++) {
                              color += letters[Math.floor(Math.random() * 16)];
                            }
                            return color;
                          }

                          var barColors = [];
                          for (var i = 0; i < xValues.length; i++) {
                            barColors.push(generateRandomColor());
                          }

                          new Chart("myChart", {
                            type: "pie",
                            data: {
                              labels: xValues,
                              datasets: [{
                                backgroundColor: barColors,
                                data: yValues,
                                barThickness: 10,
                                borderColor: "white",
                                borderRadius: 10,
                              }]
                            },
                            options: {
                              title: {
                                display: false, // Hide the default title
                              },
                              scales: {
                                x: [{
                                  grid: {
                                    display: false, // Hide the grid lines on the x-axis
                                  },
                                  ticks: {
                                    beginAtZero: true,
                                    autoSkip: true,
                                    maxTicksLimit: 12, // Adjust the number of visible x-values
                                  },
                                }],
                                y: {
                                  beginAtZero: true,
                                  grid: {
                                    color: "lightgray", // Change the color of the y-axis grid lines
                                  },
                                }
                              },
                            }
                          });
                        </script>

                        <!--  <p class="text-sm mb-sm-0 mb-2">Here you have details about the balance.</p> -->
                      </div>
                    </div>
                  </div>
                </div>





              </div>
  </main>

  <?php
  $s = "select * from tbl_route";
  $r1 = $conn->query($s);

  $xValues = array();
  $yValues = array();

  while ($row1 = $r1->fetch_assoc()) {
    $routeid = $row1['route_id'];
    $xValues[] = $row1['source_name'] . "-" . $row1['desti_name'];

    $sel = "SELECT COUNT(*) AS student_count FROM tbl_stdstp s 
                INNER JOIN tbl_stop st ON s.stop_id = st.stop_id
                WHERE st.route_id = '$routeid'";

    $result = $conn->query($sel);
    $data = $result->fetch_assoc();
    $yValues[] = $data["student_count"];
  }

  ?>

  <!--   Core JS Files   -->
  <script src="../Assets/Templates/Admin/assets//js/core/popper.min.js"></script>
  <script src="../Assets/Templates/Admin/assets//js/core/bootstrap.min.js"></script>
  <script src="../Assets/Templates/Admin/assets//js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../Assets/Templates/Admin/assets//js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../Assets/Templates/Admin/assets//js/plugins/chartjs.min.js"></script>
  <script src="../Assets/Templates/Admin/assets//js/plugins/swiper-bundle.min.js" type="text/javascript"></script>
  <script>
    if (document.getElementsByClassName('mySwiper')) {
      var swiper = new Swiper(".mySwiper", {
        effect: "cards",
        grabCursor: true,
        initialSlide: 1,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    };

    var ctx2 = document.getElementById("chart-line").getContext("2d");


    function generateRandomColor() {

      var r = Math.floor(Math.random() * 128); // Red component
      var g = Math.floor(Math.random() * 128); // Green component
      var b = Math.floor(Math.random() * 128); // Blue component

      // Convert the RGB components to a CSS color string
      var color = 'rgb(' + r + ',' + g + ',' + b + ')';
      return color;
    }
    var xValues = <?php echo json_encode($xValues); ?>;
    var yValues = <?php echo json_encode($yValues); ?>;
    var barColors = [];

    // Generate random colors and add them to the barColors array
    for (var i = 0; i < xValues.length; i++) {
      barColors.push(generateRandomColor());
    }

    const chart = new Chart(ctx2, {
      plugins: [{
        beforeInit(chart) {
          const originalFit = chart.legend.fit;
          chart.legend.fit = function fit() {
            originalFit.bind(chart.legend)();
            this.height += 40;
          }
        },
      }],



      type: "doughnut",
      data: {



        labels: xValues,

        datasets: [{
          label: "Volume",
          tension: 0,
          borderWidth: 2,
          pointRadius: 3,
          backgroundColor: barColors,
          borderColor: barColors,
          pointBorderColor: barColors,
          pointBackgroundColor: barColors,
          fill: true,
          data: yValues,
          maxBarThickness: 6

        },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
            position: 'top',
            align: 'end',
            labels: {
              boxWidth: 6,
              boxHeight: 6,
              padding: 20,
              pointStyle: 'circle',
              borderRadius: 50,
              usePointStyle: true,
              font: {
                weight: 400,
              },
            },
          },
          tooltip: {
            backgroundColor: '#fff',
            titleColor: barColors,
            bodyColor: barColors,
            borderColor: barColors,
            borderWidth: 1,
            pointRadius: 2,
            usePointStyle: true,
            boxWidth: 8,
          }
        },
        //interaction: {
        //intersect: false,
        // mode: 'index',
        // },

      },
    });




  </script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../Assets/Templates/Admin/assets//js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
</body>
<script>


  function printChart() {


    window.print();
  }



</script>


</body>

</htm