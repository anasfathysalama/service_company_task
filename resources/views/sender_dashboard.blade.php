@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="margin-top:20px">
                    <div class="card-header" style="display: flex; justify-content: space-between">
                        <h4>All Parcels</h4>
                        <button class="btn btn-primary" id="add-new-btn">Add</button>
                    </div>

                    <div class="card-body">

                        <table class="table" id="parcels-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Pick-up Address</th>
                                <th>Drop-off Address</th>
                                <th>Status</th>
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


    <div class="modal" id="create-parcel-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create new parcel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="" id="create-parcel-form">

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">Pick-up Address</label>
                            <div class="col-md-6">
                                <input type="text" id="pick_up_address" class="form-control" name="pick_up_address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Drop-off Address</label>
                            <div class="col-md-6">
                                <input type="text" id="drop_off_address" class="form-control" name="drop_off_address">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="save-parcel-btn">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        let baseUrl = "{{url('/')}}";
        let token = "{{csrf_token()}}";
    </script>
    <script src="{{asset('js/sender/main.js')}}?v=1.0.0"></script>
    <script src="{{asset('js/sender/create.js')}}?v=1.0.0"></script>
@endpush
