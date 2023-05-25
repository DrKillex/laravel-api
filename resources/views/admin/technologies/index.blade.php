@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.technologies.create') }}">create</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">slug</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                    <tr>
                        <td>{{ $technology->name }}</td>
                        <td>{{ $technology->slug }}</td>
                        <td>
                            <ul class="list-unstyled d-flex gap-2">
                                <li><a href="{{ route('admin.technologies.show', $technology) }}">show</a></li>
                                <li><a href="{{ route('admin.technologies.edit', $technology) }}">edit</a></li>
                                <li>
                                    <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button>delete</button>
                                    </form>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection