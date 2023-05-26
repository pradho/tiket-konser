@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Check In Tiket</h5>
                    </div>
                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            <form action="{{route('admin.ticket.checkin.store')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">ID Tiket</label>
                                    <input type="text" class="form-control" name="ticket_code">
                                </div>
                                <button type="submit" class="btn btn-primary">Cek Tiket</button>
                            </form>
{{--                            @if(request()->input('ticket_code'))--}}
{{--                                <hr>--}}
{{--                                <p>Nama : {{$ticket->customer->name}}</p>--}}
{{--                                <p>Konser : {{$ticket->concert->name}}</p>--}}
{{--                                <p>Venue : {{$ticket->concert->venue}}</p>--}}
{{--                                <p>Waktu : {{\Carbon\Carbon::parse($ticket->start_time)->format('l, d M Y')}}</p>--}}
{{--                            @endif--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
