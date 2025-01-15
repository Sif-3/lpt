<?php
include 'config.php';

// api_helper.php updates
function fetchCachedProductData() {
    $cacheFile = 'cache/products.json'; // Unified cache file
    $cacheTime = 3600; // Cache for 1 hour

    // Check if cache exists and is valid
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
        return json_decode(file_get_contents($cacheFile), true);
    }

    // Fetch data from API (only page 1 initially for quick load)
    $allData = [];
    for ($page = 1; $page <= 10; $page++) { // Example: Fetch first 10 pages
        $data = fetchProductDataFromAPI($page);
        if (!$data) break;
        $allData = array_merge($allData, $data);
    }

    // Save data to cache
    if (!file_exists('cache')) {
        mkdir('cache', 0777, true); // Create cache directory
    }
    file_put_contents($cacheFile, json_encode($allData));

    return $allData;
}

function fetchProductDataFromAPI($page) {
    $url = API_BASE_URL . "?Pagina=$page";
    $headers = ["Authorization: Bearer " . API_TOKEN];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code !== 200) {
        return null; // Log errors if needed
    }
    return json_decode($response, true);
}

