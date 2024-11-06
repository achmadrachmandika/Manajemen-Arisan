@extends('layout.app')

@section('title', 'Landing Page')

@section('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    body {
        background-color: #f8f9fa;
    }

    .hero {
        background: url('https://source.unsplash.com/random/1200x800') no-repeat center center;
        background-size: cover;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: black;
        text-align: center;
    }
</style>
@endsection

@section('content')
<div class="hero">
    <div class="container">
        <h1>Manajemen Arisan</h1>
        <h1>Manajemen Arisan</h1>
        <h1>Manajemen Arisan</h1>
        <h1>Manajemen Arisan</h1>
        <h1>Manajemen Arisan</h1>
        <h1>Manajemen Arisan</h1>
        <h1>Manajemen Arisan</h1>
        <p>Deadline Januari namun target desember</p>
    </div>
</div>
@endsection