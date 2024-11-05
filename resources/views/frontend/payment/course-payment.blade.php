<form action="{{ route('backend.course-payment.checkout') }}" method="POST">
    @csrf
    <input type="hidden" name="course_name" value="PNE Level - 1 + SNS (Zajjith Test)">
    <input type="hidden" name="course_id" value="1">
    <input type="hidden" name="payment_mode" value="payment">
    <!-- <input type="hidden" name="payment_mode" value="subscription"> -->
    <input type="hidden" name="price" value="1299.00">
    <input type="hidden" name="material_logistic_price" value="99.00">
    <!-- <input type="hidden" name="price_id" value="price_1QCalVA5RgWqgJNM1mLOXFKg"> -->
    <input type="hidden" name="material_logistic" value="Yes">
    <!-- <input type="hidden" name="material_logistic" value="No"> -->

    <button type="submit">Course Checkout</button>
</form>