@extends('layouts.app')
@section('content')
   @if (auth()->user()->role->name === 'freelancer')
       <freelancer-home></freelancer-home>
   @elseif(auth()->user()->role->name === 'client')
       <client-home></client-home>
   @elseif(auth()->user()->role->name === 'admin')
       <admin-home></admin-home>
   @endif
@endsection
