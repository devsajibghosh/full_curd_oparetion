<?php
// session start
session_start();

if (!isset($_SESSION['admin_id'])) {
  header('location: ./error.php');
}

// server link create

$server = $_SERVER['PHP_SELF'];
$explode = explode('/', $server);
$link = end($explode);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Responsive Admin Dashboard Template">
  <meta name="keywords" content="admin,dashboard">
  <meta name="author" content="stacks">
  <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Title -->
  <title>Neptune - Responsive Admin Dashboard Template</title>

  <!-- Styles -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
  <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
  <link href="../assets/plugins/pace/pace.css" rel="stylesheet">


  <!-- Theme Styles -->
  <link href="../assets/css/main.min.css" rel="stylesheet">
  <link href="../assets/css/custom.css" rel="stylesheet">

  <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/neptune.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/neptune.png" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <!-- link of sweet alret cdn -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- fontawsome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="app align-content-stretch d-flex flex-wrap">
    <div class="app-sidebar">
      <img style="width:50px; height: 50px;border: 1px solid red; margin-top:4px;margin-left: 40px; border-radius:50%;" src="../images/profile/<?= $_SESSION['admin_image'] ?>">
      <div class="logo">
        <!-- <a href="index.html" class="logo-icon"><span class="logo-text">Neptune</span></a>   -->
        <div class="sidebar-user-switcher user-activity-online">
          <b href="#">
            <!-- <span class="activity-indicator"></span> -->
            <strong class="text-primary ">Name: <?= $_SESSION['admin_name']; ?></strong>
            <br>
            <span class="text-warning fs-7">Email: <?= $_SESSION['admin_email']; ?></span>
            <!-- <span class="user-info-text">Chloe<br><span class="user-state-info">On a call</span></span> -->
          </b>
        </div>
      </div>
      <div class="app-menu">
        <ul class="accordion-menu">
          <li class="<?= ($link == 'home.php') ? 'active-page' : ''; ?>">
            <a href="home.php" class="active"><i class="material-icons-two-tone">home</i>Dashboard</a>
          </li>
          </li>

          <li class="<?= ($link == 'index.php') ? 'active-page' : ''; ?>">
            <a target="_blank" href="../index.php" class="active"><i class="material-icons-two-tone">language</i>Website</a>
          </li>

          <li class="<?= ($link == 'profile.php') ? 'active-page' : ''; ?>">
            <a href="profile.php" class="active"><i class="material-icons-two-tone">face</i>Profile</a>
          </li>

          <!-- skills link area -->

          <li class="<?= ($link == 'skill.php') ? 'active-page' : ''; ?>">
            <a href="skill.php"><i class="material-icons-two-tone">apps</i>Skills<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
            <ul class="sub-menu">
              <li class="<?= ($link == 'skill.php') ? 'active-page' : ''; ?>">
                <a href="skill.php">skill List</a>
              </li>

              <li class="<?= ($link == 'skill_insert.php') ? 'active-page' : ''; ?>">
                <a href="skill_insert.php">skill Insert</a>
              </li>
            </ul>
          </li>

          <!-- skills link area end -->


          <!-- service link area -->

          <li class="<?= ($link == 'service.php') ? 'active-page' : ''; ?>">
            <a href="service.php"><i class="material-icons-two-tone">manage_accounts</i>Services<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
            <ul class="sub-menu">
              <li class="<?= ($link == 'service.php') ? 'active-page' : ''; ?>">
                <a href="service.php">Service List</a>
              </li>

              <li class="<?= ($link == 'service_insert.php') ? 'active-page' : ''; ?>">
                <a href="service_insert.php">Service Insert</a>
              </li>
            </ul>
          </li>

          <!-- service link area end -->

          <!-- portfolio link area -->

          <li class="<?= ($link == 'portfolio.php') ? 'active-page' : ''; ?>">
            <a href="portfolio.php"><i class="material-icons-two-tone">person_add</i>Portfolio<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
            <ul class="sub-menu">
              <li class="<?= ($link == 'portfolio.php') ? 'active-page' : ''; ?>">
                <a href="portfolio.php">portfolio List</a>
              </li>

              <li class="<?= ($link == 'portfolio_insert.php') ? 'active-page' : ''; ?>">
                <a href="portfolio_insert.php">portfolio Insert</a>
              </li>
            </ul>
          </li>

          <!-- portfolio link area end -->













          <!-- testimonial link area -->

          <li class="<?= ($link == 'testimonial.php') ? 'active-page' : ''; ?>">
            <a href="testimonial.php"><i class="material-icons-two-tone">hail</i>Testimonial<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
            <ul class="sub-menu">
              <li class="<?= ($link == 'testimonial.php') ? 'active-page' : ''; ?>">
                <a href="testimonial.php">Testimonial List</a>
              </li>

              <li class="<?= ($link == 'testimonial_insert.php') ? 'active-page' : ''; ?>">
                <a href="testimonial_insert.php">Testimonial Insert</a>
              </li>
            </ul>
          </li>

          <!-- testimonial link area end -->












          <!-- facts link -->
          <li class="<?= ($link == 'fact.php') ? 'active-page' : ''; ?>">
            <a href="fact.php"><i class="material-icons-two-tone">select_all</i>Facts<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
            <ul class="sub-menu">
              <li class="<?= ($link == 'fact.php') ? 'active-page' : ''; ?>">
                <a href="fact.php">Fact List</a>
              </li>
              <li class="<?= ($link == 'fact_insert.php') ? 'active-page' : ''; ?>">
                <a href="fact_insert.php">Fact Insert</a>
              </li>
            </ul>
          </li>

          <!-- facts end -->

          <!-- brand link -->
          <li class="<?= ($link == 'brand.php') ? 'active-page' : ''; ?>">
            <a href="brand.php"><i class="material-icons-two-tone">branding_watermark</i>Brands<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
            <ul class="sub-menu">
              <li class="<?= ($link == 'brand.php') ? 'active-page' : ''; ?>">
                <a href="brand.php">Brand List</a>
              </li>
              <li class="<?= ($link == 'brand_insert.php') ? 'active-page' : ''; ?>">
                <a href="brand_insert.php">Brand Insert</a>
              </li>
            </ul>
          </li>
          <!-- brand end -->


          <!-- mail box -->
          <li>
            <a href="mailbox.html"><i class="material-icons-two-tone">inbox</i>Mailbox<span class="badge rounded-pill badge-danger float-end">87</span></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="app-container">
      <div class="search">
        <form>
          <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
        </form>
        <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
      </div>
      <div class="app-header">
        <nav class="navbar navbar-light navbar-expand-lg">
          <div class="container-fluid">
            <div class="navbar-nav" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                </li>
                <li class="nav-item dropdown hidden-on-mobile">
                  <a class="nav-link dropdown-toggle" href="#" id="addDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="material-icons">add</i>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                    <li><a class="dropdown-item" href="#">New Workspace</a></li>
                    <li><a class="dropdown-item" href="#">New Board</a></li>
                    <li><a class="dropdown-item" href="#">Create Project</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown hidden-on-mobile">
                  <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="material-icons-outlined">explore</i>
                  </a>
                  <ul class="dropdown-menu dropdown-lg large-items-menu" aria-labelledby="exploreDropdownLink">
                    <li>
                      <h6 class="dropdown-header">Repositories</h6>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <h5 class="dropdown-item-title">
                          Neptune iOS
                          <span class="badge badge-warning">1.0.2</span>
                          <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                        </h5>
                        <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <h5 class="dropdown-item-title">
                          Neptune Android
                          <span class="badge badge-info">dev</span>
                          <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                        </h5>
                        <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                      </a>
                    </li>
                    <li class="dropdown-btn-item d-grid">
                      <button class="btn btn-primary">Create new repository</button>
                    </li>
                  </ul>
                </li>
              </ul>

            </div>
            <div class="d-flex">
              <ul class="navbar-nav">
                <a href="logout.php"><button class="btn btn-primary">Logout</button></a>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <div class="app-content">
        <div class="content-wrapper">
          <div class="container">


            <!-- header part end   -->