<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
   //
   public function insert(){
    Album::create([
          'title'=>'Leaving through the window 3',
          'artist'=>'Something corporate',
          'genre' => 'Piano Rock 1',
          'year'=>2001
    ]);
}


public function showQueries(){
       # Fetch method
       // return Album::find(1);
       // return Album::find([1,2]);
       // return Album::all();
       // return Album::first();
       // Album::where('artist','=','Matt Nathanson')->update(['artist'=>'John Doe']);
       // return Album::all();
       // Album::where('artist','=','John Doe')->delete();
       // return Album::all();
       // return Album::where('title','=','North')->get();
       // return Album::where('artist','=','Something corporate')->get(['id','title']);
       // return Album::where('artist','=','Something corporate')->toSql();
       // return Album::where('artist','=','Something corporate')->where('year','=',2001)->get();
       // return Album::where('artist','=','Something corporate')->orWhere('year','=',2001)->get();
       // return Album::whereRaw('artist=? AND year=?',['Something corporate',2001])->get();
       return Album::whereBetween('year',[2000,2010])->get();
       // return Album::where('artist','=','Something corporate')->orderBy('year')->get();
    //    return Album::where('artist','=','Something corporate')->orderBy('year','desc')->get();

    }
}
