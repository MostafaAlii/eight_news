<?php
namespace App\Http\Controllers\Dashboard;
use App\Traits\Uploads;
use App\Models\Advertisment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\AdvertismentDataTable;

class AdvertismentController extends Controller {
    use Uploads;
    public function index(AdvertismentDataTable $dataTable) {
        return $dataTable->render('dashboard.ads.index');
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        DB::beginTransaction();
        try {
            $request_data = $request->except(['image', 'admin_id', '_token']);
            $request_data['admin_id'] = get_user_data()->id; 
            $ads = Advertisment::create($request_data);
            $request_data['image'] = $this->verifyAndStoreImage($request, 'image', 'advertisment', 'public_uploads', $ads->id, 'Advertisment');
            DB::commit();
            return redirect()->route('advertisments.index')->with('success', 'تم الحفظ بنجاح');
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->route('advertisments.index')->with('error', 'هناك خظأ في البيانات');   
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