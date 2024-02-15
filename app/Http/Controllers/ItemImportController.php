<?php

namespace App\Http\Controllers;

use App\Jobs\ItemCsvData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class ItemImportController extends Controller
{
    //
    public function index(){
        return view('item.import');
    }

    public function store(Request $request){
        if($request->has('csv')){
            $csv = file($request->csv);
            $chunks = array_chunk($csv,2);
            $header = [];
            $batch = Bus::batch([])->dispatch();

            foreach($chunks as $key =>$chunk){
                $data = array_map('str_getcsv',$chunk);
                if($key == 0){
                    $header = $data[0];
                    unset($data[0]);
                }
                $batch->add(new ItemCsvData($data,$header));
            }
            return redirect('/items_import')->with('status','CSV import added on queue');
        }
    }

}
