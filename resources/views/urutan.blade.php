@extends('layouts.app')

@section('title', 'Urutan')

@section('content')

@foreach ($numbers as $number)

<h2>Urutan ke - {{$number['ke']}}</h2>
    Urutan ke - {{$number['nomor']}}

@endforeach
@endsection