<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <section role="sidebar">
            <header class="site-name text-center">
                <span class="h4">{{config('app.name')}}</span>
            </header>
            <main>
                <div role="userinfo">
                    <div class="avatar">
                        <img src="http://graph.facebook.com/1847481919/picture?width=200&type=square" alt="">
                    </div>
                    <div class="logout-link">
                        @sprite(icon-logout)
                    </div>

                    <div class="user text-center">
                        <span>{{ auth()->user()->name }}</span>
                    </div>
                </div>
                <div role="section-selection">
                    <div class="section">
                        <a href="{{route('admin.dashboard')}}" class="{{active('admin.dashboard')}}">
                            @sprite(icon-dashboard)
                            <span>Dashboard</span></a>
                    </div>
                    <div class="section">
                        <label for="toggle-albums">
                            @sprite(icon-albums)
                            <span>Albums</span></label>
                        <input type="checkbox" id="toggle-albums" class="controller" @if (is_active('albums/*')) checked="checked" @endif>
                        <div class="controlled">
                            <ul>
                                <li>Create new Album</li>
                                <li>Album list</li>
                            </ul>
                        </div>
                    </div>
                    <div class="section">
                        <label for="toggle-posts">
                            @sprite(icon-posts)
                            <span>Posts</span>
                        </label>
                        <input type="checkbox" id="toggle-posts" class="controller" @if (is_active('posts/*')) checked="checked" @endif>
                        <div class="controlled">
                            <ul>
                                <li>Create new Post</li>
                                <li>View posts</li>
                            </ul>
                        </div>
                    </div>
                    <div class="section">
                            <a href="#">
                            @sprite(icon-settings)  
                            <span>Settings</span>
                        </a>
                    </div>
                </div>
            </main>

        </section>
        <section role="content">
            <header class="breadcumb">
                <span class="parent">
                    @php
                        echo title_case(explode('.', str_after(Route::currentRouteName(), 'admin.'))[0]);
                    @endphp
                </span>
                <span class="current">
                    @yield('title')
                </span>
            </header>
            <main class="content">
                @yield('content')
            </main>
            
        </section>
        <section role="credit">
            <footer>
                <p class="text-center">
                    {{config('app.name')}} © 2017 by Trung Thành
                </p>
            </footer>
        </section>

       
    </div>

    <!-- Scripts -->

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>