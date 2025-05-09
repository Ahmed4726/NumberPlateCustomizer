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
        }

        .plate {
            margin: -6px;
            font-size: 100px;
            font-weight: bold;
            text-align: right;
            width: 90%;
            max-width: 95%;
            position: relative;
            border-radius: 9px;
            font-family: 'Charles Wright', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 115px;
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
/* .flag-container {
    display: flex;
    position: absolute;
    left:650px;
    z-index: 100;

} */


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
    max-width: 107px;
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
            /* border: none; */
            outline: 3px solid black;
            outline-offset: -7px;
            /* display: flex; */
            /* align-items: center; */
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
            /* background: inherit; */
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



        /* .flag-container img {
            width: 100%;
            height: 100%;
        } */

        .layout-3D {
            font-weight: bold;
            color: #111;
            text-shadow: 1px 1px 1px #111,

        1px 1px 1px #111,
    1px 18px 6px rgba(16,16,16,0.4),
    1px 22px 10px rgba(16,16,16,0.2),
    /* 1px 25px 35px rgba(16,16,16,0.2), */
    1px 30px 60px rgba(16,16,16,0.4);
        }

        .layout-4D {
            font-weight: bold;
            color: black;
            text-shadow: 1px 1px 2px #444;
        }

        .layout-4D-laser {
            font-weight: bold;
            color: black;
            text-shadow: 1px 1px 2px #444;
        }

        .layout-4D-retro {
            font-weight: bold;
            color: #333;
            /* font-family: 'Courier New', monospace; */
            letter-spacing: 2px;
            text-shadow: 1px 1px 0 #fff, 2px 2px 2px rgba(0,0,0,0.5);
        }

        .layout-3D-carbon {
            font-size: 3rem;
            font-weight: 900;
            text-transform: uppercase;
            /* font-family: 'Arial Black', sans-serif; */

            /* Carbon fiber texture via diagonal stripes */
            /* background: repeating-linear-gradient(
                45deg,
                #1c1c1c 0px,
                #1c1c1c 2px,
                #2c2c2c 2px,
                #2c2c2c 4px
            ); */
            /* -webkit-background-clip: text;
            background-clip: text;
            color: transparent; */

            /* 3D effect */
            text-shadow:
                1px 1px 1px #000,
                2px 2px 2px #000,
                3px 3px 3px rgba(0,0,0,0.7),
                -1px -1px 1px rgba(255,255,255,0.1);
        }

        .bottom-line {
            position: absolute;
            bottom: 5px;
            width: 100%;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }
        .same-size {
    width: 450px;         /* Set a fixed width */
    height: auto;        /* Set a fixed height */
    object-fit: contain;  /* Ensure images scale proportionally */
}

        /* .plate.back {
        background-color: darkgoldenrod;
    } */

.plate-text {
    white-space: nowrap;
    overflow: hidden;
    /* text-overflow: ellipsis; */
    max-width: 90%;
    margin-left: inherit;
}


.plate.flag-active {
    justify-content: center;
    /* padding-left: 10px; */
    /* gap: 20px; */
    text-align: left;
    margin-left: -35px;
}

.plate:not(.flag-active) {
    justify-content: center;
    text-align: left;
}

.flag-container {
    /* width: 40px; */
    height: 100%;
    position: relative;
    display: flex;
    align-items: left;
    justify-content: center;
}

.flag-container img {
    height: 100%;
    width: auto;
    margin-left: -40px;
}

#plate_text::placeholder {
    color: rgb(25 135 84); /* greyish-black */
    opacity: 1; /* ensure it's fully visible */
  }

    </style>
<body>
    <div class="container-fluid p-0">
        <img src="images/nEW 1.jpg" alt="Banner" class="img-fluid" />
      </div>
{{-- <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
        <a href="#customizer">
            <img src="images/banner1.jpg" class="d-block" alt="..." height="500px" width="100%">
        </a>
    </div>
    <div class="carousel-item">
        <a href="#customizer">
            <img src='images/banner2.jpg' class="d-block" alt="..." height="500px" width="100%">
        </a>
    </div>
    <div class="carousel-item">
        <a href="#customizer">
            <img src='images/banner3.jpg' class="d-block" alt="..." height="500px" width="100%">
        </a>
    </div>
    <div class="carousel-item">
        <a href="#customizer">
            <img src='images/banner4.jpg' class="d-block" alt="..." height="500px" width="100%">
        </a>
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
</div> --}}
<div class="container" id="customizer">
    <div class="row" style="margin-left: 30px;">
        <div class="col-md-6">
            <div class="text-center mb-3 mt-5">
                <input type="text" id="plate_text" class="plate-input border border-success border-5" placeholder="ENTER REG" maxlength="">
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
                    <option value="eu">EV</option>
                    <option value="gb">GB</option>
                    <option value="uk">UK</option>
                </select>
            </div>

            <div class="text-center mt-3">
                <label class="form-label">CHOOSE TEXT STYLE:</label>
                <div class="btn-group d-flex flex-wrap" role="group">
                    <button type="button" class="btn btn-outline-dark btn-style btn-selected m-1" data-style="Standard">Standard</button>
                    <button type="button" class="btn btn-outline-dark btn-style m-1" data-style="4D Gel 5mm">4D Gel</button>
                    <button type="button" class="btn btn-outline-dark btn-style m-1" data-style="3D Gel 3mm">3D Gel</button>
                    <button type="button" class="btn btn-outline-dark btn-style m-1" data-style="4D Laser Cut 3mm">4D Laser Cut</button>
                    <button type="button" class="btn btn-outline-dark btn-style m-1" data-style="3D Carbon 3mm">3D Carbon</button>
                    <button type="button" class="btn btn-outline-dark btn-style m-1" data-style="4D Retro">4D Retro</button>
                </div>
            </div>

        </div>

        <div class="col-md-6 mt-4">
            <div class="" style="">
                <div class="plate-preview mt-4">
                    <div class="plate front" id="front_plate">
                        <div class="" id="front_flag"></div>
                        <span id="plate-text-flag" class="plate-text">YOUR REG</span>
                        <div class="bottom-line" id="front_bottom_line"></div>
                    </div>
                </div>

                <div class="plate-preview mt-4">
                    <div class="plate back" id="back_plate">
                        <div class="" id="back_flag"></div>
                        <span id="plate-text-flag" class="plate-text">YOUR REG</span>
                        <div class="bottom-line" id="back_bottom_line"></div>
                    </div>
                </div>

                <div class="mt-3">
                    <div style="display: flex;">
                        <!-- Text first -->

                        <!-- Image 1 -->
                        <img src="{{ asset('images/samdaysdi.gif') }}" alt="Image 1" class="mx-4" style=" width: 30%; margin-left: 5px;">

                        <!-- Image 2 -->
                        <img src="{{ asset('images/5starreview.png') }}" alt="Image 2" style="width: 55%; margin-left: 5px;">
                    </div>
                    <h4 class="mx-4 mt-5 fw-bold" style="margin: 0;">Total Price: <br><span id="total_price">£0.00</span></h4>

                    <input type="hidden" id="price_hidden" name="price_hidden">
                </div>


                <a href="#" class="btn btn-primary mt-4 mx-4" id="addToCart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
            </div>
        </div>
    </div>
</div>

</div>
<section class="testimonial-carousel container mt-5 border-top border-dark">
    <h2 class="text-center mb-4 mt-3">What Our Clients Are Saying</h2>

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner row g-0">
            <!-- First Item -->
            <div class="carousel-item active col-md-4 card p-4">
                <div class="carousel-item-content">
                    <p class="quote">"Exceptional Service and Results!"</p>
                    <p class="testimonial-text">"Working with this team has been a game changer for our business. Their expertise and commitment to quality have made a tangible difference in our operations. Highly recommend!"</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="author">— John D., CEO of Tech Solutions</p>
                </div>
            </div>
            <!-- Second Item -->
            <div class="carousel-item col-md-4 card p-4">
                <div class="carousel-item-content">
                    <p class="quote">"A Truly Personalized Experience"</p>
                    <p class="testimonial-text">"From start to finish, the entire process was smooth and tailored to our needs. The team's dedication to understanding our goals made all the difference. We're seeing incredible results!"</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="author">— Sarah L., Marketing Director at Greenfield Co.</p>
                </div>
            </div>
            <!-- Third Item -->
            <div class="carousel-item col-md-4 card p-4">
                <div class="carousel-item-content">
                    <p class="quote">"Above and Beyond Expectations"</p>
                    <p class="testimonial-text">"We were blown away by the attention to detail and the level of customer support. It’s rare to find a company that genuinely cares about your success like they do!"</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p class="author">— Mark T., Founder of Eco Enterprises</p>
                </div>
            </div>
            <!-- Fourth Item -->
            <div class="carousel-item col-md-4 card p-4">
                <div class="carousel-item-content">
                    <p class="quote">"Great Experience!"</p>
                    <p class="testimonial-text">"The team has been very professional. They understood our goals, and the final result exceeded expectations!"</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="author">— Lucy A., Project Manager at RedRock</p>
                </div>
            </div>
            <!-- Fifth Item -->
            <div class="carousel-item col-md-4 card p-4">
                <div class="carousel-item-content">
                    <p class="quote">"Top-Notch Quality!"</p>
                    <p class="testimonial-text">"Absolutely incredible service! They really know their stuff, and our project turned out perfect."</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="author">— Brian K., Director at Visionary Innovations</p>
                </div>
            </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev btn-dark" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section class="services-section container mt-5 text-center">
    <h2 class="text-center mb-4 border-bottom border-3 border-warning d-inline-block">HIGH QUALITY PLATES</h2>



    <div class="row">
        <div class="col-md-4">
            <div class="service-box">
                <img src="images/eee.png" alt="Project 1" class="img-fluid same-size">

            </div>
        </div>
        <div class="col-md-4">

            <div class="service-box">
                <img src="images/3333w.PNG" alt="Project 1" class="img-fluid same-size">

            </div>
        </div>
        <div class="col-md-4">

            <div class="service-box">
                <img src="images/4d.JPEG" alt="Project 1" class="img-fluid same-size">

            </div>
        </div>
    </div>
</section>
<section class="portfolio-section container mt-5 text-center">
    <h2 class="text-center mb-4 border-bottom border-3 border-warning d-inline-block">Our Recent Projects</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="portfolio-item">

                <img src="images/333d.JPEG" alt="Project 1" class="img-fluid same-size">

            </div>
        </div>
        <div class="col-md-4">
            <div class="portfolio-item">

                <img src="images/4ddd.JPEG" alt="Project 1" class="img-fluid same-size">

            </div>
        </div>
        <div class="col-md-4">
            <div class="portfolio-item">

                <img src="images/3eee.JPEG" alt="Project 1" class="img-fluid same-size">

            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
document.getElementById("addToCart").addEventListener("click", function (e) {
    e.preventDefault();

    let plateText = document.getElementById("plate_text").value.trim();
    let plateType = document.getElementById("plate_type").value;
    let plateBorder = document.getElementById("plate_border").value;
    let plateFlag = document.getElementById("plate_flag").value;
    let plateStyleElement = document.querySelector(".btn-style.btn-selected");
    let plateStyle = plateStyleElement ? plateStyleElement.dataset.style : null;
    let platePrice = parseFloat(document.getElementById("price_hidden").value); // Get price from hidden field

    let backPlatePromise = Promise.resolve(null);
    let frontPlatePromise = Promise.resolve(null);

    if (plateType === "rear" || plateType === "both") {
        backPlatePromise = html2canvas(document.getElementById("back_plate")).then(canvas => canvas.toDataURL("image/png"));
    }

    if (plateType === "front" || plateType === "both") {
        frontPlatePromise = html2canvas(document.getElementById("front_plate")).then(canvas => canvas.toDataURL("image/png"));
    }

    Promise.all([backPlatePromise, frontPlatePromise]).then(([back_plate, front_plate]) => {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        let cartItem = {
            plate_text: plateText,
            plate_type: plateType,
            plate_border: plateBorder,
            plate_flag: plateFlag,
            plate_style: plateStyle,
            price: platePrice, // Store price
            back_plate: back_plate,
            front_plate: front_plate,
        };

        cart.push(cartItem);
        localStorage.setItem("cart", JSON.stringify(cart));
        Swal.fire({
            title: "Success!",
            text: "Added to cart successfully!",
            icon: "success",
            showCancelButton: true,
            confirmButtonText: "Go to Cart",
            cancelButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/cart"; // Redirect to cart page
            }
        });

        updateCartUI(); // Update the cart UI after adding
    });
});

// Function to Display Cart Items
function updateCartUI() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let cartContainer = document.getElementById("cartItems");

    if (!cartContainer) return; // Ensure cart page exists

    cartContainer.innerHTML = ""; // Clear previous items

    cart.forEach((item, index) => {
        let cartItem = document.createElement("div");
        cartItem.className = "cart-item";
        cartItem.innerHTML = `
            <div>
                <strong>Plate Text:</strong> ${item.plate_text}<br>
                <strong>Type:</strong> ${item.plate_type}<br>
                <strong>Border:</strong> ${item.plate_border}<br>
                <strong>Flag:</strong> ${item.plate_flag}<br>
                <strong>Style:</strong> ${item.plate_style || "Standard"}<br>
                <strong>Price:</strong> £${item.price.toFixed(2)}<br>
                ${item.front_plate ? `<img src="${item.front_plate}" width="100">` : ""}
                ${item.back_plate ? `<img src="${item.back_plate}" width="100">` : ""}
                <button class="removeItem" data-index="${index}">Remove</button>
            </div>
        `;
        cartContainer.appendChild(cartItem);
    });

    // Remove Item Event Listener
    document.querySelectorAll(".removeItem").forEach(button => {
        button.addEventListener("click", function () {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart.splice(this.dataset.index, 1); // Remove item from cart array
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartUI(); // Refresh UI
        });
    });
}

// Ensure cart updates when the page loads
document.addEventListener("DOMContentLoaded", updateCartUI);


document.addEventListener("DOMContentLoaded", function () {
    // Check if the order has been successfully placed
    if (window.location.href.includes("order-placed")) {
        // Clear localStorage when order is placed
        localStorage.removeItem("cart"); // Adjust to your cart's key if needed
        console.log("Cart has been cleared from localStorage.");
    }
});




document.getElementById("plate_flag").addEventListener("change", function () {
    const selectedFlag = this.value;
    const frontPlate = document.getElementById("front_plate");
    const backPlate = document.getElementById("back_plate");
    const front_flag = document.getElementById("front_flag");
    const back_flag = document.getElementById("back_flag");


    if (selectedFlag !== "none") {
        fetch(`/get-flags?flag_name=${selectedFlag}`)
            .then(response => response.json())
            .then(data => {
                if (data.front_flag && data.back_flag) {
                    document.getElementById("front_flag").innerHTML =
                        `<img src="${data.front_flag}" class="flag-image">`;
                    document.getElementById("back_flag").innerHTML =
                        `<img src="${data.back_flag}" class="flag-image">`;

                    frontPlate.classList.add("flag-active");
                    back_flag.classList.add("flag-container");
                    backPlate.classList.add("flag-active");
                    front_flag.classList.add("flag-container");
                    resizePlateText();
                } else {
                    console.error("Flag data missing");
                }
            })
            .catch(error => console.error("Error fetching flags:", error));
    } else {
        document.getElementById("front_flag").innerHTML = "";
        document.getElementById("back_flag").innerHTML = "";

        frontPlate.classList.remove("flag-active");
        front_flag.classList.remove("flag-container");

        backPlate.classList.remove("flag-active");
        back_flag.classList.remove("flag-container");

    }
});

// $(document).ready(function() {
//     // Check if the flag container has any content (for demonstration, we check if the flag container has width)
//     if ($('#front_flag').width() > 0) {
//         $('#front_plate').addClass('plate-with-flag');  // Move text forward if flag exists
//     }

//     if ($('#back_flag').width() > 0) {
//         $('#back_plate').addClass('plate-with-flag');  // Move text forward if flag exists
//     }
// });

function resizePlateText() {
    // alert('ok')
    const text = $('.plate-text');
    text.each(function () {
        const $this = $(this);
        let fontSize = 100;
        $this.css({
            'font-size': fontSize + 'px',
            'white-space': 'nowrap' // force single line
        });

        while ($this[0].scrollWidth > $this.innerWidth() && fontSize > 12) {
            fontSize -= 1;
            $this.css('font-size', fontSize + 'px');
        }
    });
}





function updatePreview() {
    let plateText = $('#plate_text').val().toUpperCase();
    let bottomText = $('#bottom_line').val();
    let layout = $('.btn-style.btn-selected').attr('data-style');
    let plateType = $('#plate_type').val();
    let border = $('#plate_border').val();

    // $('.plate-text').text(plateText || 'YOUR REG');

    // Check if plateText is empty or equals 'YOUR REG', and display 'YOUR REG' accordingly
    if (plateText && plateText !== 'YOUR REG') {
        $('.plate-text').text(plateText);
        resizePlateText(); // Call resizePlateText only if plateText is not empty or 'YOUR REG'
    } else {
        $('.plate-text').text('YOUR REG');
        $('.plate-text').css('font-size', '100px'); // Set font size to 100px for 'YOUR REG' or empty text
    }
    $('.bottom-line').text(bottomText);

    $('#front_plate, #back_plate').removeClass('layout-3D layout-4D layout-4D-laser layout-3D-carbon layout-4D-retro border');

    if (layout === '3D Gel 3mm') {
        $('#front_plate, #back_plate').addClass('layout-3D');
    } else if (layout === '4D Gel 5mm') {
        $('#front_plate, #back_plate').addClass('layout-4D');
    } else if (layout === '4D Laser Cut 3mm') {
        $('#front_plate, #back_plate').addClass('layout-4D-laser');
    }  else if (layout === '4D Retro') {
        $('#front_plate, #back_plate').addClass('layout-4D-retro');
    } else if (layout === '3D Carbon 3mm') {
        $('#front_plate, #back_plate').addClass('layout-3D-carbon');
    }

    if (border === 'border') {
        $('#front_plate, #back_plate').addClass('border')
            .attr('data-bottom-text', bottomText);
        $('#front_bottom_line, #back_bottom_line').addClass('d-none');
    } else {
        $('#front_plate, #back_plate').removeAttr('data-bottom-text');
        $('#front_bottom_line, #back_bottom_line').removeClass('d-none');
    }
    // resizePlateText();

    if (plateType === 'front') {
        $('#front_plate').show();
        $('#back_plate').hide();
    } else if (plateType === 'rear') {
        $('#front_plate').hide();
        $('#back_plate').show();
    } else {
        $('#front_plate, #back_plate').show();
    }

    // setTimeout(function() {
        resizePlateText();  // Recalculate font size after DOM changes
    // }, 10); // Use a small delay to allow for DOM updates
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
function updatePrice() {
    const plateTypeSelect = document.getElementById("plate_type");
    const border = document.getElementById("plate_border").value;
    const flag = document.getElementById("plate_flag").value;
    const selectedStyle = document.querySelector(".btn-style.btn-selected").getAttribute("data-style");

    fetch(`/plate-prices?plate_type=${plateTypeSelect.value}&border=${border}&flag=${flag}&style=${selectedStyle}`)
        .then(response => response.json())
        .then(data => {
            if (data.total_price) {
                document.getElementById("total_price").innerText = `£${data.total_price.toFixed(2)}`;
                document.getElementById("price_hidden").value = data.total_price;
            }

            // Handle is_pair_only
            if (data.is_pair_only == "1" || data.is_pair_only == 1) {
                // Force "Front & Rear"
                plateTypeSelect.value = "both";

                // Disable other options
                [...plateTypeSelect.options].forEach(option => {
                    if (option.value != "both") {
                        option.disabled = true;
                    }
                });
                updatePreview();
                updatePrice();
            } else {
                // Enable all options
                [...plateTypeSelect.options].forEach(option => {
                    option.disabled = false;
                });
            }
        })
        .catch(error => console.error("Error fetching prices:", error));
}


// Listen for changes in all options
document.getElementById("plate_type").addEventListener("change", updatePrice);
document.getElementById("plate_border").addEventListener("change", updatePrice);
document.getElementById("plate_flag").addEventListener("change", updatePrice);

// Listen for text style button clicks
document.querySelectorAll(".btn-style").forEach(button => {
    button.addEventListener("click", function () {
        document.querySelectorAll(".btn-style").forEach(btn => btn.classList.remove("btn-selected"));
        this.classList.add("btn-selected");
        updatePrice();
    });
});

// Call the function on page load to set the default price
updatePrice();


updatePreview();
</script>
@endsection
