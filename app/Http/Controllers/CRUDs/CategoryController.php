<?php

namespace App\Http\Controllers\CRUDs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $categories = Category::all();
        
        return view('cruds.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        abort_if(Gate::denies('category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return response()->json(['data' => $category]);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'title' => 'required|unique:categories',
        ]);
        
        Category::create($request->all());

        return redirect(route('categories.index') . '#categories');
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('cruds.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:categories',
        ]);

        $category = Category::find($id);
        $category->title = $request->title;
        $category->save();
        
        return redirect(route('categories.index') . '#categories');
    }

    public function destroy(Category $category)
    {
        abort_if(Gate::denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category->restaurants()->delete();
        $category->delete();
        
        return redirect(route('categories.index') . '#categories');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:categories,id',
        ]);

        $categories = Category::whereIn('id', request('ids'))->get();

        dd($categories);
        foreach ($categories as $category) {
            $category->restaurants()->delete();
            $category->delete();
        }
        return redirect(route('categories.index') . '#categories');
    }
}