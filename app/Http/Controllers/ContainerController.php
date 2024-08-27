<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Shipment;
use App\Models\Container;
use Illuminate\Http\Request;

use App\Models\ContainerUser;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Validator;

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
        $container = Shipment::select('return_date', 'current_date')
            ->where('container_id', $id)
            ->orderBy('id', 'desc')
            ->first();


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


    public static function containerList(Request $request)
    {
        try{
            $containers = Container::get();

            if($containers->isEmpty())
            {
                return response()->error("Record not found.");
            }

            if($request->has('api')){
                return response()->json([
                    'success' => true,
                    'message' => 'Container list',
                    'data' => $containers
                ]);
            }
            return response()->success($containers, "Container list");

        }catch(\Exception $e){

            return response()->error('An error occurred while retrieving containers', 500, ['exception' => $e->getMessage()]);

        }
    }

    public static function containerDetail($container_id, $investor_id)
    {
        try{

            $validator = Validator::make([
                'container_id' => $container_id,
                'investor_id' => $investor_id,
            ], [
                'container_id' => 'required|exists:containers,id',
                'investor_id' => 'required|exists:users,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first()
                ]);
            }

            $containerShipment = Shipment::select('return_date', 'current_date')
                ->where('container_id', $container_id)
                ->orderBy('id', 'desc')
                ->first();

            $containerDetail = ContainerUser::select('user_id', 'container_id', 'user_container_cycle')
            ->where([
                "container_users.container_id" => $container_id,
                "container_users.user_id" => $investor_id,
            ])->orderBy('id','desc')->first();

            // if(!$containerDetail){
            //     return response()->json([
            //         'success' => false,
            //         'message' => 'You need to set the Container Days First.',
            //     ]);
            // }

            if(!isset($containerDetail)){

                $containerDetail = new ContainerUser();
                $containerDetail->user_container_cycle = 35;
                $containerDetail->missing = true;
            }

            if($containerShipment){

                $containerDetail->new_return_date = Carbon::createFromFormat('Y-m-d', $containerShipment->current_date)->addDays($containerDetail->user_container_cycle)->format('Y-m-d');

            }else{

                $containerDetail->new_return_date = Carbon::createFromFormat('Y-m-d', date('Y-m-d'))->addDays($containerDetail->user_container_cycle)->format('Y-m-d');

            }

            $containerDetail->return_date = isset($containerShipment) ? $containerShipment->return_date : date('Y-m-d');
            $containerDetail->current_date = isset($containerShipment) ? $containerShipment->current_date : date('Y-m-d');
            $containerDetail->today_date = date('Y-m-d');

            // if($containerDetail->has('missing') && $containerDetail->missing == true){

            //     return response()->json([
            //         'success' => true,
            //         'message' => 'You need to set the Container Days First.',
            //         'data' => $containerDetail
            //     ]);
            // }

            return response()->json([
                'success' => true,
                'message' => 'Container Detail',
                'data' => $containerDetail
            ]);


        }catch(\Exception $e){

            return response()->error('An error occurred while retrieving containers', 500, ['exception' => $e->getMessage()]);
        }
    }
}
