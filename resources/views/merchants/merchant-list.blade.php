@extends('layouts.app', ['pageSlug' => 'dashboard', 'page' => 'Dashboard', 'section' => ''])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Merchants</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ url('/add-merchant-route') }}" class="btn btn-sm btn-primary">Add Merchant</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
{{--                    @include('alerts.success')--}}

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Address</th>
                            </thead>
                            <tbody>
                            @foreach ($merchants as $merchant)
                                <tr>
                                    <td>{{ $merchant->name }}</td>

                                    <td>
                                        <a href="mailto:{{ $merchant->email }}">{{ $merchant->email }}</a>
                                    </td>
                                    <td>{{ $merchant->phone_number }}</td>

                                    <td>{{ $merchant->address }}</td>

                                    <td class="text-right">
                                        <a href="{{ route('merchant.edit', $merchant) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Provider">
{{--                                            <i class="tim-icons icon-pencil"></i>--}}
                                            <p>update</p>
                                        </a>
                                        <form action="{{ route('merchant.destroy', $merchant) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Provider" onclick="confirm('Are you sure you want to delete this merchant?') ? this.parentElement.submit() : ''">
{{--                                                <i class="tim-icons icon-simple-remove"></i>--}}
                                                <p>delete</p>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
{{--                <div class="card-footer py-4">--}}
{{--                    <nav class="d-flex justify-content-end" aria-label="...">--}}
{{--                        {{ $providers->links() }}--}}
{{--                    </nav>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
