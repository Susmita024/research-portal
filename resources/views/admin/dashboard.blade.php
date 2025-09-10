@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
    <thead>
        <tr>
            <th style="width: 20%;">Title</th>
            <th style="width: 25%;">Abstract</th>
            <th style="width: 15%;">Authors</th>
            <th style="width: 12%;">Submitted By</th>
            <th style="width: 8%;">Status</th>
            <th style="width: 20%;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($papers as $paper)
            <tr>
                <td>{{ $paper->title }}</td>
                <td>{{ $paper->abstract }}</td>
                <td>{{ $paper->authors }}</td>
                <td>{{ $paper->user->name === 'Test User' ? 'Admin' : $paper->user->name }}</td>
                <td>{{ ucfirst($paper->status) }}</td>
                <td class="d-flex gap-2 flex-wrap">
                    <!-- Review Button -->
                    <a href="{{ route('admin.papers.edit', $paper->id) }}" class="btn btn-primary btn-sm">Review</a>

                    <!-- View PDF Button (if pdf exists) -->
                    @if($paper->pdf_path)
                        <a href="{{ asset('storage/' . $paper->pdf_path) }}" target="_blank" class="btn btn-info btn-sm">
                            View PDF
                        </a>
                    @endif

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
