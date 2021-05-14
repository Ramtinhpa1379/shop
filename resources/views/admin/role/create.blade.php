@extends("admin.layout.master")


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header ">
                    <h1 class="box-title">
                        ایجاد نقش
                    </h1>
                </div>
                <div class="box-body">
                    <form action="{{Route("role.store")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">نام</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            @foreach($permissions as $permission)
                                <label class="col-sm-2">
                                    <input style="opacity: 1 !important;position: static !important;" type="checkbox" value="{{$permission->id}}" name="permissions[]">
                                    {{$permission->title}}
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="ثبت" class="btn btn-primary" >
                        </div>
                    </form>
                </div>
            </div>
            @if(count($errors->all()) >0)
                <ul class="bg-danger">
                    @foreach($errors->all() as $error)
                        <li class="text-white">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

@endsection
