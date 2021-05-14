@extends("admin.layout.master")


@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="box">
                <div class="box-header ">
                    <h1 class="box-title">
                        ایجاد تخفیف
                    </h1>
                </div>
                <div class="box-body">
                    <form action="{{Route("products.discount.store",$product)}}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label for="value">مقدار</label>
                            <input type="text" class="form-control" id="value" name="value">
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
