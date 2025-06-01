<?php
require_once './backend/db.php';

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

$clusterId = 3;
$type = 1;

$cluster = getClusterById($clusterId);

if (!$cluster) {
    echo "<p>Sorry, cluster not found!</p>";
    exit;
}
?>


<?php
$bannerTitle = "Broumana";
$bannerSubtitle = "Square";
// $bannerLogo = $cluster["logo"];
$bannerLogo = $cluster["secondary_logo"];
$contactBtnText = "Contact Us";
$scrollText = "Scroll";

$backgroundImage = $cluster["primary_image"];

$aboutText = $cluster["about"];
$aboutImage = $cluster["about_image"];

$gallery = json_decode($cluster["gallery"], true);
?>

<?php
$restaurants = [
    [
        'id' => 1,
        'name' => 'Appetito Trattoria',
        'description' => 'A cozy Italian trattoria offering authentic dishes in a homey, rustic setting.',
        'image' => './assets/images/outlets/appetito/appetito-entrance-2.jpg',
        'menu' => 'https://apetitotrattoria.limetray.com/',
        'type' => 'Restaurant'
    ],
    [
        'id' => 2,
        'name' => 'Batchig',
        'description' => 'Modern Armenian-Lebanese fusion cuisine served in a vibrant, garden-like atmosphere.',
        'image' => './assets/images/outlets/batchig/batchig-entrance-2.jpg',
        'menu' => 'https://www.batchig.com/',
        'type' => 'Restaurant'
    ],
    [
        'id' => 3,
        'name' => 'Casper & Gambini’s',
        'description' => 'An all-day restaurant-café offering a diverse international menu in a contemporary setting.',
        'image' => './assets/images/outlets/cag/cag-entrance-2.jpg',
        'menu' => 'https://www.casperandgambinis.com/',
        'type' => 'Restaurant'
    ],
    [
        'id' => 4,
        'name' => 'DUO Ristorante',
        'description' => 'A chic venue blending Italian and international flavors in a stylish ambiance.',
        'image' => './assets/images/outlets/duo/duo-entrance-2.jpg',
        'menu' => '#',
        'type' => 'Restaurant'
    ],
    [
        'id' => 5,
        'name' => 'ESCOBAR',
        'description' => 'A Tex-Mex restaurant and cocktail bar embracing a vibrant Latin vibe.',
        'image' => './assets/images/outlets/escobar/escobar-entrance-2.jpg',
        'menu' => 'https://www.escobar-lb.com/',
        'type' => 'Restaurant'
    ],
    [
        'id' => 6,
        'name' => 'Mediterraneo',
        'description' => 'Offering Mediterranean cuisine with a focus on fresh, local ingredients.',
        'image' => './assets/images/outlets/mediterraneo/mediterraneo-entrance-2.jpg',
        'menu' => '#',
        'type' => 'Restaurant'
    ],
    [
        'id' => 7,
        'name' => 'MonMakiAMoi',
        'description' => 'Lebanon’s first eco-friendly sushi boutique, delivering unique Japanese flavors.',
        'image' => './assets/images/outlets/monmakiamoi/monmakiamoi-entrance-2.jpg',
        'menu' => 'https://monmakiamoi.com/',
        'type' => 'Restaurant',
    ],
    [
        'id' => 8,
        'name' => 'TRUMPET',
        'description' => 'A vintage-themed bistro bar combining jazz ambiance with a diverse menu.',
        'image' => './assets/images/outlets/trumpet/trumpet-entrance-2.jpg',
        'menu' => 'https://www.sobeirut.com/trumpet',
        'type' => 'Restaurant'
    ],
    [
        'id' => 9,
        'name' => 'The Wooden Cellar',
        'description' => 'A bakery and café offering freshly baked goods and a warm, rustic atmosphere.',
        'image' => './assets/images/outlets/wooden/wooden-entrance.png',
        'menu' => '#',
        'type' => 'Restaurant'
    ]
];
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