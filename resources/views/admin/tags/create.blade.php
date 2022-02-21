@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-3">Add new tag</h1>

        <form action="{{route('tags.store')}}" method="POST" class="mb-5">
            @csrf

            {{-- tag name --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Add name" value="{{old('name')}}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">Add tag</button>

        </form>

        <a href="{{route('tags.index')}}"><button type="button" class="btn btn-dark">Tags list</button></a>
    </div>
@endsection