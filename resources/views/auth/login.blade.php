@extends('layouts.app')

@section('content')
    <div class="main-body">
        <div class="subject">
            <h1>Login</h1>
        </div>
    </div>

        <div class="form">
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                <div class="field">
                    <label for="email">Email<span>*</span></label>
                    <input type="text" class="input-group" name="email" value="{{ old('email') }}">
                    <span id="email" class="validity form-control{{ $errors->has('email') ? ' visible' : '' }}">
                        @if ($errors->has('email'))
                                {{ $errors->first('email') }}
                        @endif
                    </span>
                </div>
                <div class="field">
                    <label for="password">Password<span>*</span></label>
                    <input type="text" class="input-group" name="password" value="{{ old('password') }}">
                    <span id="password" class="validity form-control{{ $errors->has('password') ? ' visible' : '' }}">
                        @if ($errors->has('password'))
                                {{ $errors->first('password') }}
                        @endif
                    </span>
                </div>
                <button type="submit" id="submit-button">LogIn</button>
                </div>
            </form>
        </div>
@stop