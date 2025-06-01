<?php
$backgroundImage = "broumana-villa-night.jpg";
?>

<?php
$outlets = [
    [
        'id' => 1,
        'name' => 'Appetito Trattoria',
        'description' => 'A cozy Italian trattoria offering authentic dishes in a homey, rustic setting.',
        'image' => './assets/images/outlets/appetito/appetito-entrance-2.jpg',
        'menu' => 'https://apetitotrattoria.limetray.com/',
        'type' => 'Restaurant',
        'cluster' => 'Broumana Villa'
    ],
    [
        'id' => 2,
        'name' => 'Batchig',
        'description' => 'Modern Armenian-Lebanese fusion cuisine served in a vibrant, garden-like atmosphere.',
        'image' => './assets/images/outlets/batchig/batchig-entrance-2.jpg',
        'menu' => 'https://www.batchig.com/',
        'type' => 'Restaurant',
        'cluster' => 'Broumana Villa'
    ],
    [
        'id' => 3,
        'name' => 'Casper & Gambini’s',
        'description' => 'An all-day restaurant-café offering a diverse international menu in a contemporary setting.',
        'image' => './assets/images/outlets/cag/cag-entrance-2.jpg',
        'menu' => 'https://www.casperandgambinis.com/',
        'type' => 'Restaurant',
        'cluster' => 'Broumana Villa'
    ],
    [
        'id' => 4,
        'name' => 'DUO Ristorante',
        'description' => 'A chic venue blending Italian and international flavors in a stylish ambiance.',
        'image' => './assets/images/outlets/duo/duo-entrance-2.jpg',
        'menu' => '#',
        'type' => 'Restaurant',
        'cluster' => 'Broumana Villa'
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
        'type' => 'Restaurant',
        'cluster' => 'Broumana Villa'
    ],
    [
        'id' => 7,
        'name' => 'MonMakiAMoi',
        'description' => 'Lebanon’s first eco-friendly sushi boutique, delivering unique Japanese flavors.',
        'image' => './assets/images/outlets/monmakiamoi/monmakiamoi-entrance-2.jpg',
        'menu' => 'https://monmakiamoi.com/',
        'type' => 'Restaurant',
        'cluster' => 'Broumana Villa'
    ],
    [
        'id' => 8,
        'name' => 'TRUMPET',
        'description' => 'A vintage-themed bistro bar combining jazz ambiance with a diverse menu.',
        'image' => './assets/images/outlets/trumpet/trumpet-entrance-2.jpg',
        'menu' => 'https://www.sobeirut.com/trumpet',
        'type' => 'Restaurant',
        'cluster' => 'Broumana Villa'
    ],
    [
        'id' => 9,
        'name' => 'The Wooden Cellar',
        'description' => 'A bakery and café offering freshly baked goods and a warm, rustic atmosphere.',
        'image' => './assets/images/outlets/wooden/wooden-entrance.png',
        'menu' => '#',
        'type' => 'Restaurant',
        'cluster' => 'Broumana Villa'
    ]
];
?>

<?php include_once "./includes/header.php"; ?>

<?php include_once "./partials/image-banner.php" ?>
<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>
<div class="container fade-in-target mt-5">
    <p class="custom-heading">All Outlets</p>
    <div class="tabs-container">
        <ul class="nav custom-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
                <span class="tab-separator"></span>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Broumana Villa</button>
                <span class="tab-separator"></span>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Broumana Yard</button>
                <span class="tab-separator"></span>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Broumana Square</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="cluster-outlets-container row" id="outlets-container">
                    <?php
                    foreach ($outlets as $outlet) {
                    ?>

                        <div class="col-md-3 clickable-div-outlet">
                            <div class="outlet-img-container">
                                <img src="<?= htmlspecialchars($outlet['image']) ?>" alt="<?= htmlspecialchars($outlet['name']) ?>" class="outlet-img">
                            </div>
                            <div class="animated-divider"></div>
                            <div class="category-outlet-label"><?= htmlspecialchars($outlet['type']) ?></div>
                            <h3 class="outlet-heading"><?= htmlspecialchars($outlet['name']) ?></h3>
                            <p class="outlet-text"><?= htmlspecialchars($outlet['description']) ?></p>
                            <div class="outlets-btn-container">
                                <a href="<?php echo SITE_URL; ?>/outlet.php?id=<?= htmlspecialchars($outlet['id']) ?>" target="_blank" class="custom-button-2 explore-btn">About us</a>
                                <a href="" target="_blank" class="custom-button-2 menu-btn">Menu</a>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                <div class="cluster-outlets-container row" id="outlets-container">

                    <?php
                    foreach ($outlets as $outlet) {
                        if ($outlet["cluster"] == "Broumana Villa") {
                    ?>

                            <div class="col-md-3 clickable-div-outlet">
                                <div class="outlet-img-container">
                                    <img src="<?= htmlspecialchars($outlet['image']) ?>" alt="<?= htmlspecialchars($outlet['name']) ?>" class="outlet-img">
                                </div>
                                <div class="animated-divider"></div>
                                <div class="category-outlet-label"><?= htmlspecialchars($outlet['type']) ?></div>
                                <h3 class="outlet-heading"><?= htmlspecialchars($outlet['name']) ?></h3>
                                <p class="outlet-text"><?= htmlspecialchars($outlet['description']) ?></p>
                                <div class="outlets-btn-container">
                                    <a href="<?php echo SITE_URL; ?>/outlet.php?id=<?= htmlspecialchars($outlet['id']) ?>" target="_blank" class="custom-button-2 explore-btn">About us</a>
                                    <a href="" target="_blank" class="custom-button-2 menu-btn">Menu</a>
                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <p>No Outlets.</p>
            </div>
            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <p>No Outlets.</p>
            </div>
        </div>
    </div>
</div>
<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>
<?php include_once "./includes/footer.php"; ?>