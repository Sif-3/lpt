<?php
$pageTitle = "Product Details";
include 'header.php';
include 'api_helper.php';

// Get the product reference from the query string
$productRef = isset($_GET['ref']) ? $_GET['ref'] : null;

if (!$productRef) {
    echo "<p>Product reference is missing. Please go back and try again.</p>";
    include 'footer.php';
    exit;
}

// Fetch all products and find the specific one (could be optimized for API filtering)
$productData = fetchCachedProductData();
$product = null;

foreach ($productData as $item) {
    if ($item['referencia'] === $productRef) {
        $product = $item;
        break;
    }
}

if (!$product) {
    echo "<p>Product not found. Please go back and try again.</p>";
    include 'footer.php';
    exit;
}

// Get the referring page from the HTTP header
$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Product Details Page Styling */
        .product-details-container {
            display: flex;
            align-items: flex-start;
            padding: 20px;
            gap: 20px;
            max-width: 1200px;
            margin: 50px auto;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            flex: 1;
            max-width: 40%;
        }

        .product-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .product-info {
            flex: 2;
            padding: 20px;
            text-align: left;
        }

        .product-info h1 {
            font-size: 32px;
            margin-bottom: 10px;
            color: #333;
        }

        .product-info p {
            font-size: 18px;
            margin-bottom: 10px;
            line-height: 1.6;
            color: #555;
        }

        .product-info p strong {
            color: #000;
        }

        .cta-buttons {
            margin-top: 20px;
        }

        .cta-buttons a {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        .cta-buttons a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="product-details-container">
    <!-- Product Image Section -->
    <div class="product-image">
        <img src="<?php echo htmlspecialchars($product['imagens'][0] ?? 'placeholder.jpg'); ?>" 
             alt="<?php echo htmlspecialchars($product['designWebEN'] ?? 'Product Image'); ?>">
    </div>

    <!-- Product Information Section -->
    <div class="product-info">
        <h1><?php echo htmlspecialchars($product['designWebEN'] ?? 'No Title'); ?></h1>
        <p><strong>Reference:</strong> <?php echo htmlspecialchars($product['referencia'] ?? 'N/A'); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($product['descricaoLongaEN'] ?? 'No description available'); ?></p>
        <p><strong>Category:</strong> <?php echo htmlspecialchars($product['categoriaEN'] ?? 'Uncategorized'); ?></p>
        

        <!-- Call to Action Buttons -->
        <div class="cta-buttons">
            <?php if ($referrer): ?>
                <a href="<?php echo htmlspecialchars($referrer); ?>">Back</a>
            <?php else: ?>
                <a href="products.php">Back to Products</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
