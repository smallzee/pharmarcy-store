@extends('admin.layout')

@section('content')

    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    <h4 id="myModalLabel" class="modal-title">Add New Product Inventory</h4>
                </div>
                <div class="modal-body">
                    <form action="{{url('admin/create_new_inventory')}}" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <select name="product_name" id="" class="form-control">
                                        <option value="" disabled selected>Select</option>
                                        @foreach(\App\Products::orderBy('name')->get() as $value)
                                            <option value="{{$value->id}}">{{ ucwords($value->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="number" class="form-control" required placeholder="Quantity" name="quantity" id="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Expiry Date</label>
                                    <input type="date" class="form-control" name="expiry_date" required id="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Remark (optional)</label>
                            <textarea name="remark" class="form-control" style="resize: none" placeholder="Remark"></textarea>
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

                <div class="table-responsive">
                    <form action="{{url('admin/create_obtain_drug')}}" method="post">

                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Customer</label>
                                    <select name="customer" id="" class="form-control select2" required>
                                        <option value="" disabled selected>Select</option>
                                        @foreach(\App\User::orderBy('email_address')->where('role_id',1)->get() as $value)
                                            <option value="{{$value->id}}"> {{ strtoupper($value->full_name) }} ( {{ucwords($value->email_address)}} )</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="">Amount Tender</label>
                                <input type="number" name="amount" class="form-control" placeholder="Amoun Tender" id="">
                            </div>
                        </div>

                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th></th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                {{--<th>Drug Usage</th>--}}
                                <th>Price</th>
                                <th>Drug Category</th>
                                <th>Drug Type</th>
                                <th>Measurement</th>
                                <th>Stock Quantity</th>
                                <th>Expiry Date</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>SN</th>
                                <th></th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                {{--<th>Drug Usage</th>--}}
                                <th>Price</th>
                                <th>Drug Category</th>
                                <th>Drug Type</th>
                                <th>Measurement</th>
                                <th>Stock Quantity</th>
                                <th>Expiry Date</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($sn =1)
                            @foreach(\App\Inventory::orderBy('id','desc')->where('quantity','>',0)->where('expiry_date','>',date('Y-m-d'))->get() as $value)
                                <tr>
                                    <td>{{$sn++}}</td>
                                    <td><input type="checkbox" name="inventory[]" value="{{$value->id}}" id=""></td>
                                    <td><img src="{{image_url($value->product->image)}}" class="img-thumbnail" style="width: 50px; height: 50px;" alt=""></td>
                                    <td>{{$value->product->name}}</td>
                                    <td><input type="number" value="1" max="{{ $value->quantity }}}" class="form-control" name="quantity[]" id=""></td>
                                    {{--<td><input type="text" class="form-control" name="drug_usage[]" placeholder="Drug Usage" id=""></td>--}}
                                    <td>{{ number_format($value->product->price,2) }}</td>
                                    <td>{{category($value->product->category_id,'name')}}</td>
                                    <td>{{drug_type($value->product->drug_type_id,'name')}}</td>
                                    <td>{{$value->product->measurement}}</td>
                                    <td>{{$value->quantity}}</td>
                                    <td>{{$value->expiry_date}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Checkout" name="" id="">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection