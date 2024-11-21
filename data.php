<?php 
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fish_feeding_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database (if POST request contains data)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ph = isset($_POST['ph']) ? $_POST['ph'] : 0;
    $turbidity = isset($_POST['turbidity']) ? $_POST['turbidity'] : 0;
    $temperature = isset($_POST['temperature']) ? $_POST['temperature'] : 0;

    $sql = "INSERT INTO sensor_data (ph, turbidity, temperature) VALUES ('$ph', '$turbidity', '$temperature')";
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch latest data from the database (this will be used to update the table)
function getLatestData() {
    global $conn;
    $result = $conn->query("SELECT * FROM sensor_data ORDER BY id DESC LIMIT 1");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return [
            'ph' => number_format($row['ph'], 2),
            'turbidity' => number_format($row['turbidity'], 2),
            'temperature' => number_format($row['temperature'], 2),
        ];
    } else {
        return [
            'ph' => "N/A",
            'turbidity' => "N/A",
            'temperature' => "N/A",
        ];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish Feeding System Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        h1 {
            color: #4CAF50;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .container {
            width: 80%;
            max-width: 900px;
            background-color: #fff;
            padding: 20px;
            margin-top: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #888;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>

    <script>
        // Function to refresh the table data via AJAX
        function refreshData() {
            // Create an AJAX request
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'index.php', true); // Request to fetch updated data
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Parse the response
                    const data = JSON.parse(xhr.responseText);
                    // Update the table content with new data
                    document.getElementById('ph').textContent = data.ph;
                    document.getElementById('turbidity').textContent = data.turbidity;
                    document.getElementById('temperature').textContent = data.temperature;
                }
            };
            xhr.send();
        }
    </script>

</head>
<body>

    <h1>Fish Feeding System Dashboard</h1>

    <div class="container">
        <h2>Latest Sensor Data</h2>
        <table>
            <tr>
                <th>pH</th>
                <th>Turbidity (NTU)</th>
                <th>Temperature (°C)</th>
            </tr>
            <tr>
                <td id="ph"><?php 
                    $data = getLatestData();
                    echo $data['ph'];
                ?></td>
                <td id="turbidity"><?php 
                    $data = getLatestData();
                    echo $data['turbidity'];
                ?></td>
                <td id="temperature"><?php 
                    $data = getLatestData();
                    echo $data['temperature'];
                ?></td>
            </tr>
        </table>

        <!-- Button to refresh data -->
        <button class="button" onclick="refreshData()">Refresh Data</button>
        <p class="message"><a href="login.php">Back</a></p>
    </div>

    <div class="footer">
        <p>&copy; 2024 Fish Feeding System | All rights reserved.</p>
    </div>

</body>
</html>

<?php
// Close the database connection after all operations are done
$conn->close();
?>
