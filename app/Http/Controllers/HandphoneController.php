<?php

namespace App\Http\Controllers;

use App\Models\Handphone;
use Illuminate\Http\Request;

class HandphoneController extends Controller
{
    /**
     * Fungsi Index untuk menampilkan data semua Handphone
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Handphone::all();
    }

    /**
     * Fungsi create untuk menambahkan Handphone baru
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $handphone = new Handphone();
        $handphone->nama = $request->nama;
        $handphone->tipe = $request->tipe;
        $handphone->ram = $request->ram;
        $handphone->rom = $request->rom;
        $handphone->harga = $request->harga;
        $handphone->save();

        return "Data Handphone Berhasil Ditambahkan";
    }

    /**
     * Fungsi update untuk merubah data Handphone
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Handphone  $handphone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $nama = $request->nama;
        $tipe = $request->tipe;
        $ram = $request->ram;
        $rom = $request->rom;
        $harga = $request->harga;

        $handphone = Handphone::find($id);
        $handphone->nama = $nama;
        $handphone->tipe = $tipe;
        $handphone->ram = $ram;
        $handphone->rom = $rom;
        $handphone->harga = $harga;
        $handphone->save();

        return "Data Handphone Berhasil Diubah";
    }

    /**
     * Fungsi untuk menghapus data Handphone
     *
     * @param  \App\Models\Handphone  $handphone
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $handphone = Handphone::find($id);
        $handphone->delete();

        return "Data Handphone Berhasil Dihapus";
    }
}
