<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.dashboard.products.index', compact('products'));
    }

    public function create()
    {
        return view('pages.dashboard.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg.webp|max:5048',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg.webp|max:5048',
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'required|string',
        ]);

        $price = intval(str_replace('.', '', $request->price));

        $coverImagePath = $request->file('cover_image')->store('products', 'public');

        $product = Product::create([
            'image' => $coverImagePath,
            'name' => $request->name,
            'price' => $price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('products', 'public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect()->route('dashboard.products')->with('success', 'Product created successfully');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function edit($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return view('pages.dashboard.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5048',
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'required|string',
        ]);

        $price = intval(str_replace('.', '', $request->price));

        if ($request->hasFile('cover_image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }

            $coverImagePath = $request->file('cover_image')->store('products', 'public');
            $product->image = $coverImagePath;
        }

        $product->name = $request->name;
        $product->price = $price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('products', 'public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect()->route('dashboard.products')->with('success', 'Product updated successfully');
    }

    public function show($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return view('pages.dashboard.products.show', compact('product'));
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return redirect()->route('dashboard.products')->with('success', 'Product deleted successfully');
    }
}
