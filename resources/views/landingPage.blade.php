@extends('layouts.main')

@section('content')
    @include('partials.nav')
    <div class="mx-12">
        @include('content.banner')
        @include('content.faq')
        @include('content.contact')
        @include('partials.footer')
    </div>
@endsection
