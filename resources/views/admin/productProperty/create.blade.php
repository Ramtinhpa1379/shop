@extends("admin.layout.master")


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <form action="{{Route("product.property.store",$product)}}" method="post">
                @csrf
                <div class="box">
                    <div class="box-header ">
                        <h1 class="box-title">
                            ویژگی های محصول {{$product->name}}
                        </h1>
                    </div>

                    @php
                        $propertyGroup=$product->category->property_group
                    @endphp

                    @foreach($propertyGroup as $group)
                        <h3>{{$group->title}}</h3>
                        <div class="row">
                            @foreach($group->properties as $property)

                                <div class="form-group col-sm-6">
                                    <div class="row form-group">
                                        <div class="col-sm-2 ">
                                            <label for="name">{{$property->title}}</label>
                                        </div>
                                        <div class="col-sm-8 ">
                                            <input value="{{$property->getValueForProduct($product)}}" type="text" class="form-control" name="properties[{{$property->id}}][value]" >
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <div class="box-body">


                        <div class="form-group">
                            <input type="submit" name="submit" value="ثبت" class="btn btn-primary" >
                        </div>

                    </div>
                </div>
            </form>
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
