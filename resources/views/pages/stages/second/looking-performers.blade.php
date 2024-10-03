@extends('layouts.app')
@section('content')
    @livewire('stages.second.looking-performers', ['task' => $task,'bids' => $bids])
@endsection