@extends('layouts.app', ['pageSlug' => 'dashboard', 'page' => 'Dashboard', 'section' => ''])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Purchases</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ url('/add-purchase-route') }}" class="btn btn-sm btn-primary">Add Purchase</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
{{--                    @include('alerts.success')--}}

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Supplier</th>
                            </thead>
                            <tbody>
                            @foreach ($purchases as $purchase)
                                <tr>
                                    <td>{{ $purchase->name }}</td>

                                    <td>{{ $purchase->description }}</td>

                                    <td>{{ $purchase->quantity }}</td>

                                    <td>{{ $purchase->supplier }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
