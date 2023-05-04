@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create new transaction</h5>
                </div>
                <div class="card-body">
                    <form action="/transaksi" method="post">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Account Id</label>
                            <select name="account_id" class="form-control" id="">
                                @foreach ($nasabahData as $nasabah)
                                    <option value="{{ $nasabah->id }}">{{ $nasabah->name }} &nbsp; (id = {{ $nasabah->id }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Transaction Date</label>
                            <input type="date" name="transaction_date" class="form-control" id="basic-default-fullname"
                                value="{{date("Y-m-d")}}">
                            @error('transaction_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Description</label>
                            <select type="text" name="description" class="form-control" id="basic-default-fullname">
                                <option value="Tarik Tunai">Tarik Tunai</option>
                                <option value="Setor Tunai">Setor Tunai</option>
                                <option value="Beli Pulsa">Beli Pulsa</option>
                                <option value="Bayar Listrik">Bayar Listrik</option>
                            </select>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Debit Credit Status</label>
                            <select type="text" name="debit_credit_status" class="form-control"
                                id="basic-default-fullname">
                                <option value="D">Debit</option>
                                <option value="C">Kredit</option>
                            </select>
                            @error('debit_credit_status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Amount</label>
                            <input type="number" name="amount" class="form-control" id="basic-default-fullname"
                                placeholder="">
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
