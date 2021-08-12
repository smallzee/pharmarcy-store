@extends('admin.layout')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-purple-gradient">
                <h3 class="widget-user-username">{{ ucwords($user->full_name) }}</h3>
            </div>
            <div class="widget-user-image">
                <img class="img-circle" style="height: 80px; width: 80px" src="<?= image_url('author.jpeg') ?>" alt="User Avatar">
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <h5 class="description-header">{{$user->phone_number}}</h5>
                            <span class="description-text" style="text-transform: capitalize"> Phone Number</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <div class="description-block">
                            <h5 class="description-header">{{ $user->email_address  }}</h5>
                            <span class="description-text" style="text-transform: capitalize">Department</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.widget-user -->
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" style="font-size: 14px;">
                <li class="active"><a href="#transactions" data-toggle="tab">Student Details</a></li>
                <li ><a href="#permission" data-toggle="tab">Sales Drugs</a></li>
            </ul>

            <div class="tab-content">
                <div id="transactions" class="tab-pane fade in active">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-striped table-bordered table-hover">

                            <tr>
                                <td>Full Name</td>
                                <td>{{ ucwords($user->full_name) }}</td>
                            </tr>

                            <tr>
                                <td>Email Address</td>
                                <td>{{ ucwords($user->email_address) }}</td>
                            </tr>

                            <tr>
                                <td>Phone Number</td>
                                <td>{{ ucwords($user->phone_number) }}</td>
                            </tr>

                        </table>
                    </div>
                </div>

                <div id="permission" class="tab-pane fade in">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Drug Usage</th>
                                <th>Drug Category</th>
                                <th>Drug Type</th>
                                <th>Measurement</th>
                                <th>Obtained Date</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>SN</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Drug Usage</th>
                                <th>Drug Category</th>
                                <th>Drug Type</th>
                                <th>Measurement</th>
                                <th>Obtained Date</th>
                            </tr>
                            </tfoot>
                            @php($sn =1)
                            @foreach(\App\Sales::orderBy('id','desc')->where('student_id',$user->id)->get() as $value)
                                <tr>
                                    <td>{{$sn++}}</td>
                                     <td>{{ ucwords(product($value->inventory->product_id,'name')) }}</td>
                                    <td>{{$value->quantity}}</td>
                                    <td>{{ $value->drug_usage }}</td>
                                    <td>{{ ucwords(category(product($value->inventory->product_id,'category_id'),'name')) }}</td>
                                    <td>{{ ucwords(drug_type(product($value->inventory->product_id,'drug_type_id'),'name')) }}</td>
                                    <td>{{ ucwords(product($value->inventory->product_id,'measurement')) }}</td>
                                    <td>{{$value->created_at}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection