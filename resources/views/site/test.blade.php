@extends('site.layout')

@section('head')
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">
@endsection

@section('content')
    <a href="#" class="aspect-square flex rounded-md overflow-hidden hover:opacity-80 transition-opacity w-120"
        x-data="{ url: '/web/images/Nana-Smith-Bunk-Bed-4.jpg', thumb: '/web/images/Nana-Smith-Bunk-Bed-4.jpg' }" x-lightbox="url">
        <img class="flex-1 object-cover object-center" :src="thumb" alt="">
    </a>
@endsection
