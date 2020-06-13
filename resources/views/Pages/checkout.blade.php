@extends('layouts.app')
@section('style')
    <style lang="css">
    /* !*   * {
            font-family: 'Helvetica Neue', Helvetica, sans-serif;
            font-size: 19px;
            font-variant: normal;
            padding: 0;
            margin: 0;
        }
        *!*/


        form {
            width: 480px;
            margin: 20px auto;
        }

        label {
            height: 35px;
            position: relative;
            color: #8798AB;
            display: block;
            margin-top: 30px;
            margin-bottom: 20px;
        }

        label > span {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            font-weight: 300;
            line-height: 32px;
            color: #8798AB;
            border-bottom: 1px solid #586A82;
            transition: border-bottom-color 200ms ease-in-out;
            cursor: text;
            /*pointer-events: none;*/
        }

        label > span span {
            position: absolute;
            top: 0;
            left: 0;
            transform-origin: 0% 50%;
            transition: transform 200ms ease-in-out;
            cursor: text;
        }

        label .field.is-focused + span span,
        label .field:not(.is-empty) + span span {
            transform: scale(0.68) translateY(-36px);
            cursor: default;
        }

        label .field.is-focused + span {
            border-bottom-color: #34D08C;
        }

        .field {
            background: transparent;
            font-weight: 300;
            border: 0;
            color: #090909;
            outline: none;
            cursor: text;
            display: block;
            width: 100%;
            line-height: 32px;
            padding-bottom: 3px;
            transition: opacity 200ms ease-in-out;
        }

        .field::-webkit-input-placeholder { color: #8898AA; }
        .field::-moz-placeholder { color: #8898AA; }

        /* IE doesn't show placeholders when empty+focused */
        .field:-ms-input-placeholder { color: #424770; }

        .field.is-empty:not(.is-focused) {
            opacity: 0;
        }

        button {
            float: left;
            display: block;
            background: #34D08C;
            color: white;
            border-radius: 2px;
            border: 0;
            margin-top: 20px;
            font-size: 19px;
            font-weight: 400;
            width: 100%;
            height: 47px;
            line-height: 45px;
            outline: none;
        }

        button:focus {
            background: #24B47E;
        }

        button:active {
            background: #159570;
        }

        .outcome {
            float: left;
            width: 100%;
            padding-top: 8px;
            min-height: 20px;
            text-align: center;
        }

        .success, .error {
            display: none;
            font-size: 15px;
        }

        .success.visible, .error.visible {
            display: inline;
        }

        .error {
            color: #E4584C;
        }

        .success {
            color: #34D08C;
        }

        .success .token {
            font-weight: 500;
            font-size: 15px;
        }
    </style>
@endsection
@section('content')

{{--<div class="container">


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
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{{url('/payment')}}">
                    <div class="card-body justify-content-center">

                            {{ csrf_field() }}
                            <input name="project_id" type="text" hidden="hidden" value="{{$project->id}}">
                            <div class="row">
                                <div class="col-xs-12 col-12">
                                    <div class="form-group">
                                        <label>CARD NUMBER</label>
                                        <div class="input-group">
                                            <input maxlength="16" minlength="16" name="card_number" type="tel" class="form-control" placeholder="Valid Card Number" required/><br>
                                            <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">EXPIRATION</span> DATE</label>
                                        <input type="tel" class="form-control" placeholder="MM / YY" required/>
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label>CV CODE</label>
                                        <input type="tel" class="form-control" placeholder="CVC" required maxlength="3" min="3"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-12">
                                    <div class="form-group">
                                        <label>CARD OWNER</label>
                                        <input readonly type="text" class="form-control" placeholder="Card Owner Names" required value="{{$project->client->full_name}}"/>
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



</div>--}}

<div class="container">
    <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-4'>
            <form action="{{url('/payment')}}" method="post">
                @csrf
                <label>
                    <input name="cardholder-name" class="field is-empty" placeholder="Jane Doe" required/>
                    <span><span>Name</span></span>
                </label>
                <input type="text" name="project_id" value="{{$project->id}}" readonly hidden="hidden">

                <input name="amount" class="" type="text" value="{{($project->project_cost) + ((12/100)*$project->project_cost)}}" readonly hidden="hidden"/>

                <label>
                    <div id="card-element" class="field is-empty"></div>
                    <span><span>Credit or debit card</span></span>
                </label>
                <button type="submit">Pay ${{($project->project_cost) + ((12/100)*$project->project_cost)}}</button>
                <div class="outcome">
                    <div class="error" role="alert"></div>
                    <div class="success">
                        Success! Your Stripe token is <span class="token"></span>
                    </div>
                </div>
            </form>
        </div>
        <div class='col-md-4'></div>
    </div>
</div>

@endsection


@section('script')
    {{--<script src='https://js.stripe.com/v3/' type='text/javascript'></script>--}}
    <script type="text/javascript">
    $(function(){

        let stripe = Stripe('pk_test_ysYG2YLE6Dlfb2WptP1IYcuV');
        let elements = stripe.elements();

        let card = elements.create('card', {
            iconStyle: 'solid',
            style: {
                base: {
                    iconColor: '#8898AA',
                    color: 'white',
                    lineHeight: '36px',
                    fontWeight: 300,
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSize: '19px',

                    '::placeholder': {
                        color: '#8898AA',
                    },
                },
                invalid: {
                    iconColor: '#e85746',
                    color: '#e85746',
                }
            },
            classes: {
                focus: 'is-focused',
                empty: 'is-empty',
            },
        });
        card.mount('#card-element');



        let inputs = document.querySelectorAll('input.field');
        Array.prototype.forEach.call(inputs, function(input) {
            input.addEventListener('focus', function() {
                input.classList.add('is-focused');
            });
            input.addEventListener('blur', function() {
                input.classList.remove('is-focused');
            });
            input.addEventListener('keyup', function() {
                if (input.value.length === 0) {
                    input.classList.add('is-empty');
                } else {
                    input.classList.remove('is-empty');
                }
            });
        });

        function setOutcome(result) {
            let successElement = document.querySelector('.success');
            let errorElement = document.querySelector('.error');
            successElement.classList.remove('visible');
            errorElement.classList.remove('visible');

            if (result.token) {
                // Use the token to create a charge or a customer
                // https://stripe.com/docs/payments/charges-api
                successElement.querySelector('.token').textContent = result.token.id;
                successElement.classList.add('visible');
            } else if (result.error) {
                errorElement.textContent = result.error.message;
                errorElement.classList.add('visible');
            }
        }

        card.on('change', function(event) {

            setOutcome(event);
        });

        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            let form = document.querySelector('form');
            let extraDetails = {
                name: form.querySelector('input[name=cardholder-name]').value,
            };
            stripe.createToken(card, extraDetails).then(setOutcome);
        });
    });
    </script>
@endsection

