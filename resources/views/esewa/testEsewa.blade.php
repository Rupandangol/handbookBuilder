<form method="POST" action="{{ route('checkout.payment.esewa.process', $order->id) }}">

    @csrf

    <button class="btn btn-primary" type="submit">
        ${{ $order->amount }} Pay with eSewa
    </button>
</form>
