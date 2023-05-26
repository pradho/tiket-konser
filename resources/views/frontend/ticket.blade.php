<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Detail Tiket Konser</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<section class="container mt-4">
    <h1>Detail Tiket</h1>
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
                <div class="card-header">
                    <h3>{{$data->concert->name}}</h3><br>
                </div>
                <div class="card-body">
                    <div class="p-2">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Nama Pemesan : {{$data->customer->name}}</h4><br>
                                <h4>ID Ticket : {{$data->ticket_code}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
