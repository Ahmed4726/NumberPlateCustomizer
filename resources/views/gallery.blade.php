@extends('layouts.f_layout')
@section('content')
  <style>
    .gallery-item {
      position: relative;
      overflow: hidden;
      cursor: pointer;
    }
    .gallery-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease-in-out;
    }
    .gallery-item:hover img {
      transform: scale(1.1);
    }
    .modal-content {
      max-width: 90%;
      max-height: 90%;
    }
    /* Banner Style */
    .top-banner {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 10px 0;
      font-size: 20px;
      font-weight: bold;
    }
     /* Banner Style with Background Image */
     .top-banner {
      background-image: url('images/about.jpeg'); /* Replace with your image URL */
      background-size: cover;
      background-position: center;
      color: #fff;
      text-align: center;
      padding: 100px 0;  /* Adjust the padding for vertical spacing */
      font-size: 40px;
      font-weight: bold;
    }
    .top-banner h1 {
      font-size: 60px;
      margin: 0;
    }
    .top-banner p {
      font-size: 20px;
      margin-top: 10px;
    }
  </style>


  <!-- Gallery Header Section -->
  <!-- <header class="bg-dark text-white text-center py-5">
    <h1>Our Gallery</h1>
    <p>Browse through our image collection</p>
  </header> -->
  <div class="top-banner">
    <h1>Our Gallery</h1>
    <p>Browse through our image collection</p>
  </div>
  <!-- Gallery Section -->
  <section id="gallery" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Image Gallery</h2>
      <div class="row g-4">
        <!-- Gallery Item 1 -->
        <div class="col-md-4 col-sm-6">
          <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img-src="https://via.placeholder.com/500x300?text=Image+1">
            <img src="images/michelle-spollen-dC2FsjoXsPQ-unsplash.jpg" class="img-fluid" alt="Image 1">
          </div>
        </div>
        <!-- Gallery Item 2 -->
        <div class="col-md-4 col-sm-6">
          <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img-src="https://via.placeholder.com/500x300?text=Image+2">
            <img src="images/michelle-spollen-dC2FsjoXsPQ-unsplash.jpg" class="img-fluid" alt="Image 2">
          </div>
        </div>
        <!-- Gallery Item 3 -->
        <div class="col-md-4 col-sm-6">
          <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img-src="https://via.placeholder.com/500x300?text=Image+3">
            <img src="images/michelle-spollen-dC2FsjoXsPQ-unsplash.jpg" class="img-fluid" alt="Image 3">
          </div>
        </div>
        <!-- Gallery Item 4 -->
        <div class="col-md-4 col-sm-6">
          <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img-src="https://via.placeholder.com/500x300?text=Image+4">
            <img src="images/michelle-spollen-dC2FsjoXsPQ-unsplash.jpg" class="img-fluid" alt="Image 4">
          </div>
        </div>
        <!-- Gallery Item 5 -->
        <div class="col-md-4 col-sm-6">
          <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img-src="https://via.placeholder.com/500x300?text=Image+5">
            <img src="images/michelle-spollen-dC2FsjoXsPQ-unsplash.jpg" class="img-fluid" alt="Image 5">
          </div>
        </div>
        <!-- Gallery Item 6 -->
        <div class="col-md-4 col-sm-6">
          <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img-src="https://via.placeholder.com/500x300?text=Image+6">
            <img src="images/michelle-spollen-dC2FsjoXsPQ-unsplash.jpg" class="img-fluid" alt="Image 6">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Modal -->
  <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center">
          <img id="modalImage" src="" class="img-fluid" alt="Modal Image">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom Script to Handle Modal Image -->
  <script>
    const galleryItems = document.querySelectorAll('.gallery-item');
    galleryItems.forEach(item => {
      item.addEventListener('click', () => {
        const imageSrc = item.getAttribute('data-bs-img-src');
        const modalImage = document.getElementById('modalImage');
        modalImage.src = imageSrc;
      });
    });
  </script>
@endsection
