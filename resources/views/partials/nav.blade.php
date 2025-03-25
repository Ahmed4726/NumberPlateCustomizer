  <!-- Correct Bootstrap 5 CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome CDN -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg" style="background-color: rgba(0, 0, 0, 0.05);">
  <div class="container-fluid">
  <a class="navbar-brand" href="/" style="display: inline-block;">
        <img src="images/logos.png" style="
            width: 150px; /* Adjust size */
            position: absolute;
         top:-45px;
         margin-left: 30px;
     
            z-index: 10; /* Ensure it's above other elements */
        "/>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="#">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About Us</a>
        </li>
        <!-- <li class="nav-item mx-2 mt-2">
          <a href="{{ route('login') }}"><i class='fas fa-user'></i></a>
        </li> -->
        <li class="nav-item mx-2 mt-2">
          <a href="{{ route('login') }}" class="text-dark"><i class='fas fa-shopping-cart'></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Correct Bootstrap 5 JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
