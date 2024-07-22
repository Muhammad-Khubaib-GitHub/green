<?php

namespace App\Http\Controllers;

use App\Models\Container;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ContainerController extends Controller
{
    public function index()
    {
        $containers = Container::with('country','investor')->get();
        return view('pages.container.container', compact('containers'));
    }

    public function create()
    {
        return view('pages.container.newContainer');
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

        return redirect()->back()->with('success', 'Container deleted successfully.');
    }


    public static function containerList()
    {
        try{
            $containers = Container::get();

            if($containers->isEmpty())
            {
                return response()->error("Record not found.");
            }
            return response()->success($containers, "Container list");

        }catch(\Exception $e){

            return response()->error('An error occurred while retrieving containers', 500, ['exception' => $e->getMessage()]);

        }
    }
}
