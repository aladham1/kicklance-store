<x-front-layout title="Cart">
    <div class="container checkout-container">
        <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
            <li>
                <a href="cart.html">Shopping Cart</a>
            </li>
            <li class="active">
                <a href="checkout.html">Checkout</a>
            </li>
            <li class="disabled">
                <a href="#">Order Complete</a>
            </li>
        </ul>

        <div class="login-form-container">
            <h4>Returning customer?
                <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne" class="btn btn-link btn-toggle">Login
                </button>
            </h4>

            <div id="collapseOne" class="collapse">
                <div class="login-section feature-box">
                    <div class="feature-box-content">
                        <form action="#" id="login-form">
                            <p>
                                If you have shopped with us before, please enter your details below. If you are a new
                                customer, please proceed to the Billing & Shipping section.
                            </p>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-0 pb-1">Username or email <span
                                                class="required">*</span></label>
                                        <input type="email" class="form-control" required/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-0 pb-1">Password <span
                                                class="required">*</span></label>
                                        <input type="password" class="form-control" required/>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn">LOGIN</button>

                            <div class="form-footer mb-1">
                                <div class="custom-control custom-checkbox mb-0 mt-0">
                                    <input type="checkbox" class="custom-control-input" id="lost-password"/>
                                    <label class="custom-control-label mb-0" for="lost-password">Remember
                                        me</label>
                                </div>

                                <a href="forgot-password.html" class="forget-password">Lost your password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="checkout-discount">
            <h4>Have a coupon?
                <button data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                        aria-controls="collapseOne" class="btn btn-link btn-toggle">ENTER YOUR CODE
                </button>
            </h4>

            <div id="collapseTwo" class="collapse">
                <div class="feature-box">
                    <div class="feature-box-content">
                        <p>If you have a coupon code, please apply it below.</p>

                        <form action="#">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm w-auto" placeholder="Coupon code"
                                       required=""/>
                                <div class="input-group-append">
                                    <button class="btn btn-sm mt-0" type="submit">
                                        Apply Coupon
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{route('checkout')}}" method="post" id="checkout-form">
            @csrf
        <div class="row">
            <div class="col-lg-7">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach()
                        </ul>
                    </div>
                @endif
                <ul class="checkout-steps">
                    <li>
                        <h2 class="step-title">Billing details</h2>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First name
                                            <abbr class="required" title="required">*</abbr>
                                        </label>
                                        <input type="text" name="first_name" class="form-control" required/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last name
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="last_name" class="form-control" required/>
                                    </div>
                                </div>
                            </div>


                            <div class="select-custom">
                                <label>Country
                                    <abbr class="required" title="required">*</abbr></label>
                                <select name="country" class="form-control">
                                    <option value="" selected="selected">Vanuatu
                                    </option>
                                    <option value="1">Brunei</option>
                                    <option value="2">Bulgaria</option>
                                    <option value="3">Burkina Faso</option>
                                    <option value="4">Burundi</option>
                                    <option value="5">Cameroon</option>
                                </select>
                            </div>

                            <div class="form-group mb-1 pb-2">
                                <label>Street address
                                    <abbr class="required" title="required">*</abbr></label>
                                <input type="text" name="street_address" class="form-control"
                                       placeholder="House number and street name" required/>
                            </div>


                            <div class="form-group">
                                <label>Town / City
                                    <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="form-control" name="city" required/>
                            </div>


                            <div class="form-group">
                                <label>Postcode / Zip
                                    <abbr class="required" title="required">*</abbr></label>
                                <input type="text" name="zip" class="form-control" required/>
                            </div>

                            <div class="form-group">
                                <label>Phone <abbr class="required" title="required">*</abbr></label>
                                <input type="tel" name="phone" class="form-control" required/>
                            </div>

                            <div class="form-group">
                                <label>Email address
                                    <abbr class="required" title="required">*</abbr></label>
                                <input type="email" name="email" class="form-control" required/>
                            </div>

                            <div class="form-group mb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="create_account"
                                           class="custom-control-input" id="create-account"/>
                                    <label class="custom-control-label" data-toggle="collapse"
                                           data-target="#collapseThree" aria-controls="collapseThree"
                                           for="create-account">Create an
                                        account?</label>
                                </div>
                            </div>

                            <div id="collapseThree" class="collapse">
                                <div class="form-group">
                                    <label>Create account password
                                        <abbr class="required" title="required">*</abbr></label>
                                    <input type="password"
                                           name="password"
                                           placeholder="Password" class="form-control" required/>
                                </div>
                            </div>



                    </li>
                </ul>
            </div>
            <!-- End .col-lg-8 -->

            <div class="col-lg-5">
                <div class="order-summary">
                    <h3>YOUR ORDER</h3>

                    <table class="table table-mini-cart">
                        <thead>
                        <tr>
                            <th colspan="2">Product</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $item)
                            <tr>
                                <td class="product-col">
                                    <h3 class="product-title">
                                        {{$item->product->title}} ×
                                        <span class="product-qty"> {{$item->quantity}}</span>
                                    </h3>
                                </td>

                                <td class="price-col">
                                    <span>${{$item->product->price * $item->quantity}}</span>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr class="cart-subtotal">
                            <td>
                                <h4>Subtotal</h4>
                            </td>

                            <td class="price-col">
                                <span>${{$total}}</span>
                            </td>
                        </tr>


                        <tr class="order-total">
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                                <b class="total-price"><span>${{$total}}</span></b>
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                    <div class="payment-methods">
                        <h4 class="">Payment methods</h4>
                        <div class="info-box with-icon p-0">
                            <p>
                                Sorry, it seems that there are no available payment methods for your state. Please
                                contact us if you require assistance or wish to make alternate arrangements.
                            </p>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark btn-place-order" form="checkout-form">
                        Place order
                    </button>
                </div>
                <!-- End .cart-summary -->
            </div>
            <!-- End .col-lg-4 -->
        </div>
        </form>
        <!-- End .row -->
    </div>

</x-front-layout>
