@extends('layouts.app')

@section('title', 'Friends')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Nama teman : {{ $friend['nama'] }} </h3>
        <h3>Nomor Telp teman : {{ $friend['no_telp'] }} </h3>
        <h3>Alamat teman : {{ $friend['alamat'] }} </h3>
    </div>
</div>
@endsection