<?php
// Site configuration
define('SITE_NAME', 'Broumana Golden Triangle');
define('SITE_URL', 'http://localhost/broumana_villa');

// Navigation menu items
$menu_items = [
    'Home' => '/',
    'Broumana Villa' => '/broumana-villa.php',
    'Broumana Yard' => '/broumana-yard.php',
    'Broumana Square' => '/broumana-square.php',
    'All Outlets' => '/all-outlets.php',
    'Contact Us' => '/contact-us.php'
];

// SEO settings
function get_page_title($page_name = '') {
    $title = SITE_NAME;
    if (!empty($page_name)) {
        $title = $page_name . ' | ' . $title;
    }
    return $title;
}

// Get current page for active menu highlighting
function get_current_page() {
    return basename($_SERVER['PHP_SELF']);
}
?>