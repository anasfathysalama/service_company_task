@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top:20px">
                    <div class="card-header" style="display: flex; justify-content: space-between">
                        <h4>All Parcels</h4>
                        <button class="btn btn-primary" id="add-new-btn">Add</button>
                    </div>

                    <div class="card-body">
                        <h3> Sender Dashboard</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{asset('js/sender/create.js')}}?v=1.0.0"></script>
@endpush
