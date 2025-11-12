@extends('layouts.public')

@section('title', 'Nos Partenaires')

@section('content')
<div class="container my-5">
    <h1>Nos Partenaires Officiels</h1>
    <div class="row mt-4">
        @foreach($partners as $partner)
        <div class="col-md-3 mb-4 text-center">
            <img src="{{ asset($partner->logo ?? 'images/partner.png') }}" class="img-fluid rounded mb-2" alt="">
            <h6>{{ $partner->name }}</h6>
        </div>
        @endforeach
    </div>
</div>
@endsection
