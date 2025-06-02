<?php

if(isset($clusterId)) {
    $placeId = $clusterId;
} else if (isset($outletId)) {
    $placeId = $outletId;
}

if (count($gallery) > 2) {
    $gallery = array_slice($gallery, 0, 2);
}

// Reuse renderMedia() if not already defined
function isVideo($filename) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    return in_array(strtolower($ext), ['mp4', 'webm']);
}

function renderMedia($src, $alt = '', $isSecondary = false) {
    $fullSrc = SITE_URL . "/assets/images/gallery/" . htmlspecialchars($src);
    $escapedAlt = htmlspecialchars($alt);
    $imgClass = $isSecondary ? "lazy-img gallery-secondary-img" : "lazy-img gallery-lg-img";
    $videoClass = $isSecondary ? "gallery-video lazy-video gallery-secondary-img" : "gallery-video lazy-video";

    if (isVideo($src)) {
        return <<<HTML
            <div class="video-container">
                <video
                    data-src="{$fullSrc}"
                    class="{$videoClass}"
                    playsinline muted preload="none"
                    alt="{$escapedAlt}">
                    Your browser does not support the video tag.
                </video>
                <button class="video-play-btn" aria-label="Play/Pause">
                    <svg class="play-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                    <svg class="pause-icon" viewBox="0 0 24 24" fill="currentColor" style="display: none;">
                        <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                    </svg>
                </button>
            </div>
        HTML;
    } else {
        return <<<HTML
            <img
                data-src="{$fullSrc}"
                alt="{$escapedAlt}"
                class="{$imgClass}">
        HTML;
    }
}
?>

<div class="container fade-in-target">
    <p class="custom-heading">Gallery</p>
    <div class="gallery-container">
        <?php foreach ($gallery as $i => $row): ?>
            <?php
            $classes = 'row gallery-content-row' . (($i % 2) ? ' row-reversed' : '');
            $count = count($row);
            ?>

            <?php if ($count === 3): ?>
                <div class="<?= $classes ?>">
                    <div class="col-md-8 gallery-lg-col">
                        <div class="img-container">
                            <?= renderMedia($row[0]['src'], $row[0]['alt'], false) ?>
                        </div>
                    </div>
                    <div class="col-md gallery-sm-col gallery-sm-col-justified">
                        <div class="img-container">
                            <?= renderMedia($row[1]['src'], $row[1]['alt'], true) ?>
                        </div>
                        <div class="img-container">
                            <?= renderMedia($row[2]['src'], $row[2]['alt'], true) ?>
                        </div>
                    </div>
                </div>

            <?php elseif ($count === 2): ?>
                <div class="<?= $classes ?>">
                    <div class="col-md-8 gallery-lg-col">
                        <div class="img-container">
                            <?= renderMedia($row[0]['src'], $row[0]['alt'], false) ?>
                        </div>
                    </div>
                    <div class="col-md gallery-sm-col">
                        <div class="img-container">
                            <?= renderMedia($row[1]['src'], $row[1]['alt'], true) ?>
                        </div>
                    </div>
                </div>

            <?php elseif ($count === 1): ?>
                <div class="row gallery-content-row">
                    <div class="col-12 gallery-single-col">
                        <div class="img-container">
                            <?= renderMedia($row[0]['src'], $row[0]['alt'], false) ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

        <div class="d-flex justify-content-center">
            <a href="<?php echo SITE_URL; ?>/gallery.php?id=<?php echo $placeId; ?>&type=<?php echo $type; ?>" class="custom-button">Go To Gallery</a>
        </div>
    </div>
</div>