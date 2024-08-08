<?php

namespace App\Http\Controllers;

use App\Models\ContainerUser;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.investor.investor', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'nullable|string|max:255',
            'cnic'          => 'required|string|max:255|unique:users',
            'email'         => 'required|string|email|max:255|unique:users',
            'phone'         => 'nullable|string|max:255',
            'password'      => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->cnic = $request->cnic;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $shipments = [];

        $startDate = "2024-07-01 00:0:00";

        $endDate = "2024-07-01 23:59:59";

        $parent = User::find($id);

        $parentShipments = $parent->with('shipments')
        ->where('id', $id)
        ->first();

        foreach($parentShipments->shipments as $shipment){
            $containerUser = ContainerUser::select('user_container_cycle')
            ->where([
                'user_id' => $shipment->user_id,
                'container_id' => $shipment->container_id
            ])->first();

            if ($containerUser) {
                $shipment->user_container_cycle = $containerUser->user_container_cycle;
            }
        }

        $shipments[$id] = $parentShipments ? $parentShipments : $parent;

        $children = $parent->children;

        if(!$children->isEmpty()){

            foreach ($children as $child) {
                $childShipments = $child->with('shipments')
                ->where('id', $child->id)
                ->first();

                $shipments[$child->id] = $childShipments ? $childShipments : collect();

                foreach($childShipments->shipments as $shipment){
                    $containerUser = ContainerUser::select('user_container_cycle')
                    ->where([
                        'user_id' => $shipment->user_id,
                        'container_id' => $shipment->container_id
                    ])->first();

                    if ($containerUser) {
                        $shipment->user_container_cycle = $containerUser->user_container_cycle;
                    }
                }
            }
        }

        return view('pages.investor.investor_detail', compact('shipments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'=> 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'cnic'      => 'required|string|max:255|unique:users,cnic,' . $id,
            'email'     => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone'     => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->cnic = $request->cnic;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->password) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }


    public function home(){

        return view('pages.login');
    }

    public static function userList()
    {
        try{
            $users = User::orderby('first_name','asc')->get();

            if($users->isEmpty())
            {
                return response()->error("Record not found.");
            }
            return response()->success($users, "Investor list");

        }catch(\Exception $e){

            return response()->error('An error occurred while retrieving users', 500, ['exception' => $e->getMessage()]);

        }
    }


    public function investorDetail(User $user)
    {

        return view('pages.investor.investor_detail');
    }
}
