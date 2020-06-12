
@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Credit Card Payment Form Template | PrepBootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">


    <!-- Credit Card Payment Form - START -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-md-4 justify-content-center col-md-5">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-center">
                            <h3 class="text-center">Payment Details</h3>
                            <img class="img-responsive cc-img" src="{{url('/images/lancers_logo.png')}}" width="240px">
                        </div>
                    </div>
                    <div class="card-body justify-content-center">
                        <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{{url('/payment')}}">
                            {{ csrf_field() }}
                            <div class="row ml-2">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>CARD NUMBER</label>
                                        <div class="input-group">
                                            <input type="tel" class="form-control" placeholder="Valid Card Number" /><br>
                                            <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                        <input type="tel" class="form-control" placeholder="MM / YY" />
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label>CV CODE</label>
                                        <input type="tel" class="form-control" placeholder="CVC" />
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-2">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>CARD OWNER</label>
                                        <input type="text" class="form-control" placeholder="Card Owner Names" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <div class="col-xs-12">
                                <button class='form-control btn btn-success submit-button' type='submit'>Process payment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Credit Card Payment Form - END -->

</div>

</body>
</html>


@endsection

