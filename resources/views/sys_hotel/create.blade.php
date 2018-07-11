@extends('sys_layout.app')
@section('content')
<div class="container-fluid">
    <!-- Basic Example -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
            <div class="card">
                <div class="header bg-red">
                    <h2>
                        Tambah Hotel
                    </h2>
                </div>
                <div class="body">
                    {{ Form::open(array('url' => route('hotel.store'), 'method' => 'post')) }}
                    <p><b>Name</b></p>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" placeholder="Nama Hotel" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p><b>Lokasi</b></p>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea class="form-control" name="location" placeholder="Lokasi Hotel" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p><b>Deskripsi</b></p>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea id="ckeditor" name="description" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">

                            <button type="submit" class="btn btn-primary m-t-15 waves-effect pull-right">Simpan</button>
                            <button type="reset" class="btn btn-danger m-t-15 waves-effect pull-right m-r-10">Reset</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>

        </div>
    </div>
    <!-- #END# Input -->
</div>

@endsection

@section('library-css')
<!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endsection

@section('style-css')
@endsection


@section('library-js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <script src="{{ asset('assets/js/pages/forms/form-validation.js') }}"></script>

    <!-- TinyMCE -->
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('js-code')
<script type="text/javascript">
    $(function () {
    //TinyMCE
    CKEDITOR.replace('ckeditor');
    CKEDITOR.config.height = 300;
});
</script>
@endsection