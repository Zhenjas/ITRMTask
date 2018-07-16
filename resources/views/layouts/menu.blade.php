    <div class="top-bar">
        <div class="left-side">
            <span>ITRM Task</span>
        </div>
        <div class="right-side">
        @guest
            <button onclick="location.href='{{ route('register') }}';">{{ __('Register') }}</button>
            <button onclick="location.href='{{ route('login') }}';">{{ __('Login') }}</button>
        @else
            <span>Welcome, {{ Auth::user()->forename }}!</span>
            <button onclick="location.href='{{ route('profile_edit') }}';">Profile edit</button>
            <button onclick="location.href='{{ route('logout') }}';">{{ __('Logout') }}</button>
        @endguest
        </div>
    </div>