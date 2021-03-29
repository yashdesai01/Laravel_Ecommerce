@extends('base')

@section('content')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>Shopping cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Cart::count() > 0)

        <h5> {{ Cart::count() }} item(s) in Shopping Cart </h5>
        <hr>

        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach (Cart::content() as $item)
                        <tbody>
                            <tr>
                                <td class="cart__product__item">
                                    <div class="cart__product__item__title">
                                    <h6>{{ $item->model->name }}</h6>
                                    <h6>details:-{{ $item->model->details }}</h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </td>
                            <td class="cart__price">${{ $item->model->presentPrice() }}</td>
                                <td class="cart__quantity">
                                    <div>
                                        <select class="pro-qty"  data-id="{{ $item->rowId }}">
                                            @for ($i = 1; $i < 10 + 1 ; $i++)
                                                <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </td>
                                <td class="cart__close">
                                    <form action="{{ route('cart.destroy',$item->rowId)}}" method="POST" >
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="site-btn mr-2">Remove</span></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('cart.switchToSaveForLater',$item->rowId)}}" method="POST" >
                                        {{ csrf_field() }}
                                        <button type="submit" class="site-btn">Save</span></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                <a href="{{ route('shop.index') }}">Continue Shopping</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn update__btn">
                <a href="{{ route('cart.index') }}"><span class="icon_loading"></span> Update cart</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="discount__content">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn">Apply</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>${{ presentPrice(Cart::subtotal())  }}</span></li>
                        <li>Tax(GST 18%) <span>${{ presentPrice(Cart::tax()) }}</span></li>
                        <li>Total <span>${{ presentPrice(Cart::total()) }}</span></li>
                    </ul>
                <a href="{{ route('checkout.index') }}" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>

        @else

                <h3> NO ITEMS IN CART </h3>
                <hr>
                <a href="{{ route('shop.index') }}" class="site-btn" >Continue Shopping</a>


        @endif
        <hr>
        @if (Cart::instance('saveForLater')->count() > 0)
        <h3>{{ Cart::instance('saveForLater')->count() }} Items Saved for Later </h3>
        <div class="row">
            <div class="col-lg-12">
                <hr> 
                <div class="shop__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach (Cart::instance('saveForLater')->content() as $item)
                        <tbody>
                            <tr>
                                <td class="cart__product__item">
                                    <div class="cart__product__item__title">
                                    <h6>{{ $item->model->name }}</h6>
                                    <h6>details:-{{ $item->model->details }}</h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </td>
                            <td class="cart__price">${{ $item->model->presentPrice() }}</td>
                            <td class="cart__quantity">
                                    <div>
                                        <select class="pro-qty"  data-id="{{ $item->rowId }}">
                                            @for ($i = 1; $i < 10 + 1 ; $i++)
                                                <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </td>
                                <td class="cart__close">
                                    <form action="{{ route('saveForLater.destroy',$item->rowId)}}" method="POST" >
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="site-btn mr-2">Remove</span></button>
                                    </form>
                                </td>
                                <td class="cart__close">
                                    <form action="{{ route('saveForLater.switchToCart',$item->rowId)}}" method="POST" >
                                        {{ csrf_field() }}
                                        <button type="submit" class="site-btn">Move</span></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        @else

        <h3>You Have no items Saved For Later</h3>

        @endif

    </div>
</section>
<!-- Shop Cart Section End -->

<!-- Instagram Begin -->
<div class="instagram">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-6.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            (function(){
                const classname=document.querySelectorAll('.pro-qty')

                Array.from(classname).forEach(function(element){
                    element.addEventListener('change', function() {
                        const id = element.getAttribute('data-id')

                        axios.patch(`/shop-cart/${id}`, {
                            quantity: this.value,
                        })
                        .then(function (response) {
                            // console.log(response);
                            window.location.href = '{{ route('cart.index') }}'
                        })
                        .catch(function (error) {
                             //console.log(error);
                            window.location.href = '{{ route('cart.index') }}'
                        });
                    })
                })
            })();
        </script>
    
@endsection