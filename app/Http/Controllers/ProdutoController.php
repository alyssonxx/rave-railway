<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function produtos(){
        $produtos =  DB::table('produtos')->get();

        if(!empty($produtos)){
            return response()->json($produtos);
        }
        return [];
    }

}
