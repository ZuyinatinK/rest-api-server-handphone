<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
// use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Handphone;
use App\Http\Resources\Handphone as HandphoneResource;

class HandphoneController extends BaseController
{
     public function index()
     {
          $handphone = Handphone::all();
          return $this->sendResponse(HandphoneResource::collection($handphone),'Handphone ditampilkan.');
     }

     public function create(Request $request)
     {
          $input = $request->all();
          $validator = Validator::make($input,[
               'nama' => 'required',
               'tipe' => 'required',
               'ram' => 'required',
               'rom' => 'required',
               'harga' => 'required',
          ]);
          
          if ($validator->fails()) {
               return $this->sendError('Error validation', $validator->errors());
          }

          $handphone = Handphone::create($input);

          return $this->sendResponse(new HandphoneResource($handphone), 'Data handphone ditambahkan.');
     }

     public function show($id)
     {
          $handphone = Handphone::find($id);
          if(is_null($handphone)){
               return $this->sendError('Data does not exist.');
          }
          return $this->sendResponse(new HandphoneResource($handphone), 'Data ditampilkan.');
     }

     public function update(Request $request, Handphone $handphone)
     {
          $input = $request->all();

          $validator = Validator::make($input, [
               'nama' => 'required',
               'tipe' => 'required',
               'ram' => 'required',
               'rom' => 'required',
               'harga' => 'required',
          ]);

          if($validator->fails()){
               return $this->sendError($validator->errors());
          }

          $handphone->nama = $input['nama'];
          $handphone->tipe = $input['tipe'];
          $handphone->ram = $input['ram'];
          $handphone->rom = $input['rom'];
          $handphone->harga = $input['harga'];
          $handphone->save();

          return $this->sendResponse(new HandphoneResource($handphone), 'Data updated.');
     }

     public function destroy(Handphone $handphone)
     {
          $handphone->delete();

          return $this->sendResponse([], 'Data deleted.');
     }
}
