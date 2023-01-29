<div class="modal fade" id="edit{{$id}}" tabindex="-1" role="dialog" aria-hidden="true" style="font-family: 'Cairo', sans-serif;">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('tag.update', 'test') }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <div class="modal-title" id="exampleModalLabel">
                        <div class="mb-0">
                            <h6 class="text-white" style="font-family: 'Cairo', sans-serif;">
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
                        <label for="name">اسم الكلمه المفتاحيه</label>
                        <input type="text" name="name" id="name" required class="form-control" value="{{$name}}"
                               autofocus />
                    </div>

                    <div class="form-group">
                        <select class="form-control p-1" required name="status">
                            <option value=""   disabled selected>-- حاله الكلمه --</option>
                            <option value="active" {{$status == 'active' ? 'selected': null}}>مفعل</option>
                            <option value="notActive" {{$status == 'notActive' ? 'selected': null}}>غير مفعل</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">تعديل</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>
        </form>
    </div>
</div>
