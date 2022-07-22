<?php

namespace App\Http\Controllers;
use App\Models\Datasiswa;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $datasiswa = DataSiswa::all();
        return view('datasiswa.index', ['datasiswa' => $datasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('datasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'nis' => 'required',
            'nama_siswa' => 'required',
            'alamat_siswa' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $datasiswa = new DataSiswa();
        $datasiswa->nis = $request->nis;
        $datasiswa->nama_siswa = $request->nama_siswa;
        $datasiswa->alamat_siswa = $request->alamat_siswa;
        $datasiswa->tanggal_lahir = $request->tanggal_lahir;
        $datasiswa->save();
        return redirect()->route('datasiswa.index')->with('succes',
        'Data berhasil dibuat!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $datasiswa = DataSiswa::findOrFail($id);
        return view('datasiswa.show', compact('datasiswa'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $datasiswa = DataSiswa::findOrFail($id);
        return view('datasiswa.edit', compact('datasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validated = $request->validate([
            'nis' => 'required',
            'nama_siswa' => 'required',
            'alamat_siswa' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $datasiswa = DataSiswa::findOrFail($id);
        $datasiswa->nis = $request->nis;
        $datasiswa->nama_siswa = $request->nama_siswa;
        $datasiswa->alamat_siswa = $request->alamat_siswa;
        $datasiswa->tanggal_lahir = $request->tanggal_lahir;
        $datasiswa->save();
        return redirect()->route('datasiswa.index')->with('succes',
        'Data berhasil dibuat!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $datasiswa = DataSiswa::findOrFail($id);
        $datasiswa->delete();
        return redirect()->route('datasiswa.index')->with('Succes',
        'Data berhasil dihapus!');
    }
}
