@extends('index')
@section('title', 'Anggota')

@section('isihalaman')
    <h3><center>Daftar Anggota Perpustakaan Politeknik Negeri Jember</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAnggotaTambah"> 
        Tambah Data anggota 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Anggota</td>
                <td align="center">NIM</td>
                <td align="center">Nama Anggota</td>
                <td align="center">Prodi</td>
                <td align="center">HP</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($anggota as $index=>$a)
                <tr>
                    <td align="center" scope="row">{{ $index + $anggota->firstItem() }}</td>
                    <td>{{$a->id_anggota}}</td>
                    <td>{{$a->nim}}</td>
                    <td>{{$a->nama_anggota}}</td>
                    <td>{{$a->prodi}}</td>
                    <td>{{$a->hp}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAnggotaEdit{{$a->id_anggota}}"> 
                            Edit
                        </button>
                        <!-- Awal Modal EDIT data Anggota -->
                        <div class="modal fade" id="modalAnggotaEdit{{$a->id_anggota}}" tabindex="-1" role="dialog" aria-labelledby="modalAnggotaEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalAnggotaEditLabel">Form Edit Data Anggota</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formanggotaedit" id="formanggotaedit" action="/anggota/edit/{{ $a->id_anggota }} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="nim" class="col-sm-4 col-form-label">NIM</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nim" name="nim" value="{{ $a->nim }}" placeholder="Masukan NIM">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="nama_anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="{{ $a->nama_anggota }}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="prodi" class="col-sm-4 col-form-label">Prodi</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="prodi" name="prodi" value="{{ $a->prodi }}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="hp" class="col-sm-4 col-form-label">HP</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $a->hp }}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="anggotatambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data Anggota -->

                        |
                        <a href="anggota/hapus/{{$a->id_anggota}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $anggota->currentPage() }} <br />
    Jumlah Data : {{ $anggota->total() }} <br />
    Data Per Halaman : {{ $anggota->perPage() }} <br />

    {{ $anggota->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data anggota -->
    <div class="modal fade" id="modalAnggotaTambah" tabindex="-1" role="dialog" aria-labelledby="modalAnggotaTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAnggotaTambahLabel">Form Input Data Aggota</h5>
                </div>
                <div class="modal-body">
                    <form name="formanggotatambah" id="formanggotatambah" action="/anggota/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_anggota" class="col-sm-4 col-form-label">NIM</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukan NIM">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nama_anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" placeholder="Masukan Nama Anggota">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="prodi" class="col-sm-4 col-form-label">Prodi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Masukan Prodi">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-4 col-form-label">HP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukan HP">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="anggotatambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data buku -->
    
@endsection