@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.types.create') }}">create</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">slug</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->slug }}</td>
                        <td>
                            <ul class="list-unstyled d-flex gap-2">
                                <li><a href="{{ route('admin.types.show', $type) }}">show</a></li>
                                <li><a href="{{ route('admin.types.edit', $type) }}">edit</a></li>
                                <li>
                                    <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
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