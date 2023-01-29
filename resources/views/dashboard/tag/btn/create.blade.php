<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-hidden="true" style="font-family: 'Cairo', sans-serif;">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{route('tag.store')}}" method="POST" autocomplete="off">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <div class="modal-title" id="exampleModalLabel">
                        <div class="mb-0">
                            <h6 class="text-white" style="font-family: 'Cairo', sans-serif;">
                                <i class="fa fa-plus"></i>
                                اضافه كلمه مفتاحيه جديد
                            </h6>
                        </div>
                    </div>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">اسم الكلمه</label>
                        <input type="text" name="name" id="name" required class="form-control" placeholder="اكتب اسم الكمله"
                               autofocus />
                    </div>

                    <div class="form-group">
                        <select class="form-control p-1" required name="status">
                            <option value=""   disabled selected>-- حاله الكلمه --</option>
                            <option value="active">مفعل</option>
                            <option value="notActive">غير مفعل</option>
                        </select>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">حفظ</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>
        </form>
    </div>
</div>
