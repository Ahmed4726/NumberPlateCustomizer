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
    <h1>Contact Us</h1>
    <p>We'd love to hear from you! Get in touch with us.</p>
  </div>

<!-- Contact Information -->
<section class="contact-info py-5">
    <div class="container">
      <h2 class="text-center">Our Contact Details</h2>
      <p class="text-center">If you have any questions or inquiries, feel free to reach out to us. We're here to assist you!</p>
      <div class="row text-center">
        <div class="col-md-6">
          <h4>Our Address</h4>
          <p>30 Ranelagh Road, Southall, UB1 1DQ</p>
        </div>
        {{-- <div class="col-md-4">
          <h4>Phone</h4>
          <p>+1 (555) 123-4567</p>
        </div> --}}
        <div class="col-md-6">
          <h4>Email</h4>
          <p>sales@labonitaltd.co.uk</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Form -->
  <section class="contact-form py-5 bg-light">
    <div class="container">
      <h2 class="text-center">Send Us a Message</h2>
      <form method="POST" action="{{ route('contact.submit') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your Message" required></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Send Message</button>
        </div>
    </form>

    </div>
  </section>

  <!-- Map Section -->
  <section class="map-container py-5">
    <div class="container-fluid">
      <h2 class="text-center">Our Location</h2>
      <div class="row">
        <div class="col-12">
          <!-- Google Map Embed -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.092720442511!2d-0.39120322466619767!3d51.51151491040439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487672a62a7609d9%3A0x95656066ad9c35ed!2s30%20Ranelagh%20Rd%2C%20Southall%20UB1%201DQ%2C%20UK!5e0!3m2!1sen!2s!4v1743495488148!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>

@endsection


