@extends('layouts.app')

@section('title', 'Groups')

@section('content')
  <form action="/groups/addmember/{{$group->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="exampleInputEmail1">Pilih Nama Teman untuk Dimasukan kedalam Group</label>
      <br>
      <select class="form-select" aria-label="Default select example" name="friend_id">
        <option selected>Daftar Teman</option>
        @foreach ($friend as $f)
        <option value="{{$f->id}}">{{$f->nama}}</option>
        @endforeach
      </select>

    </div>

    <button type="submit" class="btn btn-primary">Tambahkan ke Group</button>
  </form>


@endsection
