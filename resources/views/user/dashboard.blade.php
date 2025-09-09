<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Your Submitted Research Papers</h3>

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($papers->isEmpty())
                        <p class="text-gray-600">You have not submitted any research papers yet.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="py-2 px-4 border-b text-left">Title</th>
                                        <th class="py-2 px-4 border-b text-left">Abstract</th>
                                        <th class="py-2 px-4 border-b text-left">Authors</th>
                                        <th class="py-2 px-4 border-b text-left">PDF</th>
                                        <th class="py-2 px-4 border-b text-left">Status</th>
                                        <th class="py-2 px-4 border-b text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($papers as $paper)
                                        <tr>
                                            <td class="py-2 px-4 border-b">{{ $paper->title }}</td>
                                            <td class="py-2 px-4 border-b">{{ Str::limit($paper->abstract, 100) }}</td>
                                            <td class="py-2 px-4 border-b">{{ $paper->authors }}</td>
                                            <td class="py-2 px-4 border-b">
                                                @if ($paper->pdf_path)
                                                    <a href="{{ Storage::url($paper->pdf_path) }}" class="text-blue-600 hover:underline" target="_blank">View PDF</a>
                                                @else
                                                    <span class="text-gray-500">No PDF</span>
                                                @endif
                                            </td>
                                            <td class="py-2 px-4 border-b">
                                                <span class="@if ($paper->status === 'approved') text-green-600 @elseif ($paper->status === 'pending') text-yellow-600 @else text-red-600 @endif">
                                                    {{ ucfirst($paper->status) }}
                                                </span>
                                            </td>
                                            <td class="py-2 px-4 border-b">
                                                <form action="{{ route('user.research.destroy', $paper->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this research paper?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $papers->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>