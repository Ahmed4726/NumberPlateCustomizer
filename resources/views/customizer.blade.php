@extends('layouts.f_layout')
@section('content')
    <style>
        @font-face {
            font-family: 'Charles Wright';
            src: url('fonts/CharlesWright-Bold.woff') format('woff'),
                url('fonts/CharlesWright-Bold.woff2') format('woff2');
            font-weight: normal;
            font-style: normal;
        }
        body {
            background-color: #f8f9fa;
            background-image: url('images/michelle-spollen-dC2FsjoXsPQ-unsplash.jpg'); /* Add your image path here */
            background-size: cover; /* Make the image cover the entire page */
            background-position: center center; /* Center the background image */
            background-attachment: fixed; /* Fix the image in place while scrolling */
            font-family: sans-serif;
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
            font-family: 'Charles Wright', sans-serif;
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
            border: none;
            outline: 1px solid black;
            outline-offset: -7px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .border::after {
            content: attr(data-bottom-text);
            position: absolute;
            bottom: 0px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 5px;
            font-family: "Charles Wright";
            color: black;
            background: inherit;
            padding: 2px 6px;
            border-radius: 4px;
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

        .layout-3D {
            color: rgb(0, 0, 0);
            text-shadow:
                1px 1px 2px rgba(0, 0, 0, 0.7),
                -1px -1px 2px rgba(255, 255, 255, 0.5);
        }

        .layout-4D {
            text-shadow: 2px 2px 2px gray;
        }

        .bottom-line {
            position: absolute;
            bottom: 5px;
            width: 100%;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
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
            <select id="plate_type" class="form-control">
                <option value="both">Front & Rear</option>
                <option value="front">Front Only</option>
                <option value="rear">Rear Only</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">BORDER:</label>
            <select id="plate_border" class="form-control">
                <option value="none">No Border</option>
                <option value="border">Black Border</option>
            </select>
        </div>
    </div>

    <!-- Text Style Buttons -->
    <div class="text-center mt-3">
        <label class="form-label">CHOOSE TEXT STYLE:</label>
        <div class="btn-group form-control" role="group">
            <button type="button" class="btn btn-outline-dark btn-style btn-selected" data-style="normal">Normal</button>
            <button type="button" class="btn btn-outline-dark btn-style" data-style="4D">4D</button>
            <button type="button" class="btn btn-outline-dark btn-style" data-style="3D">3D</button>
        </div>
    </div>

    <!-- Plate Preview -->
    <div class="plate-preview mt-4">
        <div class="plate front" id="front_plate">
            <div class="flag-container" id="front_flag"></div>
            <span class="plate-text">YOUR REG</span>
            <div class="bottom-line"  id="front_bottom_line"></div>
        </div>
        <div class="plate back" id="back_plate">
            <div class="flag-container" id="back_flag"></div>
            <span class="plate-text">YOUR REG</span>
            <div class="bottom-line" id="back_bottom_line"></div>
        </div>
    </div>
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
        $('#front_plate, #back_plate').addClass('border')
            .attr('data-bottom-text', bottomText);
        $('#front_bottom_line, #back_bottom_line').addClass('d-none');
    } else {
        $('#front_plate, #back_plate').removeAttr('data-bottom-text');
        $('#front_bottom_line, #back_bottom_line').removeClass('d-none');
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
@endsection
