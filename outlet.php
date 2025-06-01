<?php
// outlet.php

require_once './backend/db.php';

function getOutletById($id)
{
    global $conn;

    $sql = "SELECT * FROM outlets WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

$outletId = isset($_GET['id']) ? intval($_GET['id']) : 0;

$outlet = getOutletById($outletId);

if (!$outlet) {
    echo "<p>Sorry, outlet not found!</p>";
    exit;
}
?>

<?php
$bannerTitle = $outlet["page_title"];

$has_menu = $outlet["has_menu"];

$btnText = "Go To Menu";
$btnLink = $outlet["menu"];
$scrollText = "Scroll";

$about_text = $outlet["about_text"];
$about_image = $outlet["about_image"];

$backgroundImage = $outlet["primary_image"];
$bannerLogo = $outlet["logo"];

$gallery = json_decode($outlet["gallery"], true);

$type = 2;
?>

<?php include_once "./includes/header.php" ?>

<?php include_once "./partials/banner-outlet.php" ?>
<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>
<?php include_once "./partials/about-outlet.php" ?>
<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>

<!-- <div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>
<?php #include_once "./partials/outlet-favorite.php" ?>
<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div> -->

<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>
<?php include_once "./partials/gallery-section.php" ?>
<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>

<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>
<?php include_once "./includes/footer.php"; ?>