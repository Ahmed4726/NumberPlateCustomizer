<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Plate Customizer</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .plate-preview {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .plate {
            font-size: 36px;
            font-weight: bold;
            text-align: center;
            padding: 15px;
            width: 100%;
            max-width: 330px;
            position: relative;
            border-radius: 5px;
            /* border: -1px solid black;l */
        }

        .front {
            background-color: #E7E7E7;
            color: black;
        }

        .back {
            background-color: #ffb400; /* Dark Yellow */
            color: black;
        }

        .border {
    position: relative;
    border: none; /* Remove the outer border */
    outline: 1px solid black; /* Creates an inner border effect */
    outline-offset: -7px; /* Moves the outline inside the div */
}



        .plate-input, .bottom-line-input {
            width: 100%;
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            padding: 15px;
            border: 3px solid black;
            border-radius: 5px;
            outline: none;
        }

        .btn-group .btn {
            font-size: 18px;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 5px;
        }

        .btn-selected {
            background-color: black !important;
            color: white !important;
        }

        .flag-container {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 30px;
        }

        .flag-container img {
            width: 100%;
            height: 100%;
        }


        .layout-3D { text-shadow: 2px 2px 2px grey; }
        .layout-4D { text-shadow: 4px 4px 4px black; }

        .bottom-line {
            position: absolute;
            bottom: 5px;
            width: 100%;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Number Plate Customizer</h2>

    <!-- Large Input Field -->
    <div class="text-center mb-3">
        <input type="text" id="plate_text" class="plate-input" placeholder="ENTER REG" maxlength="10">
    </div>

    <!-- Dropdown Options -->
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">PLATE TYPE:</label>
            <select id="plate_type" class="form-select">
                <option value="both">Front & Rear</option>
                <option value="front">Front Only</option>
                <option value="rear">Rear Only</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">BORDER:</label>
            <select id="plate_border" class="form-select">
                <option value="none">No Border</option>
                <option value="border">Black Border</option>
            </select>
        </div>
    </div>

    <!-- Text Style Buttons -->
    <div class="text-center mt-3">
        <label class="form-label">CHOOSE TEXT STYLE:</label>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-outline-dark btn-style btn-selected" data-style="normal">Normal</button>
            <button type="button" class="btn btn-outline-dark btn-style" data-style="4D">4D</button>
            <button type="button" class="btn btn-outline-dark btn-style" data-style="3D">3D</button>
        </div>
    </div>

    <!-- Bottom Line Input -->
    <div class="text-center mt-3">
        <label class="form-label">BOTTOM LINE TEXT:</label>
        <input type="text" id="bottom_line" class="bottom-line-input" placeholder="Enter Bottom Text" maxlength="20">
    </div>

    <!-- Plate Preview -->
    <div class="plate-preview mt-4">
        <div class="plate front" id="front_plate">
            <div class="flag-container" id="front_flag"></div>
            <span class="plate-text">YOUR REG</span>
            <div class="bottom-line" id="front_bottom_line"></div>
        </div>
        <div class="plate back" id="back_plate">
            <div class="flag-container" id="back_flag"></div>
            <span class="plate-text">YOUR REG</span>
            <div class="bottom-line" id="back_bottom_line"></div>
        </div>
    </div>

    {{-- <div class="text-center mt-3">
        <button id="save" class="btn btn-dark w-100">Save Customization</button>
    </div> --}}
</div>

<script>
    function updatePreview() {
        let plateText = $('#plate_text').val().toUpperCase();
        let bottomText = $('#bottom_line').val();
        let layout = $('.btn-style.btn-selected').attr('data-style');
        let plateType = $('#plate_type').val();
        let border = $('#plate_border').val();

        $('.plate-text').text(plateText || 'YOUR REG');
        $('.bottom-line').text(bottomText);

        $('#front_plate, #back_plate').removeClass('layout-3D layout-4D border');

        if (layout === '3D') {
            $('#front_plate, #back_plate').addClass('layout-3D');
        } else if (layout === '4D') {
            $('#front_plate, #back_plate').addClass('layout-4D');
        }

        if (border === 'border') {
            $('#front_plate, #back_plate').addClass('border');
        }

        if (plateType === 'front') {
            $('#front_plate').show();
            $('#back_plate').hide();
        } else if (plateType === 'rear') {
            $('#front_plate').hide();
            $('#back_plate').show();
        } else {
            $('#front_plate, #back_plate').show();
        }
    }

    $('#plate_text, #bottom_line').on('input', updatePreview);
    $('#plate_type, #plate_border').on('change', updatePreview);

    $('.btn-style').on('click', function() {
        $('.btn-style').removeClass('btn-selected');
        $(this).addClass('btn-selected');
        updatePreview();
    });

    $('#save').on('click', function() {
        alert("Customization saved!");
    });

    updatePreview();
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
