@extends('layouts.f_layout')
@section('content')
  
  <style>
    .section-title {
      text-align: center;
      margin-bottom: 30px;
    }
    .team-member img {
      border-radius: 50%;
      width: 150px;
      height: 150px;
      object-fit: cover;
    }
    .team-member {
      text-align: center;
      margin-bottom: 30px;
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


<div class="top-banner">
    <h1>About Us</h1>
    <p>We are a passionate team dedicated to providing quality solutions and services.</p>
  </div>

  <!-- Our Mission -->
  <section id="mission" class="py-5">
    <div class="container">
        <div class="row">
<div class="col-md-6">
<h2 class="section-title">Our Mission</h2>
      <p class="lead">
        Our mission is to create impactful experiences that enrich the lives of our customers and partners. We are driven by innovation, teamwork, and a commitment to excellence.
      </p>
</div>
<div class="col-md-6">
        <img src="images/about.jpeg" alt="Our Mission Image" class="img-fluid rounded" width="65%" height="auto">
</div>
        </div>
     
    </div>
  </section>

  <!-- Our Values -->
  <section id="values" class="bg-light py-5">
    <div class="container">
      <h2 class="section-title">Our Values</h2>
      <div class="row">
        <div class="col-md-4">
          <h4>Integrity</h4>
          <p>We hold ourselves to the highest ethical standards, delivering on promises and maintaining honesty in all our endeavors.</p>
        </div>
        <div class="col-md-4">
          <h4>Innovation</h4>
          <p>We embrace creativity and forward-thinking, ensuring that we stay ahead of the curve in providing solutions that matter.</p>
        </div>
        <div class="col-md-4">
          <h4>Customer-Centricity</h4>
          <p>Our focus is on providing exceptional service and building lasting relationships with our customers based on trust and mutual respect.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section id="team" class="py-5">
    <div class="container">
      <h2 class="section-title">Meet Our Team</h2>
      <div class="row">
        <!-- Team Member 1 -->
        <div class="col-md-4 team-member">
          <img src="images/about.jpeg" alt="Team Member 1">
          <h4>John Doe</h4>
          <p>CEO & Founder</p>
        </div>
        <!-- Team Member 2 -->
        <div class="col-md-4 team-member">
          <img src="images/about.jpeg" alt="Team Member 2">
          <h4>Jane Smith</h4>
          <p>Chief Technology Officer</p>
        </div>
        <!-- Team Member 3 -->
        <div class="col-md-4 team-member">
          <img src="images/about.jpeg" alt="Team Member 3">
          <h4>Emily Johnson</h4>
          <p>Marketing Director</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonial Carousel Section -->
  <section id="testimonials" class="py-5 bg-light">
    <div class="container">
      <h2 class="section-title">What Our Clients Say</h2>
      
      <!-- Testimonial Carousel -->
      <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <!-- Testimonial 1 -->
          <div class="carousel-item active">
            <blockquote class="blockquote">
              <p class="text-center">"Their services are exceptional! We couldn’t be happier with the results."</p>
              <footer class="blockquote-footer text-center">David W., <cite title="Source Title">CEO, Company ABC</cite></footer>
            </blockquote>
          </div>
          <!-- Testimonial 2 -->
          <div class="carousel-item">
            <blockquote class="blockquote">
              <p class="text-center">"An incredible team that always goes above and beyond. Highly recommended!"</p>
              <footer class="blockquote-footer text-center">Sarah M., <cite title="Source Title">Director, XYZ Corp</cite></footer>
            </blockquote>
          </div>
          <!-- Testimonial 3 -->
          <div class="carousel-item">
            <blockquote class="blockquote">
              <p class="text-center">"They delivered on time and exceeded our expectations. A top-tier company."</p>
              <footer class="blockquote-footer text-center">Mike L., <cite title="Source Title">Founder, Tech Innovators</cite></footer>
            </blockquote>
          </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>

@endsection


