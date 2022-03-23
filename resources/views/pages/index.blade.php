@extends('layouts.app')

@section('title', 'moje strony')

@section('content')
    @foreach ($pages as $page)
        <h5>{{ $page->title }}</h5>
    @endforeach
@endsection
