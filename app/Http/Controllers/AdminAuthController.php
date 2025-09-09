<?php
namespace App\Http\Controllers;

use App\Models\ResearchPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResearchPaperController extends Controller
{
    public function index()
    {
        $papers = ResearchPaper::where('status', 'approved')->latest()->paginate(10);
        return view('papers.index', compact('papers'));
    }

    public function show(ResearchPaper $paper)
    {
        if ($paper->status !== 'approved') abort(403);
        return view('papers.show', compact('paper'));
    }

    public function create()
    {
        return view('papers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'abstract' => 'required|string',
            'authors' => 'required|string',
            'pdf' => 'required|mimes:pdf|max:10240', // 10 MB
            'paper_link' => 'nullable|url',
        ]);

        $pdfPath = $request->file('pdf')->store('papers', 'public');

        ResearchPaper::create([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'authors' => $request->authors,
            'pdf_path' => $pdfPath,
            'paper_link' => $request->paper_link,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('papers.index')->with('success', 'Paper submitted for review!');
    }
}
