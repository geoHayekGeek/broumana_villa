<link rel="preload" as="image" href="<?php echo SITE_URL; ?>/assets/images/outlets/<?php echo htmlspecialchars($backgroundImage); ?>">

<div class="outlet-banner-container">
    <!-- Background Image -->
    <div class="outlet-banner-bg" style="background-image: url('<?php echo SITE_URL; ?>/assets/images/outlets/<?php echo htmlspecialchars($backgroundImage); ?>');"></div>

    <!-- Banner Text -->
    <div class="outlet-banner-content">
        <div class="outlet-banner-logo-container">
            <img class="outlet-banner-logo" src="<?php echo SITE_URL ?>/assets/images/logos/<?php echo $bannerLogo?>" alt="">
        </div>
    </div>

    <!-- Contact Button -->
    <?php 
        if($has_menu == 1) {
            
    ?>
    <a target="_blank" href="<?php echo $btnLink ?>" class="custom-primary-btn">
        <?php echo htmlspecialchars($btnText); ?>
    </a>
    <?php 
        } else {}
    ?>

    <!-- Scroll Indicator -->
    <div class="outlet-banner-scroll-indicator">
        <div class="outlet-banner-scroll-text"><?php echo htmlspecialchars($scrollText); ?></div>
        <div class="outlet-banner-scroll-icon"><i class="bi bi-chevron-down"></i></div>
    </div>
</div>