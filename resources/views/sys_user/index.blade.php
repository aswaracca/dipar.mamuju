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
                    <h2>Daftar Admin</h2>
                </div>
                <div class="body">
                    <a href="{{ route('user.create') }}" class="btn bg-primary btn-lg waves-effect">+ Tambah</a><br><br>

                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                                $i=1;
                            @endphp
                            @forelse($user as $val)
                           <tr>
                               <td>{{ $i++ }}</td>
                               <td>{{ $val['name'] }}</td>
                               <td>{{ $val['username'] }}</td>
                               <td>
                                   <a href="{{ route('user.edit',['user'=> $val->id]) }}" class="btn btn-primary">Edit</a>
                                   <button class="btn btn-danger btn-delete" data-id="{{ $val->id }}">Hapus</button>
                               </td>
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


    $('.btn-delete').click(function(){
        var dataId = $(this).data('id');
        swal({
            title: "Apakah Anda yakin?",
            text: "Data tidak dapat dikembalikan setelah terhapus!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak, Batalkan!",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function (isConfirm) {
            if(isConfirm)
            $.ajax({    //create an ajax request to display.php
                url: "{{ url('admin/user') }}/"+dataId, 
                type: "post",
                data: {
                    "_method": 'delete',
                    "_token": '{{ csrf_token() }}',
                },
                success: function(response){ 
                    if (response == 'success') {
                        swal("Dihapus!", "Data telah dihapus.", "success");
                        window.location.href="{{ route('user.index') }}";
                    } else {
                        swal("Dibatalkan", "Terjadi Kesalahan", "error");
                    }
                },
                error: function(response){
                    swal("Dibatalkan", "Terjadi Kesalahan", "error");
                }

            });
        });
    });
</script>
@endsection