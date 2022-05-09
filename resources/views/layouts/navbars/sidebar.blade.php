<div class="sidebar" data-color="orange">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            {{ __('Northern Alliance') }}
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="@if ($activePage == 'home') active @endif">
                <a href="{{ route('home') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'post') active @endif">
                <a href="{{ route('post') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p> {{ __('Post') }} </p>
                </a>

            </li>
            <li class="@if ($activePage == 'setting') active @endif">

                <a href="{{ route('setting') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p> {{ __('Setting') }} </p>
                </a>
            </li>

            </li>

            <li class="@if ($activePage == 'category') active @endif">
                <a href="{{ route('category.index') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>{{ __('Category') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravelExamples">
                    <i class="fab fa-laravel"></i>
                    <p>
                        {{ __('Laravel Examples') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="@if ($activePage == 'profile') active @endif">
                            <a href="{{ route('profile.edit') }}">
                                <i class="now-ui-icons users_single-02"></i>
                                <p> {{ __('User Profile') }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'users') active @endif">
                            <a href="{{ route('user.index') }}">
                                <i class="now-ui-icons design_bullet-list-67"></i>
                                <p> {{ __('User Management') }} </p>
                            </a>
                        </li>
                    </ul>
                </div>

            <li class="@if ($activePage == 'tags') active @endif">
                <a href="{{ route('tags') }}">
                    <i class="now-ui-icons shopping_tag-content"></i>
                    <p>{{ __('Tags') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'social') active @endif">
                <a href="{{ route('social.index') }}">
                    <i class="now-ui-icons objects_globe"></i>
                    <p>{{ __('Social') }}</p>
                </a>
            </li>

        </ul>
    </div>
</div>
