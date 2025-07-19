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
        $writers = Writer::paginate(5);
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
        //
        // $writer = Writer::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'num_posts' => $request->num_posts ?? 0,
        // ]);

        // return redirect()->route('writers.index')->with('success', 'Writer created successfully!');
        print_r($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $writer = Writer::find($id);
        return view('writers.show', ['writer' => $writer]);
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
    }
}
