<!--
    If the user already have a session, display the name and the available options for him
    If not push him to login or Register
-->

<!-- if the user is not logged in -->

@if (Auth::guest())
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{{Lang::get('confide::confide.login.title') }}} <span class="caret"></span></a>
    <ul class="dropdown-menu login-form" role="menu">
        <h2>{{{Lang::get('confide::confide.login.title') }}}</h2>
        <form method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8" autocomplete="off">
            <li><input class="form-control" tabindex="1"
                       placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email"
                       id="email" value="{{{ Input::old('email') }}}"></li>
            <li>
                <input class="form-control" tabindex="2"
                       placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password"
                       id="password"></li>
            <li>
            <br />
            </li>
            <li><input type="checkbox" value="remember-me"> {{{ Lang::get('confide::confide.login.remember') }}}</li>
            <li>
                <button class="btn btn-sm btn-block btn-primary" type="submit">{{{
                    Lang::get('confide::confide.login.submit') }}}
                </button>
            </li>
            <br />
            <li>
                <a href="{{{ URL::to('/users/forgot_password') }}}">
                    {{{ Lang::get('confide::confide.login.forgot_password') }}}
                </a>
            </li>
            <li>
                <a href="{{{ URL::to('users/create') }}}">{{{ Lang::get('confide::confide.signup.submit') }}}
                </a>
            </li>

        </form>
    </ul>
</li>

@else
<!-- if the user is logged in -->
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi, {{{ Auth::user()->name }}}<span class="caret"></span></a>
    <ul class="dropdown-menu inverse-dropdown" role="menu">
        <li><a href="{{{ URL::to('/homepage') }}}">{{{ Lang::get('user.my_homepage') }}}</a></li>
        <li><a href="{{{ URL::to('/users/logout') }}}">{{{ Lang::get('user.logout') }}}</a></li>
    </ul>
</li>

@endif



