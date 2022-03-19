<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Category;
use PhpParser\Node\Expr\FuncCall;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::all();

        // passing through associative array to loop over in our UI 
        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(ProductRequest $request)
    {
        $product = [
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'description' => $request->input('description')
        ];
        $product = Product::create($product);
        return redirect()->back()->with('status', 'Product Info Added Successfully');
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
        // return view()
    }

    public function update(ProductRequest $request, $id)
    {
        $product = [
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'description' => $request->input('description')
        ];
        Product::where('id', $id)->update($product);

        return redirect()->back()->with('status', 'Product Info Updated Successfully');
    }

    public function destory($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('status', 'Product Info Deleted Successfully');
    }

    public function search()
    {
        $serch_text = $_GET['query'];
        $products = Product::where('name', 'LIKE', '%' . $serch_text . '%')->get();
        return view('products.search', compact('products'));
    }
}
