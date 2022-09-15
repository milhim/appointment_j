@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 ">
            <div class="p-2 flex-shrink-0 bd-highlight mt-3">
                <button type="button" class="btn btn-primary" id="btn-add" data-bs-toggle="modal" data-bs-target="#formModal">
                    New Appointment
                </button>
            </div>
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">Apppintment Name</th>
                        <th scope="col">Apppintment Date</th>
                        <th scope="col">Option</th>

                    </tr>
                </thead>
                <tbody id="appointments-list">
                    @foreach ($appointments as $appointment)
                        <tr id="appointment{{ $appointment->id }}">
                            <td>{{ $appointment->appointment_name }}</td>
                            <td>
                                <ul id="appointment_dates{{ $appointment->id }}" class="list-group list-group-flush">
                                    @foreach ($appointment->appointment_dates as $appointment_date)
                                        <li id="appointment_date{{$appointment_date->id}}" class="list-group-item d-flex justify-content-between align-items-start">
                                            {{ $appointment_date->appointment_date }}
                                            @if ($appointment_date->user)
                                                <span class="badge bg-secondary rounded-pill">Taken</span>
                                            @else
                                                <span
                                                    class="badge bg-success rounded-pill">{{ $appointment_date->status }}</span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <button type="button" class="btn btn-dark add_date" id="{{$appointment->id}} " add_new_date={{$appointment->id}}  data-bs-toggle="modal"
                                    data-bs-target="#add_new_date_model">
                                    Add Date
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <!-- add new appointment model -->
            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add new appointment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="myForm" name="myForm" class="form-horizontal" novalidate="">


                                <div class="form-group">
                                    <label>Appointment Name</label>
                                    <input type="text" class="form-control" id="appointment_name" name="appointment_name"
                                        placeholder="Enter Appointment" value="">
                                </div>


                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save
                                changes
                            </button>

                            <input type="hidden" id="appointment_id" name="appointment_id" value="0">
                        </div>
                    </div>
                </div>

            </div>

            <!-- add new date model -->


            <div class="modal fade" id="add_new_date_model" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="new_date_form" name="new_date_form" class="form-horizontal" novalidate="">

                                <div class="form-group">
                                    <label>Appointment Date</label>
                                    <input type="datetime-local" class="form-control" id="appointment_date"
                                        name="appointment_date" placeholder="Enter Appointment Date" value="">
                                </div>

                            </form>

                        </div>
                        <div class="modal-footer">
                             <button type="button" class="btn btn-primary" id="save_date" value="add">Save
                                changes
                            </button>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('dashboard')
    <script src="{{ asset('js/admin/dashboard.js') }}" defer></script>
@endsection
