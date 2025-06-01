<?php
require_once 'db.php'; 

// Example usage (for testing purposes)
$id = 1;
$outlet = getOutletById($id);
if ($outlet) {
    echo "Outlet with ID $id: ";
    print_r($outlet);
} else {
    echo "No outlet found with ID $id.";
}

// Get all outlets
$outlets = getAllOutlets();
echo "All outlets: ";
print_r($outlets);

// Get outlets by cluster_id
$cluster_id = 1; 
$outletsByCluster = getOutletsByClusterId($cluster_id);
echo "Outlets with cluster_id $cluster_id: ";
print_r($outletsByCluster);

?>
