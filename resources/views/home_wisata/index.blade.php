@extends('home_layout.app')
@section('content')
<div class="container-fluid" style="padding-top: 80px;">
<!-- Widgets -->
<div class="content">
    <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="height: 570px;">
                        <div class="header bg-orange" style="padding: 10px;">
                            <h2>
                                WISATA MAMUJU
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="hidden-scrollbar">
                                    <div class="inner-wisata">
                                        @foreach($data as $d)
                                        <div class="col-sm-2 col-md-2">
                                            <div class="thumbnail" onclick="window.location.href='{{ url('wisata/'.$d->id) }}'">
                                                <img src="{{ asset('images/wisata/'.$d['gambarUtama']['gambar']) }}" alt="{{ $d['gambarUtama']['name'] }}">
                                                <div class="caption" style="padding-top: 0px;">
                                                    <h3>{{ $d['name'] }}</h3>
                                                    <p style="font-size: 12px; color: #4caf50;"><i><u>{{ $d['kategori']['name'] }}</u></i></p>
                                                    
                                                    <p style="text-align: left; color: #03a9f4; font-size: 12px;" >
                                                        <b>{{ $d['location'] }}</b>
                                                    </p>
                                                
                                                </div>
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