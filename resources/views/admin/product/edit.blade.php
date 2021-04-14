@extends("admin.layout.master")


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header ">
                    <h1 class="box-title">
                        ویرایش محصول
                    </h1>
                </div>
                <div class="box-body">
                    <form action="{{Route("product.update",$products)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="category_id">دسته بندی</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option disabled selected>دسته بندی را انتخاب کنید...</option>
                                @foreach($categories as $category)
                                    <option
                                        @if($products->category_id==$category->id)
                                                selected
                                        @endif
                                        value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand_id">برند</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option selected disabled>برند را انتخاب کنید...</option>
                                @foreach($brands as $brand)
                                    <option
                                        @if($products->brand_id==$brand->id)
                                        selected
                                        @endif
                                        value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">نام</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$products->name}}">
                        </div>
                        <div class="form-group">
                            <label for="slug">اسلاگ</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{$products->slug}}">
                        </div>
                        <div class="form-group">
                            <label for="cost">قیمت</label>
                            <input type="number" class="form-control" id="cost" name="cost" value="{{$products->cost}}">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="image">تصویر</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <img width="50px" src="{{str_replace('public','/storage',$products->image)}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">توضیحات</label>
                            <textarea name="description" id="description" class="form-control">{{$products->description}}</textarea>
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
