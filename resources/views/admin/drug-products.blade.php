@extends('admin.layout')

@section('content')

    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    <h4 id="myModalLabel" class="modal-title">Add New Drug Product</h4>
                </div>
                <div class="modal-body">
                    <form action="{{url('admin/create_new_drug_product')}}" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" required placeholder="Name" id="">
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Drug Category</label>
                                    <select name="drug_category" required id="" class="form-control">
                                        <option value="" selected disabled>Select</option>
                                        @foreach(\App\Category::orderBy('name')->get() as $value)
                                            <option value="{{$value->id}}">{{ucwords($value->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Drug Type</label>
                                    <select name="drug_type" required id="" class="form-control">
                                        <option value="" selected disabled>Select</option>
                                        @foreach(\App\Drug_type::orderBy('name')->get() as $value)
                                            <option value="{{$value->id}}">{{ucwords($value->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="number" name="price" placeholder="Price" class="form-control" id="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Measurement</label>
                                    <input type="text" class="form-control" required placeholder="Measurement" name="measurement" id="">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="drug_description" placeholder="Description" id="" class="form-control" style="resize: none"></textarea>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <label for="">Product Image</label>
                            <input type="file" name="image" required accept="image/*" id="">
                            <span>Please Note : Maximum filesize upload is 1MB</span>
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

                <a href="#" class="btn btn-primary mb-20" data-target="#myModal" data-toggle="modal">Add New Drug Products</a>

                <div class="table-responsive">
                    <table class="table table-bordered" id="example1">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Image</th>
                            <th>Drug Category</th>
                            <th>Drug Type</th>
                            <th>Drug Name</th>
                            <th>Price</th>
                            <th>Measurement</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Image</th>
                            <th>Drug Category</th>
                            <th>Drug Type</th>
                            <th>Drug Name</th>
                            <th>Price</th>
                            <th>Measurement</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @php($sn =1)
                        @foreach(\App\Products::orderBy('name')->get() as $value)
                            <tr>
                                <td>{{$sn++}}</td>
                                <td><img src="{{image_url($value->image)}}" class="img-thumbnail" style="width: 50px; height: 50px;" alt=""></td>
                                <td>{{$value->category->name}}</td>
                                <td>{{ $value->drug_type->name }}</td>
                                <td>{{$value->name}}</td>
                                <td>{{ $value->price }}</td>
                                <td>{{$value->measurement}}</td>
                                <td>{{$value->description}}</td>
                                <td><a href="{{url('admin/edit-product/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection