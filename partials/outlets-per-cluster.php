<div class="container fade-in-target">
    <p class="custom-heading">The Villa's Outlets</p>
    <div class="cluster-outlets-container row" id="outlets-container">
        <?php foreach ($outlets as $outlet): ?>
            <div class="col-md-3 clickable-div-outlet">
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
                        if($outlet["has_menu"] == 1) {
                    ?>

                    <a href="<?= htmlspecialchars($outlet['menu']) ?>" target="_blank" class="custom-button-2 menu-btn">Menu</a>

                    <?php 

                    }

                    ?>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>