@extends('sys_layout.app')
@section('content')
<div class="container-fluid">
    <!-- Basic Example -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{ strtoupper($dokumentasi->name) }}
                        <small>{{ $dokumentasi['kategori']['name'] }}</small>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="{{ route('dokumentasi.edit',['dokumentasi' => $dokumentasi->id]) }}" class="btn bg-primary btn-lg waves-effect">Edit</a>
                            <button class="btn btn-lg btn-danger waves-effect" id="btnDelete">Hapus</button>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <!-- Tab panes -->
                    <table class="table">
                        <tr>
                            <th>Video</th>
                            <td><?= $dokumentasi['video'] ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Nama</th>
                            <td>{{ $dokumentasi['name'] }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>{{ $dokumentasi['kategori']['name'] }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $dokumentasi['date'] }}</td>
                        </tr>
                    </table>
                        
                    </div>
                </div>
            </div>
            

        </div>
    </div>
    <!-- #END# Input -->
</div>
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Upload Gambar</h4>
            </div>
            {{ Form::open(array('url' => route('gambar.store'), 'method' => 'post','enctype' => 'multipart/form-data')) }}
            <input type="hidden" name="id" value="{{ $dokumentasi['id'] }}">
            <input type="hidden" name="tipe" value="rm">
            <div class="modal-body">
                <p><b>Nama</b></p>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Gambar" required>
                            </div>
                        </div>
                    </div>
                </div>
                <p><b>Upload Gambar</b></p>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" class="form-control" name="gambar" accept=".png, .jpg, .jpeg" placeholder="Upload Gambar" required>
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
<script>

    $('#btnDelete').click(function(){
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
                url: "{{ url('admin/dokumentasi/'.$dokumentasi->id) }}", 
                type: "post",
                data: {
                    "_method": 'delete',
                    "_token": '{{ csrf_token() }}',
                },
                success: function(response){ 
                    if (response == 'success') {
                        swal("Dihapus!", "Data telah dihapus.", "success");
                        window.location.href="{{ route('dokumentasi.index') }}";
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