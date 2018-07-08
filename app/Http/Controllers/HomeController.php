<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use App\Model\Supply;
use App\User;
use Auth;
use Charts;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data1 = Supply::select(DB::raw('date(supplies.created_at) as date'), DB::raw('SUM(supplies.order_quantity) as aggregates'))->groupBy(DB::raw('date(supplies.created_at)'))->get();
      $supply = Charts::create('bar', 'highcharts')
            ->title('Supply Statistics')
            ->elementLabel('Total Supply')
            //->dimensions(550, 400)
            ->responsive(true)
            ->labels($data1->pluck('date'))
            ->values($data1->pluck('aggregates'));

      $data2 = Product::select(DB::raw('date(products.created_at) as date'), DB::raw('SUM(products.quantity) as amount'))->groupBy(DB::raw('date(products.created_at)'))->get();
      //dd($data);
      $product = Charts::create('line', 'highcharts')
               ->title('Product Statistics')
               ->elementLabel('Total Product')
               // ->dimensions(550, 400)
               ->responsive(true)
               ->labels($data2->pluck('date'))
               ->values($data2->pluck('amount'));

          return view('dashboard', compact('supply', 'product'));
    }
}
