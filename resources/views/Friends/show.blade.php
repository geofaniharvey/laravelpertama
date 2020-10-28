@extends('layouts.app')

@section('title', 'Friends')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Nama teman : {{ $friends['nama'] }} </h3>
        <h3>Nomor Telp teman : {{ $friends['no_telp'] }} </h3>
        <h3>Alamat teman : {{ $friends['alamat'] }} </h3>
    </div>
</div>
@endsection