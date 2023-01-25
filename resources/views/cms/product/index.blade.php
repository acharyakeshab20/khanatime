@extends('layouts.cms')

@section('navbar')
    @include('cms.include.navbar')
@endsection

@section('menu')
    <div class="row menu">
        <div class="col-md-4">
            <h3 class="text-start">Product Details</h3>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col mt-3">
                    <form action="">
                        <input type="search" name="term" id="search" placeholder="Search By name.........." class="form-control" id="term">
                    </form>
                </div>
{{--                <div class="col">--}}
{{--                    <button class="btn button"> Search</button>--}}
{{--                </div>--}}
            </div>

        </div>
        <div class="col-md-4 text-center">
            <a href="{{ route('cms.product.create') }}" class="button text-center">Add Products</a>
        </div>
    </div>
@endsection
@section('table')
    @if($products->isNotEmpty())
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                {{--                    <th>SN</th>--}}
                <th>Sku</th>
                <th>@sortablelink('Name')</th>
                <th>@sortablelink('Category')</th>
                <th>@sortablelink('Brand')</th>
                <th>@sortablelink('Price')</th>
                <th>Discount Price</th>
                <th>Thumbnail</th>
                <th>Status</th>
                <th>Featured Products</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
{{--            @dump($products);--}}
            @foreach($products as $product)
                <tr>
                    {{--                        <td>{{ ++$i }}</td>--}}
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
{{--                    <td>{{ $product->category }}</td>--}}
                    <td>{{ $product->brand->name }}</td>
                    <td>{{ 'Rs'. number_format( $product->price) }}</td>
                    <td>
                        {{ !empty($product->discount_price) ? 'Rs'.number_format($product->discount_price) : 'N\A'}}
                    </td>
{{--                    <td>{{ $product->discription }}</td>--}}
                    <td><img src="{{ url('public/images/cms/'.$product->thumbnails) }}" alt="thumbnail" class=" thumbnails img-container img-thumbnail img-thumbnail"> </td>
                    <td>{{ $product->status }}</td>
                    <td>{{ $product->featured}}</td>
                    <td>{{ $product->created_at->format('Y m d H:i:A') }}</td>
                    <td>{{ $product->updated_at->format('Y m d H:i:A') }}</td>
                    <td>
                        <form action="{{ route('cms.product.destroy',$product->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <!-- Button trigger modal -->
                            <button type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            The Product Will be Deleted
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn button" data-bs-dismiss="modal">Close</button>
                                            {{--                                                <button type="button" class="btn button">Delete</button>--}}
                                            <button type="submit" class="btn button">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('cms.product.edit',$product->id) }}" class="btn button">Edit</a>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--        {{ $products->links() }}--}}
        {!! $products->appends(Request::except('page'))->render() !!}
    @else
        <h3 class="text-center text-muted">
            <p>---------------------------------------------------</p>
            <p class="text-muted text-center">Add your first data</p>
            <p>---------------------------------------------------</p>
        </h3>
    @endif
@endsection



