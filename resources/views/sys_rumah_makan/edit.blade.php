@extends('sys_layout.app')
@section('content')
<div class="container-fluid">
    <!-- Basic Example -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
            <div class="card">
                <div class="header bg-red">
                    <h2>
                       Edit {{ $rm['name'] }}
                    </h2>
                </div>
                <div class="body">
                    {{ Form::open(array('url' => route('rumah-makan.update',['rumah_makan' => $rm->id]), 'method' => 'put')) }}
                    <p><b>Kategori Rumah Makan</b></p>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <select class="form-control" name="id_kategori" required>
                                <option value="" disable selected> -- Pilih Kategori -- </option>
                                @foreach($kategori as $k)
                                <option value="{{ $k->id }}" <?php if($k->id == $rm['id_kategori'])echo "selected";?>>{{ $k->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <p><b>Name</b></p>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" value="{{ $rm['name'] }}" placeholder="Username" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p><b>Lokasi</b></p>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea class="form-control" name="location" required>{{ $rm['location'] }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p><b>Deskripsi</b></p>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea id="ckeditor" name="description" required>{{ $rm['description'] }}</textarea>
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