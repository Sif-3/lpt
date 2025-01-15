<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/208028108.ico">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $pageTitle; ?></title>
    <style>
        /* Add space to the top of the page content */
body {
    padding-top: 70px; /* Adjust based on the navbar height */
}


/* Logo Styling */
.logo {
    position: relative; /* Keep the logo within the navbar */
}

.logo img {
    height: 100px; /* Increase the size of the logo */
    width: auto; /* Maintain the aspect ratio */
    position: absolute; /* Allow the logo to overlap */
    top: 50%; /* Vertically center the logo */
    transform: translateY(-50%); /* Adjust for exact centering */
    
}



/* Search Bar Container Styling */
.search-bar-container {
    position: relative; /* Important for positioning the dropdown correctly */
}

/* Search Bar Styling */
.search-bar {
    display: flex;
    align-items: center;
    gap: 10px;
    background-color: #333;
    border-radius: 25px;
    padding: 5px 10px;
    max-width: 300px;
}

.search-bar input {
    flex-grow: 1;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 20px;
    outline: none;
}

.search-bar input:focus {
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    border-color: #007BFF;
}

.search-bar button {
    padding: 8px 15px;
    font-size: 14px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.search-bar button:hover {
    background-color: #0056b3;
}

/* Search Results Dropdown - Improved Readability */
#search-results {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background-color: #f4f4f4; /* Light gray background for better readability */
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: none;
    z-index: 1000;
    max-height: 200px;
    overflow-y: auto;
}

/* List of Results */
#search-results li {
    padding: 10px 15px;
    font-size: 14px; /* Adjust font size if necessary */
    color: #222; /* Darker text for better readability */
    background-color: #f4f4f4; /* Match the dropdown background */
    border-bottom: 1px solid #ddd;
    cursor: pointer;
}

#search-results li:hover {
    background-color: #007BFF; /* Blue background on hover */
    color: #fff; /* White text on hover for contrast */
}


/* List of Results */
#search-results ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

/* List of Results */
#search-results li {
    padding: 10px 15px;
    font-size: 14px; /* Adjust font size if necessary */
    color: #222; /* Darker text for better readability */
    background-color: #f4f4f4; /* Match the dropdown background */
    border-bottom: 1px solid #ddd;
    cursor: pointer;
}

#search-results li:last-child {
    border-bottom: none;
}

#search-results li:hover {
    background-color: #007BFF; /* Blue background on hover */
    color: #fff; /* White text on hover for contrast */
}
/* Navbar Styling */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background: #222;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
}

.navbar a {
    color: rgb(209, 209, 202);
    text-decoration: none;
    padding: 0 15px;
    font-size: 18px;
}

.navbar a:hover {
    color: yellow;
}

</style>
</head>
<body>
<nav class="navbar">
<div class="logo">
    <a href="index.php">
        <img src="assets/208027999-removebg.png" alt="Logo">
    </a>
</div>
    <div>
         <a href="index.php">Home</a>
        <a href="products.php">Products</a>
        <a href="services.php">Services</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
    </div>
    <div class="search-bar-container">
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Search...">
            <button id="search-button">Go</button>
        </div>
        <div id="search-results">
            <!-- Placeholder for search results -->
        </div>
    </div>

</nav>
<script>
document.getElementById("search-input").addEventListener("input", function () {
    const query = this.value.trim();
    const resultsContainer = document.getElementById("search-results");

    if (query.length > 2) {
        fetch(`search.php?q=${query}`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    resultsContainer.innerHTML = `<ul>${data.map(item => `
                        <li>
                            <a href="product_details.php?ref=${item.referencia}">
                                ${item.designWebEN} (${item.referencia})
                            </a>
                        </li>`).join('')}</ul>`;
                    resultsContainer.style.display = 'block'; // Show the dropdown
                } else {
                    resultsContainer.innerHTML = `<p>No results found</p>`;
                    resultsContainer.style.display = 'block'; // Show even if empty
                }
            })
            .catch(error => {
                console.error('Error:', error);
                resultsContainer.innerHTML = `<p>Error retrieving results</p>`;
                resultsContainer.style.display = 'block';
            });
    } else {
        resultsContainer.style.display = 'none'; // Hide the dropdown if query is too short
    }
});

// Optional: Close dropdown when clicking outside
document.addEventListener("click", function (event) {
    const searchBarContainer = document.querySelector(".search-bar-container");
    if (!searchBarContainer.contains(event.target)) {
        document.getElementById("search-results").style.display = 'none';
    }
});



</script>

</body>
