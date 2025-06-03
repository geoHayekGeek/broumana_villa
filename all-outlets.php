<?php include_once "./includes/header.php"; ?>

<?php
$backgroundImage = "broumana-villa-night.jpg";
?>

<?php

function getAllOutlets()
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


$outlets = getAllOutlets();

$outlets_villa = [];
$outlets_yard = [];
$outlets_square = [];

foreach ($outlets as $outlet) {
    switch ($outlet["cluster_id"]) {
        case 1:
            $outlets_villa[] = $outlet;
            break;
        case 2:
            $outlets_yard[] = $outlet;
            break;
        case 3:
            $outlets_square[] = $outlet;
            break;
    }
}

?>

<?php include_once "./partials/image-banner.php" ?>
<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>
<div class="container fade-in-target mt-5">
    <p class="custom-heading">All Outlets</p>
    <div class="tabs-container">
        <ul class="nav custom-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Broumana Villa</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="yard-tab" data-bs-toggle="tab" data-bs-target="#yard" type="button" role="tab" aria-controls="yard" aria-selected="false">Broumana Yard</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="square-tab" data-bs-toggle="tab" data-bs-target="#square" type="button" role="tab" aria-controls="square" aria-selected="false">Broumana Square</button>
            </li>
        </ul>

        <div class="tab-content tab-content-all-outlets" id="myTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="cluster-outlets-container row" id="outlets-container">
                    <?php foreach ($outlets as $outlet) { ?>

                        <div class="col-md-4 col-lg-3 clickable-div-outlet">
                            <div class="outlet-img-container">
                                <img src="<?php echo SITE_URL; ?>/assets/images/outlets/<?= htmlspecialchars($outlet['image']) ?>" alt="<?= htmlspecialchars($outlet['name']) ?>" class="outlet-img">
                            </div>
                            <div class="animated-divider"></div>
                            <div class="category-outlet-label"><?= htmlspecialchars($outlet['type']) ?></div>
                            <h3 class="outlet-heading"><?= htmlspecialchars($outlet['name']) ?></h3>
                            <p class="outlet-text"><?= htmlspecialchars($outlet['short_description']) ?></p>
                            <div class="outlets-btn-container mt-2">
                                <a href="<?php echo SITE_URL; ?>/outlet.php?id=<?= htmlspecialchars($outlet['id']) ?>" target="_blank" class="custom-button-2 explore-btn">About us</a>
                                <a href="<?php echo SITE_URL; ?>/gallery.php?id=<?= htmlspecialchars($outlet['id']) ?>&type=2" target="_blank" class="custom-button-2 menu-btn">Gallery</a>
                                <?php
                                if ($outlet["has_menu"] == 1) {
                                ?>

                                    <a href="<?= htmlspecialchars($outlet['menu']) ?>" target="_blank" class="custom-button-2 menu-btn">Menu</a>

                                <?php

                                }

                                ?>

                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
            <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                <div class="cluster-outlets-container row" id="outlets-container">

                    <?php foreach ($outlets_villa as $outlet) { ?>

                        <div class="col-md-4 col-lg-3 clickable-div-outlet">
                            <div class="outlet-img-container">
                                <img src="<?php echo SITE_URL; ?>/assets/images/outlets/<?= htmlspecialchars($outlet['image']) ?>" alt="<?= htmlspecialchars($outlet['name']) ?>" class="outlet-img">
                            </div>
                            <div class="animated-divider"></div>
                            <div class="category-outlet-label"><?= htmlspecialchars($outlet['type']) ?></div>
                            <h3 class="outlet-heading"><?= htmlspecialchars($outlet['name']) ?></h3>
                            <p class="outlet-text"><?= htmlspecialchars($outlet['short_description']) ?></p>
                            <div class="outlets-btn-container mt-2">
                                <a href="<?php echo SITE_URL; ?>/outlet.php?id=<?= htmlspecialchars($outlet['id']) ?>" target="_blank" class="custom-button-2 explore-btn">About us</a>
                                <a href="<?php echo SITE_URL; ?>/gallery.php?id=<?= htmlspecialchars($outlet['id']) ?>&type=2" target="_blank" class="custom-button-2 menu-btn">Gallery</a>
                                <?php
                                if ($outlet["has_menu"] == 1) {
                                ?>

                                    <a href="<?= htmlspecialchars($outlet['menu']) ?>" target="_blank" class="custom-button-2 menu-btn">Menu</a>

                                <?php } ?>

                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="tab-pane fade" id="yard" role="tabpanel" aria-labelledby="yard-tab">
                <div class="cluster-outlets-container row" id="outlets-container">

                    <?php foreach ($outlets_yard as $outlet) { ?>

                        <div class="col-md-4 col-lg-3 clickable-div-outlet">
                            <div class="outlet-img-container">
                                <img src="<?php echo SITE_URL; ?>/assets/images/outlets/<?= htmlspecialchars($outlet['image']) ?>" alt="<?= htmlspecialchars($outlet['name']) ?>" class="outlet-img">
                            </div>
                            <div class="animated-divider"></div>
                            <div class="category-outlet-label"><?= htmlspecialchars($outlet['type']) ?></div>
                            <h3 class="outlet-heading"><?= htmlspecialchars($outlet['name']) ?></h3>
                            <p class="outlet-text"><?= htmlspecialchars($outlet['short_description']) ?></p>
                            <div class="outlets-btn-container mt-2">
                                <a href="<?php echo SITE_URL; ?>/outlet.php?id=<?= htmlspecialchars($outlet['id']) ?>" target="_blank" class="custom-button-2 explore-btn">About us</a>
                                <a href="<?php echo SITE_URL; ?>/gallery.php?id=<?= htmlspecialchars($outlet['id']) ?>&type=2" target="_blank" class="custom-button-2 menu-btn">Gallery</a>
                                <?php
                                if ($outlet["has_menu"] == 1) {
                                ?>

                                    <a href="<?= htmlspecialchars($outlet['menu']) ?>" target="_blank" class="custom-button-2 menu-btn">Menu</a>

                                <?php } ?>

                            </div>
                        </div>

                    <?php
                    }
                    ?>

                </div>
            </div>
            <div class="tab-pane fade" id="square" role="tabpanel" aria-labelledby="square-tab">
                <div class="cluster-outlets-container row" id="outlets-container">

                    <?php foreach ($outlets_square as $outlet) { ?>

                        <div class="col-md-4 col-lg-3 clickable-div-outlet">
                            <div class="outlet-img-container">
                                <img src="<?php echo SITE_URL; ?>/assets/images/outlets/<?= htmlspecialchars($outlet['image']) ?>" alt="<?= htmlspecialchars($outlet['name']) ?>" class="outlet-img">
                            </div>
                            <div class="animated-divider"></div>
                            <div class="category-outlet-label"><?= htmlspecialchars($outlet['type']) ?></div>
                            <h3 class="outlet-heading"><?= htmlspecialchars($outlet['name']) ?></h3>
                            <p class="outlet-text"><?= htmlspecialchars($outlet['short_description']) ?></p>
                            <div class="outlets-btn-container mt-2">
                                <a href="<?php echo SITE_URL; ?>/outlet.php?id=<?= htmlspecialchars($outlet['id']) ?>" target="_blank" class="custom-button-2 explore-btn">About us</a>
                                <a href="<?php echo SITE_URL; ?>/gallery.php?id=<?= htmlspecialchars($outlet['id']) ?>&type=2" target="_blank" class="custom-button-2 menu-btn">Gallery</a>
                                <?php
                                if ($outlet["has_menu"] == 1) {
                                ?>

                                    <a href="<?= htmlspecialchars($outlet['menu']) ?>" target="_blank" class="custom-button-2 menu-btn">Menu</a>

                                <?php } ?>

                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>
<?php include_once "./includes/footer.php"; ?>