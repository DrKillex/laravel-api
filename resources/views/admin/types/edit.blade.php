@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger mb-3 mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.types.update', $type) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" id="title" name="name" value="{{ old('name', $type->name) }}">
                </div>
                <button type="submit" class="btn btn-primary">edit</button>
            </form>
        </div>
    </div>
@endsection