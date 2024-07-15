<?php

namespace App\Http\Controllers;

use App\Models\Container;
use Illuminate\Http\Request;

class ContainerController extends Controller
{
    public function index()
    {
        $containers = Container::all();
        return view('pages.container');;
    }

    public function create()
    {
        return view('containers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
        ]);

        Container::create($request->all());

        return redirect()->route('containers.index')->with('success', 'Container created successfully.');
    }

    public function show($id)
    {
        $container = Container::findOrFail($id);
        return view('containers.show', compact('container'));
    }

    public function edit($id)
    {
        $container = Container::findOrFail($id);
        return view('containers.edit', compact('container'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
        ]);

        $container = Container::findOrFail($id);
        $container->update($request->all());

        return redirect()->route('containers.index')->with('success', 'Container updated successfully.');
    }

    public function destroy($id)
    {
        $container = Container::findOrFail($id);
        $container->delete();

        return redirect()->route('containers.index')->with('success', 'Container deleted successfully.');
    }
}
