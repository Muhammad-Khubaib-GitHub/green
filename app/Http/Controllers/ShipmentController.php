<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shipment;
use App\Models\Container;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::with('container', 'user')->get();

        $investors = UserController::userList()->getOriginalContent();

        $investors  = ($investors['status'] == 'success') ? $investors['data'] : [];

        return view('pages.shipment.shipment', compact('shipments', 'investors'));
    }

    public function create()
    {
        $containers = ContainerController::containerList()->getOriginalContent();
        $investors = UserController::userList()->getOriginalContent();

        $containers = ($containers['status'] == 'success') ? $containers['data'] : [];
        $investors  = ($investors['status'] == 'success') ? $investors['data'] : [];

        return view('pages.shipment.newShipment', compact('containers', 'investors'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric',
            'profit' => 'required|numeric',
            'container_id' => 'required|exists:containers,id',
            'return_date' => 'required|date',
            'processing_date' => 'required|date',
            'current_date' => 'required|date',
            'investor_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator->errors()->all());

        }

        Shipment::create([

            'amount' => $request->amount,
            'profit' => $request->profit,
            'container_id' => $request->container_id,
            'return_date' => $request->return_date,
            'processing_date' => $request->processing_date,
            'current_date' => $request->current_date,
            'user_id' => $request->investor_id,

        ]);

        return redirect()->route('shipment.index')
            ->with('success', 'Shipment created successfully.');
    }

    public function show(Shipment $shipment)
    {
        return view('shipment.show', compact('shipment'));
    }

    public function edit($shipment)
    {
        $shipment = Shipment::with('container', 'user')->where('id', $shipment)->first();
        $shipment->processing_date = Carbon::parse($shipment->processing_date);
        $shipment->return_date = Carbon::parse($shipment->return_date);
        $shipment->current_date = Carbon::parse($shipment->current_date);
        $containers = ContainerController::containerList()->getOriginalContent();
        $investors = UserController::userList()->getOriginalContent();

        $containers = ($containers['status'] == 'success') ? $containers['data'] : [];
        $investors  = ($investors['status'] == 'success') ? $investors['data'] : [];

        return view('pages.shipment.editShipment', compact('shipment', 'containers', 'investors'));
    }

    public function update(Request $request, Shipment $shipment)
    {

        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric',
            'profit' => 'required|numeric',
            'container_id' => 'required|exists:containers,id',
            'return_date' => 'required|date',
            'processing_date' => 'required|date',
            'current_date' => 'required|date',
            'investor_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator->errors()->all());

        }

        $shipment->update([

                'amount' => $request->amount,
                'profit' => $request->profit,
                'container_id' => $request->container_id,
                'return_date' => $request->return_date,
                'processing_date' => $request->processing_date,
                'current_date' => $request->current_date,
                'user_id' => $request->investor_id,
                'updated_at' => Carbon::now()
        ]);

        return redirect()->route('shipment.index')
                    ->with('success', 'Shipment update successfully.');
    }

    public function destroy($id)
    {
        $shipment = Shipment::findorfail($id);

        $shipment->delete();

        return redirect()->back()->with('success', 'Shipment deleted successfully.');
    }

    public function investorContainerList()

    {
        $investorList = User::all();

        $containerList = Container::all();

        $shipments = Shipment::with('container', 'user')->get();

        return view('pages.shipment', compact('shipments','investorList', 'containerList'));

    }

    public function previewPdf(Request $request)
    {

        $shipments = $this->filterData($request);

        $groupedShipments = $shipments->groupBy('user_id');

        $investors = User::whereIn('id', $groupedShipments->keys())->get()->keyBy('id');

        $data = [];

        foreach ($groupedShipments as $investorId => $shipments) {
            $data[] = [
                'investor' => $investors[$investorId],
                'shipments' => $shipments
            ];
        }

        return view('pdfs.shipment_pdf', compact('data'));
    }

    public function shipmentFilter(Request $request)
    {
        try{

            $shipments = $this->filterData($request);

            $investors = UserController::userList()->getOriginalContent();

            $investors  = ($investors['status'] == 'success') ? $investors['data'] : [];

            return view('pages.shipment.shipment', compact('shipments', 'investors'));


        }catch(\Exception $e){

            return response()->error('An error occurred while filtering', 500, ['exception' => $e->getMessage()]);
        }

    }


    public function filterData($request)
    {
        try{

            $query = Shipment::with('container', 'user');

            if($request->filled('date_range')){

                $dateRange = $request->input('date_range');

                $dateParts = explode(' / ', $dateRange);

                $fromDate = Carbon::createFromFormat('m/d/Y', $dateParts[0])->startOfDay();

                $toDate = Carbon::createFromFormat('m/d/Y', $dateParts[1])->endOfDay();

                $query->whereBetween('created_at', [$fromDate, $toDate]);
            }

            if($request->filled('investor_id')){

                $query->where('user_id', $request->investor_id);
            }

            return $query->get();

        }catch(\Exception $e){

            return response()->error('An error occurred while filtering', 500, ['exception' => $e->getMessage()]);
        }

    }
}
