<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Writer;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\WriterRequest;
use Illuminate\Support\Facades\Hash;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $writers = Writer::paginate(3);
        return view('writers.index', ['writers' => $writers, 'PageTitle' => 'Writers']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('writers.create', ['PageTitle' => 'Create Writer']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WriterRequest $request)
    {
        // [name] => fasdfads [email] => Super2024Palm@gsd.com [password] => palm2024fsda [isPublished] => on ) 
        // $writer = Writer::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'num_posts' => $request->num_posts ?? 0,
        // ]);
        $writer = new Writer();
        $writer->name = $request->input('name');
        $writer->password = Hash::make($request->input('password'));
        $writer->email = $request->input('email');
        $writer->save();
        return redirect()->route('writers.index')->with('success', 'Writer created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $writer = Writer::findOrFail($id);
        $posts = $writer->posts()->paginate(5);
        if (!$writer) {
            return redirect()->route('writers.index')->with('error', 'Writer not found.');
        }
        return view('writers.show', ['posts' => $posts, 'writer' => $writer, 'PageTitle' => $writer->name]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $writer = Writer::findOrFail($id);
        if (!$writer) {
            return redirect()->route('writers.index')->with('error', 'Writer not found.');
        }
        $writer->delete();
        return redirect()->route('writers.index')->with('success', "writer has been deleted");
    }
}
