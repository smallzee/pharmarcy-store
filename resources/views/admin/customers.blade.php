@extends('admin.layout')

@section('content')

    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    <h4 id="myModalLabel" class="modal-title">Add New Customer</h4>
                </div>
                <div class="modal-body">
                    <form action="{{url('admin/create_new_student')}}" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" placeholder="Full Name" class="form-control" name="full_name" required id="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control" required placeholder="Phone Number" name="phone_number" id="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" class="form-control" name="email_address" required placeholder="Email Address" id="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit" name="" id="">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$page_title}}</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">

                <a href="#" class="btn btn-primary mb-20" data-target="#myModal" data-toggle="modal">Add New Customer</a>

                <div class="table-responsive">
                    <table class="table table-bordered" id="example1">
                       <thead>
                       <tr>
                           <th>SN</th>
                           <th>Full Name</th>
                           <th>Email Address</th>
                           <th>Phone Number</th>
                           <th>Action</th>
                       </tr>
                       </thead>
                        <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @php($sn =1)
                        @foreach(\App\User::orderBy('id','desc')->where('role_id',1)->get() as $value)
                            <tr>
                                <td>{{$sn++}}</td>
                                <td>{{ucwords($value->full_name)}}</td>
                                <td>{{$value->email_address}}</td>
                                <td>{{$value->phone_number}}</td>
                                <td><a href="{{url('admin/view/'.$value->id)}}" class="btn btn-primary btn-sm">View</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>

@endsection