@extends('layouts.app')

@section('content')
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
        <form action="{{ route('admin.records.store') }}" method="POST" enctype="multipart/form-data"  class="form-input-image">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="creation_date" class="form-label">creation_date</label>
                <input type="date" class="form-control" id="creation_date" name="creation_date"
                    value="{{ old('creation_date') }}">
            </div>
            <div class="mb-3">
                <label for="record_description" class="form-label">record_description</label>
                <textarea class="form-control" id="record_description" rows="3" name="record_description">{{ old('record_description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="completed" class="form-label">is completed?</label>
                <select name="completed" id="completed">
                    <option value="" {{ old('completed') == null ? 'selected' : '' }}>choose</option>
                    <option value="1" {{ old('completed') == '1' ? 'selected' : '' }}>yes</option>
                    <option value="0" {{ old('completed') == '0' ? 'selected' : '' }}>no</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">type</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option value="">Select type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <div class="mb-3">technologies</div>
                @foreach ($technologies as $technology)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="technology" value="{{ $technology->id }}" name="technologies[]" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="technology">{{ $technology->name }}</label>
                    </div>
                @endforeach   
            </div>
            <div class="mb-3">
                <div class="preview">
                    <img id="image-preview">
                </div>
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">add</button>
        </form>
    </div>
@endsection
