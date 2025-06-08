<section class="parallax-section fade-in-target">
    <div class="parallax-bg" id="parallax" style="background-image: url('<?= htmlspecialchars(SITE_URL) ?>/assets/images/broumana-villa/<?= $site_info["full_background_section_bg_image"] ?>');"></div>
    <div class="overlay-dark"></div>
    <div class="content-overlay">
        <h1 class="section-title"><?= $site_info["full_background_section_title"] ?></h1>
        <p class="section-description">
            <?= $site_info["full_background_section_text"] ?>
        </p>
        <a target="_blank" href="<?php echo SITE_URL; ?>/<?= $site_info["full_background_section_button_link"] ?>" class="cta-button"><?= $site_info["full_background_section_button_text"] ?></a>
    </div>
</section>