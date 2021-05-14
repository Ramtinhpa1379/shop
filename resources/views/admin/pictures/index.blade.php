@extends('admin.layout.master')

@section('content')

    <div class="row">
        <form action="{{route("products.picture.store",$product)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="col-md-12 form-group">
                    <div class="card-body form-control">
                        <label for="image" class="form-control">افزودن تصویر</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="form-control">
                        <input type="submit" value="آپلود" class="btn btn-success">
                    </div>
                </div>

            </div>
        </form>
            @foreach($product->pictures as $picture)
            <div class="col-md-12 col-lg-3 form-group">
                <div class="card">
                    <div class="card-body form-control">
                        <img class="card-img-top img-responsive" src="{{str_replace("public","/storage",$picture->path)}}">
                        <form method="post" action="{{route("products.picture.destroy",['product'=>$product,'picture'=>$picture])}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="حذف" class="btn btn-sm btn-danger">
                        </form>
                    </div>
                </div>

            </div>
            @endforeach


    </div>

@endsection
