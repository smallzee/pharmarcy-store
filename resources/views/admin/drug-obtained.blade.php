@extends('admin.layout')

@section('content')

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

                <div class="table-responsive">
                    <table class="table table-bordered" id="example1">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Drug Usage</th>
                            <th>Drug Category</th>
                            <th>Drug Type</th>
                            <th>Measurement</th>
                            <th>Sales Date</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Drug Usage</th>
                            <th>Drug Category</th>
                            <th>Drug Type</th>
                            <th>Measurement</th>
                            <th>Sales Date</th>
                        </tr>
                        </tfoot>
                        @php($sn =1)
                        @foreach(\App\Sales::orderBy('id','desc')->get() as $value)
                            <tr>
                                <td>{{$sn++}}</td>
                                <td>{{ ucwords($value->user->full_name) }}</td>
                                <td>{{$value->email_address}}</td>
                                <td>{{ ucwords(product($value->inventory->product_id,'name')) }}</td>
                                <td>{{$value->quantity}}</td>
                                <td>{{ number_format(category(product($value->inventory->product_id,'category_id'),'price')) }}</td>
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


@endsection