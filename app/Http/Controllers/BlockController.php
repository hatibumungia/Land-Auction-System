<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Block;

use App\Http\Requests\CreateBlockRequest;

class BlockController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocks = Block::all();

        return view('blocks.index', compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blocks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBlockRequest $request)
    {
        Block::create($request->all());

        flash()->success($request->input('name'). ' added successfully');

        return redirect('blocks/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($block_id)
    {
        $block = Block::findOrFail($block_id);

        return view('blocks.show', compact('block'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($block_id)
    {
        $block = Block::findOrFail($block_id);

        return view('blocks.edit', compact('block'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBlockRequest $request, $block_id)
    {
        $block = Block::findOrFail($block_id);

        $block->update($request->all());

        flash()->success('Updated successfully');

        return redirect('blocks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($block_id)
    {
        $block = Block::findOrFail($block_id);

        $block->delete();

        flash()->success($block->name . ' deleted successfully');

        return redirect('blocks'); 
    }
}
