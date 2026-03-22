@extends('layouts.app')

@section('content')


<div class="container-fluid">    
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Average Up dan Down</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('hitungAverage') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Saham</label>
                    <input type="text" name="nama_saham" class="form-control" placeholder="cth: ENRG" maxlength="4" style="text-transform:uppercase" required>
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">Jenis AVG</label>
                    
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_average" id="radioLaki" value="Up" checked>
                    <label class="form-check-label" for="radioLaki">
                        Up
                    </label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_average" id="radioPerempuan" value="Down">
                    <label class="form-check-label" for="radioPerempuan">
                        Down
                    </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga Awal</label>
                    <input type="number" name="harga_awal" class="form-control" placeholder="cth: 500" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lot Awal</label>
                    <input type="number" name="jumlah_awal" class="form-control" placeholder="cth: 12" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga Baru</label>
                    <input type="number" name="harga_baru" class="form-control" placeholder="cth: 400" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lot Baru</label>
                    <input type="number" name="jumlah_baru" class="form-control" placeholder="cth: 8" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">
                        Hasilkan
                    </button>
                </div>
                <p class="small">Note : Maksimal data ditambahkan hanya 5 data</p>
            </form>
        </div>
    </div>

    @if(session('success'))
    <div class="card-body">
        <div class="alert alert-light" role="alert">
        {{ session('success') }}
        </div>
    </div>
    @endif
    @if(session('delete'))
    <div class="card-body">
        <div class="alert alert-danger" role="alert">
        {{ session('delete') }}
        </div>
    </div>

    <br>
    <hr>

    <h4>Data Tabel</h4>
    <button id="">Tampilkan Isi Tabel</button>
    <x-heroicon-o-lock-closed style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
    <br>
    <canvas id="" width="100" height="50"></canvas>

    <h4>Grafik Harga</h4>
    <button id="">Tampilkan Grafik</button>
    <x-heroicon-o-lock-closed style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
    <br><br>
    <canvas id="" width="100" height="50"></canvas>

</div>




<script>

let chart;

$("#loadChart").click(function(){

$.get('/chart-data', function(response){
console.log(response);
console.log(response[0]);
let tanggal = [];
let hargaAwal = [];
let hargaBaru = [];
let average = [];

response.forEach(function(item){
console.log(item);
tanggal.push("2026-03-12");
// hargaAwal.push(item.harga_awal);
// hargaBaru.push(item.harga_baru);
// average.push(item.average);
hargaAwal.push(Number(item.harga_awal));
hargaBaru.push(Number(item.harga_baru));
average.push(Number(item.average));

});
console.log(tanggal);
console.log(hargaAwal);
const ctx = document.getElementById('chart');

if(chart){
chart.destroy();
}

chart = new Chart(ctx,{
type:'line',
data:{
labels:tanggal,
datasets:[
{
label:'Harga Awal',
data:hargaAwal,
borderColor:'blue',
borderWidth:2
},
{
label:'Harga Baru',
data:hargaBaru,
borderColor:'red',
borderWidth:2
},
{
label:'Average',
data:average,
borderColor:'green',
borderWidth:3
}
]
},
options:{
responsive:true
}
});

});

});

</script>

@endsection