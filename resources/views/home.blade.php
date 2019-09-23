@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" ><b>Report Pelanggan</b></div>
                
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
                    <!-- <div class="col-md-1">
                    <a href="/convert" class="btn btn-danger mt-2"><i class="fa fa=fw fa-trash-alt"></i></a>
                    
                    </div> -->
                    <div class="col-md-1">
                    <a href="/convert" class="btn btn-dark mt-2"><i class="fa fa-file-pdf"></i> Convert To PDF</a>
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

                @if (session('notifdelete'))
                <div class="row">
                <div class="col-md-12 pt-2">  
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close " data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-check"></i>{{ session('notifdelete') }}
                </div>
                </div>
                </div>
                @endif
                @if (session('notifadd'))
                <div class="row">
                <div class="col-md-12 pt-2">  
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close " data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-check"></i>{{ session('notifadd') }}
                </div>
                </div>
                </div>
                @endif
                @if (session('notifedit'))
                <div class="row">
                <div class="col-md-12 pt-2">  
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="close " data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-check"></i> <b>{{ session('notifedit') }}</b>
                </div>
                </div>
                </div>
                @endif
                
                <table class="table table-hover mt-1">
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
                        <a href="" data-target="#modal_edit{{$p->id_pelanggan}}" data-toggle="modal" class="btn btn-sm btn-success"><i class="fa fa=fw fa-edit"></i> Edit</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Please Completed!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/pelanggan/store" method="post">
            {{ csrf_field() }}
             <i class="fa fa-user btn btn-primary btn-sm btn-block"> Nama</i>
             <input type="text" name="nama" class="form-control text-center" placeholder="Nama" required><br>
             <i class="fa fa-user btn btn-primary btn-sm btn-block"> Alamat</i>
             <input type="text" name="alamat" class="form-control text-center" placeholder="Alamat" required><br>
             <i class="fa fa-user btn btn-primary btn-sm btn-block"> Telepon</i>
             <input type="number" name="telepon" class="form-control text-center" placeholder="Nomor Telepon" required><br>
             <i class="fa fa-user btn btn-primary btn-sm btn-block"> Jumlah</i>
             <input type="number" name="jumlah" class="form-control text-center" placeholder="Jumlah" required><br>
             
             <i class="fa fa-map-o btn btn-primary btn-sm btn-block"> Status</i>
             <select class="form-control btn btn-warning" name="status">
                <option value="2">Process</option>
             </select><br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="modal_edit{{$p->id_pelanggan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalEdit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </h5>

      </div>
      <div class="modal-body">
       <form action="/pelanggan/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $p->id_pelanggan }}">
             <i class="fa fa-user btn btn-info btn-sm btn-block"> Nama</i>
             <input type="text" name="nama" class="form-control text-center" placeholder="Nama Masakan" value="{{$p->nama}}" readonly><br>
             <i class="fa fa-user btn btn-info btn-sm btn-block"> Alamat</i>
             <input type="text" name="alamat" class="form-control text-center" placeholder="Harga Masakan" value="{{$p->alamat}}" readonly><br>
             <i class="fa fa-user btn btn-info btn-sm btn-block"> Telepon</i>
             <input type="number" name="telepon" class="form-control text-center" placeholder="Harga Masakan" value="{{$p->telepon}}" readonly><br>
             <i class="fa fa-user btn btn-info btn-sm btn-block"> Jumlah</i>
             <input type="number" name="jumlah" class="form-control text-center" placeholder="Harga Masakan" value="{{$p->jumlah}}" readonly><br>
             <i class="fa fa-map-o btn btn-info btn-sm btn-block"> Status</i>
              <select name="status" class="form-control text-center btn btn-primary">
                <option value="1">Success</option>
              </select>
             
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
       </form>
      </div>

    </div>
  </div>
</div>
<!-- TUTUP EDIT -->

<script src="https://kit.fontawesome.com/c90ad75496.js"></script>
@endsection
