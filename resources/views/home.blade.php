@extends('layouts.app')

@section('content')
    <div class="main-body">
        <div class="subject">
            <h1>Dashboard</h1>
        </div>
    </div>

    <div class="form dashboard-form">
          Welcome, {{ Auth::user()->forename }}!
    </div>
@stop