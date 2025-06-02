<?php


function getClusterById($id)
{
    global $conn;

    $sql = "SELECT * FROM clusters WHERE id = ?";
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

function getOutletsByClusterId($id)
{
    global $conn;

    $sql = "SELECT * FROM outlets WHERE cluster_id = ? ORDER BY display_order";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $outlets = [];

    while ($row = $result->fetch_assoc()) {
        $outlets[] = $row;
    }

    return $outlets;
}

$clusterId = 1;
$type = 1;

$cluster = getClusterById($clusterId);

$outlets = getOutletsByClusterId($clusterId);

if (!$cluster) {
    echo "<p>Sorry, cluster not found!</p>";
    exit;
}
?>


<?php
// $bannerLogo = $cluster["logo"];
$bannerLogo = $cluster["secondary_logo"];

$name_second = explode(" ", $cluster["name"])[1];

$contactBtnText = "Contact Us";
$scrollText = "Scroll";

$backgroundImage = $cluster["primary_image"];

$aboutText = $cluster["about"];
$aboutImage = $cluster["about_image"];

$gallery = json_decode($cluster["gallery"], true);
?>

<?php include_once "./includes/header.php"; ?>

<?php include_once "./partials/banner-cluster.php" ?>
<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>
<?php include_once "./partials/outlets-per-cluster.php" ?>
<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>

<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>
<?php include_once "./partials/about-cluster.php" ?>
<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>

<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>
<?php include_once "./partials/gallery-section.php" ?>
<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>

<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>
<?php include_once "./includes/footer.php"; ?>