<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use Illuminate\Http\Request;

class FincasController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $finca_id = $request->query('finca_id');
        $finca = Finca::find($finca_id);
        $fincas_data = [];
        
        if(!$finca){
            $fincas = Finca::all();
            foreach ($fincas as $finca) {
                $finca->productor->toArray();
                $finca->viveros->toArray();
                
                array_push(
                    $fincas_data, 
                    $finca->toArray()
                );  
            }
        }
        else{
            $finca->productor->toArray();
            $finca->viveros->toArray();
            
            array_push(
                $fincas_data, 
                $finca->toArray()
            );  
        }
        
        return view('fincas', ['fincas_data' => $fincas_data]);
    }
}
