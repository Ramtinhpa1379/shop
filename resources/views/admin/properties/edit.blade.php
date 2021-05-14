@extends("admin.layout.master")


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header ">
                    <h1 class="box-title">
                        ویرایش مشخصات
                    </h1>
                </div>
                <div class="box-body">
                    <form action="{{Route("properties.update",$property)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title">عنوان</label>
                            <input value="{{$property->title}}" type="text" class="form-control" id="title" name="title">
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
