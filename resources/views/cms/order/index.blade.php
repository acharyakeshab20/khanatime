@extends('layouts.cms')
@section('navbar')
    @include('cms.include.navbar')
@endsection
@section('store-form')
    <form action="{{ route('cms.order.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-2">
                <label for="sku">Order Number</label>
                <input type="text" name="addMoreInputFields[0][sku]" id="sku" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="name">product SKU</label>
                <select name="addMoreInputFields[0][name]" id="productsku" class="form-control" multiple>
                    @foreach($products as $product)
                        <option value="{{ $product->sku }}">{{ $product->sku }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="name">product Name</label>
                <select name="addMoreInputFields[0][name]" id="productname" class="form-control">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="qty">Qty</label>
                <input type="number" name="addMoreInputFields[0][qty]" id="qty" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="rate">rate</label>
                <input type="number" name="addMoreInputFields[0][rate]" id="rate" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="address">address</label>
                <input type="text" name="addMoreInputFields[0][address]" id="address" class="form-control">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </div>
        </div>
        <div class="row mt-3" id="addOrderColumn">
                
        </div>
        <div class="row mt-3 mb-3">
            <div class="col text-start mt-3">
                <button type="button" name="add" id="addMore" class="btn btn-outline-primary">Add More</button>
            </div>
            <div class="col text-end mt-3">
                <a href="{{ route('cms.order.history') }}" class="btn btn-success">Past Record</a>
            </div>
        </div>
    </form>
@endsection
@section('tables')
    @if($orders->isNotEmpty())
        <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Order Number</th>
                <th> Product Name</th>
                <th>Qty</th>
                <th>Rate</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->sku }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->qty }}</td>
                    <td>{{ $order->rate }}</td>
                    <td>{{ $order->address }}</td>
                    <td>
                        <form action="{{ route('cms.order.destroy',$order->id) }}" method="post">
                            @csrf
                            @method('delete')
                                <button type="submit" class="btn btn-success btn-lg">Trash</button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

        {{ $orders->links() }}
    @else
        <h2 class="text-muted text-center">Add your first data</h2>
    @endif
@endsection
