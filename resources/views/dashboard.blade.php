@extends('layouts.app')
@section('content')
    @if (auth()->user()->role->name === 'freelancer')
        <freelancer-profile></freelancer-profile>
    @elseif(auth()->user()->role->name === 'client')
        <client-profile></client-profile>
    @elseif(auth()->user()->role->name === 'admin')
        <admin-profile></admin-profile>
    @endif
@endsection
