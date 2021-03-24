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
                    <form action="{{Route("categories.update",$category->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="category-id">دسته  والد</label>
                            <select name="category-id" id="category-id" class="form-control">
                                <option selected disabled>دسته ی والد را انتخاب کنید...</option>
                                @foreach($categories as $parent)
                                    <option
                                        @if($parent->id == $category->Category_id)
                                            selected
                                        @endif
                                        value="{{$parent->id}}">{{$parent->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">عنوان</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$category->title}}">
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
