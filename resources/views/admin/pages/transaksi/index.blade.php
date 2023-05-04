@extends('admin.layouts.main')

@section('content')
<div class="card">
  <div class="d-flex justify-content-between">
    <h5 class="card-header">Transaction Data</h5>
    <div class="m-3">
        <a href="/transaksi/create" class="btn btn-primary">New Transaction</a>
    </div>
</div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>AccountId</th>
            <th>Transaction Date</th>
            <th>Description</th>
            <th>Debit Credit Status</th>
            <th>Amount</th>
            {{-- <th>Actions</th> --}}
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($datas as $data)
          <tr> 
            <td>{{$data->nasabah_id}}</td>
            <td>{{$data->transaction_date}}</td>
            <td>{{$data->description}}</td>
            <td>{{$data->debit_credit_status}}</td>
            <td>{{$data->amount}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection