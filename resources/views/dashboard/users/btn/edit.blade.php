<div class="modal fade" id="edit{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('users.update', 'test') }}" method="POST">
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
                        <label for="email">البريد الالكترونى</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$email}}" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">تعديل</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>
        </form>
    </div>
</div>