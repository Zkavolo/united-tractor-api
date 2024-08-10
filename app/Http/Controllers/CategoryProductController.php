<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Validator;

class CategoryProductController extends Controller
{
    public function showAll()
    {
        $categories = CategoryProduct::all();
        return response()->json($categories);
    }

    public function showOne($id)
    {
        $category = CategoryProduct::findOrFail($id);
        return response()->json($category);
    }

    public function create(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|unique:category_products|max:255',
        ]);

        if($validatedData->fails()){
            return response()->json($validatedData->messages());
        }

        $category = new CategoryProduct();
        $category->name = $request -> name;
        $category->save();

        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:category_products,name,'.$id.'|max:255'
        ]);

        $category = CategoryProduct::findOrFail($id);
        $category->update($validatedData);
        return response()->json($category);
    }
}
