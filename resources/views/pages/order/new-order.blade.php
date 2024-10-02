@extends('layouts.app')
@section('content')

    @livewire('order.new-order', ['task' => $task])
@endsection 