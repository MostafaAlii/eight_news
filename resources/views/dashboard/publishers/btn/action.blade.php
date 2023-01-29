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
        <form action="{{route('publishers.destroy', 'test')}}" method="POST">
            {{ method_field('delete') }}
            @csrf
            <input type="hidden" name="id" id="id" value="{{$id}}">
            <button type="submit" class="dropdown-item btn btn-outline-danger btn-md text-center">
                <i class="fa fa-trash"></i>
                حذف
            </button>
        </form>

        <form action="{{route('publisher.changeStatus')}}" method="POST">
            @csrf
            <div class="checkbox checbox-switch btn-sm switch-success text-center">
                <label>
                    <input type="hidden" name="id" id="id" value="{{$id}}">
                    <input type="checkbox" name="status" value="1" {{ $status=='1' ? "checked" : "" }}
                        onchange="this.form.submit()">
                    <span></span>
                    {{ $status == '1' ? "فعال" : "غير فعال" }}
                </label>
            </div>
        </form>
    </div>
</div>

@include('dashboard.users.btn.edit')