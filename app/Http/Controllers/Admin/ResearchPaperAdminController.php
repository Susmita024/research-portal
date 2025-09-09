<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResearchPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResearchPaperAdminController extends Controller
{
    public function index()
    {
        $papers = ResearchPaper::latest()->paginate(15);
        return view('admin.dashboard', compact('papers'));
    }

    public function edit(ResearchPaper $paper)
    {
        return view('admin.review', compact('paper'));
    }

    public function update(Request $request, ResearchPaper $paper)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $paper->update(['status' => $request->status]);

        return redirect()->route('admin.dashboard')->with('success', 'Paper status updated!');
    }

    public function create()
    {
        return view('admin.research.create');
    }

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
            'status' => 'approved',
            'user_id' => auth()->check() ? auth()->id() : 1,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Research paper uploaded successfully.');
    }

    public function destroy($id)
    {
        $paper = ResearchPaper::findOrFail($id);

        // Delete PDF file from storage if exists
        if ($paper->pdf_path) {
            Storage::disk('public')->delete($paper->pdf_path);
        }

        $paper->delete();

        return redirect()->back()->with('success', 'Research paper deleted successfully.');
    }
}
