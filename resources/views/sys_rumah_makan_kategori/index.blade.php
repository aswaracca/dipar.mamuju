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
                    <h2>Daftar Kategori Rumah Makan</h2>
                </div>
                <div class="body">
                    <button class="btn bg-primary btn-lg waves-effect" data-toggle="modal" data-target="#defaultModal">+ Tambah</button><br><br>

                    <div class="list-group">
                        @foreach($data as $d)
                        <div class="list-group-item">
                                <b>{{ $d['name'] }}</b>
                                <a href="javascript:void(0);" class="pull-right btnDelete col-pink" data-id="{{ $d['id'] }}" data-token="{{ csrf_token() }}"><i class="material-icons">delete_forever</i></a>
                        </div>
                        @endforeach
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Colored Card - With Loading -->
</div>
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Tambah Kategori</h4>
            </div>
            {{ Form::open(array('url' => route('kategori-rumah-makan.store'), 'method' => 'post')) }}
            <div class="modal-body">
                <p><b>Name</b></p>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" placeholder="Nama Kategori Wisata" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect">Simpan</button>
                <button type="reset" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
            </div>
            {{ Form::close() }}
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
<script type="text/javascript">

    $('.btnDelete').click(function(){
        var dataId = $(this).attr('data-id');
        var token = $(this).data('token');
        swal({
            title: "Apakah Anda yakin?",
            text: "Data tidak dapat dikembalikan setelah terhapus!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak, Batalkan!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if(isConfirm)
            $.ajax({    //create an ajax request to display.php
                url: "{{ url('admin/kategori-wisata') }}/"+dataId, 
                type: "post",
                data: {
                    "_method": 'delete',
                    "_token": token,
                },
                success: function(response){ 
                    if (response == 'success') {
                        swal("Dihapus!", "Data telah dihapus.", "success");
                        window.location.reload();
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