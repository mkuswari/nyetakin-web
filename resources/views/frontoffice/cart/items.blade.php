@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nama Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        {{-- set detault value for total price --}}
        @php
            $subTotal = 0;
        @endphp
        @foreach ($carts as $cart)
            <tr>
                <td>
                    <div class="media">
                        <div class="d-flex">
                            <img src="{{ asset('uploads/products/' . $cart->product->thumbnail) }}"
                                class="cart-item-thumbnail" />
                        </div>
                        <div class="media-body">
                            <p>{{ $cart->product->name }}</p>
                        </div>
                    </div>
                </td>
                <td>
                    <h5>Rp. {{ number_format($cart->product->selling_price) }}</h5>
                </td>
                <td>
                    <div class="product_count">
                        <button type="button" class="btn btn-info btn-sm shadow btn-update qty-minus"
                            data-cart="{{ $cart->id }}"> <i class="ti-angle-down"></i></button>
                        <input type="text" value="{{ $cart->quantity }}" min="1" max="{{ $cart->product->stock }}"
                            readonly>
                        <button type="button" class="btn btn-info btn-sm shadow btn-update qty-plus"
                            data-cart="{{ $cart->id }}"> <i class="ti-angle-up"></i></button>
                        <form action="{{ route('cart.delete', [$cart->id]) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Hapus {{ $cart->product->name }} dari Keranjang Belanja?')">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm shadow btn-delete"> <i
                                    class="ti-trash"></i></button>
                        </form>
                    </div>
                </td>
                <td>
                    <h5>Rp. {{ number_format($cart->product->selling_price * $cart->quantity) }}</h5>
                </td>
            </tr>
            {{-- get subtotal price from bellow formulas --}}
            @php
                $subTotal = $subTotal + $cart->product->selling_price * $cart->quantity;
            @endphp
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td>
                <h5>Subtotal</h5>
            </td>
            <td>
                {{-- print subtotal using number format to get currency format --}}
                <h5>Rp. {{ number_format($subTotal) }}</h5>
            </td>
        </tr>

    </tbody>
</table>
