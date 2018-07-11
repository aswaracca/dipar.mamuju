@extends('sys_layout.app')
@section('content')
<div class="container-fluid">
    <!-- Basic Example -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
            <div class="card">
                <div class="header bg-red">
                    <h2>
                        Tambah Dokumentasi
                    </h2>
                </div>
                <div class="body">
                    {{ Form::open(array('url' => route('dokumentasi.store'), 'method' => 'post','enctype' => 'multipart/form-data')) }}
                    
                    <p><b>Kategori Dokumentasi</b></p>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <select class="form-control" name="id_kategori" required>
                                <option value="" disable selected> -- Pilih Kategori -- </option>
                                @foreach($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <p><b>Name</b></p>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" placeholder="Nama Dokumentasi" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p><b>Tanggal</b></p>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="date" placeholder="Tanggal Dokumentasi" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p><b>Video</b></p>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" class="form-control" name="video" accept=".mp4" placeholder="Vidio Dokumentasi" required>
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

@endsection

@section('js-code')

@endsection