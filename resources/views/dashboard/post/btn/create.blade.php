<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-hidden="true" style="font-family: 'Cairo', sans-serif;">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{route('post.store')}}" method="POST" autocomplete="off">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <div class="modal-title" id="exampleModalLabel">
                        <div class="mb-0">
                            <h6 class="text-white" style="font-family: 'Cairo', sans-serif;">
                                <i class="fa fa-plus"></i>
                               اضافه منشور جديد
                            </h6>
                        </div>
                    </div>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">عنوان المنشور</label>
                        <input type="text" name="post_title" id="post_title" required class="form-control" placeholder="اكتب اسم المنشور"
                               autofocus />
                    </div>

                    <div class="form-group">
                        <select class="form-control p-1" required name="status">
                            <option value=""   disabled selected>-- حاله المنشور --</option>
                            <option value="published">مفعل</option>
                            <option value="Unpublished">غير مفعل</option>
                            <option value="draft">مسوده</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>الاقسام</label>
                        <select class="form-control" required  name="category_id[]" multiple>

                            @forelse(getCategoryActive() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label>الكلمات المفتاحيه</label>
                        <select class="form-control"  required name="tag_id[]" multiple>

                            @forelse(getTageActive() as $tage)
                                <option value="{{$tage->id}}">{{$tage->name}}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>


                    <div class="form-group">
                        <label>وصف المنشور </label>
                        <textarea class="form-control" rows="5" name="post_content"></textarea>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">حفظ</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>
        </form>
    </div>
</div>
