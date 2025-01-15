<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
     /* Product Grid Styling */
.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Responsive grid with smaller cards */
    gap: 20px;
    padding: 20px;
    margin-left: 260px; /* Space for sidebar */
    justify-content: center; /* Center the grid */
}

/* Product Card */
.product-card {
    position: relative; /* To position elements like badges */
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    padding: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* Product Image */
.product-card img {
    width: 100%;
    height: 120px; /* Fixed height for consistent layout */
    object-fit: contain; /* Ensure images fit nicely within the container */
    margin-bottom: 10px;
}

/* Product Name */
.product-card h2 {
    font-size: 14px;
    color: #333;
    margin: 10px 0;
}

/* Product Reference */
.product-card p {
    font-size: 12px;
    color: #666;
    margin: 5px 0 15px;
}

/* Buttons Section */
.card-buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
}

/* View More Button */
.view-more-btn {
    padding: 5px 10px;
    background-color: #007BFF;
    color: #fff;
    text-decoration: none;
    font-size: 12px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.view-more-btn:hover {
    background-color: #0056b3;
}

/* Compare Checkbox Label */
.compare-label {
    font-size: 12px;
    color: #333;
    display: flex;
    align-items: center;
    gap: 5px;
}

        /* Compare Bar Styling */
        .compare-bar {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.2);
    display: none; /* Initially hidden */
    justify-content: space-between;
    align-items: center;
    z-index: 1000;
}

        .compare-products-list {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .compare-item {
            background-color: #444;
            padding: 5px 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            font-size: 14px;
        }

        .compare-item button.remove-btn {
            background: none;
            border: none;
            color: #ff6b6b;
            cursor: pointer;
            font-size: 14px;
        }

        .compare-item button.remove-btn:hover {
            text-decoration: underline;
        }

        .compare-btn {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .compare-btn:disabled {
            background-color: #666;
            cursor: not-allowed;
        }

        .compare-btn:hover:not(:disabled) {
            background-color: #0056b3;
        }

        /* Filter Sidebar Styling */
        .filter-sidebar {
    width: 240px;
    position: fixed;
    top: 80px; /* Adjust for navbar */
    left: 0;
    background-color: #333; /* Match footer background */
    color: #fff;
    padding: 20px;
    border-radius: 0;
    box-shadow: 2px 0 8px rgba(0, 0, 0, 0.2);
    overflow-y: auto;
    height: calc(100vh - 80px); /* Ensures it fits on the screen and avoids overlap */
    border-right: 1px solid rgba(255, 255, 255, 0.1);
    z-index: 100; /* Stays above the footer */
}



.filter-sidebar h3 {
    font-size: 18px;
    margin-bottom: 15px;
    color: #ffc107; /* Highlight headings in yellow */
}

.filter-list {
    list-style-type: none;
    padding: 0;
}

.filter-list li {
    margin-bottom: 10px;
}

.filter-list label {
    display: flex;
    align-items: center;
    font-size: 14px;
    color: #ddd; /* Subtle text color */
    cursor: pointer;
}

.filter-list input[type="checkbox"] {
    margin-right: 10px;
}

.apply-filter-btn,
.clear-filter-btn {
    display: block;
    padding: 10px 15px;
    font-size: 14px;
    color: #fff;
    background-color: #007BFF;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
    text-align: center;
}

.clear-filter-btn {
    background-color: #6c757d;
}

.apply-filter-btn:hover,
.clear-filter-btn:hover {
    background-color: #0056b3;
    color: #fff;
}

/* Optional Styling for Pagination */
.pagination a,
.pagination span {
    display: inline-block;
    padding: 5px 10px;
    margin: 0 5px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-decoration: none;
    color: #333;
    transition: background-color 0.3s ease;
}

.pagination a:hover {
    background-color: #007BFF;
    color: #fff;
}

.pagination .current-page {
    background-color: #007BFF;
    color: #fff;
    pointer-events: none;
}

    </style>
</head>

<?php
$pageTitle = "Products";
include 'header.php';
include 'api_helper.php';


// Get the product type from the query string
$productSubmarca = isset($_GET['submarca']) ? $_GET['submarca'] : null;

// Fetch cached product data
$productData = fetchCachedProductData();

// Filter products based on the selected submarca
if ($productSubmarca) {
    $filteredProducts = array_filter($productData, function ($product) use ($productSubmarca) {
        return isset($product['subMarca']) && $product['subMarca'] === $productSubmarca;
    });
} else {
    $filteredProducts = $productData;
}


// Number of products to show on the page
$productsPerPage = 50;

// Get filters from URL
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($currentPage < 1) $currentPage = 1;
$selectedCategories = isset($_GET['categories']) ? $_GET['categories'] : [];

// Get the product type from the query string
$productType = isset($_GET['type']) ? $_GET['type'] : null;

// Fetch cached product data
$productData = fetchCachedProductData();

if (!$productData) {
    echo "<p>Unable to load products. Please try again later.</p>";
} else {
    // Filter products based on the selected product type or selected categories
    if ($productType) {
        $filteredProducts = array_filter($productData, function ($product) use ($productType) {
            return isset($product['categoriaEN']) && $product['categoriaEN'] === $productType;
        });
    } elseif (!empty($selectedCategories)) {
        $filteredProducts = array_filter($productData, function ($product) use ($selectedCategories) {
            return isset($product['categoriaEN']) && in_array($product['categoriaEN'], $selectedCategories);
        });
    } else {
        $filteredProducts = $productData; // Show all products if no filters are applied
    }

    // Pagination logic
    $totalProducts = count($filteredProducts);
    $totalPages = ceil($totalProducts / $productsPerPage);
    $startIndex = ($currentPage - 1) * $productsPerPage;
    $limitedProducts = array_slice($filteredProducts, $startIndex, $productsPerPage);

    // Sidebar Filters
    echo '<div class="filter-sidebar">';
    echo '<h3>Filter by Categories</h3>';
    echo '<form id="category-filter-form" method="GET" action="">';
    echo '<ul class="filter-list">';
    $categories = array_unique(array_map(function ($product) {
        return $product['categoriaEN'] ?? 'Uncategorized';
    }, $productData));
    foreach ($categories as $category) {
        echo '<li>';
        echo '<label>';
        echo '<input type="checkbox" name="categories[]" value="' . htmlspecialchars($category) . '" ' .
            (in_array($category, $selectedCategories) ? 'checked' : '') . '>';
        echo htmlspecialchars($category);
        echo '</label>';
        echo '</li>';
    }
    echo '</ul>';
    echo '<button type="submit" class="apply-filter-btn">Apply Filters</button>';
    echo '<a href="products.php" class="clear-filter-btn">Clear Filters</a>';
    echo '</form>';
    echo '</div>';

    // Product grid
    echo '<div class="product-grid">';
    if (empty($limitedProducts)) {
        echo '<p>No products found for the selected filters.</p>';
    } else {
        foreach ($limitedProducts as $product) {
            echo '<div class="product-card">';
            echo '<img src="' . ($product['imagens'][0] ?? 'placeholder.jpg') . '" alt="' . htmlspecialchars($product['designWebEN'] ?? 'Product Image') . '">';
            echo '<h2>' . htmlspecialchars($product['designWebEN'] ?? 'No Title') . '</h2>';
            echo '<p>' . htmlspecialchars($product['referencia'] ?? 'No Reference') . '</p>';
            echo '<div class="card-buttons">';
            echo '<a href="product_details.php?ref=' . urlencode($product['referencia']) . '" class="view-more-btn">View More</a>';
            echo '<label class="compare-label">';
            echo '<input type="checkbox" name="compare[]" value="' . htmlspecialchars($product['referencia']) . '"> Compare';
            echo '</label>';
            echo '</div>';
            echo '</div>';
        }
    }
    echo '</div>';

    // Pagination
    echo '<div class="pagination">';
    if ($currentPage > 1) {
        echo '<a href="?page=' . ($currentPage - 1) . '&' . http_build_query(['categories' => $selectedCategories]) . '">Previous</a>';
    }
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i === $currentPage) {
            echo '<span class="current-page">' . $i . '</span>';
        } else {
            echo '<a href="?page=' . $i . '&' . http_build_query(['categories' => $selectedCategories]) . '">' . $i . '</a>';
        }
    }
    if ($currentPage < $totalPages) {
        echo '<a href="?page=' . ($currentPage + 1) . '&' . http_build_query(['categories' => $selectedCategories]) . '">Next</a>';
    }
    echo '</div>';
}
?>


<div id="compare-bar" class="compare-bar">
    <h3>Compare Products</h3>
    <div id="compare-products-list" class="compare-products-list">
        <!-- Selected products will appear here dynamically -->
    </div>
    <button id="compare-button" class="compare-btn" disabled>Compare</button>
</div>

<?php include 'footer.php'; ?>
    <script>
      const maxCompareProducts = 4;
const compareList = document.getElementById('compare-products-list');
const compareBar = document.getElementById('compare-bar'); // Get the compare bar element
const compareButton = document.getElementById('compare-button');
const checkboxes = document.querySelectorAll('input[name="compare[]"]');

let selectedProducts = [];

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', (e) => {
        const productRef = e.target.value;
        const productName = e.target.closest('.product-card').querySelector('h2').innerText;

        if (e.target.checked) {
            if (selectedProducts.length >= maxCompareProducts) {
                alert('You can only compare up to 4 products.');
                e.target.checked = false;
                return;
            }

            // Add the product to the compare bar
            selectedProducts.push({ ref: productRef, name: productName });
            const productElement = document.createElement('div');
            productElement.classList.add('compare-item');
            productElement.dataset.ref = productRef;
            productElement.innerHTML = `
                <span>${productName}</span>
                <button class="remove-btn" data-ref="${productRef}">Remove</button>
            `;
            compareList.appendChild(productElement);
        } else {
            // Remove the product from the compare bar
            selectedProducts = selectedProducts.filter((product) => product.ref !== productRef);
            const productElement = document.querySelector(`.compare-item[data-ref="${productRef}"]`);
            productElement.remove();
        }

        // Toggle visibility of the compare bar
        compareBar.style.display = selectedProducts.length > 0 ? 'flex' : 'none';

        // Enable or disable the Compare button
        compareButton.disabled = selectedProducts.length === 0;
    });
});

// Remove product from compare bar
compareList.addEventListener('click', (e) => {
    if (e.target.classList.contains('remove-btn')) {
        const refToRemove = e.target.dataset.ref;
        selectedProducts = selectedProducts.filter((product) => product.ref !== refToRemove);
        const productElement = document.querySelector(`.compare-item[data-ref="${refToRemove}"]`);
        productElement.remove();

        // Uncheck the corresponding checkbox
        const checkbox = document.querySelector(`input[name="compare[]"][value="${refToRemove}"]`);
        if (checkbox) checkbox.checked = false;

        // Toggle visibility of the compare bar
        compareBar.style.display = selectedProducts.length > 0 ? 'flex' : 'none';

        // Enable or disable the Compare button
        compareButton.disabled = selectedProducts.length === 0;
    }
});

// Redirect to compare page on button click
compareButton.addEventListener('click', () => {
    if (selectedProducts.length > 0) {
        const queryString = selectedProducts.map((product) => `compare[]=${product.ref}`).join('&');
        window.location.href = `compare_products.php?${queryString}`;
    }
});

    </script>
</body>
</html>
