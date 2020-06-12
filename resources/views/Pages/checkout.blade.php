@extends('layouts.app')
@section('content')

<div class="container">


    <!-- Credit Card Payment Form - START -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-md-4 justify-content-center">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row justify-content-center">
                            <h3 class="text-center">Payment Details</h3>
                            <img class="img-responsive cc-img" src="{{url('/images/lancers_logo.png')}}" width="150px">
                        </div>
                    </div>
                    <div class="card-body justify-content-center">
                        <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{{url('/payment')}}">
                            {{ csrf_field() }}
                            <input name="project_id" type="text" hidden="hidden" value="{{$project->id}}">
                            <div class="row">
                                <div class="col-xs-12 col-12">
                                    <div class="form-group">
                                        <label>CARD NUMBER</label>
                                        <div class="input-group">
                                            <input name="card_number" type="tel" class="form-control" placeholder="Valid Card Number" required/><br>
                                            {{--<span class="input-group-addon"><span class="fa fa-credit-card"></span></span>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                        <input type="tel" class="form-control" placeholder="MM / YY" required/>
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label>CV CODE</label>
                                        <input type="tel" class="form-control" placeholder="CVC" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-12">
                                    <div class="form-group">
                                        <label>CARD OWNER</label>
                                        <input type="text" class="form-control" placeholder="Card Owner Names" required/>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="row justify-content-center">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-success bg-lancer text-white btn-lg btn-block">Process payment</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Credit Card Payment Form - END -->

</div>

@endsection

