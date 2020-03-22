@extends('template/template')

@section('title', 'Home')

@section('body')
<div class="Container m-md-5">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Data Absen</th>
                    <th scope="col">Absen Di sini</th>
                </tr>
            </thead>
             <tbody>
             <tr>
             <td>
             <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Durasi</th>
                    <th scope="col">Kerjaan</th>
                    <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($absensi as $absen)
                    <tr>
                    <th scope="row"> {{$absen->tanggal}} </th>
                    <td>{{$absen->waktu}}</td>
                    <td>{{$absen->kerja}}</td>
                    <td>{{$absen->keterangan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </td>
             <td>
                <h2><a href="/absen" class="badge badge-primary align-middle">Klik untuk absen</a></h2>
             </td>
             </tr>
            
            
            </tbody>
        </table>
    </div>

    
    
@endsection

   