<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\TagDataTable;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TagDataTable $dataTable)
    {
        return  $dataTable->render('dashboard.tag.index');
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
            Tag::create([
                'name'=> $request->name,
                'status' => $request->status,
                'admin_id' => auth()->id(),
            ]);
            toastr('تم الحفظ بنجاح');
            return  redirect()->route('tag.index');
        }catch (\Exception $exception){
            return  redirect()->route('tag.index');
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
            Tag::findorfail($request->id)->update([
                'name'=> $request->name,
                'status' => $request->status,
                'admin_id' => auth()->id(),
            ]);
            toastr('تم التعديل بنجاح');
            return  redirect()->route('tag.index');
        }catch (\Exception $exception){
            return  redirect()->route('tag.index');
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
            Tag::whereId($request->id)->delete();
            toastr('تم حذف  بنجاح');
            return redirect()->route('tag.index');
        } catch (\Exception $ex) {
            return redirect()->route('tag.index');
        }
    }


    public function changeStatus(Request $request)
    {
        try {
            $request->request->add(['status' => $request->has('status') ? 'active' : 'notActive']);
            Tag::whereId($request->id)->update($request->only(['status']));
            toastr('تم تغير حاله  بنجاح');
            return redirect()->route('tag.index');
        } catch (\Exception $ex) {
            return redirect()->route('tag.index');
        }
    }
}
