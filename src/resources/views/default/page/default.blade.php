@extends('layouts.default')
@section('content')

    <h1>{{$page->page_name}}</h1>

    @isset($text1)
        {{$text1}}
    @else
        <p>Ta strona nie ma żadnych pól.</p>
    @endisset


@endsection
