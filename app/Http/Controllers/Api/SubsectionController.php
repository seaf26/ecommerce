<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subsection;
use Illuminate\Http\Request;

class SubsectionController extends Controller
{


    public function index(){
        $subsections =  Subsection::all();

        $data = [
            'message' => 'failed',
            'data' => null
        ];

        if($subsections){
            $data = [
                'message' => 'success',
                'data' => $subsections
            ];
        }

        return response()->json($data, 200);
    }


}
