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
    }


    public function addDelivery($id)
    {
        $supply = Supply::with('quantity')->find($id);
        return view('backend.supply.delivery', compact('supply'));
    }

    public function getRemark($id)
    {
        $supply = Supply::find($id);
        return view('backend.supply.getRemark', compact('supply'));
    }

    public function postRemark(Request $request, $id)
    {
        $supply = Supply::find($id);
        $supply->update(['remark' => $request->remark]);
        return redirect()->route('supply.index')->with('success', 'Remark have been save!');
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
            $chekcQ->where('supply_id', $request->supply_id)->where('size_id', $request->size_id)->update(['last_quantity'=> $chekcQ->last_quantity - $request->supply_quantity]);
            return redirect()->route('supply.index')->with('success', 'Supply information data have been save!');
        }else{
            SupplyDate::create($request->all());
            $chekcQ->where('supply_id', $request->supply_id)->where('size_id', $request->size_id)->update([
                'last_quantity'=> $chekcQ->last_quantity - $request->supply_quantity,
                'delivery_stock'=> $request->supply_quantity - $chekcQ->last_quantity
            ]);
            return redirect()->route('supply.index')->with('warning', 'This product amount delivered than order quantity!');
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
        $supply = Supply::find($id);
        $sizeQtn = SizeQuantity::where('supply_id', $supply->id)->get();
        $sizeQtnpro = SizeQuantity::where('supply_id', $supply->id)->first();
        $products = Product::all();
        $sizes = Size::all();

        return view('backend.supply.edit', compact('supply', 'sizeQtn', 'sizeQtnpro', 'products', 'sizes'));
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
        //dd($request->all());
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

        $supply = Supply::find($id);

        $supply->update($request->except(['supply_date', 'size', 'order_quantity']));

        $quantity = $request->order_quantity;
        $sizes = $request->size;

        if($supply){
            $sizeQuantity = SizeQuantity::where('supply_id', $id)->get();

            foreach ($sizeQuantity as $keys => $value) {
                if (in_array($value->id, $request->size_qtn_id) ) {
                    if(isset($sizes[$keys])){
                        $value->supply_id = $supply->id;
                        $value->product_id = $request->product_id;
                        $value->size_id = $sizes[$keys];
                        $value->size_quantity = $quantity[$keys];
                        $value->last_quantity = $quantity[$keys];
                        $value->save();
                    }
                    
                }else{
                    $value->delete();
                    if (($keyValId = array_search($value->id, $request->size_qtn_id)) !== false) {
                        unset($request->size_qtn_id[$keyValId]);
                    }
                }
            }
        }
        
        if($request->has('size_new') && $request->has('order_quantity_new')){
            $this->validate($request, [
                'size_new' => 'required',
                'order_quantity_new' => 'required'
            ]);

            $quantity_new = $request->order_quantity_new;

            if($supply){
                foreach ($request->size_new as $key => $size) {
                    $quantitySize = new SizeQuantity();
                    $quantitySize->supply_id = $supply->id;
                    $quantitySize->product_id = $request->product_id;
                    $quantitySize->size_id = $size;
                    $quantitySize->size_quantity = $quantity_new[$key];
                    $quantitySize->last_quantity = $quantity_new[$key];
                    $quantitySize->save();
                }
            }
        }

        return redirect()->route('supply.index')->with('success', 'Data have been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supply = Supply::find($id);
        SizeQuantity::where('supply_id', $id)->delete();
        SupplyDate::where('supply_id', $id)->delete();
        $supply->delete();
        return redirect()->route('supply.index')->with('danger', 'Data have been deleted!');
    }

    public function remarkSupply($id, $inputData){
        $supply = Supply::find($id);
        $supply->update(['remark' => $inputData]);
    }
}
