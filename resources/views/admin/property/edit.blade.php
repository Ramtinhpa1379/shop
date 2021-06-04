@extends("admin.layout.master")


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header ">
                    <h1 class="box-title">
                        ایجاد ویژگی
                    </h1>
                </div>
                <div class="box-body">
                    <form action="{{Route("property.update",$property)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="category_id">گروه ویژگی ها</label>
                            <select name="property_group_id" id="category_id" class="form-control">
                                <option selected disabled>گروه ویژگی را انتخاب کنید...</option>
                                @foreach($groups as $group)
                                    <option
                                        @if($property->property_groups->id == $group->id)
                                            selected
                                        @endif
                                        value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                            </select>
                        </div>
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
        </div>
    </div>

@endsection
