@extends('home_layout.app')
@section('content')
<div class="container-fluid" style="padding-top: 80px;">
<!-- Widgets -->
<div class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card" style="height: 570px;">
                <div class="body">
                    <div class="row">
                        <div class="hidden-scrollbar">
                            <div class="inner-rumah-makan">
                                <form>
                                    
                                <div style="padding-left: 300px; padding-right: 300px;padding-top: 100px;">
                                    <input type="text" name="search" placeholder="Search.." style="font-size: 16px; color:black; padding-left: 10px;">
                                </div>
                                <div align="center" style="padding-top: 30px;">
                                    <button  type="submit" class="btn btn-success btn-lg waves-effect" style="margin-right: 20px;">Search</button>
                                    <a href="{{ url('/') }}" type="button" class="btn bg-grey btn-lg waves-effect">Back</a> 
                                </div>       
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('library-css')
    
@endsection

@section('style-css')
    <style type="text/css">
        input[type=text] {
            width: 130px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            width: 100%;
            height: 40px;
        }
    </style>
@endsection

@section('library-js')

@endsection

@section('js-code')

@endsection