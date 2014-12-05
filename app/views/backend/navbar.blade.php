@if(Auth::User()->hasRole("Admin"))
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @if(Config::get('notification.count_unread') != 0)
            <span class="badge">
            {{{Config::get('notification.count_unread')}}}
            </span>
            @endif
    {{Lang::get('messages.message') }} <span class="caret"></span></a>
    <ul class="dropdown-menu inverse-dropdown" role="menu">
        <li><a href="{{{ URL::to('/message/') }}}">{{Lang::get('messages.all_messages') }}</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Lang::get('portfolio.portfolio') }} <span class="caret"></span></a>
    <ul class="dropdown-menu inverse-dropdown" role="menu">
        <li><a href="{{{ URL::to('/admin/portfolio/create') }}}">{{Lang::get('portfolio.new') }}</a></li>
        <li><a href="{{{ URL::to('/admin/portfolio/') }}}">{{Lang::get('portfolio.all_portfolios') }}</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Lang::get('user.user') }} <span class="caret"></span></a>
    <ul class="dropdown-menu inverse-dropdown" role="menu">
        <li><a href="{{{ URL::to('/user/create') }}}">{{Lang::get('user.new') }}</a></li>
        <li><a href="{{{ URL::to('/user/') }}}">{{Lang::get('user.all_users') }}</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Lang::get('company.information') }} <span class="caret"></span></a>
    <ul class="dropdown-menu inverse-dropdown" role="menu">
        <li><a href="{{{ URL::to('/corporate/create') }}}">{{Lang::get('company.new') }}</a></li>
        <li><a href="{{{ URL::to('/corporate/') }}}">{{Lang::get('company.all_company') }}</a></li>
        <li class="divider"></li>
        <li><a href="{{{ URL::to('/project/create') }}}">{{Lang::get('project.new') }}</a></li>
        <li><a href="{{{ URL::to('/project/') }}}">{{Lang::get('project.all_projects') }}</a></li>
    </ul>
</li>

@else
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @if(Config::get('notification.count_unread') != 0)
            <span class="badge">
            {{{Config::get('notification.count_unread')}}}
            </span>
            @endif
        {{Lang::get('messages.message') }} <span class="caret"></span></a>
    <ul class="dropdown-menu inverse-dropdown" role="menu">
        <li>{{ link_to_action('MessageController@show', Lang::get('messages.my_messages'), array(Hashids::encode(Auth::user()->id))) }}</li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Lang::get('project.project') }} <span class="caret"></span></a>
    <ul class="dropdown-menu inverse-dropdown" role="menu">

        @if(!Auth::User()->corporate_id)
        <li><a href="{{{ URL::to('/user/corporate/request') }}}">{{Lang::get('company.join_create') }}</a></li>
        @else
        <li><a href="{{{ URL::to('/project/create') }}}">{{Lang::get('project.new') }}</a></li>
        <li><a href="{{{ URL::to('/project/') }}}">{{Lang::get('project.all_my_projects') }}</a></li>
        @endif

    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Lang::get('company.company') }} <span class="caret"></span></a>
    <ul class="dropdown-menu inverse-dropdown" role="menu">
        @if(!Auth::User()->corporate_id)
        <li><a href="{{{ URL::to('/user/corporate/request') }}}">{{Lang::get('company.join_create') }}</a></li>
        @else
        <li><a href="{{{ URL::to('/corporate/') }}}">{{Lang::get('company.my_company') }}</a></li>
        @endif
    </ul>
</li>
@endif

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi, {{{ Auth::user()->name }}}<span class="caret"></span></a>
    <ul class="dropdown-menu inverse-dropdown" role="menu">
        <li>
            {{ link_to_action('UserController@edit',Lang::get('user.edit'),array(Hashids::encode(Auth::User()->id))) }}
        </li>
        <li>
            {{link_to_action('UsersController@logout',Lang::get('user.logout') )}}
        </li>
    </ul>
</li>