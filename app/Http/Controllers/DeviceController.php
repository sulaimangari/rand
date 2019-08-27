<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Device;
use App\Http\Models\Borrow;
use Auth;
use Carbon\Carbon;


class DeviceController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function alldevice()
    {
        $devices = Device::orderBy('id', 'desc')->get();
        // dd($devices);
        return view('device.list', compact('devices'));
    }

    public function availableDevice()
    {
        $devices = Device::where('device_status', 1)->orderBy('id', 'desc')->get();
        // dd($devices);
        return view('device.list', compact('devices'));
    }

    public function borrowedDevice()
    {
        $devices = Device::where('device_status', 2)->orderBy('id', 'desc')->get();
        // dd($devices);
        return view('device.list', compact('devices'));
    }

    public function brokenDevice()
    {
        $devices = Device::where('device_status', 3)->orderBy('id', 'desc')->get();
        // dd($devices);
        return view('device.list', compact('devices'));
    }

    public function createDevice()
    {
        Auth::user()->authorizeRoles(['admin',]);

        $code = Device::orderBy('id', 'desc')->first('id');
        if ($code == null) {
            $code = 0;
            return view('device.create', compact('code'));
        }
        $code = $code->id;
        return view('device.create', compact('code'));
    }

    public function storeDevice(Request $request)
    {
        Auth::user()->authorizeRoles(['admin',]);

        $request->validate([
            'device_code' => 'required',
            'device_name' => 'required',
            'device_type' => 'required',
            'device_location' => 'required',
            'device_in' => 'required',
            'device_status' => 'required',
            'device_specs' => 'required',
        ]);

        $device = new Device([
            'device_code' => $request->get('device_code'),
            'device_name' => $request->get('device_name'),
            'device_type' => $request->get('device_type'),
            'device_location' => $request->get('device_location'),
            'device_in' => $request->get('device_in'),
            'device_status' => $request->get('device_status'),
            'device_specs' => $request->get('device_specs'),
        ]);
        $device->save();
        return redirect()->route('allDevice');
    }

    public function deleteDevice(Request $request)
    {
        Auth::user()->authorizeRoles(['admin',]);

        $id = $request->input('id');
        $device = Device::find($id);


        $device->delete();

        return redirect()->route('allDevice')->with('message', 'Device has been deleted!');
    }

    public function editDevice($id)
    {
        Auth::user()->authorizeRoles(['admin',]);
        $data = Device::findOrFail($id);
        return view('device.edit', compact('data'));
    }

    public function updateDevice(Request $request)
    {
        // dd($request->all());
        Auth::user()->authorizeRoles(['admin',]);
        $request->validate([
            'device_code' => 'required',
            'device_name' => 'required',
            'device_type' => 'required',
            'device_location' => 'required',
            'device_in' => 'required',
            'device_status' => 'required',
            'device_specs' => 'required',
        ]);

        Device::where('id', $request->get('id'))->update(array(
            'device_code' => $request->get('device_code'),
            'device_name' => $request->get('device_name'),
            'device_type' => $request->get('device_type'),
            'device_location' => $request->get('device_location'),
            'device_in' => $request->get('device_in'),
            'device_status' => $request->get('device_status'),
            'device_specs' => $request->get('device_specs')
        ));
        return redirect()->route('deviceList')->with('message', 'Device has been updated!');
    }


    //borrow

    public function listBorrowedDevice()
    {
        $data = Borrow::where('stillBorrowed', true)->orderBy('id', 'desc')->get();
        return view('borrow.list', compact('data'));
    }

    public function listReturnedDevice()
    {
        $data = Borrow::where('stillBorrowed', false)->orderBy('id', 'desc')->get();
        return view('borrow.returned', compact('data'));
    }

    public function borrowBack(Request $request)
    {
        Auth::user()->authorizeRoles(['admin',]);

        $id_borrow = $request->get('id');
        $return_date = Carbon::now()->format('d-m-Y');

        $dataDevice = Borrow::where('id', $id_borrow)->first();
        $id_device = $dataDevice->device->id;
        Borrow::where('id', $id_borrow)->update(array('back_date' => $return_date, 'stillBorrowed' => false));
        Device::where('id', $id_device)->update(array('device_status' => 1));

        return redirect()->route('availableDevice')->with('message', 'Device returned has been updated!');
    }

    public function borrowDevice()
    {
        Auth::user()->authorizeRoles(['admin',]);

        $deciveCheck = Device::where('device_status', 1)->count();
        // dd($deciveCheck);
        if ($deciveCheck == 0) {
            return 'no device available';
        } else {
            // dd('$device');

            $user = Auth::user()->get('name')->sortBy('name')->pluck('name');
            $device = Device::where('device_status', 1)->orderBy('id', 'desc')->pluck('device_name', 'id');
            return view('borrow.create', compact('user', 'device'));
        }
    }

    public function saveBorrowDevice(Request $request)
    {
        Auth::user()->authorizeRoles(['admin',]);

        // dd($request->all());
        $request->validate([
            'id_device' => 'required',
            'crew_name' => 'required',
            'borrow_date' => 'required'
        ]);

        $borrow = new Borrow([
            'device_id' => $request->get('id_device'),
            'crew_name' => $request->get('crew_name'),
            'borrow_date' => $request->get('borrow_date'),
            'stillBorrowed' => true,
        ]);
        $borrow->save();

        $id_device = $request->get('id_device');
        Device::where('id', $id_device)->update(array('device_status' => 2));
        $device_name = Device::where('id', $id_device)->pluck('device_name');
        return redirect()->route('allDevice')->with('message', 'device ' . $device_name . ' has been borrowed');
    }
}
