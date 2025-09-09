@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Upload Research Paper</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('admin.research.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
        @csrf

        <!-- Title -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title <span class="text-red-500">*</span></label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                value="{{ old('title') }}" 
                required 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('title') border-red-500 @enderror"
                placeholder="Enter paper title"
            >
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Abstract -->
        <div class="mb-4">
            <label for="abstract" class="block text-sm font-medium text-gray-700">Abstract <span class="text-red-500">*</span></label>
            <textarea 
                name="abstract" 
                id="abstract" 
                required 
                rows="5" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('abstract') border-red-500 @enderror"
                placeholder="Enter paper abstract"
            >{{ old('abstract') }}</textarea>
            @error('abstract')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Authors -->
        <div class="mb-4">
            <label for="authors" class="block text-sm font-medium text-gray-700">Authors <span class="text-red-500">*</span></label>
            <input 
                type="text" 
                name="authors" 
                id="authors" 
                value="{{ old('authors') }}" 
                required 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('authors') border-red-500 @enderror"
                placeholder="Enter authors (e.g., John Doe, Jane Smith)"
            >
            @error('authors')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- PDF File -->
        <div class="mb-4">
            <label for="pdf" class="block text-sm font-medium text-gray-700">PDF File <span class="text-red-500">*</span></label>
            <input 
                type="file" 
                name="pdf" 
                id="pdf" 
                accept="application/pdf" 
                class="mt-1 block w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('pdf') border-red-500 @enderror"
            >
            @error('pdf')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Paper Link -->
        <div class="mb-6">
            <label for="paper_link" class="block text-sm font-medium text-gray-700">Paper Link (Optional)</label>
            <input 
                type="url" 
                name="paper_link" 
                id="paper_link" 
                value="{{ old('paper_link') }}" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('paper_link') border-red-500 @enderror"
                placeholder="Enter external paper URL (optional)"
            >
            @error('paper_link')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button 
                type="submit" 
                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition"
            >
                Upload Paper
            </button>
        </div>
    </form>
</div>
@endsection