<?php

namespace App\Http\Controllers;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
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

    public function grade($nilai){
        if($nilai <= 100 && $nilai >=90){
            $grade = "A";
        } elseif($nilai <= 90 && $nilai >= 80){
            $grade = "B";
        } elseif($nilai <= 80 && $nilai >= 70){
            $grade = "C";
        } elseif($nilai <= 70 && $nilai >= 50){
            $grade = "D";
        } elseif($nilai <= 50 && $nilai >= 30){
            $grade = "E";
        } elseif($nilai <= 30 && $nilai >= 0){
            $grade = "F";
        } else {
            $grade = "Grade Tidak Ada";
        }

        return $grade;
    }



    public function index()
    {
        $nilai = Nilai::all();
        return view('nilai.index', ['nilai' => $nilai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nilai.create');
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
            'kode_mapel' => 'required',
            'nilai' => 'required',
        ]);

        $nilai = new Nilai();
        $nilai->nis = $request->nis;
        $nilai->kode_mapel = $request->kode_mapel;
        $nilai->nilai = $request->nilai;
        $nilai->grade = $this->grade($nilai->nilai);
        
        $nilai->save();
        return redirect()->route('nilai.index')->with('succes',
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

        $nilai = Nilai::findOrFail($id);
        return view('nilai.show', compact('nilai'));

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

        $nilai = Nilai::findOrFail($id);
        return view('nilai.edit', compact('nilai'));
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
            'kode_mapel' => 'required',
            'nilai' => 'required',
            
        ]);

        $nilai = Nilai::findOrFail($id);
        $nilai->nis = $request->nis;
        $nilai->kode_mapel = $request->kode_mapel;
        $nilai->nilai = $request->nilai;
        $nilai->grade = $this->grade($nilai->nilai);
       
        $nilai->save();
        return redirect()->route('nilai.index')->with('succes',
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
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();
        return redirect()->route('nilai.index')->with('Succes',
        'Data berhasil dihapus!');
    }
}
