@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <h5 class="card-header">Cetak Laporan</h5>
        <form action="/cetak_transaksi" method="get">
            <div class="d-flex gap-3 mx-4 align-items-center">
                <div class="form-group mb-3">
                    <label for="">Nasabah</label>
                    <select name="account_id" class="form-control" id="">
                        @foreach ($nasabah as $data)
                            <option value="{{ $data->id }}">{{ $data->name }} - id {{ $data->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Start Date</label>
                    <input required type="date" name="start_date" value="{{ request()->input('start_date') }}" id=""
                        class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">End Date</label>
                    <input required type="date" name="end_date" value="{{ request()->input('end_date') }}" id=""
                        class="form-control">
                </div>
                <div><button type="submit" class="btn btn-primary">Search</button></div>
            </div>
        </form>
        <p class="my-2 mx-4 text-muted">Cari laporan berdasarkan id nasabah, tanggal awal, dan tanggal akhir yang dipilih
        </p>

        @if ($transaksi != null && $transaksi->count() >= 1)
        <div><a href="/cetak_transaksi/cetak?account_id={{request()->input('account_id')}}&start_date={{request()->input('start_date')}}&end_date={{request()->input('end_date')}}" 
            class="btn btn-sm btn-danger m-3">Cetak</a></div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Transaction Date</th>
                            <th>Description</th>
                            <th>Credit</th>
                            <th>Debit</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($transaksi->get() as $data)
                            <tr>
                                <td>{{ $data->transaction_date }}</td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->debit_credit_status == 'C' ? $data->amount : '-' }}</td>
                                <td>{{ $data->debit_credit_status == 'D' ? $data->amount : '-' }}</td>
                                <td>{{ $data->amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
