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


            <form action="{{url('admin/update_inventory')}}" enctype="multipart/form-data" method="post">
                @csrf

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <select name="product_name" id="" class="form-control">
                                <option value="" disabled selected>Select</option>
                                @foreach(\App\Products::orderBy('name')->get() as $value)
                                    <option value="{{$value->id}}" {{ ($value->id == $inventory->product_id) ? 'selected' : '' }}>{{ ucwords($value->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="number" value="{{$inventory->quantity}}" class="form-control" required placeholder="Quantity" name="quantity" id="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Expiry Date</label>
                            <input type="date" value="{{$inventory->expiry_date}}" class="form-control" name="expiry_date" required id="">
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Nafdac Number</label>
                            <input type="text" value="{{$inventory->nafdac_number}}" class="form-control" required name="nafdac_number" placeholder="Nafdac Number" id="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Manufacturer Date</label>
                            <input type="date" name="manufacturer_date" value="{{$inventory->manufacturer_date}}" class="form-control" required id="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Batch Number</label>
                            <input type="text" class="form-control" value="{{ $inventory->batch_number }}" required name="batch_number" placeholder="Batch Number" id="">
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id" value="{{$inventory->id}}" id="">

                <div class="form-group">
                    <label for="">Remark (optional)</label>
                    <textarea name="remark" class="form-control" style="resize: none" placeholder="Remark">{{$inventory->remark}}</textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update" name="" id="">
                </div>

            </form>

        </div>
    </div>
</div>


@endsection