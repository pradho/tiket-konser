<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Booking Tiket Konser</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<section class="container mt-4">
    <h1>Pembayaran</h1>
    <div class="row">
        <div class="col-lg-12 mt-4">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="card">
                <form action="{{route('front.payment.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3>{{$data->concert->name}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="p-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id_customer" value="{{$data->customer->id}}">
                                    <input type="hidden" name="id_concert" value="{{$data->concert->id}}">
                                    <a>Nama Pemesan : {{$data->customer->name}}</a><br>
                                    <a>Jumlah Dibayar : Rp. {{number_format($data->concert->price,0,',','.')}}</a><br>
                                    <a>Metode Pembayaran : Virtual Account BCA</a><br>
                                    <a>NO VA : 8192834924892</a><hr>
                                </div>
                                <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
