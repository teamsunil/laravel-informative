<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request) {

        $query = Product::query();

         if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('slug', 'like', '%' . $request->search . '%')
                ->orWhere('sku', 'like', '%' . $request->search . '%');
        }

        $products = $query->orderBy('id', 'desc')->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create() {
        return view('admin.products.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
    'wp_id'             => 'nullable|integer',
    'name'              => 'required|string|max:255',
    'slug'              => 'required|string|max:255|unique:products,slug,' . ($product->id ?? 'NULL') . ',id',
    'sku'               => 'nullable|string|max:255',
    'type'              => 'required|in:simple,variable',
    'description'       => 'nullable|string',
    'short_description' => 'nullable|string',
    'price'             => 'required|numeric',
    'regular_price'     => 'nullable|numeric',
    'sale_price'        => 'nullable|numeric',
    'on_sale'           => 'nullable|boolean',
    'purchasable'       => 'nullable|boolean',
    'featured'          => 'nullable|boolean',
    'status'            => 'required|boolean',
    'stock_status'      => 'required|in:instock,outofstock',
    'weight'            => 'nullable|string|max:255',
    'dimensions'        => 'nullable|array',
    'brand'             => 'nullable|string|max:255',
    'preorder_text'     => 'nullable|string|max:255',
    'product_code'      => 'nullable|string|max:255',
    'free_delivery'     => 'nullable|boolean',
    'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    'gallery'           => 'nullable|array',
    'gallery.*'         => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    'categories'        => 'nullable|array',
    'total_sales'       => 'nullable|integer',
]);

    if ($request->hasFile('image')) {
    $path = $request->file('image')->store('uploads/products', 'public');
    $data['image'] = $path;
}


        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);

        $data = $request->validate([
    'wp_id'             => 'nullable|integer',
    'name'              => 'required|string|max:255',
    'slug'              => 'required|string|max:255|unique:products,slug,' . ($product->id ?? 'NULL') . ',id',
    'sku'               => 'nullable|string|max:255',
    'type'              => 'required|in:simple,variable',
    'description'       => 'nullable|string',
    'short_description' => 'nullable|string',
    'price'             => 'required|numeric',
    'regular_price'     => 'nullable|numeric',
    'sale_price'        => 'nullable|numeric',
    'on_sale'           => 'nullable|boolean',
    'purchasable'       => 'nullable|boolean',
    'featured'          => 'nullable|boolean',
    'status'            => 'required|boolean',
    'stock_status'      => 'required|in:instock,outofstock',
    'weight'            => 'nullable|string|max:255',
    'dimensions'        => 'nullable|array',
    'brand'             => 'nullable|string|max:255',
    'preorder_text'     => 'nullable|string|max:255',
    'product_code'      => 'nullable|string|max:255',
    'free_delivery'     => 'nullable|boolean',
    'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    'gallery'           => 'nullable|array',
    'gallery.*'         => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    'categories'        => 'nullable|array',
    'total_sales'       => 'nullable|integer',
]);

if ($request->hasFile('image')) {
    $path = $request->file('image')->store('uploads/products', 'public');
    $data['image'] = $path;
}

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
