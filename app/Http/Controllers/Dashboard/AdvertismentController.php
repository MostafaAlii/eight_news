<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisment;
use App\DataTables\AdvertismentDataTable;
use Intervention\Image\Facades\Image;
class AdvertismentController extends Controller {
    public function index(AdvertismentDataTable $dataTable) {
        return $dataTable->render('dashboard.ads.index');
    }

    public function create() {
        //
    }

    public function store(Request $request) {
    try {
        $request_data = $request->validate([
            'name' => 'required'
        ]);
        $ads = Advertisment::create($request_data);
        try {
            $ads->addMediaFromRequest('filename')->toMediaCollection('images');
        } catch (\Exception $e) {
            return redirect()->route('advertisments.index')->with('error', 'There was an error uploading the file. Please try again later.');
        }
        return redirect()->route('advertisments.index')->with('success', 'Advertisment has been saved successfully');
        } catch (\Exception $e) {
            return redirect()->route('advertisments.index')->with('error', 'There was an error saving the advertisment. Please try again later.');
        }
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}