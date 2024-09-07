@extends('layouts.app')

@section('title', 'Update Avatar Profile')

@section('heading', 'Update Avatar Profile')

@section('content')
    <div class="card-body">        
        <form action="{{ route('profile-store', [$user->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="mb-2 form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" disabled>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="mb-2 form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" disabled>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="formFile" class="form-label">Foto Profil</label>
                <input class="form-control @error('file') is-invalid @enderror" type="file" id="formFile" name="file">
                @error('file')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection