<div class="btn-group align-center">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        العمليات
    </button>
    <div class="dropdown-menu dropmenu-menu-right">
        <button type="button" class="dropdown-item btn btn-outline-primary btn-md text-center" data-toggle="modal"
                data-target="#edit{{$id}}">
            <i class="fa fa-edit"></i>
            تعديل
        </button>

        <button type="button" class="dropdown-item btn btn-outline-primary btn-md text-center" data-toggle="modal"
                data-target="#status{{$id}}">
           @if($status === 'published')
                <i class="fa fa-eye"></i>
            @elseif($status == 'Unpublished')
                <i class="fa fa-eye-slash"></i>
            @else
                <i class="fa fa-question-circle"></i>
            @endif
            الحاله
        </button>


        <button type="button" class="dropdown-item btn btn-outline-primary btn-md text-center" data-toggle="modal"
                data-target="#image{{$id}}">
            <i class="fa fa-image"></i>
            المرفقات
        </button>
        <form action="{{route('post.destroy', 'test')}}" method="POST">
            {{ method_field('delete') }}
            @csrf
            <input type="hidden" name="id" id="id" value="{{$id}}">
            <button type="submit" class="dropdown-item btn btn-outline-danger btn-md text-center">
                <i class="fa fa-trash"></i>
                حذف
            </button>
        </form>


    </div>
</div>


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


<div class="modal fade" id="image{{$id}}" tabindex="-1" role="dialog" aria-hidden="true" style="font-family: 'Cairo', sans-serif;">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('post.changeStatus') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <div class="modal-title" id="exampleModalLabel">
                        <div class="mb-0">
                            <h6 class="text-white" style="font-family: 'Cairo', sans-serif;">
                                <i class="fa fa-edit"></i>
                                صور{{$post_title}}
                                <input type="hidden" name="id" class="form-control" value="{{$id}}" />
                            </h6>
                        </div>
                    </div>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">تغير الحاله</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

@include('dashboard.post.btn.edit')
