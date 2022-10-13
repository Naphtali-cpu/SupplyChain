@extends('layouts.app', ['pageSlug' => 'dashboard', 'page' => 'Dashboard', 'section' => ''])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Providers</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ url('/add-supplier-route') }}" class="btn btn-sm btn-primary">Add Supplier</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Address</th>
                            </thead>
                            <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->name }}</td>

                                    <td>
                                        <a href="mailto:{{ $supplier->email }}">{{ $supplier->email }}</a>
                                    </td>
                                    <td>{{ $supplier->phone_number }}</td>

                                    <td>{{ $supplier->address }}</td>

                                    <td class="td-actions text-right">
                                        <a href="{{ route('supplier.edit', $supplier) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Provider">
                                            <i class="tim-icons icon-pencil"></i>
                                            <p>update</p>
                                        </a>
                                        <form action="{{ route('supplier.destroy', $supplier) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Provider" onclick="confirm('Are you sure you want to delete this supplier?') ? this.parentElement.submit() : ''">
{{--                                                <i class="bi bi-trash"></i>--}}
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
