@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nama Produk</th>
            <th scope="col" width="450">Deskripsi Singkat</th>
            <th scope="col">Harga</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($wishlists as $wishlist)
            <tr>
                <td>
                    <div class="media">
                        <div class="d-flex">
                            <img src="{{ asset('uploads/products/' . $wishlist->product->thumbnail) }}"
                                class="cart-item-thumbnail" />
                        </div>
                        <div class="media-body">
                            <a href="{{ url('/product', [$wishlist->product->slug]) }}">
                                <p>{{ $wishlist->product->name }}</p>
                            </a>
                        </div>
                    </div>
                </td>
                <td>
                    <small>{{ $wishlist->product->short_description }}</small>
                </td>
                <td>
                    <p>Rp. {{ number_format($wishlist->product->selling_price) }}</p>
                </td>
                <td>
                    <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" class="form-control" name="product_id"
                            value="{{ $wishlist->product_id }}">
                        <input type="hidden" class="form-control" name="quantity" value="1">
                        <button type="submit" class="btn btn-success btn-sm shadow"><i class="ti-shopping-cart"></i>Add
                            To
                            Cart</button>
                    </form>
                    <form action="{{ route('wishlist.delete', [$wishlist->id]) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Hapus {{ $wishlist->product->name }} dari Wishlist?')">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-sm shadow btn-delete"> <i
                                class="ti-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
