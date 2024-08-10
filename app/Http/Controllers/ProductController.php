<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function create(Request $request)
    {
        $data = $request->all();

        $validatedData = Validator::make($data, [
            'product_category_id' => 'required',
            'name' => 'required|max:100|unique:products',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        if ($validatedData->fails()) {
            return response()->json($validatedData->messages());
        }

        $imagePath = null;
        if (isset($request['image']) && $request['image'] instanceof UploadedFile) {
            $imagePath = $request['image']->store('images');
        }

        $product = new Product();
        $product->product_category_id = $request['product_category_id'];
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->image = $imagePath;
        $product->save();

        return $product;
    }

    public function showAll()
    {
        $product = Product::all();
        return response()->json($product);
    }

    public function showOne($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function update($id, Request $request)
    {
        $data = $request->all();

        $product = Product::findOrFail($id);

        $validatedData = Validator::make($data, [
            'name' => 'required|max:100|unique:products,name,' . $id,
            'price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        if ($validatedData->fails()) {
            return response()->json($validatedData->messages());
        }

        $imagePath = null;
        $storedImage = public_path('storage/' . $product->image);
        if (isset($request['image']) && $request['image'] instanceof UploadedFile) {
            $imagePath = $request['image']->store('images');
            if ($product->image != null && file_exists($storedImage)) {
                unlink($storedImage);
            }
        }

        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->image = $imagePath;
        $product->save();

        return response()->json($product, 201);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $storedImage = public_path('storage/' . $product->image);
        if ($product->image != null && file_exists($storedImage)) {
            unlink($storedImage);
        }

        return $product->delete();
    }
}
