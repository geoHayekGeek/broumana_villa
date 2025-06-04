<?php
require_once 'config.php';
require_once './backend/db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getAllInfo()
 {
    global $conn;

    $sql = "SELECT * FROM site_info";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return [];
    }
 }

 $site_info = getAllInfo();


$current_page = get_current_page();
$page_title = isset($page_name) ? get_page_title($page_name) : get_page_title();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/animations.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo SITE_URL; ?>/assets/images/logos/broumana-villa-logo-1.png" type="image/x-icon">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT&display=swap" rel="stylesheet">
</head>

<body>
    <div id="preloader">
        <div class="logo-container">
            <img src="<?php echo SITE_URL; ?>/assets/images/logos/broumana-villa-logo-1.png" alt="<?php echo SITE_NAME; ?>" class="preloader-logo">
        </div>
    </div>
    <header class="site-header">
        <!-- Animated navbar -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-scroll">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo SITE_URL; ?>/">
                    <img src="<?php echo SITE_URL; ?>/assets/images/logos/broumana-villa-logo-1.png" alt="<?php echo SITE_NAME; ?>" class="logo">
                </a>

                <button class="navbar-toggler ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon d-flex justify-content-start align-items-center">
                        <i class="fas fa-bars"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php foreach ($menu_items as $name => $url): ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($current_page == basename($url)) || (basename($url) == '/' && $current_page == 'index.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL . $url; ?>"><?php echo $name; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <!-- Social icons -->
                    <ul class="navbar-nav flex-row">
                        <li class="nav-item">
                            <a class="nav-link pe-2" href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" target="_blank" rel="nofollow">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2" href="https://www.facebook.com/mdbootstrap" target="_blank" rel="nofollow">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2" href="https://twitter.com/MDBootstrap" target="_blank" rel="nofollow">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2" href="https://github.com/mdbootstrap/mdb-ui-kit" target="_blank" rel="nofollow">
                                <i class="fab fa-github"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Animated navbar -->
    </header>

    <main>