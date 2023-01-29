<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-hidden="true"
    style="font-family: 'Cairo', sans-serif;">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{route('sections.store')}}" method="POST" autocomplete="off">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <div class="modal-title" id="exampleModalLabel">
                        <div class="mb-0">
                            <h6 class="text-white" style="font-family: 'Cairo', sans-serif;">
                                <i class="fa fa-plus"></i>
                                اضافه مجال جديد
                            </h6>
                        </div>
                    </div>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">اسم المجال</label>
                        <input type="text" name="name" id="name" required class="form-control"
                            placeholder="اكتب اسم المجال" autofocus />
                    </div>

                    <div class="form-group">
                        <select class="form-control p-1" required name="status">
                            <option value="" disabled selected>-- حاله المجال --</option>
                            <option value="1">مفعل</option>
                            <option value="0">غير مفعل</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <select class="form-control p-1" name="category_id">
                            <option value="" disabled selected>-- اختر القسم الاساسي --</option>
                            @forelse(getCategoryActive() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @empty
                    
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label>وصف المجال </label>
                        <textarea class="form-control" rows="5" name="description"></textarea>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">حفظ</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>
        </form>
    </div>
</div>