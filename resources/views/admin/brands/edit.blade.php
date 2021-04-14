@extends("admin.layout.master")


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header ">
                    <h1 class="box-title">
                        تغییر برند ({{$brand->name}})
                    </h1>
                </div>
                <div class="box-body">
                    <form action="{{Route('brands.update',$brand)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">نام</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$brand->name}}">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6"><input type="file" class="form-control" name="image" id="image"></div>
                                <div class="col-sm-6"><img width="50px" src="{{str_replace('public','/storage',$brand->image)}}"/></div>
                            </div>
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
