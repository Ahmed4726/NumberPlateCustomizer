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
            /* background-image: url('images/michelle-spollen-dC2FsjoXsPQ-unsplash.jpg');  */
            background-size: cover; /* Make the image cover the entire page */
            background-position: center center; /* Center the background image */
            background-attachment: fixed; /* Fix the image in place while scrolling */
            font-family: sans-serif;
        }

        /* .container {
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        } */

        .plate-preview {
            display: flex;
            justify-content: center;
            align-items: center;
            /* gap: 10px; */
        }

        .plate {
            margin: -6px;
            font-size: 100px;
            font-weight: bold;
            text-align: center;
            width: 100%;
            max-width: 100%;
            position: relative;
            border-radius: 15px;
            font-family: 'Charles Wright', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 125px;
        }

/* Medium Devices (tablets, 768px and up) */
@media (max-width: 1024px) {
    .plate {
        font-size: 80px;  /* Smaller font size for medium screens */
        margin: 0;        /* Adjust margin */
    }
}

/* Small Devices (phones, 600px and up) */
@media (max-width: 768px) {
    .plate {
        font-size: 60px;  /* Smaller font size for smaller screens */
        margin: 0;        /* Adjust margin */
    }
}

/* Extra Small Devices (phones less than 600px) */
@media (max-width: 480px) {
    .plate {
        font-size: 50px;  /* Even smaller font size for very small screens */
        margin: 0;        /* Adjust margin */
    }
}

/* Flag Container (Left Side) */
.flag-container {
    height: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    margin-top: 30px;
    margin-left: 10px;
}


/* Small Screens (Mobile) */
@media screen and (max-width: 768px) {
    .flag-container {
        width: 80px;
        height: 40%;
        margin-top: 20px;
        margin-left: 5px;
    }
}

/* Extra Small Screens (Phones) */
@media screen and (max-width: 480px) {
    .flag-container {
        width: 60px;
        height: 35%;
        margin-top: 15px;
        margin-left: 5px;
    }
}


/* Flag Image */
.flag-image {
    /* max-width: 100%; */
    height: auto;
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
            outline: 3px solid black;
            outline-offset: -12px;
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

        /* .plate.back {
        background-color: darkgoldenrod;
    } */

    </style>
<body>
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src='images/michelle-spollen-dC2FsjoXsPQ-unsplash.jpg' class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src='images/michelle-spollen-dC2FsjoXsPQ-unsplash.jpg' class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src='images/michelle-spollen-dC2FsjoXsPQ-unsplash.jpg' class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="text-center mb-3 mt-5">
                <input type="text" id="plate_text" class="plate-input" placeholder="ENTER REG" maxlength="10">
            </div>

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

            <!-- Flag Selection -->
            <div class="mt-3">
                <label class="form-label">FLAG:</label>
                <select id="plate_flag" class="form-control">
                    <option value="none">No Flag</option>
                    <option value="eu">EU</option>
                    <option value="gb">GB</option>
                    <option value="uk">UK</option>
                </select>
            </div>

            <div class="text-center mt-3">
                <label class="form-label">CHOOSE TEXT STYLE:</label>
                <div class="btn-group form-control" role="group">
                    <button type="button" class="btn btn-outline-dark btn-style btn-selected" data-style="normal">Normal</button>
                    <button type="button" class="btn btn-outline-dark btn-style" data-style="4D">4D</button>
                    <button type="button" class="btn btn-outline-dark btn-style" data-style="3D">3D</button>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="" style="padding-left: 37px; padding-right: 40px;">
                <div class="plate-preview mt-4">
                    <div class="plate front" id="front_plate">
                        <div class="flag-container" id="front_flag"></div>
                        <span class="plate-text">YOUR REG</span>
                        <div class="bottom-line" id="front_bottom_line"></div>
                    </div>
                </div>
                <div class="plate-preview mt-4">
                    <div class="plate back" id="back_plate">
                        <div class="flag-container" id="back_flag"></div>
                        <span class="plate-text ">YOUR REG</span>
                        <div class="bottom-line" id="back_bottom_line"></div>
                    </div>
                </div>
                <a href="#" class="btn btn-primary mt-4 mx-4" id="addToCart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
            </div>
        </div>
    </div>
</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>

document.getElementById("addToCart").addEventListener("click", function (e) {
    e.preventDefault();

    let plateText = document.getElementById("plate_text").value;
    let plateType = document.getElementById("plate_type").value;
    let plateBorder = document.getElementById("plate_border").value;
    let plateFlag = document.getElementById("plate_flag").value;
    let plateStyleElement = document.querySelector(".btn-style.btn-selected");
    let plateStyle = plateStyleElement ? plateStyleElement.dataset.style : null;

    let backPlatePromise = Promise.resolve(null);
    let frontPlatePromise = Promise.resolve(null);

    if (plateType == "rare" || plateType == "both") {
        backPlatePromise = html2canvas(document.getElementById("back_plate")).then(canvas => canvas.toDataURL("image/png"));
    }

    if (plateType == "front" || plateType == "both") {
        frontPlatePromise = html2canvas(document.getElementById("front_plate")).then(canvas => canvas.toDataURL("image/png"));
    }

    Promise.all([backPlatePromise, frontPlatePromise]).then(([back_plate, front_plate]) => {
        fetch("{{ route('cart.store') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                plate_text: plateText,
                plate_type: plateType,
                plate_border: plateBorder,
                plate_flag: plateFlag,
                plate_style: plateStyle,
                back_plate: back_plate,
                front_plate: front_plate
            })
        })
        .then(response => response.json())
        .then(data => {
            alert("Added to cart successfully!");
        })
        .catch(error => console.error("Error:", error));
    });
});




document.getElementById("plate_flag").addEventListener("change", function () {
        const selectedFlag = this.value;
        const flagImages = {
            eu: "/flags/eu-flag.png",
            gb: "/flags/gb-flag.png",
            uk: "/flags/uk-flag.png",
            none: ""
        };

        const frontFlag = document.getElementById("front_flag");
        const backFlag = document.getElementById("back_flag");

        if (selectedFlag !== "none") {
            frontFlag.innerHTML = `<img src="${flagImages[selectedFlag]}" class="flag-image">`;
            backFlag.innerHTML = `<img src="${flagImages[selectedFlag]}" class="flag-image">`;
               // Increase size dynamically
        const flagImgs = document.querySelectorAll(".flag-image");
        flagImgs.forEach(img => {
            img.style.width = "100%";  // Adjust width
            img.style.height = "auto";  // Maintain aspect ratio
            img.style.maxHeight = "100%";
        });
        } else {
            frontFlag.innerHTML = "";
            backFlag.innerHTML = "";
        }
    });


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
