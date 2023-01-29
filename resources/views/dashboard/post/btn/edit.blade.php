<div class="modal fade" id="edit{{$id}}" tabindex="-1" role="dialog" aria-hidden="true" style="font-family: 'Cairo', sans-serif;">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('post.update', 'test') }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <div class="modal-title" id="exampleModalLabel">
                        <div class="mb-0">
                            <h6 class="text-white" style="font-family: 'Cairo', sans-serif;">
                                <i class="fa fa-edit"></i>
                                تعديل {{$post_title}}
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
                        <label for="name">عنوان المنشور</label>
                        <input type="text" name="post_title" id="post_title" value="{{$post_title}}" class="form-control" placeholder="اكتب اسم المنشور"
                               autofocus />
                    </div>


                    <div class="form-group">
                        <label>الاقسام</label>
                        <select class="form-control" required  name="category_id[]" multiple>


                           @forelse(getCategoryActive() as $category)

                                <option value="{{$category->id}}"

                                @foreach(getPostCategory($id) as $row)
                                    {{$row->id == $category->id ? 'selected' : ''}}
                                    @endforeach

                                >{{$category->name}}</option>
                            @empty

                            @endforelse


                        </select>
                    </div>

                    <div class="form-group">
                        <label>الكلمات المفتاحيه</label>
                        <select class="form-control"  required name="tag_id[]" multiple>

                            @forelse(getTageActive() as $tage)
                                <option value="{{$tage->id}}"
                                @foreach(postsTages($id) as $row)
                                    {{$row->id == $tage->id ? 'selected' : ''}}
                                    @endforeach

                                >{{$tage->name}}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>


                    <div class="form-group">
                        <label>وصف المنشور </label>
                        <textarea class="form-control" rows="5" name="post_content">
                            {{$post_content}}
                        </textarea>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">حفظ</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>
        </form>
    </div>
</div>
