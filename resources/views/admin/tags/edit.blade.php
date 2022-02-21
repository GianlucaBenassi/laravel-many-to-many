@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-3">Modify tag</h1>

        <form action="{{route('tags.update', $tag->id)}}" method="POST" class="mb-5">
            @csrf
            @method("PUT")

            {{-- category name --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Add name" value="{{old('name', $tag->name)}}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">Modify tag</button>

        </form>

        <a href="{{route('tags.index')}}"><button type="button" class="btn btn-dark">Tags list</button></a>
    </div>
@endsection