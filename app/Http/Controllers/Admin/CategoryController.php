<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [ 'required', 'min:3' ],
        ]);

        $categoryDTO = [
            'slug' => Str::slug($request->name),
            'name' => $request->name,
        ];

        $category = new Category($categoryDTO);
        $category->save();

        return redirect()
            ->route('admin.categories.index');
    }

    public function destroy(int $categoryId)
    {
        $category = Category::find($categoryId);
        $category->delete();

        return redirect()
            ->route('admin.categories.index');
    }
}
