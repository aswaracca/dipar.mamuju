@extends('sys_layout.app')
@section('content')
<div class="container-flxuid">
    <!-- <div class="block-header">
        <h2>COLORED CARDS</h2>
    </div> -->
    <!-- Basic Example -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-red">
                    <h2>Daftar Wisata</h2>
                </div>
                <div class="body">
                    <a href="{{ route('wisata.create') }}" class="btn bg-primary btn-lg waves-effect">+ Tambah</a><br><br>

                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                                $i=1;
                            @endphp
                            @forelse($wisata as $h)
                           <tr onclick="window.location = '{{ route('wisata.show', ['wisata' => $h['id']]) }}'">
                               <td>{{ $i++ }}</td>
                               <td>{{ $h['kategori']['name'] }}</td>
                               <td>{{ $h['name'] }}</td>
                               <td>{{ $h['location'] }}</td>
                           </tr>
                           @empty
                           <tr>
                               <td colspan="4" style="text-align: center;">Data Kosong</td>
                           </tr>
                           @endforelse
                        </tbody>
                        <tbody>
                            
                        </tbody>
                    </table> 

                    
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Colored Card - With Loading -->
</div>
@endsection

@section('library-css')
<!-- JQuery DataTable Css -->
<link href="{{asset('assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
 <!-- Bootstrap Select Css -->
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection

@section('style-css')
@endsection


@section('library-js')
 <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('assets/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

@endsection

@section('js-code')
<script type="text/javascript">

    var t = $('.js-basic-example').DataTable({
        pageLength: 25,
        responsive: true
    });
</script>
@endsection