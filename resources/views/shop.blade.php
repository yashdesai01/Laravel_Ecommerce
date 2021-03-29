@extends('base')

@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
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
</div>

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="shop__sidebar">
                    <div class="sidebar__categories">
                        <div class="section-title">
                            <h4>Categories</h4>
                        </div>
                        @foreach ($categories as $category)
                        <div class="categories__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                            <li class="{{ setActiveCategory($category->slug) }}"><a href="{{ route('shop.index', ['category' => $category->slug]) }}"><b style="color: black;text-transform:capitalize;">{{ $category->name }}</b></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div>
                            <strong>Price:</strong>
                        </div>
                        <div>
                            <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low to High</a>
                        </div>
                        <div>
                            <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}">High to Low</a>
                        </div>
                    </div>     
                </div>
            </div>

            <div class="col-lg-9 col-md-9">
                <div class="row">
                        @forelse ($products as $product)
                        <div class="col-lg-4 col-md-6">       
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/'.$product->image) }}">
                                <div class="label {{ $product->label }}" style = "text-transform:uppercase;">{{ $product->label }}</div>
                                    <ul class="product__hover">
                                        <li><a href="img/shop/shop-1.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                <h6><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">${{ $product->presentPrice() }}</div>
                                </div>
                            </div>  
                        </div>
                        @empty
                            <div style = "text-align: left">No item found</div>
                        @endforelse
                    
                       

                    {{-- create a paginate --}}
                    
                    <div class="col-lg-12 text-center">
                       
                         {{--{{ $products->links() }}--}}    
                      {{ $products->appends(request()->input())->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->

<!-- Instagram Begin -->

<!-- Instagram End -->

@endsection