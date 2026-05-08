@extends('layouts.app')

@section('content')

<!-- HEADER -->
<div class="header">

    <div class="logo">OLX</div>

    <!-- RIGHT SIDE -->
    <div class="right-side">

        @auth
            <span class="username">{{ auth()->user()->name }}</span>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="sell-btn">Logout</button>
            </form>
        @else
            <div class="auth-links">
                <a href="{{ route('login') }}" class="sell-btn">Login</a>
                <a href="{{ route('register') }}" class="sell-btn">Register</a>
            </div>
        @endauth

    </div>

</div>

<!-- MAIN CONTAINER -->
<div class="main-container">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <a href="{{ url('/product/create') }}" class="sidebar-item-add-product">
        + Add Product / Service
         </a>

        <h3>Categories</h3>
        @foreach($categories as $cat)
            <a href="{{ url('/category/'.$cat->id) }}" class="sidebar-item">
                {{ $cat->name }}
            </a>
        @endforeach

        <h3>Cities</h3>
        @foreach($cities as $city)
            <a href="{{ url('/city/'.$city) }}" class="sidebar-item">
                {{ $city }}
            </a>
        @endforeach

        <h3>Pages</h3>
        <a href="{{ url('/listing') }}" class="sidebar-item">
            All Listings
        </a>

        <h3>Browse by City & Category</h3>
        @foreach($filters as $filter)
            <a href="{{ url('/filter/'.$filter->city.'/'.$filter->category_id) }}" 
               class="sidebar-item">
                {{ $filter->city }} • {{ $filter->category->name ?? '' }}
            </a>
        @endforeach

    </div>

    <!-- CONTENT -->
    <div class="content">

        <h2 class="section-title">Latest Products</h2>

        <div class="product-grid">

            @forelse($products as $product)
                <div class="product-card">

                    <h4>{{ $product->name }}</h4>

                    <p class="price">
                        ₹{{ number_format($product->price, 2) }}
                    </p>

                    <p>{{ $product->detail }}</p>

                    <p class="location">
                        {{ $product->city }}
                    </p>

                    <p class="category">
                        {{ $product->category->name ?? 'No Category' }}
                        →
                        {{ $product->subcategory->name ?? 'No Subcategory' }}
                    </p>

                </div>
            @empty
                <p>No products found</p>
            @endforelse

        </div>

    </div>

</div>

@endsection