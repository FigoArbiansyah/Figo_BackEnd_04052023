@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="d-flex justify-content-between">
            <h5 class="card-header">Point Nasabah</h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Account Id</th>
                        <th>Name</th>
                        <th>Total Point</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($nasabah as $n)
                        <tr>
                            <td>{{ $n->id }}</td>
                            <td>{{ $n->name }}</td>
                            <td>{{ $n->point }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
