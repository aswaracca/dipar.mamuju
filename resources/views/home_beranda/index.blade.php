@extends('home_layout.app')
@section('content')
<div class="container-fluid" style="padding-top: 80px;">
<!-- Widgets -->
<div class="content">
    <div class="row clearfix">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    <div class="card" style="height: 530px;">
                        <div class="header bg-orange" style="padding: 10px; ">
                            <h2>
                                DOKUMENTASI
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <video autoplay="1"  preload="none" width="100%">
                                   <source src="{{ asset('images/dokumentasi/'.$profil['dokumentasi']['name_ex']) }}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <marquee bgcolor="orange"><h4>Selamat Datang di Sistem Informasi Pariwisata Kabupaten Mamuju</h4></marquee>
                    </div>
                </div>

                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                                <div id="carousel-example-generic_1" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <?php $i=1;?>
                                            @foreach($wisata as $w)
                                            <li data-target="#carousel-example-generic_1" data-slide-to="{{$i}}" class="{{ $i == 1 ? 'active':'' }}"></li>
                                            <?php $i++?>
                                            @endforeach
                                    </ol>
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <?php $i=1;?>
                                        @foreach($wisata as $w)
                                        <div class="item {{ $i == 1 ? 'active':'' }}">
                                            <img src="{{asset('images/wisata/'.$w['gambarUtama']['gambar'])}}" />
                                            <div class="carousel-caption">
                                                <h3>{{ ucfirst($w['name']) }}</h3>
                                                <p>{{ ucfirst($w['kategori']['name']) }}</p>
                                            </div>
                                        </div>
                                        <?php $i++?>
                                        @endforeach
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
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-left: 30px;">
                            <div class="card">
                                <div class="body">
                                    <div id="carousel-example-generic_2" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <?php $i=1;?>
                                            @foreach($hotel as $w)
                                            <li data-target="#carousel-example-generic_2" data-slide-to="{{$i+2}}" class="{{ $i == 1 ? 'active':'' }}"></li>
                                            <?php $i++?>
                                            @endforeach
                                        </ol>
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <?php $i=1;?>
                                            @foreach($hotel as $w)
                                            <div class="item {{ $i == 1 ? 'active':'' }}">
                                                <img src="{{asset('images/hotel/'.$w['gambarUtama']['gambar'])}}" />
                                            </div>
                                            <?php $i++?>
                                            @endforeach
                                        </div>
                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#carousel-example-generic_2" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic_2" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-right: 30px;">
                            <div class="card">
                                <div class="body">
                                    <div id="carousel-example-generic_3" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <?php $i=1;?>
                                            @foreach($rm as $w)
                                            <li data-target="#carousel-example-generic_3" data-slide-to="{{$i+5}}" class="{{ $i == 1 ? 'active':'' }}"></li>
                                            <?php $i++?>
                                            @endforeach
                                        </ol>
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <?php $i=1;?>
                                            @foreach($rm as $w)
                                            <div class="item {{ $i == 1 ? 'active':'' }}">
                                                <img src="{{asset('images/rm/'.$w['gambarUtama']['gambar'])}}" />
                                            </div>
                                            <?php $i++?>
                                            @endforeach
                                        </div>
                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#carousel-example-generic_3" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic_3" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
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
    
@endsection

@section('library-js')

@endsection

@section('js-code')

@endsection