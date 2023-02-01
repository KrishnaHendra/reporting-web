@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            
                <div class="card-header"><b>Dashboard</b></div>
                
                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                </div> -->
                <div class="row mb-3 mt-3">
                <div class="col-md-1"></div>
                    <div class="col-md-5 ml-5">
                        <div class="card ml-5" style="width: 18rem; height=10rem; ">
                        <img src="{{ asset('img/transaction.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="font-weight-bold text-center">Total Transaksi</h4>
                            <div class="row mb-2">
                            <hr>
                            <button class="btn btn-primary btn-sx">{{ DB::table('pelanggan')->count() }}</button>
                            <hr>
                            </div>
                            <p class="text-center font-italic text-primary font-weight-bold">{{ date('D,d M Y') }} <span>({{ date('H.i') }})</span></p>
                        </div>
                        </div>
                    </div>

                
                    <div class="col-md-5">
                        <div class="card ml-4" style="width: 18rem; height=10rem;">
                        <img src="{{ asset('img/transaction2.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="font-weight-bold text-center">Jumlah Amount</h4>
                            <div class="row mb-2">
                            <hr>
                            <button class="btn btn-primary btn-sx">Rp. {{ number_format(DB::table('pelanggan')->sum('jumlah')) }}</button>
                            <hr>
                            </div>
                            <p class="text-center font-italic text-primary font-weight-bold">{{ date('D,d M Y') }} <span>({{ date('H.i') }})</span></p>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                

                
            </div>
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/c90ad75496.js"></script>

@endsection
