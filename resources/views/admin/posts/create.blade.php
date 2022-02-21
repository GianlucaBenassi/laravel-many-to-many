@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-3">Add new post</h1>

        <form action="{{route('posts.store')}}" method="POST" class="mb-5">
            @csrf

            {{-- post title --}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Add title" value="{{old('title')}}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- post content --}}
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Add post content" rows="10">{{old('content')}}</textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- post categories --}}
            <div class="form-row mb-3">
                <div class="col-6">
                    <label for="category">Category</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
                        <option value="">Select category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- post tags --}}
            <label class="d-block">Tags</label>
            @foreach ($tags as $tag)
                <div class="form-check form-check-inline @error('tags') is-invalid @enderror">
                    <input class="form-check-input" type="checkbox" id="{{$tag->slug}}" value="{{$tag->id}}" name="tags[]" {{in_array($tag->id, old("tags", [])) ? 'checked' : ''}}>
                    <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                </div>
            @endforeach
            @error('tags')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- post published --}}
            <div class="form-group form-check mt-4">
                <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" {{old('published') ? 'checked' : ''}}>
                <label class="form-check-label" for="published">Publish</label>
                @error('published')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">Add post</button>

        </form>

        <a href="{{route('posts.index')}}"><button type="button" class="btn btn-dark">Posts list</button></a>
    </div>
@endsection