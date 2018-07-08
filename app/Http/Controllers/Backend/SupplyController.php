<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Supply;
use App\Model\Product;
use App\Model\SupplyDate;
use App\Model\Size;
use App\Model\SizeQuantity;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplies = Supply::with('supplydate','quantity')->get();
        //dd($supplies);
        $products = Product::all();
        $sizes = Size::all();
        return view('backend.supply.index', compact('supplies', 'products', 'sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'product_id' => 'required',
            'buyer_name' => 'required',
            'reference_no' => 'required',
            'order_no' => 'required',
            'color' => 'required',
            'size' => 'required',
            'order_quantity' => 'required',
            'from_date' => 'required',
            'to_date' => 'required'
        ]);
        //dd($request->all());
        $quantity = $request->order_quantity;
        $supply = Supply::create($request->except(['supply_date', 'size', 'order_quantity']));
        if($supply){
            foreach ($request->size as $key => $size) {
                    $sizeQuantity = new SizeQuantity();
                    $sizeQuantity->supply_id = $supply->id;
                    $sizeQuantity->product_id = $request->product_id;
                    $sizeQuantity->size_id = $size;
                    $sizeQuantity->size_quantity = $quantity[$key];
                    $sizeQuantity->last_quantity = $quantity[$key];
                    $sizeQuantity->save();
            }
        }
        return redirect()->route('supply.index')->with('success', 'Data have been save!');
        // $product = Product::find($request->product_id);
        // if($product->quantity > $request->order_quantity) {
        //     $supply = Supply::create($request->except(['supply_date']));
        //     if($supply){
        //         $product->update(['quantity' => $product->quantity - $request->order_quantity ]);
        //     }
        //         return redirect()->route('supply.index')->with('success', 'Data have been save!');
        // }else{
        //     return redirect()->route('supply.index')->with('warning', 'This product amount not available at this moment!');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function supplyDate(Request $request)
    {
        $this->validate($request, [
            'supply_id' => 'required',
            'supply_date' => 'required',
            'size_id' => 'required',
            'supply_quantity' => 'required',
            'delivery_no' => 'required'
        ]);

        $chekcQ = SizeQuantity::where('supply_id', $request->supply_id)->where('size_id', $request->size_id)->first();

        if($chekcQ->last_quantity >= $request->supply_quantity) {
            SupplyDate::create($request->all());
            $chekcQ->where('size_id', $request->size_id)->update(['last_quantity'=> $request->supply_quantity]);
            return redirect()->route('supply.index')->with('success', 'Supply information data have been save!');
        }else{
            return redirect()->route('supply.index')->with('warning', 'This product amount not available for delivered!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
