<?php
// Load sensor data
$sensorData = file_get_contents("sensor_data.txt");
$dataLines = explode("\n", $sensorData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Sensor Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: LightSeaGreen;
            text-align: center;
        }
        .card {
            display: inline-block;
            margin: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h1>Real-Time Sensor Dashboard</h1>
    <div class="card">
        <h2>pH</h2>
        <p><?php echo $dataLines[0]; ?></p>
    </div>
    <div class="card">
        <h2>Turbidity (NTU)</h2>
        <p><?php echo $dataLines[1]; ?></p>
    </div>
    <div class="card">
        <h2>Temperature (°C)</h2>
        <p><?php echo $dataLines[2]; ?></p>
    </div>
</body>
</html>
