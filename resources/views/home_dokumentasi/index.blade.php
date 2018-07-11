@extends('home_layout.app')
@section('content')
<div class="container-fluid" style="padding-top: 80px;">
<!-- Widgets -->
<div class="content">
    <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="card" style="height: 570px;">
                        <div class="header bg-orange" style="padding: 10px;">
                            <h2>
                                DOKUMENTASI
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <video autoplay="1" preload="none" poster="parrots-poster.jpg" width="100%">
                                   <source src="{{ asset('images/dokumentasi/'.$dokumentasi['name_ex']) }}" type="video/mp4">
                                   <source src="parrots.webm" type="video/webm">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card" style="height: 570px;">
                        <div class="header bg-orange" style="padding: 10px;">
                            <h2>
                                PLAYLIST
                            </h2>
                        </div>
                        <div class="body">
                            <div class="hidden-scrollbar">
                                <div class="inner-dokumentasi">
                                    <div class="row">
                                        @foreach($dok as $d)
                                            <div class="info-box" style="height: 100px;" onclick="window.location.href='{{ url('dokumentasi/'.$d['id']) }}'">
                                                <div>
                                                    <img src="{{asset('assets/images/thm.png')}}" style="width: 150px; padding: 10px;">
                                                </div>
                                                <div class="content" style="padding-top: 0px;">
                                                    <div class="text"><H4><b>{{ ucfirst($d['name']) }}</b></H4></div>
                                                    <p style="font-size: 12px; color: #4caf50;">
                                                        <i>{{ $d['kategori']['name'] }}</i>
                                                    </p>
                                                    <p style="color:black; font-size: 12px;">Date : {{ $d['date'] }}</p>
                                                </div>
                                            </div>
                                        @endforeach
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