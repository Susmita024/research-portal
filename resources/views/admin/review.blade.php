@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Review Paper: {{ $paper->title }}</h2>

    <p><strong>Authors:</strong> {{ $paper->authors }}</p>
    <p><strong>Abstract:</strong> {{ $paper->abstract }}</p>
    <p><strong>PDF:</strong> <a href="{{ asset('storage/' . $paper->pdf_path) }}" target="_blank">View PDF</a></p>
    @if($paper->paper_link)
        <p><strong>Paper Link:</strong> <a href="{{ $paper->paper_link }}" target="_blank">{{ $paper->paper_link }}</a></p>
    @endif

    <form method="POST" action="{{ route('admin.papers.update', $paper->id) }}">
        @csrf
        <div class="form-group mb-3">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="approved" @if($paper->status=='approved') selected @endif>Approve</option>
                <option value="rejected" @if($paper->status=='rejected') selected @endif>Reject</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update Status</button>
    </form>
</div>
@endsection
