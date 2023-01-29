<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('admins.store')}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <div class="modal-title" id="exampleModalLabel">
                        <div class="mb-0">
                            <h6 class="text-white">
                                <i class="fa fa-plus"></i>
                                اضافه مدير او مشرف
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
                        <label for="email">البريد الالكترونى</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="اكتب البريد الالكترونى" />
                    </div>
                    <div class="form-group">
                        <label for="password">كلمه المرور</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="اكتب كلمه المرور" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">حفظ</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>
        </form>
    </div>
</div>