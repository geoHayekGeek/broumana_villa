<div class="container clusters-section fade-in-target">
    <p class="custom-heading"><?= htmlspecialchars($site_info["home_clusters_title"]) ?></p>
    <div class="row clusters-row">
        <!-- Column One -->
        <div class="col-md-4 clickable-div">
            <div class="img-container">
                <img data-src="<?php echo SITE_URL; ?>/assets/images/home/broumana-yard/<?php echo $yardSecondaryImage ?>" alt="Person on a balcony overlooking the sea" class="clusters-img lazy-img">
            </div>
            <div class="animated-divider"></div>
            <div class="category-label"><?php echo $yardTitle; ?></div>
            <h3 class="clusters-heading"><?php echo $yardName; ?></h3>
            <p class="clusters-text"><?php echo $yardDescription; ?></p>

            <div class="d-flex justify-content-between">
                <a href="<?php echo SITE_URL; ?>/broumana-villa.php" class="simple-button">About us</a>
                <a href="<?php echo SITE_URL; ?>/gallery.php?id=3&type=1" class="simple-button">Gallery</a>
            </div>
        </div>


        <!-- Column Two -->
        <div class="col-md-4 clickable-div">
            <div class="img-container">
                <img data-src="<?php echo SITE_URL; ?>/assets/images/home/broumana-villa/<?php echo $villaSecondaryImage ?>" alt="Person on a balcony overlooking the sea" class="clusters-img lazy-img">
            </div>
            <div class="animated-divider"></div>
            <div class="category-label"><?php echo $villaTitle; ?></div>
            <h3 class="clusters-heading"><?php echo $villaName; ?></h3>
            <p class="clusters-text"><?php echo $villaDescription; ?></p>

            <div class="d-flex justify-content-between">
                <a href="<?php echo SITE_URL; ?>/broumana-villa.php" class="simple-button">About us</a>
                <a href="<?php echo SITE_URL; ?>/gallery.php?id=1&type=1" class="simple-button">Gallery</a>
            </div>
        </div>

        <!-- Column Three -->
        <div class="col-md-4 clickable-div">
            <div class="img-container">
                <img data-src="<?php echo SITE_URL; ?>/assets/images/home/broumana-square/<?php echo $squareSecondaryImage ?>" alt="Person on a balcony overlooking the sea" class="clusters-img lazy-img">
            </div>
            <div class="animated-divider"></div>
            <div class="category-label"><?php echo $squareTitle; ?></div>
            <h3 class="clusters-heading"><?php echo $squareName; ?></h3>
            <p class="clusters-text"><?php echo $squareDescription; ?></p>

            <div class="d-flex justify-content-between">
                <a href="<?php echo SITE_URL; ?>/gallery.php?id=3&type=1" class="simple-button">About us</a>
                <a href="<?php echo SITE_URL; ?>/gallery.php?id=2&type=1" class="simple-button">Gallery</a>
            </div>
        </div>
    </div>
</div>