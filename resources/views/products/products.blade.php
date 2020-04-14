@extends('layouts.master')

@section('title') Starter Page @endsection

@section('content')

   <div class="row">
    <div class="col-lg-12">
                                    
        <div class="row mb-3">
            <div class="col-xl-4 col-sm-6">
                <div class="mt-2">
                    <h5>Clothes</h5>
                </div>
            </div>
            <div class="col-lg-8 col-sm-6">
                <form class="mt-4 mt-sm-0 float-sm-right form-inline">
                    <div class="search-box mr-2">
                        <div class="position-relative">
                            <input type="text" class="form-control border-0" placeholder="Search...">
                            <i class="bx bx-search-alt search-icon"></i>
                        </div>
                    </div>
                    <ul class="nav nav-pills product-view-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#"><i class="bx bx-grid-alt"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bx bx-list-ul"></i></a>
                        </li>
                    </ul>
                    
                    
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="product-img position-relative">
                            <div class="avatar-sm product-ribbon">
                                <span class="avatar-title rounded-circle  bg-primary">
                                    - 25 %
                                </span>
                            </div>
                            <img src="assets/images/product/img-1.png" alt="" class="img-fluid mx-auto d-block">
                        </div>
                        <div class="mt-4 text-center">
                            <h5 class="mb-3 text-truncate"><a href="#" class="text-dark">Half sleeve T-shirt </a></h5>
                            
                            <p class="text-muted">
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                            </p>
                            <h5 class="my-0"><span class="text-muted mr-2"><del>$500</del></span> <b>$450</b></h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="product-img position-relative">
                            <img src="assets/images/product/img-2.png" alt="" class="img-fluid mx-auto d-block">
                        </div>
                        <div class="mt-4 text-center">
                            <h5 class="mb-3 text-truncate"><a href="#" class="text-dark">Light blue T-shirt</a></h5>
                            
                            <p class="text-muted">
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star"></i>
                            </p>
                            <h5 class="my-0"><span class="text-muted mr-2"><del>$240</del></span> <b>$225</b></h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="product-img position-relative">
                            <div class="avatar-sm product-ribbon">
                                <span class="avatar-title rounded-circle  bg-primary">
                                    - 20 %
                                </span>
                            </div>
                            <img src="assets/images/product/img-3.png" alt="" class="img-fluid mx-auto d-block">
                        </div>
                        <div class="mt-4 text-center">
                            <h5 class="mb-3 text-truncate"><a href="#" class="text-dark">Black Color T-shirt</a></h5>
                            
                            <p class="text-muted">
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star"></i>
                            </p>
                            <h5 class="my-0"><span class="text-muted mr-2"><del>$175</del></span> <b>$152</b></h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="product-img position-relative">
                            <img src="assets/images/product/img-4.png" alt="" class="img-fluid mx-auto d-block">
                        </div>
                        <div class="mt-4 text-center">
                            <h5 class="mb-3 text-truncate"><a href="#" class="text-dark">Hoodie (Blue)</a></h5>
                            
                            <p class="text-muted">
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star"></i>
                            </p>
                            <h5 class="my-0"><span class="text-muted mr-2"><del>$150</del></span> <b>$145</b></h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="product-img position-relative">
                            <div class="avatar-sm product-ribbon">
                                <span class="avatar-title rounded-circle  bg-primary">
                                    - 22 %
                                </span>
                            </div>
                            <img src="assets/images/product/img-5.png" alt="" class="img-fluid mx-auto d-block">
                        </div>
                        <div class="mt-4 text-center">
                            <h5 class="mb-3 text-truncate"><a href="#" class="text-dark">Half sleeve T-Shirt</a></h5>
                            
                            <p class="text-muted">
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star"></i>
                            </p>
                            <h5 class="my-0"><span class="text-muted mr-2"><del>$145</del></span> <b>$138</b></h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="product-img position-relative">
                            <div class="avatar-sm product-ribbon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    - 28 %
                                </span>
                            </div>
                            <img src="assets/images/product/img-6.png" alt="" class="img-fluid mx-auto d-block">
                        </div>
                        <div class="mt-4 text-center">
                            <h5 class="mb-3 text-truncate"><a href="#" class="text-dark">Green color T-shirt</a></h5>
                            
                            <p class="text-muted">
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star text-warning"></i>
                                <i class="bx bx-star"></i>
                            </p>
                            <h5 class="my-0"><span class="text-muted mr-2"><del>$138</del></span> <b>$135</b></h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <ul class="pagination pagination-rounded justify-content-center mt-4">
                    <li class="page-item disabled">
                        <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">1</a>
                    </li>
                    <li class="page-item active">
                        <a href="#" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">3</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">4</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">5</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
   </div>

@endsection