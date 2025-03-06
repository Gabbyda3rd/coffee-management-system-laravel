@extends('layouts.app')

@section('content')
{{-- Notification Success --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        setTimeout(() => {
            document.querySelector('.alert').remove();
        }, 3000);
    </script>
@endif

<div class="container mt-4">
    <h2 class="text-center mb-4">Our Coffee Menu</h2>
    <div class="row">
        @foreach ($coffees as $coffee)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    {{-- <img src="https://source.unsplash.com/300x200/?coffee" class="card-img-top" alt="Coffee"> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $coffee->name }}</h5>
                        <p class="card-text">{{ $coffee->description }}</p>
                        <p class="fw-bold text-success">${{ number_format($coffee->price, 2) }}</p>
                        
                        <!-- Modified Form: Triggers Modal Instead of Direct Submit -->
                        <form id="orderForm-{{ $coffee->id }}" action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="coffee_id" value="{{ $coffee->id }}">
                            <input type="hidden" name="hidden_coffee_name" value="{{ $coffee->name }}">
                            <input type="hidden" name="hidden_price" value="{{ $coffee->price }}">
                            <input type="number" name="quantity" id="quantity-{{ $coffee->id }}" value="1" min="1" class="form-control mb-2">
                            
                            <!-- Instead of submitting, trigger the modal -->
                            <button type="button" class="btn btn-primary w-100" onclick="showConfirmation('{{ $coffee->id }}')">Order Now</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Order Confirmation Modal -->
<div class="modal fade" id="orderConfirmationModal" tabindex="-1" aria-labelledby="orderConfirmationLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="orderConfirmationLabel">Confirm Your Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Coffee:</strong> <span id="coffeeName"></span></p>
                <p><strong>Quantity:</strong> <span id="coffeeQuantity"></span></p>
                <p><strong>Total Price:</strong> $<span id="totalPrice"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="confirmOrderButton">Confirm Order</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Handle Modal and Order Submission -->
<script>
function showConfirmation(coffeeId) {
    // Get values from selected coffee card
    let coffeeName = document.querySelector(`#orderForm-${coffeeId} input[name="hidden_coffee_name"]`).value;
    let coffeePrice = parseFloat(document.querySelector(`#orderForm-${coffeeId} input[name="hidden_price"]`).value);
    let quantity = parseInt(document.getElementById(`quantity-${coffeeId}`).value);
    let totalPrice = coffeePrice * quantity;

    // Set modal values
    document.getElementById("coffeeName").innerText = coffeeName;
    document.getElementById("coffeeQuantity").innerText = quantity;
    document.getElementById("totalPrice").innerText = totalPrice.toFixed(2);

    // Store form ID for submission later
    document.getElementById("confirmOrderButton").setAttribute("data-form-id", `orderForm-${coffeeId}`);

    // Show modal
    var myModal = new bootstrap.Modal(document.getElementById('orderConfirmationModal'));
    myModal.show();
}

// When confirm button is clicked, submit the correct form
document.getElementById("confirmOrderButton").addEventListener("click", function() {
    let formId = this.getAttribute("data-form-id");
    document.getElementById(formId).submit();
});
</script>

@endsection
