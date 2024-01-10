@extends('landing.layout')
@section('content')

<div class="container mt-5">
    <h1>Landing Page</h1>
    
    <form action="{{route('landing.scrape') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="depature">depature:</label>
            <input type="text" class="form-control" id="depature" name="depature" required>
        </div>
        
        <div class="form-group">
            <label for="destination">Tujuan:</label>
            <input type="text" class="form-control" id="destination" name="destination" required>
        </div>

        <!-- Tambahkan input atau elemen form lainnya sesuai kebutuhan -->
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>