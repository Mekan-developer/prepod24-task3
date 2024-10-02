@extends('layouts.app')
@section('content')
    @livewire('order.looking-performers', ['task' => $task])
@endsection