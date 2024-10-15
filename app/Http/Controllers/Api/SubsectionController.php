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
    // مش فاهم اي حاجة من اللي تحت

    public function store(Request $request){
        $subsection = new Subsection();
        $subsection->name = $request->name;
        $subsection->section_id = $request->section_id;
        $subsection->save();

        $data = [
            'message' => 'failed',
            'data' => null
        ];

        if($subsection){
            $data = [
                'message' => 'success',
                'data' => $subsection
            ];
        }

        return response()->json($data, 200);
    }

    public function show($id){
        $subsection = Subsection::find($id);

        $data = [
            'message' => 'failed',
            'data' => null
        ];

        if($subsection){
            $data = [
                'message' => 'success',
                'data' => $subsection
            ];
        }

        return response()->json($data, 200);
    }

    public function update(Request $request, $id){
        $subsection = Subsection::find($id);
        $subsection->name = $request->name;
        $subsection->section_id = $request->section_id;
        $subsection->save();

        $data = [
            'message' => 'failed',
            'data' => null
        ];

        if($subsection){
            $data = [
                'message' => 'success',
                'data' => $subsection
            ];
        }

        return response()->json($data, 200);
    }

    public function destroy($id){
        $subsection = Subsection::find($id);
        $subsection->delete();

        $data = [
            'message' => 'failed',
            'data' => null
        ];

        if($subsection){
            $data = [
                'message' => 'success',
                'data' => $subsection
            ];
        }

        return response()->json($data, 200);
    }

}
