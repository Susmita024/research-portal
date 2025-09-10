@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-10 max-w-3xl">

    <!-- Page Header -->
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold text-gray-800">Upload Research Paper</h1>
        <p class="text-gray-500 text-sm mt-2">Provide the details of your paper and upload the PDF file.</p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-600 text-green-700 p-4 mb-6 rounded-md shadow-sm animate-fadeIn" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('admin.research.store') }}" method="POST" enctype="multipart/form-data" 
          class="bg-white shadow-lg rounded-xl p-8 border border-gray-100">
        @csrf

        <!-- Title -->
        <div class="mb-5">
            <label for="title" class="block text-sm font-semibold text-gray-700">Title <span class="text-red-500">*</span></label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                value="{{ old('title') }}" 
                required 
                class="mt-2 w-full rounded-lg border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('title') border-red-500 @enderror"
                placeholder="Enter paper title"
            >
            @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Abstract -->
        <div class="mb-5">
            <label for="abstract" class="block text-sm font-semibold text-gray-700">Abstract <span class="text-red-500">*</span></label>
            <textarea 
                name="abstract" 
                id="abstract" 
                required 
                rows="5" 
                class="mt-2 w-full rounded-lg border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('abstract') border-red-500 @enderror"
                placeholder="Enter paper abstract..."
            >{{ old('abstract') }}</textarea>
            @error('abstract')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Authors -->
        <div class="mb-5">
            <label for="authors" class="block text-sm font-semibold text-gray-700">Authors <span class="text-red-500">*</span></label>
            <input 
                type="text" 
                name="authors" 
                id="authors" 
                value="{{ old('authors') }}" 
                required 
                class="mt-2 w-full rounded-lg border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('authors') border-red-500 @enderror"
                placeholder="e.g., John Doe, Jane Smith"
            >
            @error('authors')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- PDF File -->
        <div class="mb-5">
            <label for="pdf" class="block text-sm font-semibold text-gray-700">Upload PDF <span class="text-red-500">*</span></label>
            <input 
                type="file" 
                name="pdf" 
                id="pdf" 
                accept="application/pdf" 
                class="mt-2 w-full text-gray-700 border rounded-lg cursor-pointer px-3 py-2 file:cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition @error('pdf') border-red-500 @enderror"
            >
            @error('pdf')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Paper Link -->
        <div class="mb-6">
            <label for="paper_link" class="block text-sm font-semibold text-gray-700">External Paper Link (Optional)</label>
            <input 
                type="url" 
                name="paper_link" 
                id="paper_link" 
                value="{{ old('paper_link') }}" 
                class="mt-2 w-full rounded-lg border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('paper_link') border-red-500 @enderror"
                placeholder="https://example.com/paper"
            >
            @error('paper_link')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button 
                type="submit" 
                class="bg-blue-600 text-white px-6 py-2.5 rounded-lg font-medium shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
            >
            Upload Paper
            </button>
        </div>
    </form>
</div>

<!-- Small animation utility -->
<style>
    @keyframes fadeIn { from {opacity: 0;} to {opacity: 1;} }
    .animate-fadeIn { animation: fadeIn 0.4s ease-in-out; }
</style>
@endsection
