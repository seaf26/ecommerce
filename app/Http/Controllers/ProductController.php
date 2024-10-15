<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subsection;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $subsections = Subsection::all();
        return view('products.create', compact('subsections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subsection_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'descraption' => 'required',
            'stock' => 'required|integer',
            'image' => 'nullable|url',
        ]);

        Product::create($request->all());
        // dd($request->all());


        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $subsections = Subsection::all();
        return view('products.edit', compact('product', 'subsections'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'subsection_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'image' => 'nullable|url',
        ]);
        // dd($request->all());
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
