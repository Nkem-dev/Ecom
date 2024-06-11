@extends('layout.app')

@section('content')

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Product Detail</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Product Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->


<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                    <div class="product-image">
                        <div class="product_img_box">
                            <img id="product_img" src="/productFolder/{{ $data->productImage }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="pr_detail">
                        <div class="product_description">
                            <h4 class="product_title"><a href="#">{{ $data->productName }}</a></h4>
                            <div class="product_price">
                                <span class="price">{{ $data->productPrice}}</span>
                                <del>{{ $data->discountPrice }}</del>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <p style="margin-bottom: 0px;">Quantity</p>
                                <span>{{ $data->quantity }}</span>
                            </div>
                            <div class="pr_desc">
                                <p>{{ $data->productDescription }}</p>
                            </div>
                            <div class="product_sort_info">
                                <ul>
                                    <li><i class="linearicons-shield-check"></i> {{ $data->warranty }}</li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div class="cart_extra">
                            <form action="" method="POST">
                                @csrf
                            <div class="cart-product-quantity">
                                <div class="quantity">
                                    <input type="button" value="-" class="minus">
                                    <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                    <input type="button" value="+" class="plus">
                                </div>
                            </div>
                            <div class="cart_btn">
                                <button class="btn btn-fill-out btn-addtocart" type="button"><i class="icon-basket-loaded"></i> Add to cart</button>
                                <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                                <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                            </div>
                            </form>
                          </div>   
                        <hr>
                        <ul class="product-meta">
                            <li>Category: <a href="#">{{ $data->productCategory }}</a></li>
                        </ul>

                        <div class="product_share">
                            <span>Share:</span>
                            <ul class="social_icons">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="large_divider clearfix"></div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-12">
                    <div class="small_divider"></div>
                    <div class="divider"></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="heading_s1">
                        <h3>Releted Products</h3>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                                    <div class="row shop_container">
                                        @foreach($similar as $relatedproducts)
                                        
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="product">
                                                <div class="product_img">
                                                    <a href="shop-product-detail.html">
                                                        <img src="/productFolder/{{ $relatedproducts->productImage }}" alt="product_img1">
                                                    </a>

                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_title"><a href="shop-product-detail.html">{{ $relatedproducts->productName }}</a></h6>
                                                    <div class="product_price">
                                                        <span class="price">$45.00</span>
                                                        <del>$55.25</del>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <p style="margin-bottom: 0px;">Quantity</p>
                                                        <span>(21)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
    <div class="section bg_default small_pt small_pb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="heading_s1 mb-md-0 heading_light">
                        <h3>Subscribe Our Newsletter</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="newsletter_form">
                        <form>
                            <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                            <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->

@endsection