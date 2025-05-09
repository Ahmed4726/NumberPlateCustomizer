<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Number Plate with Flag</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: #f3f3f3;
        }

        .plate-container {
            display: flex;
            align-items: center;
            width: fit-content;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .flag-container {
            width: 70px;
            height: 130px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
        }

        .flag-container img {
            max-width: 90%;
            max-height: 90%;
        }

        .plate-box {
            background: white;
            border: 3px solid black;
            height: 130px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 30px;
        }

        .plate-box.rear {
            background: #f9d900; /* Yellow for rear plate */
        }

        .plate-text {
            font-size: 100px;
            font-weight: bold;
            letter-spacing: 10px;
            white-space: nowrap;
        }

        h3 {
            margin: 10px 0 5px;
            font-weight: normal;
        }
    </style>
</head>
<body>

    <h3>Front Plate</h3>
    <div class="plate-container">
        <div class="flag-container">
            <img src="https://upload.wikimedia.org/wikipedia/en/a/ae/Flag_of_the_United_Kingdom.svg" alt="Flag">
        </div>
        <div class="plate-box">
            <div class="plate-text">YOUR REG</div>
        </div>
    </div>

    <h3>Rear Plate</h3>
    <div class="plate-container">
        <div class="flag-container">
            <img src="https://upload.wikimedia.org/wikipedia/en/a/ae/Flag_of_the_United_Kingdom.svg" alt="Flag">
        </div>
        <div class="plate-box rear">
            <div class="plate-text">YOUR REG</div>
        </div>
    </div>

</body>
</html>
