@extends('layouts.admin.app')

@section("title", "Show a beach")

@section("main")
    <main>
        <div class="container">
            @if (session('stored'))
                <div class="col-12">
                    <div class="alert alert-success">
                        {{ session('stored') }} has been created
                    </div>
                </div>
            @elseif (session('updated'))
            <div class="col-12">
                <div class="alert alert-success">
                    {{ session('updated') }} has been updated succesfully
                </div>
            </div>
        @endif
            <p>
                Beach Name: {{ $beach->name }}
            </p>
            <p>
                Location: {{ $beach->location }}
            </p>
            <p>
                N# of Umbrellas: {{ $beach->umbrella_number }}
            </p>
            <p>
                N# of Sun beds: {{ $beach->sunbed_number }}
            </p>
            <p>
                Price per day: {{ number_format($beach->umbrella_price_per_day, 2, '.', ''); }}€
            </p>
            <p>
                Opening Date: {{ $beach->opening_date }}
            </p>
            <p>
                Closing Date: {{ $beach->closing_date }}
            </p>
            <p>
                Does this beach have a beachvolley court? {{ $beach->beachvolley_court == false ? "No" : "Yes"}}
            </p>
            <p>
                Does this beach have a football court? {{ $beach->football_court == false ? "No" : "Yes"}}
            </p>
        </div>
    </main>
@endsection
