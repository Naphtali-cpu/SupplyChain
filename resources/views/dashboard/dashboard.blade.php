@extends('layouts.app', ['pageSlug' => 'dashboard', 'page' => 'Dashboard', 'section' => ''])

@section('content')

    <style>
        #newshead {
            margin-left: 30px;
            size: 20px;
            /* color: blue; */
        }
        .card {
            height: 150px;
            margin: 20px;
            margin-bottom: 20px;
            transition: .4s ease;
            box-shadow: 0 0 0 1px rgb(0 0 0 / 5%), 0 7px 25px 0 rgb(0 0 0 / 3%), 0 4px 12px 0 rgb(0 0 0 / 3%);
        }

        .card:hover {
            margin: 20px;
            margin-bottom: 20px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        h5 {
            margin-left: 20px
        }

        .userheader {
            margin-top: 20px;
            margin-left: 20px;
        }

        .fakeimg {
            margin: 20px;
        }

        .newstext {
            margin: 20px;
        }

        .dateNews {
            margin-top: 20px;
        }
        .tile-title {
            color: rgba(0,0,0,0.85);
        }

        @media only screen and (max-width: 658px) {
            .app-title {
                margin-top: 10px;
            }
        }

        @media only screen and (max-width: 420px) {
            .app-title {
                margin-top: 30px;
            }
        }


        .project-content {
            margin-left: 36px;
            position: relative;
            /*margin-bottom: 50px;*/
        }
    </style>

    <main class="app-content tinted-image">
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-4">

                        <a class="card card-body" href="{{ route('supplier.index') }}">
                            <h3 class="tile-title project-content">Suppliers</h3>
{{--                            <h1 class="tile-title font-weight-bold project-content text-faded" style="size: 40px">{{$confirmedreqbookingcount}}</h1>--}}
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="card card-body" href="{{ route('merchant.index') }}">
                            <h3 class="tile-title text-blue project-content">Merchants</h3>
{{--                            <h1 class="tile-title font-weight-bold project-content text-faded">{{$confirmedbookingcount}}</h1>--}}
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="card card-body" href="{{ route('purchase.index') }}">
                            <h3 class="tile-title text-blue project-content">Purchase Orders</h3>
{{--                            <h1 class="tile-title font-weight-bold project-content text-faded">{{$receivevehiclecount}}</h1>--}}
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a class="card card-body" href="{{ route('requested.index') }}">
                            <h3 class="tile-title text-blue project-content">Requested Orders</h3>
                            {{--                            <h1 class="tile-title font-weight-bold project-content text-faded">{{$receivevehiclecount}}</h1>--}}
                        </a>
                    </div>

                </div>
            </div>
        </div>


    </main>

@endsection

