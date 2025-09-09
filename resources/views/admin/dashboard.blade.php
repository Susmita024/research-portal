@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Research Papers Pending Review</h2>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Authors</th>
                <th>Submitted By</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($papers as $paper)
            <tr>
                <td>{{ $paper->title }}</td>
                <td>{{ $paper->authors }}</td>
                <td>{{ $paper->user->name }}</td>
                <td>{{ ucfirst($paper->status) }}</td>
                <td class="flex gap-2">
                    <!-- Review Button -->
                    <a href="{{ route('admin.papers.edit', $paper->id) }}" class="btn btn-primary btn-sm">Review</a>

                    <!-- Delete Button -->
                    <form action="{{ route('admin.papers.destroy', $paper->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this paper?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $papers->links() }}
</div>
@endsection