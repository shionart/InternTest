@extends('template/template')

@section('title', 'Absen Magang')

@section('body')
<div class="container">
    <form method="post" action="/">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="Tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <div class="form-group col-md-3">
                <label for="Masuk">Jam masuk</label>
                <input type="time" class="form-control" id="masuk" name="masuk" required>
            </div>
            <div class="form-group col-md-3">
                <label for="Keluar">Jam keluar</label>
                <input type="time" class="form-control" id="keluar" name="keluar" required>
            </div>

            <div class="form-group col-md-1">
                <label for="">punten</label>
                <button class="btn btn-success" type="button" onclick="itung2()">Itung</button>
            </div>
            <div class="form-group col-md-2">
                <label for="waktu">Periode Kerja</label>
                <input type="time" class="form-control @error('waktu') is-invalid @enderror" id="waktu" name="waktu" readonly required>
            </div>
            
        </div>
        <div class="form-group">
            <label for="Kerja">Kamu ngerjain apa?</label>
            <input type="text" class="form-control" name="kerja" id="kerja" placeholder="e.g revisi bug, meeting, rebahan.." required>
        </div>
        <div class="form-group">
            <label for="Keterangan">Ada Kendala?</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="e.g internet lelet" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script >
function itung2(){
    //handler buat jam masuk>keluar nya mana? 
    var Masuk=$('#masuk').val(), waktu=00,
        Keluar=$('#keluar').val();

    var jamMasuk=Masuk.split(':')[0],//parsing ambil jamnya doang
    jamKeluar=Keluar.split(':')[0],
    pointer=Masuk.split(':')[0];//dipakai jika jam masuk SAAT MASIH ISTIRAHAT saja

    while(pointer<jamKeluar){//loop untuk menghitung berapa lama kerja
        if( (pointer==12)||(pointer==16)||(pointer==18) ){
            pointer++;//tidak bertambah waktu karena durasi waktu istirahat dalam jam adalah 1 konstan, menit nya nanti 
        } 
        else{
            waktu++; // jam masuk + 1 jam = 1 jam kerja + total jam kerja; 
            pointer++; //tidak menghitung selisih karena ada syarat, terinspirasi dari algoritma rabbit n turtle :))
        }
    }
    //jika jam masuk = jam istirahta e.g 12.45
    if( (jamMasuk==12)||(jamMasuk==16)||(jamMasuk==18) ){
        var minutes = Keluar.split(':')[1]//menit pada jam istirahat tida terhitung
    } else {
        var minutes = Keluar.split(':')[1] - Masuk.split(':')[1];//hitung menit belakangan
    }

    minutes = minutes.toString().length<2?'0'+minutes:minutes; 
    if(minutes<0){ //kalo menit masuk > keluar
        waktu--;    
        minutes = 60 + minutes; //perhitungan menit setelah mendapatkan waktu kerja dalam jam
    }
    waktu = waktu.toString().length<2?'0'+waktu:waktu;
    $('#waktu').val(waktu + ':' + minutes);
}

//referensi itu selisih karena saya tida hapal sintaks parsing nya huhu :( 
function itung(){
var masuk = $('#masuk').val(),
        keluar = $('#keluar').val();
//mulai pengurangan
var hours = keluar.split(':')[0] - masuk.split(':')[0],
        minutes = keluar.split(':')[1] - masuk.split(':')[1];
    minutes = minutes.toString().length<2?'0'+minutes:minutes; 
    if(minutes<0){ //kalo menit masuk > keluar
        hours--;
        minutes = 60 + minutes;
    }
    hours = hours.toString().length<2?'0'+hours:hours; 

    $('#waktu').val(hours + ':' + minutes);
}
</script>
@endsection