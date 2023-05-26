@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Daftar Konser</h5>
                    </div>
                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <a href="{{route('admin.concert.create')}}" class="btn btn-primary btn-sm">Tambah Konser</a>
                        <hr>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Konser</th>
                                <th scope="col">Venue</th>
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Harga Tiket</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach($data as $d)
                                <tr>
                                    <th scope="row">{{$no}}</th>
                                    <td>{{$d->name}}</td>
                                    <td>{{$d->venue}}</td>
                                    <td>{{$d->start_time}}</td>
                                    <td>{{$d->price}}</td>
                                    <td><a class="btn btn-close btn-sm" href="{{route('admin.concert.delete',['id'=>$d->id])}}" onclick="return confirm('Hapus Data ?')"></a>
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
