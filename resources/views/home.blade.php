@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1 col-sm-12 offset-sm-0">

            <table class="table table-hover mt-3" @if (auth()->user()) user_id= {{auth()->user()->id}} @endif  
                id="user_id">
                <thead>
                    <tr>
                        <th scope="col">Apppintment Name</th>
                        <th scope="col">Apppintment Date</th>

                    </tr>
                </thead>
                <tbody id="appointments-list">
                    @foreach ($appointments as $appointment)
                        <tr id="appointment{{ $appointment->id }}">
                            <td>{{ $appointment->appointment_name }}</td>
                            <td >
                                <ul id="appointment_dates{{ $appointment->id }}" class="list-group list-group-flush">
                                    @foreach ($appointment->appointment_dates as $appointment_date)
                                        <li id="appointment_date{{ $appointment_date->id }}"
                                            class="list-group-item d-flex justify-content-between align-items-start">
                                            {{ $appointment_date->appointment_date }}
                                            @if ($appointment_date->user)
                                                <button type="button" disabled class="btn btn-secondary book_appointment">
                                                    Booked!
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-success book_appointment"
                                                    id="{{ $appointment_date->id }}">
                                                    Book
                                                </button>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>

                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('homejs')
    <script src="{{ asset('js/home.js') }}" defer></script>
@endsection
