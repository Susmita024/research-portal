<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ResearchPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResearchPaperUserController extends Controller
{
    public function index()
    {
        // Get the authenticated user's ID
        $userId = auth()->id();

        // Fetch research papers belonging to the authenticated user
        $papers = ResearchPaper::where('user_id', $userId)->latest()->paginate(15);

        // Return the view with the papers
        return view('user.dashboard', compact('papers'));
    }

    public function create()
    {
        return view('user.submit');
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
            'status' => 'pending',
            'user_id' => auth()->check() ? auth()->id() : 1,
        ]);

        return redirect()->route('dashboard')->with('success', 'Research paper submit successfully.');
    }

    public function destroy($id)
    {
        $paper = ResearchPaper::where('user_id', auth()->id())->findOrFail($id);
    
        // Delete PDF file from storage if exists
        if ($paper->pdf_path) {
            Storage::disk('public')->delete($paper->pdf_path);
        }
    
        $paper->delete();
    
        return redirect()->back()->with('success', 'Research paper deleted successfully.');
    }
}
