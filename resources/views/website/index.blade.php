@extends('layouts.common.website.website')

@section('css')

@endsection

@section('title')
    ثمانيه
@endsection

@section('content')
    <!-- main-carousel-sec section -->
    <div class="main-carousel-sec">
        <div class="container">
            <div class="row">
                <!-- Start Latest News -->
                <div class="col-md-8">
                    <div class="section-head">
                        <h2>آخر الأخبار</h2>
                    </div>
                    <div class="section-content">
                        <div id="main-carousel-sec" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ asset('assets/frontend/img/latest_news/latest-news-1.jpg') }}" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3>
                                            <a href="#">
                                                بعد أعمال الشغب… الرئيس البرازيلي يعزل عشرات العسكريين بالمقر الرئاسي
                                            </a>
                                        </h3>
                                        <p class="date">
                                            <span><i class="far fa-clock"></i></span>
                                            <span>22/3/2022</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('assets/frontend/img/latest_news/latest-news-3.jpg') }}" alt="Second slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3>
                                            <a href="#">
                                                «تصفية» جندي روسي بعد فراره من قاعدة عسكرية
                                            </a>
                                        </h3>
                                        <p class="date">
                                            <span><i class="far fa-clock"></i></span>
                                            <span>22/3/2022</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('assets/frontend/img/latest_news/latest-news-2.jpg') }}" alt="Third slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3>
                                            <a href="#">جبهة نقابية موحدة ورفض شعبي واسع… فرنسا تتحضر لـ”خميس أسود” ضد إصلاح
                                                نظام التقاعد</a>
                                        </h3>
                                        <p class="date">
                                            <span><i class="far fa-clock"></i></span>
                                            <span>22/3/2022</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#main-carousel-sec" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#main-carousel-sec" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Latest News -->
                
                <!-- Start all news breadcrumbs -->
                @include('layouts.common.website.common._all_news_breadcrumbs')
                <!-- End all news breadcrumbs -->
            </div>
        </div>
    </div>
    <!-- End main-carousel-sec section -->
@endsection

@section('js')

@endsection