@extends('sys_layout.app')
@section('content')
<div class="container-fluid">
    <!-- Basic Example -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
            <div class="card">
                <div class="header bg-red">
                    <h2>
                       Edit {{ $user['name'] }}
                    </h2>
                </div>
                <div class="body">
                    {{ Form::open(array('url' => route('user.update',['user' => $user->id]), 'method' => 'put')) }}
                    <p><b>Name</b></p>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" value="{{ $user['name'] }}" placeholder="Username" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p><b>Username</b></p>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control"value="{{ $user['username'] }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p><b>Password</b></p>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="passowrd" class="form-control" name="password" placeholder="Password" >
                                </div>
                                <span>*input untuk mengganti</span>
                            </div>
                        </div>
                    </div>
                    <p><b>Ulangi Password</b></p>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" class="form-control" name="confirm" placeholder="Ulangi Password" >
                                </div>
                                <span>*input untuk mengganti</span>
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