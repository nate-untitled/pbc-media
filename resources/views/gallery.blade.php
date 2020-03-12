@extends('layouts.main')

@section('content')
    <gallery :gallery-media='{!! json_encode($gallery_media) !!}'></gallery>
@endsection
