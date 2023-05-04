@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="d-flex justify-content-between">
            <h5 class="card-header">Data Nasabah</h5>
            <div class="m-3">
                <a href="/nasabah/create" class="btn btn-primary">Add Nasabah</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Account Id</th>
                        <th>Name</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($datas as $data)
                    <tr>
                        <td class="w-25">{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
