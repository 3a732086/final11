<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Models\Cart;

$total = CartController::cartItem();
$true = HomeController::isAdmin();
?>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('home.index')}}">勤益線上點餐系統</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @if (Route::has('login'))
                    @auth
                        @if($true == 1 )
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.dashboard.index')}}">返回後台</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home.index')}}">首頁</a>
                            </li>
                        @else()
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home.login_index')}}">首頁</a>
                            </li>
                        @endif
                @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home.index')}}">首頁</a>
                        </li>
                    @endauth
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products.index')}}">菜單</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('carts.index')}}">
                        <i class="fas fa-shopping-cart fa-lg"></i>
                        CART({{$total}})
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('orders.index')}}">訂單查詢</a>
                </li>

                <li class="nav-item">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">{{Auth::user()->name}}</a>
                            <ul class="dropdown-menu">
                                <!-- Account Management -->
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.show') }}">{{ __('Profile') }}</a>
                                </li>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                </form>
                            </ul>
                        </li>

                    @else
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            @endif
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
