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
                    <form action="{{Route("categories.store")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="category_id">دسته  والد</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option selected disabled>دسته ی والد را انتخاب کنید...</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">عنوان</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            @foreach($properties as $property)
                                <label class="col-sm-2">
                                    <input style="opacity: 1 !important;position: static !important;" type="checkbox" value="{{$property->id}}" name="properties[]">
                                    {{$property->title}}
                                </label>
                            @endforeach
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
