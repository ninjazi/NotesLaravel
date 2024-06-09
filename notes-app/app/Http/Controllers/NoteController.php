<?php
namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Auth::user()->notes;
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note = Auth::user()->notes()->create($request->all());

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Note created successfully!']);
        }

        return redirect()->route('notes.index');
    }

    public function edit(Note $note)
    {
        $this->authorize('update', $note);
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note->update($request->all());

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Note updated successfully!']);
        }

//        return redirect()->route('notes.index');
    }

    public function destroy(Request $request, Note $note)
    {
        $this->authorize('delete', $note);

        $note->delete();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Note deleted successfully!']);
        }

        return redirect()->route('notes.index');
    }
}

