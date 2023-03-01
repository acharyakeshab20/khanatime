<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['term'] ?? "";
        if ($search != ""){
//            $products=  Products::where('name','=',$search)->paginate(5);
            $products = Products::where('name', 'Like', '%' . request('term') . '%')
                ->orWhere('sku','Like', '%' . request('term') . '%')
                ->paginate(5);
        }else{
            $products = Products::sortable()->paginate(9);
        }

        return view('cms.product.index',compact('search','products'));
    }

    public function all_Product($id=null){

        if ($id){
            if (Products::where('id',$id)->exists()){
                return Products::find($id);
            }else{
                    return response()->json([
                        'Message' => 'Product Id not found'
                    ], 404);
            }
        }else{
                return Products::all();
        }
    }

    public function add_product(Request $request ){
            $product = new Products;
            $product->sku = $request->sku;
            $product->name = $request->name;
            $product->price = $request->price;
            $productsave= $product->Save();
            if ($productsave){
                return response()->json([
                    'Message'=>'Product Save Successfully',
                ], 201);
            }else{
                return response()->json([
                    'Message'=>'Product fail to Save Successfully',
                ], 404);
            }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=$this->validate($request,[
            'name'=>'string|required',
            'sku'=>'numeric|required',
            'price' =>'required|numeric',
            'discount_price'=>'numeric|nullable',
            'image.*' => 'required|image|max:5120',
            'description'=>'required|string',
            'category_id'=>'required|exists:categories,id|nullable',
            'brand_id' => 'required|exists:brands,id',
            'status'=>'required|in:Active,Inactive',
        ]);

        $filelist=[];
        $files= $request->files->all('image');
        foreach ($files as $file){
                $img = Image::make($file);
                $filename= 'Img-'.date('YmdHis')."-".rand(0,9999999).".jpg";
                $img->resize(1280,720, function ($constraint){
                        $constraint->aspectRatio();
                        $constraint->upsize();
                })->save(public_path("images/cms/{$filename}"));

                $filelist[]=$filename;
        }

        $validation['image'] = $filelist;

        Products::create($validation);
        flash('Products uploaded successfully');
        return redirect()->route('cms.product.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Products::findOrFail($id);
        return view('cms.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Products::findOrFail($id);
            $validation=$this->validate($request,[
                'name'=>'required|string',
                'price'=>'required|numeric',
                'discount_price'=>'nullable|numeric',
                'image.*'=>'nullable|image|max:5240',
                'category_id'=>'required|exists:categories,id',
                'brand_id'=> 'required|exists:brands,id',
                'description'=>'required|string',
                'status'=>'required|in:Active,Inactive',
            ]);

            if ($request->hasFile('image')) {
                $filelist = $product->image;
                   //    dd($filelist);
                $files = $request->files->all('image');
                foreach ($files as $file) {
                    $img = Image::make($file);
                    $filename = 'Img-' . date('YmdHis') . "-" . rand(0, 9999999) . ".jpg";
                    $img->resize(1280, 720, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save(public_path("images/cms/{$filename}"));

                    $filelist[] = $filename;
                }
                    
                $validation['image'] = $filelist;
            }
//                Products::create($validation);
                $product->update($validation);
                flash('Products updated successfully');
                return redirect()->route('cms.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Products::findOrFail($id);
//        dd($product);
        foreach ($product->image as $images){
            @unlink('public/images/cms/'.$images);
        }
        $product->delete();
        flash('product deleted successfully');

        return redirect()->route('cms.product.index');
    }

//    public function search(Request $request){
//        $search=Products::where('name','like','%'.$request->term.'%')
//            ->where('status','Active')
//            ->latest()
//            ->paginate(6);
//        return view('cms.product.search',compact('search'));
//    }


}
