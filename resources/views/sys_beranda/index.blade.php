@extends('sys_layout.app')

@section('content')
<div class="container-fluid">
    <!-- <div class="block-header">
        <h2>COLORED CARDS</h2>
    </div> -->
    <!-- Basic Example -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-red">
                    <h2>Selamat datang admin<small>Anda telah login sebagai admin</small></h2>
                </div>
                <div class="body">
                    <ul>
                        <li>Untuk menambah data tekan tombol  <a href="" class="btn bg-primary btn-xs waves-effect">+ Tambah</a><br><br></li>
                        <li>Untuk mengedit data tekan tombol  <a href="" class="btn bg-primary btn-xs waves-effect">Edit</a><br><br></li>
                        <li>Untuk menghapus data tekan tombol  <a d="todolink" data-toggle="modal" class="btn bg-red btn-xs waves-effect">Hapus</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="window.location.href='{{ route('wisata.index') }}';">
            <div class="info-box-2 bg-green hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">gps_fixed</i>
                </div>
                <div class="content">
                    <div class="text"><b>WISATA</b></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="window.location.href='{{ route('hotel.index') }}';">
            <div class="info-box-2 bg-teal hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">hotel</i>
                </div>
                <div class="content">
                    <div class="text"><b>HOTEL</b></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="window.location.href='{{ route('rumah-makan.index') }}';">
            <div class="info-box-2 bg-deep-orange hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">local_dining</i>
                </div>
                <div class="content">
                    <div class="text"><b>RUMAH MAKAN</b></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="window.location.href='{{ route('dokumentasi.index') }}';">
            <div class="info-box-2 bg-cyan hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">camera_alt</i>
                </div>
                <div class="content">
                    <div class="text"><b>DOKUMENTASI</b></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="window.location.href='{{ route('profil.index') }}';">
            <div class="info-box-2 bg-red hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">live_tv</i>
                </div>
                <div class="content">
                    <div class="text" style="line-height: 70px"><b>PROFIL</b></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="window.location.href='{{ route('user.index') }}';">
            <div class="info-box-2 bg-blue hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">group</i>
                </div>
                <div class="content">
                    <div class="text" style="line-height: 70px"><b>USER</b></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="window.location.href='{{ route('user.edit',['user'=>auth()->user()->id]) }}';">
            <div class="info-box-2 bg-indigo hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">person</i>
                </div>
                <div class="content">
                    <div class="text" style="line-height: 70px"><b>AKUN</b></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="window.location.href='{{ url('/') }}';">
            <div class="info-box-2 bg-light-green hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">home</i>
                </div>
                <div class="content">
                    <div class="text" style="line-height: 70px"><b>HOMEPAGE</b></div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- #END# Colored Card - With Loading -->
</div>
@endsection

@section('library-css')
<!-- kosong -->
@endsection

@section('style-css')
<!-- kosong -->
@endsection

@section('library-js')
    <script src="{{asset('assets/js/pages/widgets/infobox/infobox-3.js')}}"></script>
@endsection

@section('js-code')

@endsection