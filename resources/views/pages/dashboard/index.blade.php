@extends('pages.layouts.dashboard')

@section('content__box')
    <h1>Selamat datang {{ Auth()->user()->username }} di dashboard admin</h1>
@endsection