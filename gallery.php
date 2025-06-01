<?php
// outlet.php

require_once './backend/db.php';

function getOutletById($id)
{
  global $conn;

  $sql = "SELECT * FROM outlets WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  return $result->num_rows > 0 ? $result->fetch_assoc() : null;
}

function getClusterById($id)
{
  global $conn;

  $sql = "SELECT * FROM clusters WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  return $result->num_rows > 0 ? $result->fetch_assoc() : null;
}

// Helpers
function isVideo($filename)
{
  $ext = pathinfo($filename, PATHINFO_EXTENSION);
  return in_array(strtolower($ext), ['mp4', 'webm']);
}

function renderMedia($src, $alt = '', $isSecondary = false)
{
  $fullSrc = SITE_URL . "/assets/images/gallery/" . htmlspecialchars($src);
  $imgClass = $isSecondary ? "lazy-img gallery-secondary-img" : "lazy-img gallery-lg-img";
  $videoClass = $isSecondary ? "gallery-video lazy-video gallery-secondary-img" : "gallery-video lazy-video";
  
  if (isVideo($src)) {
    return <<<HTML
      <div class="video-container">
        <video
          data-src="{$fullSrc}"
          class="{$videoClass}"
          playsinline preload="none"
          alt="{$alt}">
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
        alt="{$alt}"
        class="{$imgClass}">
    HTML;
  }
}

// Determine content
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$type = isset($_GET['type']) ? intval($_GET['type']) : 0;
$image_folder = "";

if ($id !== 0) {
  switch ($type) {
    case 1:
      $cluster = getClusterById($id);
      if (!$cluster) {
        echo "<p>Sorry, cluster not found!</p>";
        exit;
      }
      $backgroundImage = $cluster['primary_image'];
      $gallery = json_decode($cluster['gallery'], true);
      $image_folder = "banner-images";
      break;

    case 2:
      $outlet = getOutletById($id);
      if (!$outlet) {
        echo "<p>Sorry, outlet not found!</p>";
        exit;
      }
      $backgroundImage = $outlet['primary_image'];
      $gallery = json_decode($outlet['gallery'], true);
      $image_folder = "outlets";
      break;

    default:
      echo "<p>Something Went Wrong!</p>";
      exit;
  }
}
?>

<?php include_once "./includes/header.php" ?>
<?php include_once "./partials/gallery-banner.php" ?>

<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<div class="container fade-in-target">
  <p class="custom-heading">Gallery</p>
  <div class="gallery-container">
    <?php foreach ($gallery as $i => $row): ?>
      <?php
      $classes = 'row gallery-content-row fade-in-target' . (($i % 2) ? ' row-reversed' : '');
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
  </div>
</div>

<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>
<?php include_once "./includes/footer.php"; ?>