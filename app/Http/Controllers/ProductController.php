<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use App\Models\Device;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;



class ProductController extends Controller{

    public function showAccounting(){
        $staffs = Staff::with('devices')->where('departmentId', 1)->orderByDesc('created_at')->simplePaginate(10);

        return view('departments.accounting', compact('staffs'));
    }

    public function addAccounting() {
        // Retrieve the ID of the "Accounting" department
        $accountingDepartment = Department::where('name', 'Accounting')->first();
    
        // If the accounting department exists, get its ID, otherwise default to 0
        $accountingId = $accountingDepartment ? $accountingDepartment->id : 0;
    
        return view('departments.create', ['accountingId' => $accountingId]);
    }
    

    public function createAccounting(Request $request) {
        $validated = $request->validate([
            "name"              => ['required'],
            "computerType"      => ['required'],
            "specification"     => ['required'],
            "monitor"           => ['nullable'],
            "avrUps"            => ['nullable'],
            "printer"           => ['nullable'],
        ]);
    
        // Create a new staff
        $staff = Staff::create([
            'name'          => $validated['name'],
            'departmentId'  => $request->input('accountingId')
        ]);
    
        // Create a new device using the validated data
        $device = Device::create([
            'staffId'        => $staff->id,
            'departmentId'   => $request->input('accountingId'),
            'computerType'   => $validated['computerType'],
            'specification'  => $validated['specification'],
            'monitor'        => $validated['monitor'],
            'avrUps'         => $validated['avrUps'],
            'printer'        => $validated['printer'],
        ]);
    
        return redirect('/accounting')->with('message', 'New Product has been successfully created');
    }



    public function showEditAccounting(Device $device) {
        // Retrieve the ID of the "Accounting" department
        $accountingId = Department::where('name', 'Accounting')->value('id');
    
        // Pass the device, its associated staff, and qrCode to the view
        return view('departments.edit', [
            'device'       => $device->load('staff'), // Eager loading
            'staff'        => $device->staff,
            'accountingId' => $accountingId,
            'qrCode'       => $device->qrCode // Pass the qrCode to the view
        ]);
    }
    

    public function updateAccounting(Request $request, Device $device) {
        $validated = $request->validate([
            "name"              => ['required'],
            "computerType"      => ['required'],
            "specification"     => ['required'],
            "monitor"           => ['nullable'],
            "avrUps"            => ['nullable'],
            "printer"           => ['nullable'],
        ]);
    
        // Retrieve staff ID from request
        $staffId = $request->input('staffId');
    
        // Retrieve the corresponding staff member based on staffId
        $staff = Staff::find($staffId);
    
        if (!$staff) {
            return back()->with('error', 'Staff member not found');
        }
    
        // Perform updates within a transaction
        try {
            DB::transaction(function () use ($staff, $device, $request, $validated, $staffId) {
                // Update staff
                $staff->update([
                    'name'           => $validated['name'],
                    'departmentId'   => $request->input('accountingId')
                    // Add more fields if needed
                ]);
    
                // Update device
                $device->update([
                    'staffId'        => $staffId,
                    'departmentId'   => $request->input('accountingId'),
                    'computerType'   => $validated['computerType'],
                    'specification'  => $validated['specification'],
                    'monitor'        => $validated['monitor'],
                    'avrUps'         => $validated['avrUps'],
                    'printer'        => $validated['printer'],
                    // Add more fields if needed
                ]);
            });
    
            // Redirect back with a success message
            return back()->with('message', 'Inventory information updated successfully');
        } catch (\Exception $e) {
            // Handle transaction failure
            return back()->with('error', 'Failed to update inventory information');
        }
    }
    
    

    public function destroy(Device $device) {
        try {
            DB::transaction(function () use ($device) {
                // Delete the associated staff member
                $device->staff()->delete();
    
                // Delete the device
                $device->delete();
            });
    
            // Provide feedback to the user
            return redirect('/accounting')->with('message', 'Device and associated staff were successfully deleted');
        } catch (\Exception $e) {
            // Provide error feedback to the user
            return back()->with('error', 'Failed to delete device and associated staff. Please try again.');
        }
    }

    public function showQr(Device $device){
        return view('departments.qrAccounting', [
            'device'       => $device,
        ]);
    }

    public function download($deviceId) {
        // Retrieve the device and staff based on the provided ID
        $device = Device::find($deviceId);
        $staffName = $device->staff->name;
    
        // Generate the QR code containing the edit URL
        $editUrl = route('edit.device', ['device' => $device->id]);
        $qrCode = QrCode::format('png')->size(300)->generate($editUrl);
    
        // Set filename based on staff's name
        $filename = strtolower(str_replace(' ', '_', $staffName)) . '_qr_code.png';
    
        // Set headers for file download
        $headers = [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
    
        // Return response with QR code image as PNG
        return Response::make($qrCode, 200, $headers);
    }
}
