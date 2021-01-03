@extends('layouts.master')

@section('title','首頁')

@section('content')
    <!-- 幻燈片 -->
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image:url('img/2.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3></h3>
                        <p></p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('img/4.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3></h3>
                        <p></p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('img/3.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3></h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>


    <!-- 產品分類 -->
    <div class="container">

        <h1 class="my-4">歡迎來到勤益線上訂餐系統</h1>
        <h3>為您推薦</h3>

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header">花生培根咔啦雞腿堡XL套餐</h4>
                    <img src="img/個人/花生培根咔啦雞腿堡XL套餐.jpg" width="348px" height="320">
                    <div class="card-footer">
                        <a href="http://localhost:8000/products/26" class="btn btn-primary">前往訂購</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header">開燻雙拼餐</h4>
                    <img src="img//多人/開燻雙拼餐.jpg" width="348px" height="320">
                    <div class="card-footer">
                        <a href="http://localhost:8000/products/21" class="btn btn-primary">前往訂購</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header">原味蛋撻禮盒</h4>
                    <img src="img/單點/原味蛋撻禮盒.jpg" width="348px" height="320">
                    <div class="card-footer">
                        <a href="http://localhost:8000/products/12" class="btn btn-primary">前往訂購</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
