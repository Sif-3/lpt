<?php
$pageTitle = "Compare Products";
include 'header.php';
include 'api_helper.php';

// Get selected products
$selectedProducts = isset($_GET['compare']) ? $_GET['compare'] : [];

if (empty($selectedProducts)) {
    echo "<p>No products selected for comparison. Please go back and select some products.</p>";
    include 'footer.php';
    exit;
}

// Fetch all products
$productData = fetchCachedProductData();
$productsToCompare = [];

foreach ($productData as $product) {
    if (in_array($product['referencia'], $selectedProducts)) {
        $productsToCompare[] = $product;
    }
}

// Display comparison table
if (!empty($productsToCompare)) {
    echo '<table class="compare-table">';
    echo '<thead>';
    echo '<tr><th>Feature</th>';
    foreach ($productsToCompare as $product) {
        echo '<th>' . htmlspecialchars($product['designWebEN'] ?? 'N/A') . '</th>';
    }
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    echo '<tr><td>Reference</td>';
    foreach ($productsToCompare as $product) {
        echo '<td>' . htmlspecialchars($product['referencia'] ?? 'N/A') . '</td>';
    }
    echo '</tr>';
    echo '<tr><td>Description</td>';
    foreach ($productsToCompare as $product) {
        echo '<td>' . htmlspecialchars($product['descricaoCurtaEN'] ?? 'N/A') . '</td>';
    }
    echo '</tr>';
    echo '<tr><td>Price</td>';
    foreach ($productsToCompare as $product) {
        echo '<td>' . htmlspecialchars($product['price'] ?? 'N/A') . '</td>';
    }
    echo '</tr>';
    echo '</tbody>';
    echo '</table>';
} else {
    echo "<p>No products found for comparison.</p>";
}

include 'footer.php';
?>
