<?php

namespace App\Http\Controllers;

use App\Models\Productor;
use App\Models\Vivero;
use Illuminate\Http\Request;

class ProductoresController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $productor_id = $request->query('productor_id');
        $productor = Productor::find($productor_id);
        $productores_data = [];
            
        if (!$productor){
            $productores = Productor::all();
            foreach ($productores as $productor) {
                $productor->fincas->toArray();
                $productor->viveros->toArray();
                
                array_push(
                    $productores_data, 
                    $productor->toArray()
                );  
            }
        }
        else{
            $productor->fincas->toArray();
            $productor->viveros->toArray();
            
            array_push(
                $productores_data, 
                $productor->toArray()
            );  
        }
        
        return view('productores', ['productores_data' => $productores_data]);
    }
}
