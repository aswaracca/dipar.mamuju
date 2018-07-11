@extends('home_layout.app')
@section('content')
<div class="container-fluid" style="padding-top: 80px;">
<!-- Widgets -->
<div class="content">
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="card" style="height: 570px;">
                <div class="header bg-orange" style="padding: 10px;">
                    <h2>
                        {{ ucfirst($wisata['name']) }}
                    </h2>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <div id="carousel-example-generic_1" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    @for($i=0; $i<count($wisata->gambar); $i++)
                                    <li data-target="#carousel-example-generic_1" data-slide-to="0" {{ $i == 0 ? 'class="active"' : '' }} ></li>
                                    @endfor
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    @for($i=0; $i<count($wisata->gambar); $i++)
                                    <div class="item {{ $i == 0 ? 'active' : '' }}">
                                        <img src="{{asset('images/wisata/'.$wisata->gambar[$i]->gambar)}}" />
                                    </div>
                                    @endfor
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic_1" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic_1" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="info-box">
                                <div class="icon">
                                    <i style="color:black" class="material-icons">visibility</i>
                                </div>
                                <div class="content">
                                    <div class="text" style="color:#03a9f4;"><H5>Alamat </H5></div>
                                    <div class="text"><p><i>{{ ucfirst($wisata->location) }} </i></p></div>
                                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="card" style="height: 570px;">
                <div class="header bg-orange" style="padding: 10px;">
                    <h2>
                        Details
                    </h2>
                </div>
                <div class="hidden-scrollbar">
                    <div class="inner-detail-wisata">
                        <div class="body" style="text-align: justify;">
                            <?=$wisata->description?>    
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
    
@endsection

@section('library-js')

@endsection

@section('js-code')

@endsection