@extends('layouts.app')

@section('content')



<div class="auth-container">

    <h2>Add Product / Service</h2>

    <form method="POST" action="{{ url('/product/store') }}">
        @csrf

        <input type="text" name="type" placeholder="Product / Service">

        <input type="text" name="name" placeholder="Name" required>

        <textarea name="detail" placeholder="Detail" required></textarea>

        <!-- CATEGORY -->
        <select name="category_id" required>
            <option value="">Select Category</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>

        
        <!-- <input type="text" name="subcategory_id" placeholder="Subcategory"> -->
        <select name="subcategory_id" required>
        <option value="">Select Subcategory</option>
        @foreach($subcategories as $sub)
            <option value="{{ $sub->id }}">{{ $sub->name }}</option>
        @endforeach
         </select>
        <input type="text" name="country" placeholder="Country">
        <input type="text" name="state" placeholder="State">
        <input type="text" name="city" placeholder="City">
        <input type="text" name="area" placeholder="Area">

        <input type="number" name="price" placeholder="Price" required>

        <button type="submit">Submit Product</button>

    </form>

</div>

@endsection