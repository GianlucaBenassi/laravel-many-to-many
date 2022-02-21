@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mt-3">Tags list</h1>
        <a href="{{route('tags.create')}}"><button type="button" class="btn btn-success">Add tag</button></a>

        <table class="table mt-3">

            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->slug}}</td>
                        <td>
                            <a href="{{route('tags.show', $tag->id)}}"><button type="button" class="btn btn-info">Posts</button></a>
                            <a href="{{route('tags.edit', $tag->id)}}" class=ml-2><button type="button" class="btn btn-primary">Edit</button></a>
                            {{-- modal button --}}
                            <button type="button" class="btn btn-danger ml-auto" data-toggle="modal" data-target="#deleteModal-{{$tag->id}}">Delete</button>

                            {{-- delete modal --}}
                            <div class="modal fade" id="deleteModal-{{$tag->id}}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Are you sure to delete <strong>{{$tag->name}}</strong>?</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            {{-- delete form --}}
                                            <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
@endsection