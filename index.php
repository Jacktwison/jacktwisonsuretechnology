<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish Farming Monitoring System</title>
    <style>
        /* Global Styles */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #56ab2f, #a8e063); /* Green gradient background */
            color: #fff;
            margin-top: 80px; /* Add margin to push content below the fixed header */
        }

        header {
            position: fixed; /* Fix the header to the top */
            top: 0; /* Position it at the top of the page */
            left: 0; /* Align it to the left */
            width: 100%; /* Ensure it spans the full width of the page */
            background-color: #056674;
            padding: 20px;
            text-align: center;
            z-index: 1000; /* Ensure it stays above other content */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Optional: adds a shadow for a 3D effect */
        }

        header h1 {
            margin: 0;
            font-size: 2.5rem;
            color: #fff;
        }

        header p {
            margin: 5px 0 15px;
            font-size: 1.2rem;
            font-style: italic;
        }

        /* Main Section */
        .main-container {
            max-width: 900px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .main-container h2 {
            font-size: 2rem;
            color: #056674;
            margin-bottom: 15px;
        }

        .main-container p {
            font-size: 1.2rem;
            color: #333;
            line-height: 1.6;
        }

        /* Features Section */
        .features {
            margin: 30px 0;
            text-align: left;
        }

        .features ul {
            list-style-type: none;
            padding: 0;
        }

        .features li {
            font-size: 1.1rem;
            margin: 10px 0;
            color: #056674;
        }

        .features li::before {
            content: "✔ ";
            color: #4CAF50;
        }

        /* Continue Button */
        .continue-button {
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            font-size: 1.2rem;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: background 0.3s ease;
        }

        .continue-button:hover {
            background-color: #45a049;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Fish Farming IoT Monitoring System</h1>
        <p>Innovative solutions for sustainable fish farming</p>
    </header>
    <main>
        <div class="main-container">
            <h2>Problem Statement</h2>
            <p>Fish farming faces challenges such as dirty water and excessive heat, which can severely impact fish harvests. The lack of real-time monitoring systems makes it difficult for farm owners to address these issues promptly.</p>

            <h2>Our Solution</h2>
            <p>We have developed an **IoT-based monitoring system** that provides real-time updates on water conditions, temperature, and other critical factors. The system generates alerts to notify the farm owner of any potential risks, ensuring better fish health and higher harvest yields.</p>

            <div class="features">
                <h2>Key Features</h2>
                <ul>
                    <li>24/7 real-time monitoring of water quality and temperature.</li>
                    <li>Automatic alerts sent directly to the owner for immediate action.</li>
                    <li>Easy-to-use interface for farm management.</li>
                    <li>Scalable solution adaptable to farms of any size.</li>
                    <li>Helps improve fish survival rates and boost productivity.</li>
                </ul>
            </div>

            <a href="signup.php" class="continue-button">Continue to Signup</a>
        </div>
    </main>
</body>
</html>
