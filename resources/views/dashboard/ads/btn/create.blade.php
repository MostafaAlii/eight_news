<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('advertisments.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <div class="modal-title" id="exampleModalLabel">
                        <div class="mb-0">
                            <h6 class="text-white">
                                <i class="fa fa-plus"></i>
                                اضافه اعلان
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
                        <input type="hidden" name="admin_type" id="admin_type" value="admin">
                        <input type="text" name="name" id="name" class="form-control" placeholder="اكتب الاسم"
                            autofocus />
                    </div>
                    <div class="form-group">
                        <label for="url">الرابط</label>
                        <input type="url" name="url" id="url" class="form-control" placeholder="اكتب الرابط اذا وجد" />
                    </div>
                    <div class="form-group">
                        <label for="photo">الصورة</label>
                        <input type="file" name="filename" id="photo" class="form-control" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">حفظ</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>
        </form>
    </div>
</div>