@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="margin-top:20px">
                    <div class="card-header" style="display: flex; justify-content: space-between">
                        <h4>All Parcels</h4>
                    </div>

                    <div class="card-body">

                        <table class="table" id="parcels-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Pick-up Address</th>
                                <th>Drop-off Address</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        let baseUrl = "{{url('/')}}";
    </script>
    <script src="{{asset('js/biker/main.js')}}?v=1.0.0"></script>
@endpush
