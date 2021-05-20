@extends('layouts.frontoffice')

@section('title')
    Nyetakin | Jasa Percetakan Online dan Percetakan Custom
@endsection

@section('content')
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel">
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Wood & Cloth Sofa</h1>
                                            <p>
                                                Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra
                                            </p>
                                            <a href="index.html#" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img
                                        src="{{ asset('frontoffice/img/xbanner_img.png.pagespeed.ic.jACwZhtrZ3.png') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Cloth & Wood Sofa</h1>
                                            <p>
                                                Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra
                                            </p>
                                            <a href="index.html#" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img
                                        src="{{ asset('frontoffice/img/xbanner_img.png.pagespeed.ic.jACwZhtrZ3.png') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Wood & Cloth Sofa</h1>
                                            <p>
                                                Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra
                                            </p>
                                            <a href="index.html#" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img
                                        src="{{ asset('frontoffice/img/xbanner_img.png.pagespeed.ic.jACwZhtrZ3.png') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Featured Category</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Latest foam Sofa</h3>
                        <a href="index.html#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="{{ asset('frontoffice/img/feature/xfeature_1.png.pagespeed.ic.7KpwcSnSPx.png') }}" />
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Latest foam Sofa</h3>
                        <a href="index.html#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="{{ asset('frontoffice/img/feature/xfeature_2.png.pagespeed.ic.MtwJ8IRpvL.png') }}" />
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Latest foam Sofa</h3>
                        <a href="index.html#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="{{ asset('frontoffice/img/feature/xfeature_3.png.pagespeed.ic.V0w2I06NUD.png') }}" />
                    </div>
                </div>
                <div class="col-lg-7 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Latest foam Sofa</h3>
                        <a href="index.html#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="{{ asset('frontoffice/img/feature/xfeature_4.png.pagespeed.ic.8h6o7ZduQk.png') }}" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>awesome <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_list_slider owl-carousel">
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="{{ asset('frontoffice/img/product/product_1.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img
                                            src="{{ asset('frontoffice/img/product/xproduct_2.png.pagespeed.ic.o70ZeeStwq.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img
                                            src="{{ asset('frontoffice/img/product/xproduct_3.png.pagespeed.ic.c35V289i18.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img
                                            src="{{ asset('frontoffice/img/product/xproduct_4.png.pagespeed.ic.kIabirvgae.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img
                                            src="{{ asset('frontoffice/img/product/xproduct_5.png.pagespeed.ic.i9PyC8Y1TR.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img
                                            src="{{ asset('frontoffice/img/product/xproduct_6.png.pagespeed.ic.zcUuYW5UEY.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img
                                            src="{{ asset('frontoffice/img/product/xproduct_7.png.pagespeed.ic.rnieT7kDrD.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img
                                            src="{{ asset('frontoffice/img/product/xproduct_8.png.pagespeed.ic.c_yTDNfIir.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="{{ asset('frontoffice/img/product/product_1.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img
                                            src="{{ asset('frontoffice/img/product/xproduct_2.png.pagespeed.ic.o70ZeeStwq.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img
                                            src="{{ asset('frontoffice/img/product/xproduct_3.png.pagespeed.ic.c35V289i18.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img
                                            src="{{ asset('frontoffice/img/product/xproduct_4.png.pagespeed.ic.kIabirvgae.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img
                                            src="{{ asset('frontoffice/img/product/xproduct_5.png.pagespeed.ic.i9PyC8Y1TR.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img
                                            src="{{ asset('frontoffice/img/product/xproduct_6.png.pagespeed.ic.zcUuYW5UEY.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img
                                            src="{{ asset('frontoffice/img/product/xproduct_7.png.pagespeed.ic.rnieT7kDrD.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img
                                            src="{{ asset('frontoffice/img/product/xproduct_8.png.pagespeed.ic.c_yTDNfIir.png') }}" />
                                        <div class="single_product_text">
                                            <h4>Quartz Belt Watch</h4>
                                            <h3>$150.00</h3>
                                            <a href="index.html#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
