@extends('layouts.guest.app')

@section('title', 'Admin Beaches Index')

@section('main')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-12">
            <h1 class="m-3">
                Beach List
            </h1>
        </div>
    </div>
    <div class="row">
        @if (session('deleted'))
            <div class="col-12">
                <div class="alert alert-warning">
                    {{ session('deleted') }}  has been deleted succesfully
                </div>
            </div>
        @elseif ( session('created'))
            <div class="col-12">
                <div class="alert alert-primary">
                    {{ session('created') }} has been created succesfully
                </div>
            </div>
        @endif
        <div class="col-12">
            <table class="table table-striped table-hover text-center table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Location</th>
                        <th scope="col">Umbrellas</th>
                        <th scope="col">Sunbeds</th>
                        <th scope="col">Price per day</th>
                        <th scope="col">Opening Date</th>
                        <th scope="col">Closing Date</th>
                        <th scope="col">Beachvolley Court</th>
                        <th class="col ">Football Court</th>
                        <th class="col-2 ">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beachList as $beach)
                        <tr>
                            <th>
                                {{ $beach->name  }}
                            </th>
                            <td>
                                {{ $beach->location  }}
                            </td>
                            <td>
                                {{ $beach-> umbrella_number}}
                            </td>
                            <td>
                                {{ $beach->sunbed_number}}
                            </td>
                            <td>
                                {{ number_format($beach->umbrella_price_per_day, 2, '.', ''); }}€
                            </td>
                            <td>
                                {{ $beach->opening_date }}
                            </td>
                            <td>
                                {{ $beach->closing_date}}
                            </td>
                            <td>
                                {{ $beach->beachvolley_court }}
                            </td>
                            <td>
                                {{ $beach->football_court }}
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary me-2"
                                    href="{{ route('guest.show', $beach->id) }}">
                                    View
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {!! $beachList->links() !!}

</div>

@endsection
