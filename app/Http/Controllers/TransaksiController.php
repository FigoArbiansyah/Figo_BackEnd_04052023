<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Transaksi::all();
        return view('admin.pages.transaksi.index', [
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
        $nasabahData = Nasabah::all();
        return view('admin.pages.transaksi.create', [
            'nasabahData' => $nasabahData,
        ]);
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
            'account_id' => ['required'],
            'transaction_date' => ['required'],
            'description' => ['required'],
            'debit_credit_status' => ['required'],
            'amount' => ['required'],
        ]);

        $transaksi = new Transaksi();
        $transaksi->nasabah_id = $request->account_id;
        $transaksi->transaction_date = $request->transaction_date;
        $transaksi->description = $request->description;
        $transaksi->debit_credit_status = $request->debit_credit_status;
        $transaksi->amount = $request->amount;
        if ($request->description == 'Bayar Listrik' || $request->description == 'Beli Pulsa') {
            if ($request->description == 'Beli Pulsa' && $request->amount <= 10000) {
                $transaksi->point = ($request->amount / 1000) * 0;
            } elseif ($request->description == 'Beli Pulsa' && $request->amount > 10000 && $request->amount <= 30000) {
                $transaksi->point = ($request->amount / 1000) * 1;
            } elseif ($request->description == 'Beli Pulsa' && $request->amount > 30000) {
                $transaksi->point = ($request->amount / 1000) * 2;
            } elseif ($request->description == 'Bayar Listrik' && $request->amount <= 50000) {
                $transaksi->point = ($request->amount / 2000) * 0;
            } elseif ($request->description == 'Bayar Listrik' && $request->amount > 50000 && $request->amount <= 100000) {
                $transaksi->point = ($request->amount / 2000) * 1;
            } elseif ($request->description == 'Bayar Listrik' && $request->amount > 100000) {
                $transaksi->point = ($request->amount / 2000) * 2;
            }
        }
        $transaksi->save();

        return redirect('/transaksi')->withInfo('Create new transaction successful!');
    }

    public function report(Request $request)
    {
        $transaksi = null;
        $nasabah = Nasabah::all();

        if ($request->has('account_id') && $request->has('start_date') && $request->has('end_date')) {
            $transaksi = Transaksi::where('nasabah_id', $request->input('account_id'))
                ->whereDate('transaction_date', '>=', $request->input('start_date'))
                ->whereDate('transaction_date', '<=', $request->input('end_date'));
        }

        return view('admin.pages.transaksi.report-transaksi', [
            'transaksi' => $transaksi,
            'nasabah' => $nasabah,
        ]);
    }

    public function print(Request $request)
    {
        $transaksi = Transaksi::where('nasabah_id', $request->input('account_id'))
            ->whereDate('transaction_date', '>=', $request->input('start_date'))
            ->whereDate('transaction_date', '<=', $request->input('end_date'));

        return view('admin.pages.transaksi.cetak', [
            'transaksi' => $transaksi,
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
