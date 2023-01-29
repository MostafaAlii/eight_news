<div class="modal fade" id="status{{$id}}" tabindex="-1" role="dialog" aria-hidden="true" style="font-family: 'Cairo', sans-serif;">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('post.changeStatus') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <div class="modal-title" id="exampleModalLabel">
                        <div class="mb-0">
                            <h6 class="text-white" style="font-family: 'Cairo', sans-serif;">
                                <i class="fa fa-edit"></i>
                                تعديل الحاله {{$post_title}}
                                <input type="hidden" name="id" class="form-control" value="{{$id}}" />
                            </h6>
                        </div>
                    </div>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <select class="form-control p-1" required name="status">
                            <option value=""   disabled selected>-- حاله المنشور --</option>
                            <option value="published" {{$status == 'published' ? 'selected': null}}>نشرت</option>
                            <option value="Unpublished" {{$status == 'Unpublished' ? 'selected': null}}>غير منشورة</option>
                            <option value="draft" {{$status == 'draft' ? 'selected': null}}>مسودة</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">تغير الحاله</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
