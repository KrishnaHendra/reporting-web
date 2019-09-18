@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" ><b>Report pelanggan</b></div>
                
                <!-- <div class="card-body">
                    @if (session('status'))
                    style="background-color:#d9e2ff"
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                </div> -->
                <div class="col-md-12">

                <div class="row">
                    <div class="col-md-1">
                    <a href="/convert" class="btn btn-secondary mt-2"><i class="fa fa-file-pdf"></i> Convert To PDF</a>
                    </div>
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-3">
                    <form action="/pelanggan/cari" method="GET" class="input-group mt-2 ml-4">
                        <input class="" type="text" name="cari" placeholder="Cari Berdasar Telepon" value="{{ old('cari') }}" style="border-radius: 5px;">
                        <span><button class="btn btn-primary" type="submit"><b></b> <i class="fa fa-search"></i></button></span>
                    </form>
                    </div>
                </div>
                

                <table class="table table-hover mt-2">
                <thead>
                    <tr style="background-color: #4271ff; color:white; font-style:bold;">
                    <th scope="col">#</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Alamat</th>
                    <th scope="col" class="text-center">Telepon</th>
                    <th scope="col" class="text-center">Jumlah</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($pelanggan as $p): ?>
                    <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td class="text-center">{{ $p->nama }}</td>
                    <td class="text-center">{{ $p->alamat }}</td>
                    <td class="text-center"><b>{{ $p->telepon }}</b></td>
                    <td class="text-center">Rp. {{ number_format($p->jumlah) }}</td>
                    <td class="text-center"><b><?= $p->nama_status ?></b></td>
                    <td class="text-center">
                        <a href="" class="btn btn-sm btn-success"><i class="fa fa=fw fa-edit"></i> Edit</a>
                        <a href="/pelanggan/hapus/{{$p->id_pelanggan}}" class="btn btn-sm btn-danger" onClick="return confirm('Anda yakin?')"><i class="fa fa=fw fa-trash-alt"></i> Hapus</a>
                    </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                </table>

                <!-- <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 center"> -->
                <button class="btn btn-sm btn-info btn-block mb-3" data-toggle="modal" data-target="#exampleModal"><h6 style="color:white"><b><i class="fa fa-fw fa-plus-circle"></i>Tambah</b></h6></button>
                <!-- </div>
                </div> -->

                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Silahkan Tambah Data Bro
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="https://kit.fontawesome.com/c90ad75496.js"></script>
@endsection
