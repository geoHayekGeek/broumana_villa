<?php include_once "./includes/header.php"; ?>

<?php
include_once "./backend/db.php";

function getClusters()
{
    global $conn;

    $sql = "SELECT * FROM clusters";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC); // <--- fetch all rows
    } else {
        return [];
    }
}

function getOutletsOrdered()
{
    global $conn;

    $sql = "SELECT * FROM outlets ORDER BY display_order";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) { 
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function getHomeInfo()
{
    global $conn;

    $sql = "SELECT about_text, about_image, testimonials FROM site_info WHERE id=1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}


$clusters = getClusters();
$outlets = getOutletsOrdered();

// $site_info = getHomeInfo();

$aboutText = $site_info["about_text"];
$aboutImage = $site_info["about_image"];
$testimonials = json_decode($site_info["testimonials"], true);

$villaName = "";
$villaDescription = "";
$villaTitle = "";

$squareName = "";
$squareDescription = "";
$squareTitle = "";

$yardName = "";
$yardDescription = "";
$yardTitle = "";

foreach ($clusters as $cluster) {
    if ($cluster["id"] == 1) {
        $villaName = $cluster["name"];
        $villaDescription = $cluster["description"];
        $villaTitle = $cluster["title"];
        $villaSecondaryImage = $cluster["secondary_image"];
    } else if ($cluster["id"] == 2) {
        $yardName = $cluster["name"];
        $yardDescription = $cluster["description"];
        $yardTitle = $cluster["title"];
        $yardSecondaryImage = $cluster["secondary_image"];
    } else if ($cluster["id"] == 3) {
        $squareName = $cluster["name"];
        $squareDescription = $cluster["description"];
        $squareTitle = $cluster["title"];
        $squareSecondaryImage = $cluster["secondary_image"];
    }
}
?>

<!-- Home page banner -->
<?php include_once "./partials/video-banner.php"; ?>
<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<!-- Clusters Section -->
<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>
<?php include_once "./partials/clusters-home.php"; ?>
<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<!-- Outlets Section -->
<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>
<?php include_once "./partials/outlets-home.php"; ?>
<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>
<?php include_once "./partials/about-home.php"; ?>
<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>
<?php include_once "./partials/parallax-section.php"; ?>
<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>
<?php include_once "./partials/testimonials.php"; ?>
<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>
<?php include_once "./includes/footer.php"; ?>