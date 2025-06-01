<?php

$favorites = [
    [
        "favorite_image" => "appetito_1.jpg",
        "favorite_name" => "RUCOLA",
        "favorite_description" => "Fresh arugula, juicy cherry tomatoes, and shaved parmesan atop melted mozzarella and vibrant tomato sauce—light, peppery, and irresistibly fresh.",

    ],
    [
        "favorite_image" => "appetito_2.jpg",
        "favorite_name" => "CAPRICCIOSA",
        "favorite_description" => "Savory prosciutto cotto, earthy mushrooms, tender artichokes, and briny olives on a bed of melted mozzarella and zesty tomato sauce—an Italian classic full of bold, balanced flavors.",

    ],
    [
        "favorite_image" => "appetito_3.jpg",
        "favorite_name" => "QUATTRO FORMAGGI",
        "favorite_description" => "A rich, melty blend of mozzarella, provolone, sharp gorgonzola, aged pecorino, and parmesan over our signature tomato sauce—cheesy heaven in every bite.",

    ],
]

?>

<div class="outlet-favorite-container container fade-in-target">
    <h1 class="custom-heading">Customers's Favorites</h1>
    <div class="outlet-favorite row">

        <?php
        foreach ($favorites as $favorite) {
        ?>

            <div class="col-md-4 single-favorite">
                <div class="favorite-image-container mb-3 d-flex justify-content-center">
                    <img src="<?php echo SITE_URL; ?>/assets/images/favorites/<?php echo $favorite["favorite_image"]; ?>" alt="" class="favorite-image">
                </div>
                <div class="favorite-text-container">
                    <h4 class="favorite-title text-center"><?php echo $favorite["favorite_name"]; ?></h4>
                    <p class="favorite-description"><?php echo $favorite["favorite_description"]; ?></p>
                </div>
            </div>

        <?php
        }
        ?>

    </div>
</div>