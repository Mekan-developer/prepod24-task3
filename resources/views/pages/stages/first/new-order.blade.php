@extends('layouts.app')
@section('content')
    @livewire('stages.first.new-order', ['task' => $task])
@endsection 