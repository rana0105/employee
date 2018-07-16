<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\DeliveryDate;
use App\Model\Product;
use App\Model\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = ProductCategory::all();
        return view('backend.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_category_id' => 'required',
            'name' => 'required',
            'quantity' => 'required'
        ]);

        Product::create($request->all());
        return redirect()->route('stores.index')->with('success', 'Product Information created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = ProductCategory::all();
        $cate = array();
        foreach ($category as  $cat) {
            $cate[$cat->id] = $cat->name;
        }
        return view('backend.product.edit', compact('product', 'cate'));
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
        $this->validate($request, [
            'product_category_id' => '',
            'name' => '',
            'quantity' => ''
        ]);
        $product = Product::find($id);
        $product->update($request->all());
        return redirect()->route('stores.index')->with('success', 'Product Information Updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('stores.index')->with('success', 'Product Information Deleted successfully !');
    }

    public function deliveryDate(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'delivery_date' => 'required',
            'delivery_quantity' => 'required'
        ]);
        //dd($request->all());
        $chekcQ = Product::where('id', $request->product_id)->first();

        if($chekcQ->stock >= $request->delivery_quantity) {
            DeliveryDate::create($request->all());
            $lastStock = $chekcQ->stock - $request->delivery_quantity;
            $chekcQ->where('id', $request->product_id)->update(['stock'=> $lastStock]);
            return redirect()->route('stores.index')->with('success', 'Product Stock information data have been save!');
        }else{
            return redirect()->route('stores.index')->with('danger', 'This product amount not available for delivered!');
        }
    }
}
