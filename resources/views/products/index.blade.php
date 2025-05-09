@extends('layouts.dashboard_layout')
@section('content')
<!-- Product List Page -->
<div class="container mt-4">
  <h3>Product Management</h3>

  <!-- Product Table -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Pair Price</th>
        <th>Front Price</th>
        <th>Back Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="productTableBody">
      @foreach($products as $product)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>${{ $product->pair_price }}</td>
        <td>${{ $product->front_plate_price }}</td>
        <td>${{ $product->back_plate_price }}</td>
        <td>
          <button class="btn btn-info btn-sm"
            data-toggle="modal"
            data-target="#editProductModal"
            data-id="{{ $product->id }}"
            data-name="{{ $product->name }}"
            data-description="{{ $product->description }}"
            data-pair_price="{{ $product->pair_price }}"
            data-front_price="{{ $product->front_plate_price }}"
            data-back_price="{{ $product->back_plate_price }}">
            Edit Price
          </button>
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
            <label for="productPrice">Pair Price</label>
            <input type="number" class="form-control" id="productPrice" name="price" required>
          </div>
          <div class="form-group">
            <label for="frontPlatePrice">Front Plate Price</label>
            <input type="number" class="form-control" id="frontPlatePrice" name="front_plate_price" required>
          </div>
          <div class="form-group">
            <label for="backPlatePrice">Back Plate Price</label>
            <input type="number" class="form-control" id="backPlatePrice" name="back_plate_price" required>
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
            <label for="editProductPrice">Pair Price</label>
            <input type="text" class="form-control" id="editProductPrice" name="price" required>
          </div>
          <div class="form-group">
            <label for="editFrontPrice">Front Plate Price</label>
            <input type="text" class="form-control" id="editFrontPrice" name="front_plate_price" required>
          </div>
          <div class="form-group">
            <label for="editBackPrice">Back Plate Price</label>
            <input type="text" class="form-control" id="editBackPrice" name="back_plate_price" required>
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

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
  $('#editProductModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var productId = button.data('id');
    var productName = button.data('name');
    var productDescription = button.data('description');
    var pairPrice = button.data('pair_price');
    var frontPrice = button.data('front_price');
    var backPrice = button.data('back_price');

    var modal = $(this);
    modal.find('#editProductName').val(productName);
    modal.find('#editProductDescription').val(productDescription);
    modal.find('#editProductPrice').val(pairPrice);
    modal.find('#editFrontPrice').val(frontPrice);
    modal.find('#editBackPrice').val(backPrice);

    modal.find('form').attr('action', '/products/' + productId);
  });

  function deleteProduct(productId) {
    if (confirm('Are you sure you want to delete this product?')) {
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
