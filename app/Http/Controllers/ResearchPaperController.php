<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchPaper;
use Illuminate\Support\Facades\Storage;

class ResearchPaperController extends Controller
{
    // Show all approved papers
    public function index(Request $request) {
        $papers = ResearchPaper::where('status', 'approved')->latest()->get();

        $query = ResearchPaper::query();
        if ($request->has('query') && $request->query('query') !== '') {
            $search = $request->query('query');
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('authors', 'like', "%{$search}%")
                  ->orWhere('abstract', 'like', "%{$search}%");
        }

        // Paginate results (9 per page for grid layout)
        $papers = $query->latest()->paginate(15);

        return view('index', compact('papers')); // or your homepage view


    }

    // Show submission form
    public function create()
    {
        return view('papers.create');
    }

    // Handle submission
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'abstract' => 'required|string',
            'authors' => 'required|string',
            'pdf' => 'nullable|file|mimes:pdf|max:10240',
            'paper_link' => 'nullable|url',
        ]);

        $pdfPath = null;
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('research_papers', 'public');
        }

        ResearchPaper::create([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'authors' => $request->authors,
            'pdf_path' => $pdfPath,
            'paper_link' => $request->paper_link,
            'user_id' => auth()->id(),
            'status' => 'pending', // user submissions require admin approval
        ]);

        return redirect()->route('papers.index')->with('success', 'Paper submitted for review.');
    }
}
