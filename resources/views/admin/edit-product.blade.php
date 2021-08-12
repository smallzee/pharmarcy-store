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

                <form action="{{url('admin/update_drug_product')}}" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" value="{{$product->name}}" class="form-control" name="name" required placeholder="Name" id="">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Drug Category</label>
                                <select name="drug_category" required id="" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    @foreach(\App\Category::orderBy('name')->get() as $value)
                                        <option value="{{$value->id}}" {{ ($value->id == $product->category_id) ? 'selected' : '' }}>{{ucwords($value->name)}}</option>
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
                                        <option value="{{$value->id}}" {{ ($value->id == $product->drug_type_id) ? 'selected' : '' }}>{{ucwords($value->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" value="{{$product->price}}" name="price" placeholder="Price" class="form-control" id="">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Measurement</label>
                                <input type="text" class="form-control" required placeholder="Measurement" name="measurement" value="{{$product->measurement}}" id="">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="drug_description" placeholder="Description" id="" class="form-control" style="resize: none">{{$product->description}}</textarea>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" value="{{$product->id}}" name="id" id="">

                    {{--<div class="form-group">--}}
                        {{--<label for="">Product Image</label>--}}
                        {{--<input type="file" name="image" required accept="image/*" id="">--}}
                        {{--<span>Please Note : Maximum filesize upload is 1MB</span>--}}
                    {{--</div>--}}


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit" name="" id="">
                    </div>

                </form>

            </div>
        </div>
    </div>


@endsection
