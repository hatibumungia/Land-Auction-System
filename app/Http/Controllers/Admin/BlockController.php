<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Block;

use App\Http\Requests\CreateBlockRequest;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocks = Block::all();

        return view('admin.blocks.index', compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blocks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateBlockRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBlockRequest $request)
    {
        Block::create($request->all());

        flash()->success($request->input('name'). ' imefanikiwa kuongezwa');

        return redirect('admin/blocks/create');
    }

    /**
     * Display the specified resource.
     *
     * @param $block_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($block_id)
    {
        $block = Block::findOrFail($block_id);

        return view('admin.blocks.show', compact('block'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $block_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($block_id)
    {
        $block = Block::findOrFail($block_id);

        return view('admin.blocks.edit', compact('block'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateBlockRequest|\Illuminate\Http\Request $request
     * @param $block_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(CreateBlockRequest $request, $block_id)
    {
        $block = Block::findOrFail($block_id);

        $block->update($request->all());

        flash()->success('Imefanikiwa kuhaririwa');

        return redirect('admin/blocks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $block_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($block_id)
    {
        $block = Block::findOrFail($block_id);

        $block->delete();

        flash()->success($block->name . ' imefanikiwa kufutwa');

        return redirect('admin/blocks');
    }
}
