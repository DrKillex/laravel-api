@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">author</th>
                    <th scope="col">content</th>
                    <th scope="col">creation date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $lead)
                    <tr>
                        <td>{{ $lead->author }}</td>
                        <td>{{ $lead->content }}</td>
                        <td>{{ $lead->created_at }}</td>
                        <td>                          
                            <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>delete</button>
                            </form>                              
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection