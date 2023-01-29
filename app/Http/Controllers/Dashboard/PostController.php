<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\PostDataTable;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostDataTable $dataTable)
    {
        return $dataTable->render('dashboard.post.index');
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
            $data = Post::create([
                'post_title' => $request->post_title,
                'post_content' => $request->post_content,
                'admin_id' => auth()->id(),
                'status' => $request->status,
            ]);

            $data->postCategories()->attach($request->category_id);
            $data->postsTages()->attach($request->tag_id);
            toastr('تم الحفظ بنجاح');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->route('post.index');
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
            $data = Post::findorfail($request->id);

            $data->update([
                'post_title' => $request->post_title,
                'post_content' => $request->post_content,
                'admin_id' => auth()->id(),
            ]);

            if (isset($request->category_id)) {
                $data->postCategories()->sync($request->category_id);
            } else {
                $data->postCategories()->sync(array());
            }

            if (isset($request->tag_id)) {
                $data->postsTages()->sync($request->tag_id);
            } else {
                $data->postsTages()->sync(array());
            }

            toastr('تم التعديل بنجاح');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->route('post.index');
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
            Post::whereId($request->id)->delete();
            toastr('تم حذف  بنجاح');
            return redirect()->route('post.index');
        } catch (\Exception $ex) {
            return redirect()->route('post.index');
        }
    }


    public function changeStatus(Request $request)
    {
        try {
            Post::whereId($request->id)->update($request->only(['status']));
            toastr('تم تغير حاله بنجاح');
            return redirect()->route('post.index');
        } catch (\Exception $ex) {
            return redirect()->route('post.index');
        }
    }
}
