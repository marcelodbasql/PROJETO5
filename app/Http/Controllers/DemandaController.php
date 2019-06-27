<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Demandas;

class DemandaController extends BaseController
{
    public function store(Demandas $request) 
    {       
        // Read File
        $jsonString = file_get_contents(base_path('database/data.json'));
        $data = json_decode($jsonString, true);
        // Write File
        array_push($data, 
            [
                "id" => (count($data) + 1),
                "unidade" => $request->input('unidade'),
                "orgao" => $request->input('orgao'),
                "apontamento" => $request->input('apontamento'),
                "gestor" => $request->input('gestor'),
                "responsavel" => $request->input('responsavel'),
                "status" => $request->input('status'),
                "recebimento" => $request->input('recebimento'),
                "prazo" => $request->input('prazo')
            ]
        );
        $newJsonString = json_encode($data, JSON_PRETTY_PRINT);
        // Save File  
        file_put_contents(base_path('database/data.json'), stripslashes($newJsonString));
        return redirect()->action('DemandaController@relatorio'); 
    }

    public function DeleteDemanda($id) 
    {
        // Read File
        $jsonString = file_get_contents(base_path('database/data.json'));
        $data = json_decode($jsonString, true);
        foreach($data as $key=>$value):
            if($value['id'] == $id):
                unset($data[$key]);
            endif;
        endforeach;
        $newJsonString = json_encode($data, JSON_PRETTY_PRINT);
        // Save File  
        file_put_contents(base_path('database/data.json'), stripslashes($newJsonString));
        return redirect()->action('DemandaController@relatorio');
    }

    public function relatorio() {
        $jsonString = file_get_contents(base_path('database/data.json'));
        $data = json_decode($jsonString, true);
        return view('relatorio')->with('demandas', $data);
    }

    public function GetDemanda($id) {
        // Read File
        $jsonString = file_get_contents(base_path('database/data.json'));
        $data = json_decode($jsonString, true);
        $demanda;
        foreach($data as $key=>$value):
            if($value['id'] == $id):
                $demanda = $value;
            endif;
        endforeach;
        return $demanda;
    }

}
