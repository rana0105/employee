@extends('backend.layouts.dashboard')
{!! Charts::assets() !!}
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                </div>
                <h4 class="mb-0">
                    <span class="count">{{ App\Model\Employee::where('status', 0)->count() }}</span>
                </h4>
                <p class="text-light">Total Employee</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70"/>
                    <canvas id="widgetChart1"></canvas>
                </div>

            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                </div>
                <h4 class="mb-0">
                    <span class="count">{{ App\Model\Product::count() }}</span>
                </h4>
                <p class="text-light">Total Product</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70"/>
                    <canvas id="widgetChart2"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                </div>
                <h4 class="mb-0">
                    <span class="count">{{ App\Model\Salary::count() }}</span>
                </h4>
                <p class="text-light">Salary Paid</p>

            </div>

                <div class="chart-wrapper px-0" style="height:70px;" height="70"/>
                    <canvas id="widgetChart3"></canvas>
                </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                </div>
                <h4 class="mb-0">
                    <span class="count">{{ App\Model\Leave::count() }}</span>
                </h4>
                <p class="text-light">Total Leave</p>

                <div class="chart-wrapper px-3" style="height:70px;" height="70"/>
                    <canvas id="widgetChart4"></canvas>
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <center>
                    {!! $supply->render() !!}
                </center>
            </div>
        </div>
    </div><!-- /# column -->

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <center>
                    {!! $product->render() !!}
                </center>
            </div>
        </div>
    </div><!-- /# column -->

</div>
@endsection