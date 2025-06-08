<link rel="preload" as="image" href="<?php echo SITE_URL?>/assets/images/banner-images/<?php echo htmlspecialchars($backgroundImage); ?>">

<div class="cluster-banner-container">
    <!-- Background Image -->
    <div class="cluster-banner-bg" style="background-image: url('<?php echo SITE_URL?>/assets/images/banner-images/<?php echo htmlspecialchars($backgroundImage); ?>')"></div>

    <!-- Banner Text -->
    <div class="cluster-banner-content">
        <div class="outlet-banner-logo-container">
            <img class="outlet-banner-logo" src="<?php echo SITE_URL ?>/assets/images/logos/<?php echo $bannerLogo?>" alt="">
        </div>
    </div>

    <!-- Contact Button -->
    <a href="#contact" class="contact-btn">
        <i class="phone-icon"><i class="bi bi-telephone"></i><?php echo htmlspecialchars($contactBtnText); ?>
    </a>

    <!-- Scroll Indicator -->
    <div class="cluster-banner-scroll-indicator">
        <div class="cluster-banner-scroll-text"><?php echo htmlspecialchars($scrollText); ?></div>
        <div class="cluster-banner-scroll-icon"><i class="bi bi-chevron-down"></i></div>
    </div>
</div>