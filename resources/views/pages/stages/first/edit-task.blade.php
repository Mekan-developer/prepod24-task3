@extends('layouts.app')
@section('content')
    @livewire('stages.first.edit-task', ['task' => $task])
@endsection 