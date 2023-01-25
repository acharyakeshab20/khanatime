@extends('layouts.cms')

@section('navbar')
    @include('cms.include.navbar')
@endsection

@section('store-form')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 loginforms-addproduct">
            <h3 class="text-center mt-3">Edit Product</h3>
            <form action="{{ route('cms.product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="sku">sku</label>
                        <input type="text" name="sku" id="sku" placeholder="sku" readonly class="form-control" autocomplete="off" value="{{ old('sku',$product->sku) }}" >
                    </div>
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Luffy" class="form-control" value="{{ old('name',$product->name) }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class=form-control>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id',$product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand_id">Brand</label>
                        <select name="brand_id" id="brand_id" class="form-control">
                            @foreach($brand as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id',$product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" placeholder="Rs ........ only" class="form-control" value="{{ old('price',$product->price) }}"  step="0.01" min="1">
                    </div>
                    <div class="col-md-6">
                        <label for="discount_price">Discount Price</label>
                        <input type="number" name="discount_price" id="discount_price" placeholder="Rs ......... Only" class="form-control" value="{{ old('discount_price',$product->discount_price) }}" step="0.01">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="image">Image</label>
                        <input type="file" name="image[]" id="image" placeholder="Tmro photo" class="form-control" value="{{ old('image') }}" accept="image/*" multiple >
                    </div>
                    <div class="col-md-6">
                        <label for="featured_product">Featured Product</label>
                        <select name="featured_product" id="featured_product" class="form-control">
                            <option value="Yes" {{ old('featured_product',$product->featured_product) == 'Yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No"{{ old('featured_product',$product->featured_product) =='No' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3" id="img-preview">

                </div>
                <div class="row mt-3 mb-3">
                    <h2 class="text-center text-muted">Selected Images</h2>
                    @foreach($product->image as $images)
                        <div class="col-md-4">
                            <img src="{{ url('public/images/cms/'.$images) }}" alt="product's images" title="images" class="img-fluid img-thumbnail img-container">
                            <!-- Modal -->
                        </div>
                    @endforeach
                </div>
                {{--                @dump($categories,$brand)--}}
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control trumbowyg">
                            {{ old('description',$product->description) }}
                        </textarea>
                    </div>
                    {{--                    <div class="col-md-6">--}}
                    {{--                        <label for="featured_product">Featured Product</label>--}}
                    {{--                        <select name="featured_product" id="featured_product" class="form-control">--}}
                    {{--                            <option value="Yes">Yes</option>--}}
                    {{--                            <option value="No">No</option>--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}
                </div>
                <div class="row mt-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-center">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Active" {{ old('status',$product->status) == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('status',$product->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn button">Edit Product</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection

