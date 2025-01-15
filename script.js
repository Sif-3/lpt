// Load environment variables (Node.js only; won't work in the browser)
if (typeof require !== 'undefined') {
    require('dotenv').config();
}

// Add any interactive features for the navbar or search bar.
document.querySelector('.search-bar button').addEventListener('click', () => {
    const query = document.querySelector('.search-bar input').value;
    alert(`You searched for: ${query}`);
});

// Get the navbar element
const navbar = document.querySelector('.navbar');

// Add a scroll event listener to the window
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        // Add the 'scrolled' class when scrolling down
        navbar.classList.add('scrolled');
    } else {
        // Remove the 'scrolled' class when at the top
        navbar.classList.remove('scrolled');
    }
});

// Fetch product data using the token
async function fetchProductData(page = 1) {
    const token = ""; // Replace with the actual token

    console.log('Fetching data with token:', token);

    try {
        const response = await fetch(`https://clientes.vito-tools.com:4040/api/v1/Cliente/Artigos?Pagina=${page}`, {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        });

        console.log('Response status:', response.status);

        if (!response.ok) {
            throw new Error(`Failed to fetch product data: ${response.status} ${response.statusText}`);
        }

        const data = await response.json();
        console.log('API Response Data:', data);
        displayProducts(data);
    } catch (error) {
        console.error('Error fetching product data:', error);
    }
}


// Display products on the page
function displayProducts(products) {
    const productsContainer = document.querySelector('#products'); // Ensure there's a container with this ID

    if (!productsContainer) {
        console.error('Products container not found in the HTML.');
        return;
    }

    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.className = 'product';
        productDiv.innerHTML = `
            <h2>${product.designWebEN || 'No Title'}</h2>
            <img src="${product.imagens ? product.imagens[0] : ''}" alt="${product.designWebEN || 'Product Image'}">
            <p>${product.descricaoCurtaEN || 'No description available'}</p>
        `;
        productsContainer.appendChild(productDiv);
    });
}

// Example usage
document.addEventListener('DOMContentLoaded', () => {
    fetchProductData(1); // Fetch the first page of product data when the page loads
});


