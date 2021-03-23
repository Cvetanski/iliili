<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('admin.add_category');
    }

    public function saveCategory(Request $request )
    {
        $category = new Category($request->all());

        $category->save();

        return redirect()->route('admin.dashboard');
    }

    public function allCategory()
    {
        $categories = Category::all();

        return view('admin.all_categories',['categories'=>$categories]);
    }

    public function deleteCategory( $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('all-category')->with('message', "Успешно ја избришавте категоријата!");
    }

    public function editCategory(int $id)
    {
        $category=Category::findOrFail($id);

        return view('admin.edit_category')->with('category',$category);
    }

    public function updateCategory(Request $request, $id)
    {
        $category=Category::findOrFail($id);
        $this->validate($request,[
            'category'=>'string|required',
        ]);
        $data= $request->all();
        $category->fill($data)->save();

        return redirect()->route('all-category')->with('message','Успешно ја ажуриравте категоријата!');

    }
}
