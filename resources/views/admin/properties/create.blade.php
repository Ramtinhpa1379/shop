@extends("admin.layout.master")


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header ">
                    <h1 class="box-title">
                        ایجاد دسته بندی
                    </h1>
                </div>
                <div class="box-body">
                    <form action="{{Route("properties.store")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">عنوان</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="ثبت" class="btn btn-primary" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
