@extends('layouts.admin.app')

@section('title', 'Admin Beaches Index')

@section('main')
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-12">
                <h1 class="m-3">
                    Admin Beach Index Panel
                </h1>
            </div>
        </div>
        <div class="row">
            @if (session('deleted'))
                <div class="col-12">
                    <div class="alert alert-warning">
                        {{ session('deleted') }} has been deleted succesfully
                    </div>
                </div>
            @elseif (session('created'))
                <div class="col-12">
                    <div class="alert alert-primary">
                        {{ session('created') }} has been created succesfully
                    </div>
                </div>
            @elseif (session('restored'))
                <div class="col-12">
                    <div class="alert alert-success">
                        {{ session('restored') }} has been restored succesfully
                    </div>
                </div>
            @elseif (session('hardDelete'))
                <div class="col-12">
                    <div class="alert alert-danger">
                        {{ session('hardDelete') }} has been hard deleted succesfully
                    </div>
                </div>
            @endif
            <div class="col-12">
                <table class="table table-striped table-dark table-hover text-center table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">name</th>
                            <th scope="col">location</th>
                            <th scope="col">umbrella_number</th>
                            <th scope="col">sunbed_number</th>
                            <th scope="col">umbrella_price_per_day</th>
                            <th scope="col">opening_date</th>
                            <th scope="col">closing_date</th>
                            <th scope="col">beachvolley_court</th>
                            <th class="col ">football_court</th>
                            <th class="col-2 ">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beachList as $beach)
                            <tr>
                                <th scope="row">
                                    {{ $beach->id }}
                                </th>
                                <td>
                                    {{ $beach->name }}
                                </td>
                                <td>
                                    {{ $beach->location }}
                                </td>
                                <td>
                                    {{ $beach->umbrella_number }}
                                </td>
                                <td>
                                    {{ $beach->sunbed_number }}
                                </td>
                                <td>
                                    {{ number_format($beach->umbrella_price_per_day, 2, '.', '') }}€
                                </td>
                                <td>
                                    {{ $beach->opening_date }}
                                </td>
                                <td>
                                    {{ $beach->closing_date }}
                                </td>
                                <td>
                                    {{ $beach->beachvolley_court }}
                                </td>
                                <td>
                                    {{ $beach->football_court }}
                                </td>

                                <td>

                                    <a class="btn btn-sm btn-primary me-2"
                                        href="{{ route('admin.beaches.show', $beach->id) }}">
                                        View
                                    </a>
                                    <a class="btn btn-sm btn-warning me-2"
                                        href="{{ route('admin.beaches.edit', $beach->id) }}">Edit
                                    </a>
                                    <form action="{{ route('admin.beaches.destroy', $beach->id) }}"
                                        class="d-inline form-deleter" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger me-2">
                                            Delete
                                        </button>
                                    </form>

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
@section('custom-script-tail')
    <script>
        const deleteFormElements = document.querySelectorAll('form.form-deleter');
        deleteFormElements.forEach(formElement => {
            formElement.addEventListener('submit', function(event) {
                event.preventDefault();
                const userConfirm = window.confirm('Are you sure you want to delete this beach?');
                if (userConfirm) {
                    this.submit();
                }
            });
        });
    </script>
@endsection
