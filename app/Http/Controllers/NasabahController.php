<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Nasabah::all();
        return view('admin.pages.nasabah.index', [
            'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.nasabah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $nasabah = new Nasabah();
        if (filled($request->id)) {
            $nasabah->id = $request->id;
        } else {
            $nasabah->id = null;
        }
        $nasabah->name = $request->name;
        $nasabah->save();
        return redirect('/nasabah')->withInfo('Add nasabah successful!');
    }

    public function point()
    {
        $nasabah = Nasabah::with('transaksi')->get()->map(function($n) {
            $point = Nasabah::with("transaksi")->where("id", $n->id)->get()
            ->flatMap(function ($n) {
                return $n->transaksi->map(function ($t) use ($n) {
                    return $t->point;
                });
            })
            ->sum();
            return [
                "id" => $n->id,
                "name" => $n->name,
                "point" => $point,
            ];
        });
        
        // echo "<br><br><br><br><br><br>".$nasabah;

        return view('admin.pages.nasabah.point-nasabah', [
            'nasabah' => json_decode($nasabah),
        ]);
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
    }
}
