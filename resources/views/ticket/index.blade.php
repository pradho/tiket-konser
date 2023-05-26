@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Daftar Booking Tiket</h5>
                    </div>
                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <hr>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Tiket</th>
                                <th scope="col">Nama Konser</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">Status Tiket</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach($data as $d)
                                <tr>
                                    <th scope="row">{{$no}}</th>
                                    <td>{{$d->ticket_code}}</td>
                                    <td>{{$d->concert->name}}</td>
                                    <td>{{$d->customer->name}}</td>
                                    <td>{{$d->status == 0 ? 'Belum Check In' : 'Sudah Check In'}}</td>
                                    </td>
                                </tr>
                                @php $no++ @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
