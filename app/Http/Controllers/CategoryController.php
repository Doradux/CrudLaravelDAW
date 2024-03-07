<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        if (!Session::has('user')) {
            return view('category.login');
        }
        $categories = Category::get();
        return view('category.index', compact('categories'));
    }

    public function login(Request $request) {
        Session::put('user', $request->name);
        return redirect('/categories');
    }

    public function logout() {
        Session::flush();
        return redirect('/categories');
    }

    public function create()
    {
        if (!Session::has('user')) {
            return view('category.login');
        }
        return view('category.create');
    }

    public function store(Request $request)
    {
        if (!Session::has('user')) {
            return view('category.login');
        }

        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'is_active' => 'sometimes',
            'last_edited' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active == true ? 1 : 0,
            'last_edited' => Session::get('user')
        ]);

        return redirect('categories/create')->with('status', 'Category Created');
    }

    public function edit(int $id)
    {
        if (!Session::has('user')) {
            return view('category.login');
        }
        $category = Category::findOrFail($id);
        
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, int $id)
    {
        if (!Session::has('user')) {
            return view('category.login');
        }
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'is_active' => 'sometimes',
            'last_edited' => 'required',
        ]);

        Category::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active == true ? 1 : 0,
            'last_edited' => Session::get('user')
        ]);

        return redirect()->back()->with('status', 'Category Updated');
    }

    public function delete(int $id)
    {
        if (!Session::has('user')) {
            return view('category.login');
        }
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('status', 'Category Deleted');
    }
}
