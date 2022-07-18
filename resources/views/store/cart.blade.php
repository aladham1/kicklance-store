<x-front-layout title="Cart">
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
        <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
            <li class="active">
                <a href="cart.html">Shopping Cart</a>
            </li>
            <li>
                <a href="checkout.html">Checkout</a>
            </li>
            <li class="disabled">
                <a href="cart.html">Order Complete</a>
            </li>
        </ul>

        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table-container">

                    <form action="{{route('cart.update')}}" method="post">
                        @csrf
                        @method('PUT')
                    <table class="table table-cart">
                        <thead>
                        <tr>
                            <th class="thumbnail-col"></th>
                            <th class="product-col">Product</th>
                            <th class="price-col">Price</th>
                            <th class="qty-col">Quantity</th>
                            <th class="text-right">Subtotal</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($cart as $item)
                            <tr class="product-row">
                                <td>

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="{{$item->product->image_url}}"
                                                 alt="{{$item->product->title}}">
                                        </a>

                                        <a href="{{route('cart.item.destroy', $item->id)}}"
                                           class="btn-remove icon-cancel"
                                           title="Remove Product"></a>
                                    </figure>
                                </td>
                                <td class="product-col">
                                    <h5 class="product-title">
                                        <a href="{{route('products.show', $item->product->id)}}">
                                            {{$item->product->title}}</a>
                                    </h5>
                                </td>
                                <td>${{$item->product->price}}</td>
                                <td>
                                    <div class="product-single-qty">
                                        <input class="horizontal-quantity form-control"
                                               name="items[{{$item->id}}]"
                                               value="{{$item->quantity}}"
                                               type="text">
                                    </div><!-- End .product-single-qty -->
                                </td>
                                <td class="text-right"><span class="subtotal-price">$
                                    {{$item->product->price * $item->quantity}}</span></td>
                            </tr>
                        @endforeach

                        </tbody>


                        <tfoot>
                        <tr>
                            <td colspan="5" class="clearfix">

                                <div class="float-right">
                                    <div class="cart-discount">
{{--                                        <form action="#">--}}
{{--                                            <div class="input-group">--}}
{{--                                                <input type="text" class="form-control form-control-sm"--}}
{{--                                                       placeholder="Coupon Code" required>--}}
{{--                                                <div class="input-group-append">--}}
{{--                                                    <button class="btn btn-sm" type="submit">Apply--}}
{{--                                                        Coupon--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                            </div><!-- End .input-group -->--}}
{{--                                        </form>--}}
                                    </div>
                                </div><!-- End .float-left -->
                                    <button type="submit" class="btn btn-shop
                                    btn-update-cart">
                                        Update Cart
                                    </button>



                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    </form>
                </div><!-- End .cart-table-container -->
                <form action="{{route('cart.destroy')}}"
                      method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="btn   btn-danger">
                        Delete Cart
                    </button>
                </form>
            </div><!-- End .col-lg-8 -->

            <div class="col-lg-4">
                <div class="cart-summary">
                    <h3>CART TOTALS</h3>

                    <table class="table table-totals">
                        <tbody>
                        <tr>
                            <td>Subtotal</td>
                            <td>${{$total}}</td>
                        </tr>


                        </tbody>

                        <tfoot>
                        <tr>
                            <td>Total</td>
                            <td>${{$total}}</td>
                        </tr>
                        </tfoot>
                    </table>

                    <div class="checkout-methods">
                        <a href="{{route('checkout')}}" class="btn btn-block btn-dark">Proceed to Checkout
                            <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div><!-- End .cart-summary -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->

</x-front-layout>
