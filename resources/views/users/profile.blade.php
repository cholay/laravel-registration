@extends('layouts.app')
@section('content')
<div class="container">
    <div>
        @if(Auth::check())
            <p>Welcome to your profile page {!! Auth::user()->first_name !!} - {!! Auth::user()->last_name !!}</p>
        @endif
    </div>
</div>
@stop