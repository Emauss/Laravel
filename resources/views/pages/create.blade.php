@extends('layouts.app')

@section('title', 'Dodaj nową stronę')

@section('content')
    <form action="/pages" method="post">
        @csrf
        <div class="form-group">
            <label for="">Tytuł</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="">Alias</label>
            <input type="text" class="form-control" name="slug">
        </div>
        <div class="form-group">
            <label for="">Treść</label>
            <textarea class="form-control" name="content"></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Dodaj</button>
    </form>
@endsection
