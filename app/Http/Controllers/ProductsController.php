<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function allProducts()
    {
        $products = Products::with('category')->get();
        return view('admin.product', compact('products'));
    }

    public function create()
    {
        $categories = Categories::where('status', 'active')->get();
        return view('admin.createProducts', compact('categories'));
    }

    public function store(Request $request)
    {

        $imagePath = null;
        if ($request->has('image')) {
            $imageName = time() . '.' . $request->image->extension();
            print_r($imageName);
            $request->image->move(public_path('uploads'), $imageName);
            $imagePath = 'uploads/' . $imageName;
        }


        Products::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'availability' => $request->availability,
        ]);
        return redirect('/admin/products')->with('success', 'Product Added!');
    }

    function deleteProduct($id)
    {
        $product = Products::find($id);

        if ($product) {
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $product->delete();

            return redirect('/admin/products')->with('success', 'Product deleted successfully!');
        }

        return redirect('/admin/products')->with('error', 'Product not found!');
    }

    function editProduct($id)
    {
        $product = Products::find($id);
        $categories = Categories::where('status', 'active')->get();

        return view('admin.editProduct', compact('product', 'categories'));
    }

    function updateProduct(Request $request, $id)
    {
        $product = Products::find($id);

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->availability = $request->availability;

        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $product->image = 'uploads/products/' . $imageName;
        }

        $product->save();

        return redirect('/admin/products')->with('success', 'Product updated successfully!');
    }
}
