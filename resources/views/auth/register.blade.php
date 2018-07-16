@extends('layouts.app')

@section('content')
    <div class="main-body">
        <div class="subject">
            <h1>Registration</h1>
        </div>
    </div>

        <div class="form">
            <form id="register-form" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                <div id="hidden-fields" class="hidden"></div>
                <div class="field text-left">
                    <label for="gender">Title<span>*</span></label>
                    <select class="input-group" name="title" style="width: 65px;">
                      <option disabled selected value>-----</option>
                        <option value="1">Mr</option>
                        <option value="2">Mrs</option>
                        <option value="3">Miss</option>
                        <option value="4">Ms</option>
                        <option value="5">Dr</option>
                    </select>
                    <span id="title" class="validity form-control{{ $errors->has('title') ? ' visible' : '' }}">
                        @if ($errors->has('title'))
                                {{ $errors->first('title') }}
                        @endif
                    </span>
                </div>
                <div class="field">
                    <label for="forename">Forename<span>*</span></label>
                    <input type="text" class="input-group" name="forename" value="{{ old('forename') }}">
                    <span id="forename" class="validity form-control{{ $errors->has('forename') ? ' visible' : '' }}">
                        @if ($errors->has('forename'))
                                {{ $errors->first('forename') }}
                        @endif
                    </span>
                </div>
                <div class="field">
                    <label for="surname">Surname<span>*</span></label>
                    <input type="text" class="input-group" name="surname" value="{{ old('surname') }}">
                    <span id="surname" class="validity form-control{{ $errors->has('surname') ? ' visible' : '' }}">
                        @if ($errors->has('surname'))
                                {{ $errors->first('surname') }}
                        @endif
                    </span>
                </div>
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
                    <input type="password" class="input-group" name="password" value="">
                    <span id="password" class="validity form-control{{ $errors->has('password') ? ' visible' : '' }}">
                        @if ($errors->has('password'))
                                {{ $errors->first('password') }}
                        @endif
                    </span>
                </div>
                <div class="field">
                    <label for="password">Confirm Password<span>*</span></label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="field">
                    <label for="gender">Gender<span>*</span></label>
                    <select class="input-group" name="gender">
                      <option disabled selected value>Please select...</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                      <option value="3">Not specified</option>
                    </select>
                    <span id="gender" class="validity form-control{{ $errors->has('gender') ? ' visible' : '' }}">
                        @if ($errors->has('gender'))
                                {{ $errors->first('gender') }}
                        @endif
                    </span>
                </div>
                <div class="field">
                    <label for="dob">Date of birth<span>*</span></label>
                    <input id="dob-picker" type="text" class="input-group" name="dob" autocomplete="off" placeholder="dd/mm/yyyy" value="{{ old('dob') }}">
                    <span id="dob" class="validity form-control{{ $errors->has('dob') ? ' visible' : '' }}">
                        @if ($errors->has('dob'))
                                {{ $errors->first('dob') }}
                        @endif
                    </span>
                </div>
                <div class="field">
                    <label for="address_one">Address line 1<span>*</span></label>
                    <input type="text" id="address-one" class="input-group" name="address_one" value="{{ old('address_one') }}">
                    <span id="address_one" class="validity form-control{{ $errors->has('address_one') ? ' visible' : '' }}">
                        @if ($errors->has('address_one'))
                                {{ $errors->first('address_one') }}
                        @endif
                    </span>
                </div>
                <div class="field">
                    <label for="address_two">Address line 2</label>
                    <input type="text" id="address-two" id="address-line" class="input-group-optional" name="address_two" value="{{ old('address_two') }}">
                    <span id="address_two" class="validity form-control{{ $errors->has('address_two') ? ' visible' : '' }}">
                        @if ($errors->has('address_two'))
                                {{ $errors->first('address_two') }}
                        @endif
                    </span>
                </div>
                <div class="field">
                    <label for="country">Country<span>*</span></label>
                    <input type="text" class="input-group" name="country" value="{{ old('country') }}">
                    <span id="country" class="validity form-control{{ $errors->has('country') ? ' visible' : '' }}">
                        @if ($errors->has('country'))
                                {{ $errors->first('country') }}
                        @endif
                    </span>
                </div>
                <div class="field">
                    <label for="county">County<span></span></label>
                    <input type="text" class="input-group-optional" name="county" value="{{ old('county') }}">
                    <span id="county" class="validity form-control{{ $errors->has('county') ? ' visible' : '' }}">
                        @if ($errors->has('county'))
                                {{ $errors->first('county') }}
                        @endif
                    </span>
                </div>
                <div class="field">
                    <label for="town">Town<span>*</span></label>
                    <input type="text" class="input-group" name="town" value="{{ old('town') }}">
                    <span id="town" class="validity form-control{{ $errors->has('town') ? ' visible' : '' }}">
                        @if ($errors->has('town'))
                                {{ $errors->first('town') }}
                        @endif
                    </span>
                </div>
                <div class="field">
                    <label for="post_code">Post code<span>*</span></label>
                    <input type="text" class="input-group" name="post_code" value="{{ old('post_code') }}">
                    <span id="post_code" class="validity form-control{{ $errors->has('post_code') ? ' visible' : '' }}">
                        @if ($errors->has('post_code'))
                                {{ $errors->first('post_code') }}
                        @endif
                    </span>
                </div>
                <div class="field">
                    <label for="from_date">From date<span>*</span></label>
                    <input type="text" id="from-picker" class="input-group" name="from_date" autocomplete="off" placeholder="dd/mm/yyyy" value="{{ old('from_date') }}">
                    <span id="from_date" class="validity form-control{{ $errors->has('from_date') ? ' visible' : '' }}">
                        @if ($errors->has('from_date'))
                                {{ $errors->first('from_date') }}
                        @endif
                    </span>
                </div>
                <div class="field">
                    <label for="until_date">Until date<span>*</span></label>
                    <input type="text" id="until-picker" class="input-group" name="until_date" autocomplete="off" placeholder="dd/mm/yyyy" value="{{ old('until_date') }}">
                    <span id="until_date" class="validity form-control{{ $errors->has('until_date') ? ' visible' : '' }}">
                        @if ($errors->has('until_date'))
                                {{ $errors->first('until_date') }}
                        @endif
                    </span>
                </div>
                <div>
                    <button type="button" id="submit-button">Send form</button>
                </div>
            </form>
        </div>

  
@stop

