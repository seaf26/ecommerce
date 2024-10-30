<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        $products =  Product::all();


         $dataProducts = [];

        foreach($products as $product){
            $dataProducts[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'section_id' => $product->section_id,
                // 'subsection_id' => $product->subsection_id,
                // 'section' => $product->section,
                'subsection' => $product->subsection
            ];
        }


        $data = [
            'message' => 'failed',
            'data' => null
        ];

        if($products){
            $data = [
                'message' => 'success',
                'data' => $dataProducts
            ];
        }

        return response()->json($data, 200);
    }

}


