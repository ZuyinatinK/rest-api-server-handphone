<?php

namespace App\Http\Controllers;

use App\Models\Handphone;
use Illuminate\Http\Request;

class IdController extends Controller
{
     public function getId(Request $request){
          $id = $request->id;
          return Handphone::find($id);
     }
}