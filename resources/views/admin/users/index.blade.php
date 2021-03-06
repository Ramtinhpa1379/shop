@extends('admin.layout.master')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border ">
                    <h1 class="box-title"> کاربران</h1>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>ایمیل</th>
                                <th>نقش</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->title}}</td>
                                    <td>
                                        <a href="{{Route("role.edit",$user)}}" class="btn btn-sm btn-primary">ویرایش </a>
                                    </td>
                                    <td>
                                        <form action="{{Route("role.destroy",$user)}}" method="post" >
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
