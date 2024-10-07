@extends('layouts.app')
@section('content')
     @livewire('pages.messages.index',['task'=>$task,'messages' => $messages, 'bid' => $bid])
@endsection
