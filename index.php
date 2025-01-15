<!DOCTYPE html>
<html lang="en">
<head>
   
    <style>
      
   /* Updated Lower Section Styling */
  /* Product Types Section Styling */
.product-types {
    display: flex;
    flex-direction: column;
    gap: 40px;
    padding: 40px 20px;
    background-color: #333; /* Dark background */
    color: #fff; /* Light text */
}

/* Product Type Card */
.product-type {
    display: flex;
    align-items: center;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: #444; /* Slightly lighter background for contrast */
}

/* Alternating Layouts */
.product-type.left-image {
    flex-direction: row;
}

.product-type.right-image {
    flex-direction: row-reverse;
}

/* Hover Effect */
.product-type:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* Product Images */
.product-type img {
    max-width: 200px;
    border-radius: 10px;
    margin: 0 20px;
}

/* Product Information */
.product-info {
    text-align: left;
    max-width: 500px;
}

.product-info h2 {
    font-size: 24px;
    color: #fff;
    margin-bottom: 10px;
}

.product-info p {
    font-size: 16px;
    color: #ddd;
    margin-bottom: 20px;
}

/* Call-to-Action Button */
.cta-button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background-color: #007BFF;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.cta-button:hover {
    background-color: #0056b3;
}




    </style>
    <style>
        /* Map Section Styling */
        .map-section {
            margin: 30px 0;
            padding: 20px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .map-section h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
        }

        .map-container {
            width: 100%;
            height: 400px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

  

    </style>

<style>
.mid-section {
    background-color: #f9f9f9;
    padding: 20px;
}

.image-description {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
    max-width: 1200px; /* Set a maximum width */
    margin: 0 auto; /* Center the container */
}

/* Highlight Item Styling */
.highlight-item {
    text-align: center;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    width: 100%;
    max-width: 300px; /* Ensure consistent width */
    height: 400px; /* Set a fixed height for consistency */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.highlight-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.highlight-item img {
    width: 80%; /* Adjust image width */
    max-width: 150px; /* Ensure images are not too large */
    height: auto; /* Maintain aspect ratio */
    margin: 0 auto;
    margin-bottom: 10px;
}

.product-title {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 10px;
}

.product-description {
    font-size: 14px;
    color: #666;
    margin-bottom: 10px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.view-product-btn {
    margin-top: auto;
    padding: 10px 20px;
    background-color: #007BFF;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.view-product-btn:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

</style>
</head>

    <?php $pageTitle = "Home"; ?>
    <?php include 'header.php'; ?>
     <?php include 'api_helper.php';?>
    <!-- Top Section -->
    <header class="top-section">
        <img src="assets/mapa_mundo.jpg" alt="Top Image">
    </header>

    <!-- Mid Section -->
    <?php
// Fetch product data
$productData = fetchCachedProductData();

// Filter products to only include those with descriptions
$productsWithDescriptions = array_filter($productData, function ($product) {
    return !empty($product['descricaoLongaEN']); // Ensure the product has a description
});

// Cache logic for weekly random products
$cacheFile = 'random_products_cache.json';
$cacheLifetime = 7 * 24 * 60 * 60; // 7 days in seconds

if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheLifetime)) {
    // Use cached products
    $randomProducts = json_decode(file_get_contents($cacheFile), true);
} else {
    // Shuffle and pick 3 random products
    shuffle($productsWithDescriptions);
    $randomProducts = array_slice($productsWithDescriptions, 0, 3);

    // Save to cache
    file_put_contents($cacheFile, json_encode($randomProducts));
}
?>
  
  <section class="mid-section">
    <div class="image-description">
        <?php foreach ($randomProducts as $product): ?>
            <div class="highlight-item">
               

                <!-- Display the product image -->
                <img src="<?php echo $product['imagens'][0] ?? 'placeholder.jpg'; ?>" alt="<?php echo htmlspecialchars($product['designWebEN'] ?? 'Product Image'); ?>">

                <!-- Display the product title -->
                <p class="product-title">
                    <?php echo htmlspecialchars($product['designWebEN'] ?? 'No Title'); ?>
                </p>

                <!-- Display the product description -->
                <p class="product-description">
                    <?php echo htmlspecialchars($product['descricaoLongaEN'] ?? 'Description not available.'); ?>
                </p>

                <!-- Add the View Product button -->
                <a href="product_details.php?ref=<?php echo urlencode($product['referencia']); ?>" class="view-product-btn">View Product</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>




    

<body>
<!-- Lower Section -->
<section class="product-types">
    <div class="product-type left-image">
        <img src="assets/produto-base-hand-tools.webp" alt="Vito Hand Tools">
        <div class="product-info">
            <h2>Vito Hand Tools</h2>
            <p>Discover durable and high-quality hand tools designed for precision and ease of use.</p>
            <a href="products.php?submarca=<?php echo urlencode('HAND TOOLS'); ?>" class="cta-button">Explore More</a>
        </div>
    </div>
    <div class="product-type right-image">
        <div class="product-info">
            <h2>Vito Pro Power</h2>
            <p>Professional-grade power tools for demanding applications and reliability.</p>
            <a href="products.php?type=PRO POWER" class="cta-button">Explore More</a>
        </div>
        <img src="assets/produto-base-pro-power.webp" alt="Vito Pro Power">
    </div>
    <div class="product-type left-image">
        <img src="assets/produto-base-security.webp" alt="Vito Security">
        <div class="product-info">
            <h2>Vito Security</h2>
            <p>Advanced security solutions for personal and professional protection.</p>
            <a href="products.php?type=SECURITY" class="cta-button">Explore More</a>
        </div>
    </div>
    <div class="product-type right-image">
        <div class="product-info">
            <h2>Vito Agro</h2>
            <p>Innovative agricultural tools designed to improve efficiency and productivity.</p>
            <a href="products.php?type=AGRO" class="cta-button">Explore More</a>
        </div>
        <img src="assets/produto-base-agro.webp" alt="Vito Agro">
    </div>
    <div class="product-type left-image">
        <img src="assets/produto-base-garden.webp" alt="Vito Garden">
        <div class="product-info">
            <h2>Vito Garden</h2>
            <p>High-quality gardening tools to help maintain and beautify your outdoor spaces.</p>
            <a href="products.php?type=GARDEN" class="cta-button">Explore More</a>
        </div>
    </div>
    <div class="product-type right-image">
        <div class="product-info">
            <h2>Vito Auto</h2>
            <p>Automotive tools and accessories for vehicle maintenance and repair.</p>
            <a href="products.php?type=AUTO" class="cta-button">Explore More</a>
        </div>
        <img src="assets/produto-base-auto.webp" alt="Vito Auto">
    </div>
</section>




 <!-- Map Section -->
 <section class="map-section">
        <h2>Our Location</h2>
        <div class="map-container">
            <!-- Replace with your location's embed link -->
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d493.27652647173875!2d-13.27223639935256!3d8.478735302357757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xf04c5bbd3f58045%3A0x5699c02e5c057090!2sLEEGA%20POWER%20AND%20TOOLS!5e0!3m2!1sen!2ssl!4v1736780800020!5m2!1sen!2ssl"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
