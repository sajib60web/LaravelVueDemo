@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Shift') }}</div>
                <div class="card-body text-center text-success">
                    <h1>{{ __('Shift Name') }}: {{ $timeOfDay }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

