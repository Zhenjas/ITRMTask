@extends('layouts.app')

@section('content')
    <div class="main-body">
        <div class="subject">
            <h1>Profile edit</h1>
        </div>
    </div>

    @if(Session::has('message'))
        <div class="form response">
            <div class="field">
                {{ Session::get('message') }}
            </div>
        </div>        
    @endif

    <div class="form password-form">
        <form id="password-form" method="POST" action="/password_update">
                    @csrf
            <div class="field">
                <label for="password">Password<span>*</span></label>
                <input type="text" class="input-group-passwd" name="password" autocomplete="off" value="">
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
            <div>
                <button type="button" id="change-password-button">Change Password</button>
            </div>
        </form>
    </div>

    <div class="form">
        <form id="register-form" method="POST" action="/profile_update">
                    @csrf
            <div id="hidden-fields" class="hidden"></div>
            <div class="field text-left">
                <label for="gender">Title<span>*</span></label>
                <select class="input-group" name="title" style="width: 65px;">
                  <option value="{{Auth::user()->title}}" selected>{{Auth::user()->title}}</option>
                  <option disabled value>--------</option>
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
                <input type="text" class="input-group" name="forename" value="{{Auth::user()->forename}}">
                <span id="forename" class="validity form-control{{ $errors->has('forename') ? ' visible' : '' }}">
                    @if ($errors->has('forename'))
                            {{ $errors->first('forename') }}
                    @endif
                </span>
            </div>
            <div class="field">
                <label for="surname">Surname<span>*</span></label>
                <input type="text" class="input-group" name="surname" value="{{Auth::user()->surname}}">
                <span id="surname" class="validity form-control{{ $errors->has('surname') ? ' visible' : '' }}">
                    @if ($errors->has('surname'))
                            {{ $errors->first('surname') }}
                    @endif
                </span>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input type="text" class="input-group-email" name="email" value="" placeholder="{{Auth::user()->email}}" disabled>
                <span id="email" class="validity form-control{{ $errors->has('email') ? ' visible' : '' }}">
                    @if ($errors->has('email'))
                            {{ $errors->first('email') }}
                    @endif
                </span>
            </div>
            <div class="field">
                <label for="gender">Gender<span>*</span></label>
                <select class="input-group" name="gender">
                  <option value="{{Auth::user()->gender}}" selected>{{Auth::user()->gender}}</option>
                  <option disabled value>--------</option>
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
                <input id="dob-picker" type="text" class="input-group" name="dob" autocomplete="off" placeholder="dd/mm/yyyy" value="{{Auth::user()->dob}}">
                <span id="dob" class="validity form-control{{ $errors->has('dob') ? ' visible' : '' }}">
                    @if ($errors->has('dob'))
                            {{ $errors->first('dob') }}
                    @endif
                </span>
            </div>
            <div class="field">
                <label for="address_one">Address line 1<span>*</span></label>
                <input type="text" id="address-one" class="input-group" name="address_one" value="{{Auth::user()->address_one}}">
                <span id="address_one" class="validity form-control{{ $errors->has('address_one') ? ' visible' : '' }}">
                    @if ($errors->has('address_one'))
                            {{ $errors->first('address_one') }}
                    @endif
                </span>
            </div>
            <div class="field">
                <label for="address_two">Address line 2</label>
                <input type="text" id="address-two" id="address-line" class="input-group-optional" name="address_two" value="{{Auth::user()->address_two}}">
                <span id="address_two" class="validity form-control{{ $errors->has('address_two') ? ' visible' : '' }}">
                    @if ($errors->has('address_two'))
                            {{ $errors->first('address_two') }}
                    @endif
                </span>
            </div>
            <div class="field">
                <label for="country">Country<span>*</span></label>
                <select class="input-group" name="country">
                    <option value="{{Auth::user()->country }}" selected>{{Auth::user()->country}}</option>
                    <option disabled value="">--------</option>
                    @include('addons.country_list')
                </select>
                <span id="country" class="validity form-control{{ $errors->has('country') ? ' visible' : '' }}">
                    @if ($errors->has('country'))
                            {{ $errors->first('country') }}
                    @endif
                </span>
            </div>
            <div class="field">
                <label for="county">County<span></span></label>
                <input type="text" class="input-group-optional" name="county" value="{{Auth::user()->county}}">
                <span id="county" class="validity form-control{{ $errors->has('county') ? ' visible' : '' }}">
                    @if ($errors->has('county'))
                            {{ $errors->first('county') }}
                    @endif
                </span>
            </div>
            <div class="field">
                <label for="town">Town<span>*</span></label>
                <input type="text" class="input-group" name="town" value="{{Auth::user()->town}}">
                <span id="town" class="validity form-control{{ $errors->has('town') ? ' visible' : '' }}">
                    @if ($errors->has('town'))
                            {{ $errors->first('town') }}
                    @endif
                </span>
            </div>
            <div class="field">
                <label for="post_code">Post code<span>*</span></label>
                <input type="text" class="input-group" name="post_code" value="{{Auth::user()->post_code}}">
                <span id="post_code" class="validity form-control{{ $errors->has('post_code') ? ' visible' : '' }}">
                    @if ($errors->has('post_code'))
                            {{ $errors->first('post_code') }}
                    @endif
                </span>
            </div>
            <div class="field">
                <label for="from_date">From date<span>*</span></label>
                <input type="text" id="from-picker" class="input-group" name="from_date" autocomplete="off" placeholder="dd/mm/yyyy" value="{{Auth::user()->from_date}}">
                <span id="from_date" class="validity form-control{{ $errors->has('from_date') ? ' visible' : '' }}">
                    @if ($errors->has('from_date'))
                            {{ $errors->first('from_date') }}
                    @endif
                </span>
            </div>
            <div class="field">
                <label for="until_date">Until date<span>*</span></label>
                <input type="text" id="until-picker" class="input-group" name="until_date" autocomplete="off" placeholder="dd/mm/yyyy" value="{{Auth::user()->until_date}}">
                <span id="until_date" class="validity form-control{{ $errors->has('until_date') ? ' visible' : '' }}">
                    @if ($errors->has('until_date'))
                            {{ $errors->first('until_date') }}
                    @endif
                </span>
            </div>
            <div>
                <button type="button" id="submit-button">Update profile</button>
            </div>
        </form>
    </div>
@stop