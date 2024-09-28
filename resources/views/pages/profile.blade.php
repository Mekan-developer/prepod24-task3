@extends('layouts.app')
@section('content')
    @livewire('profile',['maskedEmail' => $maskedEmail])
@endsection