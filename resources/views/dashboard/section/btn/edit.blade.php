<div class="modal fade" id="edit{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('sections.update', 'test') }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <div class="modal-title" id="exampleModalLabel">
                        <div class="mb-0">
                            <h6 class="text-white">
                                <i class="fa fa-edit"></i>
                                تعديل {{$name}}
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
                        <label for="name">الاسم</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$name}}" />
                    </div>

                    <div class="form-group">
                        <label for="description">القسم التابع</label>
                        <select class="form-control p-1" name="category_id">
                            <option value="" disabled selected>-- اختر القسم الاساسي --</option>
                            @forelse(getCategoryActive() as $category)
                            <option value="{{$category->id}}" {{$category_id == $category->id ? 'selected' : ''}}>
                                {{$category->name}}
                            </option>
                            @empty
                                <option value="" disabled selected>لا يوجد اقسام</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">الوصف</label>
                        <textarea class="form-control" rows="5" name="description">{{$description}}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">تعديل</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>
        </form>
    </div>
</div>