<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $dataTable)
    {

        return $dataTable->render('dashboard.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'admin_id' => auth()->id(),
                'status' => $request->status,
            ]);

            toastr('تم الحفظ بنجاح');
            return redirect()->back();
        } catch (\Exception $ex) {
            toastr('هناك خظأ في البيانات', 'error');
            return redirect()->route('categories.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            Category::findorfail($request->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'admin_id' => auth()->id(),
                'status' => $request->status,
            ]);

            toastr('تم العديل بنجاح');
            return redirect()->back();
        } catch (\Exception $ex) {
            toastr('هناك خظأ في البيانات', 'error');
            return redirect()->route('categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Category::whereId($request->id)->delete();
            toastr('تم حذف القسم بنجاح');
            return redirect()->route('categories.index');
        } catch (\Exception $ex) {
            return redirect()->route('categories.index');
        }
    }


    public function changeStatus(Request $request)
    {
        try {
            $request->request->add(['status' => $request->has('status') ? 'active' : 'notActive']);
            Category::whereId($request->id)->update($request->only(['status']));
            toastr('تم تغير حاله القسم بنجاح');
            return redirect()->route('categories.index');
        } catch (\Exception $ex) {
            return redirect()->route('categories.index');
        }
    }
}