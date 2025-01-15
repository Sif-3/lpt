<?php
include 'api_helper.php'; // Reuse your existing API helper

if (isset($_GET['q'])) {
    $query = trim($_GET['q']);

    // Fetch all product data from the API
    $productData = fetchCachedProductData();

    if ($productData) {
        // Filter products matching the query (case-insensitive search)
        $filteredProducts = array_filter($productData, function ($product) use ($query) {
            return stripos($product['designWebEN'], $query) !== false ||
                   stripos($product['referencia'], $query) !== false;
        });

        // Return filtered results as JSON
        echo json_encode(array_values($filteredProducts));
    } else {
        echo json_encode([]); // Return empty array if no data
    }
} else {
    echo json_encode([]); // Return empty array if no query provided
}
?>
