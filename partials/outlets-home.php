<?php

function renderOutletsByCluster($outlets, $clusterId)
{
    foreach ($outlets as $outlet) {
        if ($outlet['cluster_id'] == $clusterId) {
            echo '<div class="col-5 col-sm-4 col-lg-2 single-outlet" onclick="window.open(\'' . SITE_URL . "/outlet.php?id=" . htmlspecialchars($outlet['id']) . '\', \'_blank\')">';
            echo '<img data-src="' . SITE_URL . '/assets/images/logos/' . htmlspecialchars($outlet['logo']) . '" alt="' . $outlet["short_description"] . '" class="outlet-logo lazy-img">';
            echo '</div>';
        }
    }
}

?>

<div class="container outlets-section outlets-home-section fade-in-target">
    <p class="custom-heading"><?= htmlspecialchars($site_info["home_outlets_title"]) ?></p>

    <ul class="nav nav-pills mb-5 outlets-nav-menu d-none d-md-flex" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-yard-tab" data-bs-toggle="pill" data-bs-target="#pills-yard"
                type="button" role="tab" aria-controls="pills-yard" aria-selected="false">Broumana Yard</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-villa-tab" data-bs-toggle="pill" data-bs-target="#pills-villa"
                type="button" role="tab" aria-controls="pills-villa" aria-selected="true">Broumana Villa</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-square-tab" data-bs-toggle="pill" data-bs-target="#pills-square"
                type="button" role="tab" aria-controls="pills-square" aria-selected="false">Broumana Square</button>
        </li>
    </ul>

    <ul class="nav nav-pills mb-5 outlets-nav-menu d-flex d-md-none" id="pills-tab" role="tablist">
        <li class="nav-item w-100 d-flex justify-content-center" role="presentation">
            <button class="nav-link active" id="pills-villa-tab" data-bs-toggle="pill" data-bs-target="#pills-villa"
                type="button" role="tab" aria-controls="pills-villa" aria-selected="true">Broumana Villa</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-yard-tab" data-bs-toggle="pill" data-bs-target="#pills-yard"
                type="button" role="tab" aria-controls="pills-yard" aria-selected="false">Broumana Yard</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-square-tab" data-bs-toggle="pill" data-bs-target="#pills-square"
                type="button" role="tab" aria-controls="pills-square" aria-selected="false">Broumana Square</button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <!-- Yard -->
        <div class="tab-pane fade" id="pills-yard" role="tabpanel" aria-labelledby="pills-yard-tab">
            <div id="yard_row" class="row outlets-row">
                <?php renderOutletsByCluster($outlets, 2); ?>
            </div>
        </div>

        <!-- Villa -->
        <div class="tab-pane fade show active" id="pills-villa" role="tabpanel" aria-labelledby="pills-villa-tab">
            <div id="villa_row" class="row outlets-row">
                <?php renderOutletsByCluster($outlets, 1); ?>
            </div>
        </div>

        <!-- Square -->
        <div class="tab-pane fade" id="pills-square" role="tabpanel" aria-labelledby="pills-square-tab">
            <div id="square_row" class="row outlets-row">
                <?php renderOutletsByCluster($outlets, 3); ?>
            </div>
        </div>
    </div>
</div>