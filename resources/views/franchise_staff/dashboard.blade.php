@extends('layouts.app')

@section('page-content')

<x-alerts />

<h1>Welcome {{ $user->name }} ({{ $user->role->title }})</h1>
@endsection