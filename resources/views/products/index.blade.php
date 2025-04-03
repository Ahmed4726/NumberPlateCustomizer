@extends('layouts.dashboard_layout')
@section('content')
<!-- Product List Page -->
<div class="container mt-4">
  <h3>Product Management</h3>

  <!-- Button to trigger the "Add Product" modal -->
  {{-- <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#addProductModal">Add New Product</button> --}}

  <!-- Product Table -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="productTableBody">
      <!-- Products will be dynamically loaded here -->
      @foreach($products as $product)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>${{ $product->price }}</td>
        <td>
          <!-- Edit Button (opens the modal) -->
          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editProductModal" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-description="{{ $product->description }}" data-price="{{ $product->price }}">Edit Price</button>
          <!-- Delete Button -->
          {{-- <button class="btn btn-danger btn-sm" onclick="deleteProduct({{ $product->id }})">Delete</button> --}}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<!-- Add Product Modal -->
<div class="modal" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" class="form-control" id="productName" name="name" required>
          </div>
          <div class="form-group">
            <label for="productDescription">Description</label>
            <textarea class="form-control" id="productDescription" name="description" required></textarea>
          </div>
          <div class="form-group">
            <label for="productPrice">Price</label>
            <input type="number" class="form-control" id="productPrice" name="price" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Product</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Product Modal -->
<!-- Edit Product Modal -->
<div class="modal" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editProductForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-group">
            <label for="editProductName">Product Name</label>
            <input type="text" class="form-control" id="editProductName" name="name" required readonly>
          </div>
          <div class="form-group">
            <label for="editProductDescription">Description</label>
            <textarea class="form-control" id="editProductDescription" name="description" required></textarea>
          </div>
          <div class="form-group">
            <label for="editProductPrice">Price</label>
            <input type="number" class="form-control" id="editProductPrice" name="price" required >
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery CDN -->
<!-- jQuery CDN (make sure it is loaded first) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS CDN -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


<script>
  // Fill the Edit Product Modal with existing product data when the Edit button is clicked

  // Fill the Edit Product Modal with existing product data when the Edit button is clicked
  $('#editProductModal').on('show.bs.modal', function (event) {
    // alert('abc')
    var button = $(event.relatedTarget); // Button that triggered the modal
    var productId = button.data('id'); // Extract product id from data-* attributes
    var productName = button.data('name'); // Extract product name
    var productDescription = button.data('description'); // Extract product description
    var productPrice = button.data('price'); // Extract product price

    var modal = $(this);

    // Set the modal form values
    modal.find('.modal-body #editProductName').val(productName);
    modal.find('.modal-body #editProductDescription').val(productDescription);
    modal.find('.modal-body #editProductPrice').val(productPrice);

    // Set the form action to the correct route for editing
    modal.find('form').attr('action', '/products/' + productId);
  });



  // Function to delete a product
  function deleteProduct(productId) {
    if (confirm('Are you sure you want to delete this product?')) {
      // Make an API call or send a request to delete the product
      $.ajax({
        url: '/products/' + productId,
        method: 'DELETE',
        success: function() {
          alert('Product deleted successfully');
          location.reload();
        },
        error: function() {
          alert('An error occurred while deleting the product');
        }
      });
    }
  }
</script>
@endsection
