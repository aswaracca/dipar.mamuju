@extends('home_layout.app')
@section('content')
<div class="container-fluid" style="padding-top: 80px;">
<!-- Widgets -->
<div class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card" style="height: 570px;">
                <div class="hidden-scrollbar">
                    <div class="inner-wisata">
                        <div class="body">

                            @if(count($wisata)>0)
                            <div class="row">
                                <h4 style="color: #03a9f4;">Wisata</h4>
                                <hr>
                                @foreach($wisata as $w)
                                    <div class="col-sm-2 col-md-2">
                                        <div class="thumbnail" onclick="window.location.href='{{ url('wisata/'.$w['id']) }}'">
                                            <img src="{{asset('images/wisata/'.$w['gambarUtama']['gambar']) }}">
                                            <div class="caption" style="padding-top: 0px;">
                                                <h3>{{ ucwords($w['name']) }}</h3>
                                                    <p style="font-size: 12px; color: #4caf50;"><i><u>{{ ucwords($w['kategori']['name']) }}</u></i></p>
                                                    <p style="text-align: left; color: #03a9f4; font-size: 12px;" >
                                                        <b>{{ ucfirst($w['location']) }}</b>
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @endif

                            @if(count($hotel)>0)
                            <div class="row">
                                <h4 style="color: #03a9f4;">Hotels</h4>
                                <hr>
                                @foreach($hotel as $h)
                                    <div class="col-sm-2 col-md-2">
                                        <div class="thumbnail"  onclick="window.location.href='{{ url('hotel/'.$h['id']) }}'">
                                            <img src="{{asset('images/hotel/'.$h['gambarUtama']['gambar']) }}">
                                            <div class="caption" style="padding-top: 0px;">
                                                <h3>{{ ucwords($h['name']) }}</h3>
                                                <p style="text-align: left; color: #03a9f4; font-size: 12px;" >
                                                    <b>{{ ucfirst($h['location']) }}.</b>
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @endif

                            @if(count($rumahMakan)>0)
                            <div class="row">
                                <h4 style="color: #03a9f4;">Rumah Makan</h4>
                                <hr>
                                @foreach($rumahMakan as $rm)
                                    <div class="col-sm-2 col-md-2">
                                        <div class="thumbnail" onclick="window.location.href='{{ url('rumah-makan/'.$rm['id']) }}'">
                                            <img src="{{asset('images/rm/'.$rm['gambarUtama']['gambar'])}}">
                                            <div class="caption" style="padding-top: 0px;">
                                                <h3 align="left">{{ ucwords($rm['name']) }}</h3>
                                                <p style="font-size: 12px; color: #4caf50;"><i><u>{{ ucfirst($rm['kategori']['name']) }}</u></i></p>
                                                
                                                <p style="text-align: left; color: #03a9f4; font-size: 12px;" >
                                                    <b>{{ ucfirst($rm['location']) }}</b>
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @endif

                            @if(count($dokumentasi)>0)
                            <div class="row">
                                <h4 style="color: #03a9f4;">Dokumentasi</h4>
                                <hr>
                                @foreach($dokumentasi as $d)
                                    <div class="col-sm-2 col-md-2">
                                        <div class="thumbnail"  onclick="window.location.href='{{ url('dokumentasi/'.$d['id']) }}'">
                                            <img src="{{asset('assets/images/thm.png')}}">
                                            <div class="caption" style="padding-top: 0px;">
                                                <h3 align="left">{{ ucwords($d['name']) }}</h3>
                                                    <p style="font-size: 12px; color: #4caf50;"><i><u>{{ ucfirst($d['kategori']['name']) }}</u></i></p>
                                                    <p style="text-align: left; color: #03a9f4; font-size: 12px;" >
                                                        <b>{{ ucfirst($d['date']) }}</b>
                                                    </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @endif
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