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
                        DAFTAR HOTEL DI MAMUJU
                    </h2>
                </div>
                <div class="body">
                    <div class="hidden-scrollbar">
                        <div class="inner-hotel">
                            <div class="row">
                                @foreach($hotel as $h)
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="info-box" style="height: 100px;" onclick="window.location.href='{{ url('hotel/'.$h->id) }}'">
                                        <div>
                                            <img src="{{ asset('images/hotel/'.$h['gambarUtama']['gambar']) }}" style="width: 150px; padding: 10px;">
                                        </div>
                                        <div class="content" style="padding-top: 0px;">
                                            <div class="text"><H4 style="color: #4caf50;"><u>{{ ucfirst($h['name']) }}</u></H4></div>
                                            <p style="color:black;">{{ ucfirst($h['location'])}}</p>
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