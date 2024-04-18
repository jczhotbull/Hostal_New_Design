<?php ?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-layout-mode="detached" data-menu-color="light" data-topbar-color="light" data-layout-position="fixed" data-sidenav-size="sm-hover">

    <head>

        <meta charset="utf-8" />
        <meta content="A fully featured hostel admin system." name="description" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta content="WebApp" name="pvi" />

        <title>Admin</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- Theme Config Js -->
        <script src="../assets/js/hyper-config.js"></script>

        <!-- App css -->
        <link href="../assets/css/app-modern.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />

        <!-- Toast css -->
        <link href="../assets/toasts.css" rel="stylesheet" type="text/css" />

        <!-- Datatable css -->
        <link href="../assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />

        <!-- Estilos propios css -->
        <link href="../assets/jucazugo.css" rel="stylesheet" type="text/css" />



    </head>


 <?php  include("../toast.php");  ?>


    <body>
        <!-- Begin page -->
        <div class="wrapper">




<?php 

$mi_hostel_select = $_SESSION['hostel_activo'];

include("../b_conectar.php");

$queryFH_activo = "SELECT id_hostel, name_hostel, hostel_was_mod FROM z_hostel WHERE id_hostel = '$mi_hostel_select' limit 1";

$hostel_activo = mysqli_query($enlace, $queryFH_activo) or die(mysqli_error());

$row_hostel_activo = mysqli_fetch_assoc($hostel_activo);

$hostel_was_upd = $row_hostel_activo['hostel_was_mod'];

mysqli_close($enlace);

?>










           
            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar container-fluid">
                    <div class="d-flex align-items-center gap-lg-2 gap-1">

                        <!-- Topbar Brand Logo -->
                        <div class="logo-topbar">


                            <!-- Logo Dark -->
                            <a href="main.php" class="logo-dark">
                                <span class="logo-lg">
                                    <img src="../assets/images/logo-dark.png" class="img-fluid" style="height: 46px;">
                                </span>
                               <!-- <span class="logo-sm">
                                    <img src="../assets/images/logo-dark-sm.png" alt="small logo">
                                </span> -->

                            <span class="text-center">
                                        <b> <i class="text-info ms-2" style="font-size:18px;"><?php echo $row_hostel_activo['name_hostel'];?></i></b>
                            </span>


                            </a>


                           



                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="mdi mdi-menu"></i>
                        </button>

                        <!-- Horizontal Menu Toggle Button -->
                        <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </button>                       

                    </div>






                    <ul class="topbar-menu d-flex align-items-center gap-3">

                        <li class="d-none d-md-inline-block">
                            <a class="nav-link" href="" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line font-22"></i>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="<?php echo $la_pic; ?>" alt="user-image" class="img-fluid rounded" width="40">
                                </span>
                                <span class="d-lg-flex flex-column gap-1 d-none">
                                    <h5 class="my-0"><?php echo $nnn['p_name_per']; ?> <?php echo $nnn['p_surname_per']; ?></h5>
                                    <h6 class="my-0 fw-normal"><?php echo $abrev; ?></h6>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="my_user.php" class="dropdown-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>My Account</span>
                                </a>

                               

                                <!-- item-->
                                <a href="../index.php? Logout=1" class="dropdown-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->







            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">



                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="../assets/images/logo-dark.png" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="../assets/images/logo-dark-sm.png" alt="small logo">
                    </span>
                </a>

                <!-- Sidebar Hover Menu Toggle Button -->
                <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
                    <i class="ri-checkbox-blank-circle-line align-middle"></i>
                </div>

                <!-- Full Sidebar Menu Close Button -->
                <div class="button-close-fullsidebar">
                    <i class="ri-close-fill align-middle"></i>
                </div>

                <!-- Sidebar -left -->
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                   

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title"></li> 

                       
                        <li class="side-nav-item ">
                            <a href="main.php" class="side-nav-link ms-2">
                                <i class="fas fa-home fa-lg"></i>                                
                                <span class="ms-2"> Main </span>
                            </a>
                        </li>



                        <li class="side-nav-item ">
                            <a href="staff.php" class="side-nav-link ms-2">
                                <i class="fa-solid fa-user-group fa-lg"></i>                                
                                <span class="ms-2"> Staff </span>
                            </a>
                        </li>


                        <li class="side-nav-item">
                            <a href="guests.php" class="side-nav-link ms-2">
                        <i class="fa-solid fa-person-walking-luggage fa-lg"></i>                                
                                <span class="ms-2"> Guests </span>
                            </a>
                        </li>


                         <li class="side-nav-item">
                            <a href="reception.php" class="side-nav-link ms-2">
                        <i class="fa-solid fa-cart-flatbed-suitcase fa-lg"></i>                                
                                <span class="ms-2"> Reception </span>
                            </a>
                        </li>



                         <li class="side-nav-item">
                            <a href="services.php" class="side-nav-link ms-2">
                        <i class="fa-solid fa-store fa-lg"></i>                                
                                <span class="ms-2"> Services </span>
                            </a>
                        </li>


                        <li class="side-nav-item">
                            <a href="hostel.php" class="side-nav-link ms-2">
                        <i class="fa-solid fa-hotel fa-lg"></i>                                
                                <span class="ms-2"> Hostel </span>
                            </a>
                        </li>


                        <li class="side-nav-item">
                            <a href="beds.php" class="side-nav-link ms-2">
                        <i class="fa-solid fa-bed fa-lg"></i>                                
                                <span class="ms-2"> Beds </span>
                            </a>
                        </li>
               


                         <li class="side-nav-item">
                            <a href="rooms.php" class="side-nav-link ms-2">
                        <i class="fa-solid fa-door-open fa-lg"></i>                                
                                <span class="ms-2"> Rooms </span>
                            </a>
                        </li>


                        <li class="side-nav-item">
                            <a href="procedures.php" class="side-nav-link ms-2">
                        <i class="fa-solid fa-book-bookmark  fa-lg"></i>                                
                                <span class="ms-2"> Procedures </span>
                            </a>
                        </li>



                         <li class="side-nav-item">
                            <a href="selectables.php" class="side-nav-link ms-2">
                        <i class="far fa-check-circle  fa-lg"></i>                                
                                <span class="ms-2"> Selectables </span>
                            </a>
                        </li>




                        <li class="side-nav-item">
                            <a href="users.php" class="side-nav-link ms-2">
                        <i class="fa-solid fa-users-line  fa-lg"></i>                                
                                <span class="ms-2"> Users </span>
                            </a>
                        </li>


                        <li class="side-nav-item">
                            <a href="setup.php" class="side-nav-link ms-2">
                        <i class="fas fa-cogs  fa-lg"></i>                                
                                <span class="ms-2"> Set-Up </span>
                            </a>
                        </li>



        <!--       <li class="side-nav-title">Custom</li>  para categorizar -->

                   

                       

                       


                        <!-- Help Box -->
                  <!--       <div class="help-box text-white text-center">
                            <a href="javascript: void(0);" class="float-end close-btn text-white">
                                <i class="mdi mdi-close"></i>
                            </a>
                            <img src="../assets/images/svg/help-icon.svg" height="90" alt="Helper Icon Image" />
                            <h5 class="mt-3">Unlimited Access</h5>
                            <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>
                            <a href="javascript: void(0);" class="btn btn-secondary btn-sm">Upgrade</a>
                        </div>
                        
                         end Help Box -->


                    </ul>
                    <!--- End Sidemenu -->

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- ========== Left Sidebar End ========== -->