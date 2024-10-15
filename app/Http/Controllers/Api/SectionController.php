<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(){
        $sections =  Section::all();

        $dataSections = [];

        foreach($sections as $section){
            $dataSections[] = [
                'id' => $section->id,
                'name' => $section->name,
                // 'subsections' => $section->subsections
            ];
        }




        $data = [
            'message' => 'failed',
            'data' => null
        ];

        if($sections){
            $data = [
                'message' => 'success',
                'data' => $dataSections
            ];
        }

        return response()->json($data, 200);
    }

}





