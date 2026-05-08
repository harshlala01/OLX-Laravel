<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class ProductController extends Controller
{
    // -------------------------
    // CREATE PAGE
    // -------------------------
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('product.create', compact('categories','subcategories'));
    }

    // -------------------------
    // STORE PRODUCT
    // -------------------------
    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'detail' => $request->detail,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'area' => $request->area,
            'price' => $request->price,
            'user_id' => auth()->id()
        ]);

        return redirect('/');
    }

    // -------------------------
    // COMMON DATA (SIDEBAR)
    // -------------------------
    private function common()
    {
        return [
            'categories' => Category::all(),

            'cities' => Product::select('city')
                ->distinct()
                ->pluck('city'),

            'filters' => Product::select('city','category_id')
                ->distinct()
                ->get()
        ];
    }

    // -------------------------
    // HOME PAGE
    // -------------------------
    public function home()
    {
        $products = Product::latest()->get();

        $data = $this->common();

        return view('index', array_merge($data, compact('products')));
    }

    // -------------------------
    // CATEGORY WISE
    // -------------------------
    public function categoryWise($id)
    {
        $products = Product::where('category_id', $id)->latest()->get();

        $data = $this->common();

        return view('index', array_merge($data, compact('products')));
    }

    // -------------------------
    // CITY WISE
    // -------------------------
    public function cityWise($city)
    {
        $products = Product::where('city', $city)->latest()->get();

        $data = $this->common();

        return view('index', array_merge($data, compact('products')));
    }

    // -------------------------
    // CITY + CATEGORY
    // -------------------------
    public function cityCategoryWise($city, $category)
    {
        $products = Product::where('city', $city)
            ->where('category_id', $category)
            ->latest()
            ->get();

        $data = $this->common();

        return view('index', array_merge($data, compact('products')));
    }

    // -------------------------
    // ALL LISTING
    // -------------------------
    public function listing()
    {
        $products = Product::latest()->get();

        $data = $this->common();

        return view('index', array_merge($data, compact('products')));
    }
}