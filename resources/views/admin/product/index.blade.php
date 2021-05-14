@extends('admin.layout.master')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border ">
                    <h1 class="box-title">محصولات</h1>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>برند</th>
                                <th>دسته بندی</th>
                                <th>قیمت</th>
                                <th>تاریخ ایجاد</th>
                                <th>تصویر</th>
                                <th>تخفیف</th>
                                <th>گالری</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->brand->name}}</td>
                                    <td>{{$product->category->title}}</td>
                                    <td>{{$product->cost}}</td>
                                    <td></td>
                                    <td><img width="50px" src="{{str_replace('public','/storage',$product->image)}}"/></td>
                                    <td>
                                        @if(!$product->discount()->exists())
                                        <form action="{{route("products.discount.create",$product)}}">
                                        <input class="btn btn-sm btn-success" type="submit" value="تخفیف" >
                                        </form>
                                        @else
                                            <p>{{$product->discount->value}}</p>
                                            <form action="{{route("products.discount.destroy",['product'=>$product,'discount'=>$product->discount])}}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <input type="submit" class="btn btn-sm btn-danger" value="حذف">
                                            </form>
                                        @endif
                                    </td>
                                    <td>

                                            <a href="{{route("products.picture.index",$product)}}" class="btn btn-sm btn-warning">گالری</a>

                                    </td>
                                    <td>
                                        <a href="{{Route("product.edit",$product)}}" class="btn btn-sm btn-primary">ویرایش </a>
                                    </td>

                                    <td>
                                        <form action="{{Route("product.destroy",$product)}}" method="post" >
                                            @csrf
                                            @method("DELETE")
                                            <input type="submit" value="حذف"  class="btn btn-sm btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>برند</th>
                                <th>دسته بندی</th>
                                <th>قیمت</th>
                                <th>تاریخ ایجاد</th>
                                <th>تصویر</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <!-- jQuery 3 -->
    <script src="/admin/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

    <!-- popper -->
    <script src="/admin/assets/vendor_components/popper/dist/popper.min.js"></script>

    <!-- Bootstrap 4.0-->
    <script src="/admin/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- SlimScroll -->
    <script src="/admin/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

    <!-- FastClick -->
    <script src="/admin/assets/vendor_components/fastclick/lib/fastclick.js"></script>

    <!-- Superieur Admin App -->
    <script src="/admin/js/template.js"></script>

    <!-- Superieur Admin for demo purposes -->
    <script src="/admin/js/demo.js"></script>

    <!-- This is data table -->
    <script src="/admin/assets/vendor_components/datatable/datatables.min.js"></script>

    <!-- Superieur Admin for Data Table -->
    <script src="/admin/js/pages/data-table.js"></script>


@endsection

