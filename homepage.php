<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPS - Quality Wood for Your Projects</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
       * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

/* Body Styling */
body {
    background-color: #f8f9fa;
    color: #333;
    line-height: 1.6;
}

/* Header & Navigation */
header {
    background: #3e8e41;
    color: white;
    padding: 15px 20px;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    display: flex;
    align-items: center;
}

.logo i {
    font-size: 30px;
    margin-right: 10px;
}

ul {
    list-style: none;
    display: flex;
    gap: 20px;
}

ul a {
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    transition: 0.3s;
}

ul a:hover, ul a.active {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 5px;
}

        .logo {
            display: flex;
            align-items: center;
        }

        .logo i {
            font-size: 30px;
            margin-right: 10px;
        }

        ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        ul li {
            margin-right: 20px;
        }

        ul a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        ul a:hover {
            text-decoration: underline;
        }

        /* Main Section */
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        /* Section Styling */
        section {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 1000px;
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        /* Homepage Image */
        .homepage-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        /* About Us Section */
        .about-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-align: left;
            gap: 20px;
        }

        .about-text {
            flex: 1;
        }

        .about-image {
            flex: 1;
        }

        .about-image img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
        }

        /* Featured Products */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .product {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s;
        }

        .product:hover {
            transform: scale(1.05);
        }

        .product img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
            background: #f8f8f8;
        }

        /* Button Styling */
        button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #218838;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 10px;
            background: #3e8e41;
            color: white;
            width: 100%;
            margin-top: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            main {
                padding: 20px;
            }
            section {
                width: 95%;
            }
            .about-container {
                flex-direction: column;
                text-align: center;
            }
        }

        /* Ensure all sections are properly centered */
main {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    width: 100%;
}

/* Featured Products Grid */
.product-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 20px;
}

.product {
    background: white;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
    text-align: center;
    transition: transform 0.3s;
    width: 250px;
}

.product:hover {
    transform: scale(1.05);
}

.product img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 5px;
}

/* About Us Section */
.about-container {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.about-text {
    flex: 1;
    min-width: 300px;
}

.about-image {
    flex: 1;
    min-width: 300px;
}

.about-image img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 10px;
}

/* Explore Products Button */
.explore-btn {
    display: inline-block;
    padding: 12px 20px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    text-decoration: none;
    margin-top: 20px;
}

.explore-btn:hover {
    background-color: #218838;
}

/* Responsive Design */
@media (max-width: 768px) {
    .about-container {
        flex-direction: column;
        text-align: center;
    }
}

    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <i class="fas fa-tree"></i>
                <h1>LPS</h1>
            </div>
            <ul>
                <li><a href="homepage.php" class="active">Home</a></li>
                <li><a href="product-page.php">Products</a></li>
                <li><a href="login.php" class="login-btn">Login</a></li>
                <li><a href="signup.php" class="signup-btn">Sign Up</a></li>
            </ul>
        </nav>
    </header>

    <main>
    <!-- Featured Products Section (Now First) -->
    <section id="featured-products">
        <h2>Featured Products</h2>
        <div class="product-grid">
            <div class="product">
                <img src="images/oak.jpg" alt="Oak Wood">
                <h3>Oak Wood</h3>
            </div>
            <div class="product">
                <img src="images/darkwood.jpg" alt="Dark Wood">
                <h3>Dark Wood</h3>
            </div>
            <div class="product">
                <img src="images/redwood.jpg" alt="Redwood">
                <h3>Redwood</h3>
            </div>
            <div class="product">
                <img src="images/birch.jpg" alt="Birch">
                <h3>Birch Wood</h3>
            </div>
            <div class="product">
                <img src="images/maple.jpg" alt="Maple Wood">
                <h3>Maple Wood</h3>
            </div>
            <div class="product">
                <img src="images/mahogany.jpg" alt="Mahogany">
                <h3>Mahogany</h3>
            </div>
        </div>
    </section>

    <!-- About Us Section (Now Second) -->
    <section id="about">
        <h2>About Us</h2>
        <div class="about-container">
            <div class="about-text">
                <p>At <strong>Lumber Purchasing System (LPS)</strong>, we provide high-quality lumber for builders, carpenters, and DIY enthusiasts. Our wood selection includes oak, pine, maple, and more.</p>
                <p>We focus on sustainability and top-grade materials to ensure durability and excellence in every project.</p>
                <p><strong>Why Choose Us?</strong></p>
                <ul>
                    <li>✅ <strong>Premium Quality</strong>: Hand-selected wood.</li>
                    <li>✅ <strong>Expert Guidance</strong>: Our team helps you find the right materials.</li>
                    <li>✅ <strong>Eco-Friendly Practices</strong>: Sustainable sourcing.</li>
                </ul>
            </div>
            <div class="about-image">
                <img src="images/display.jpg" alt="Lumber Haven Warehouse">
            </div>
        </div>
    </section>

    <!-- Explore Products Section (Now Last) -->
    <section id="explore-products">
        <h2>Find the Perfect Lumber for Your Project</h2>
        <p>Your trusted supplier for high-quality wood products.</p>
        <a href="product-page.php" class="explore-btn">Explore Products</a>
    </section>
</main>


    <footer>
        <p>&copy; 2025 Lumber Haven. All rights reserved.</p>
    </footer>
</body>
</html>
