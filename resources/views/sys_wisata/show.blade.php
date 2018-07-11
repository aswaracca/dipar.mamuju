@extends('sys_layout.app')
@section('content')
<div class="container-fluid">
    <!-- Basic Example -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{ strtoupper($wisata->name) }}
                        <small>{{ $wisata['kategori']['name'] }}</small>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="{{ route('wisata.edit',['wisata' => $wisata->id]) }}" class="btn bg-primary btn-lg waves-effect">Edit</a>
                            <button class="btn btn-lg btn-danger waves-effect" id="btnDelete">Hapus</button>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                        <li role="presentation" class="active"><a href="#rincian" data-toggle="tab">Rincian</a></li>
                        <li role="presentation"><a href="#gambar" data-toggle="tab">Gambar</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="rincian">
                            <table class="table">
                                <tr>
                                    <th width="20%">Nama</th>
                                    <td>{{ $wisata['name'] }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $wisata['kategori']['name'] }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>{{ $wisata['location'] }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td><?= $wisata['description'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="gambar">
                            <button class="btn bg-primary btn-lg waves-effect"  data-toggle="modal" data-target="#defaultModal">+ Upload Gambar</button><br/><br/> 
                            <div class="row">
                                @php
                                    $i = count($wisata->gambar);
                                @endphp
                                @forelse($wisata->gambar as $gambar)
                                <div class="col-md-3">
                                    <div class="thumbnail">
                                        <img src="{{ asset($gambar->url) }}">
                                        <div class="caption">
                                            <h3>{{ $gambar->name }}</h3>
                                            <div class="row">
                                                <div class="col-md-12 p-0">
                                                    
                                                    {{ Form::open(array('url' => route('gambar.destroy',['gambar' => $gambar->id]), 'method' => 'delete')) }}
                                                    <button type="submit"  class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float pull-right" role="button"><i class="material-icons">delete</i></button>
                                                    {{ Form::close() }}

                                                    {{ Form::open(array('url' => route('gambar.update',['gambar' => $gambar->id]), 'method' => 'put')) }}
                                                    <button class="btn btn-success btn-circle-lg waves-effect waves-circle waves-float pull-right btnDeleteGambar" role="button"><i class="material-icons">assignment_turned_in</i></button>
                                                    {{ Form::close() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @if(($i % 4) == 1 && $i != 1)
                            </div>
                            <div class="row">
                            @endif
                            @php
                                $i--;
                            @endphp
                            @empty
                                <h2 style="text-align: center;">Data Kosong</h2>
                            @endforelse
                            </div>

                        </div>
                        
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
            <input type="hidden" name="id" value="{{ $wisata['id'] }}">
            <input type="hidden" name="tipe" value="wisata">
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
                url: "{{ url('admin/wisata/'.$wisata->id) }}", 
                type: "post",
                data: {
                    "_method": 'delete',
                    "_token": '{{ csrf_token() }}',
                },
                success: function(response){ 
                    if (response == 'success') {
                        swal("Dihapus!", "Data telah dihapus.", "success");
                        window.location.href="{{ route('wisata.index') }}";
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