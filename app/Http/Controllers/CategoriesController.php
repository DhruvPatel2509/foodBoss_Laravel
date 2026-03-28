<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    function allCategories()
    {
        $categories = Categories::get();
        return view('/admin/categories', compact('categories'));
    }
    function store(Request $request)
    {

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $imagePath = 'uploads/' . $imageName;
        }
        $slug = Str::slug($request->cat_name);
        Categories::create([
            'cat_name' => $request->cat_name,
            'slug' => $slug,
            'image' => $imagePath,
            'status' => $request->status
        ]);
        return redirect('/admin/categories')->with('success', 'Saved!');
    }


    public function deleteCategory($id)
    {
        $category = Categories::find($id);

        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }

        $category->delete();

        return redirect('/admin/categories')->with('success', 'Category deleted successfully!');
    }

    public function editCategory($id)
    {
        $category = Categories::find($id);

        return view('admin.editCategories', compact('category'));
    }

    public function updateCategory(Request $req, $id)
    {
        $cat = Categories::find($id);

        if (!$cat) {
            return redirect('/admin/categories')->with('error', 'Category not found!');
        }

        if ($req->cat_name) {
            $cat->cat_name = $req->cat_name;
            $cat->slug = Str::slug($req->cat_name);
        }

        $cat->status = $req->status;

        if ($req->hasFile('image')) {
            if ($cat->image && file_exists(public_path($cat->image))) {
                unlink(public_path($cat->image));
            }

            $imageName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('uploads'), $imageName);
            $cat->image = 'uploads/' . $imageName;
        }

        $cat->save();

        return redirect('/admin/categories')->with('success', 'Category Updated Successfully!');
    }
}
