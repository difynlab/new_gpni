<form action="{{ route('backend.product-payment.checkout') }}" method="POST">
    @csrf
    <input type="hidden" name="products[]" value='1'>
    <input type="hidden" name="quantities[]" value='3'>

    <input type="hidden" name="products[]" value='2'>
    <input type="hidden" name="quantities[]" value='6'>


    <button type="submit">Checkout</button>
</form>