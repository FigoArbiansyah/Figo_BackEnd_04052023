@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Nasabah</h5>
                    <small class="text-muted float-end">account id values cannot be the same</small>
                </div>
                <div class="card-body">
                    <form action="/nasabah" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Account Id</label>
                            <input type="number" name="id" class="form-control" id="basic-default-fullname"
                                placeholder="this input is not required (Auto Increments)">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Name</label>
                            <input type="text" name="name" class="form-control" id="basic-default-fullname"
                                placeholder="">
                            @error('name')
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
