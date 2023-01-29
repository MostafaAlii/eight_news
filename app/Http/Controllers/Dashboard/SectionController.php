<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\SectionDataTable;
use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SectionDataTable $dataTable)
    {
        return $dataTable->render('dashboard.section.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Section::create([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'admin_id' => auth()->id(),
                'status' => $request->status,
            ]);
            return redirect()->route('sections.index')->with('success', 'تم الحفظ بنجاح');
        } catch (\Exception $ex) {
            return redirect()->route('sections.index')->with('error', 'هناك خظأ في البيانات');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            Section::findorfail($request->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'admin_id' => auth()->id()
            ]);
            return redirect()->route('sections.index')->with('success', 'تم التعديل بنجاح');
        } catch (\Exception $ex) {
            return redirect()->route('sections.index')->with('error', 'هناك خظأ في البيانات');
        }
    }

    public function changeStatus(Request $request) {
        //dd($request->all());
        try {
            $request->request->add(['status' => $request->has('status') ? true : false]);
            Section::whereId($request->id)->update($request->only(['status']));
            return redirect()->route('sections.index')->with('success', 'تم تغيير الحاله بنجاح');
        } catch(\Exception $ex){
            return redirect()->route('sections.index')->with('error', 'هناك خظأ في البيانات');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Section::whereId($request->id)->delete();
            return redirect()->route('sections.index')->with('success', 'تم الحذف بنجاح');
        } catch(\Exception $ex){
            return redirect()->route('sections.index')->with('error', 'هناك خظأ في البيانات');
        }
    }
}