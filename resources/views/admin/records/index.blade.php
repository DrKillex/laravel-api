@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.records.create') }}">create</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">title</th>
                    <th scope="col">creation date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr>
                        <td>{{ $record->title }}</td>
                        <td>{{ $record->creation_date }}</td>
                        <td>{{ $record->completed == 0 ? '❌' : '✔' }}</td>
                        <td>
                            <ul class="list-unstyled d-flex gap-2">
                                <li><a href="{{ route('admin.records.show', $record) }}">show</a></li>
                                <li><a href="{{ route('admin.records.edit', $record) }}">edit</a></li>
                                <li>
                                    <form action="{{ route('admin.records.destroy', $record) }}" method="POST">
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