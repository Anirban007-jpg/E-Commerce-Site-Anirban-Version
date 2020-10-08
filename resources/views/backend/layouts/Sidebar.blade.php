@php
    $prefix = \Illuminate\Support\Facades\Request::route()->getPrefix();
    $route = \Illuminate\Support\Facades\Route::current()->getName();
@endphp
<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if(Auth::user()->usertype=='Admin')
        <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    User Management
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('users.view')}}" class="nav-link {{($route=='users.view')?'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Users</p>
                    </a>
                </li>

            </ul>
        </li>
        @endif
        <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Profile Management
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('profiles.view')}}" class="nav-link {{($route=='profiles.view')?'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Your Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('profiles.password.view')}}" class="nav-link {{($route=='profiles.password.view')?'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                </li>

            </ul>

        </li>
        <li class="nav-item has-treeview {{($prefix=='/logos')?'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Logo Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('logos.view')}}" class="nav-link {{($route=='logos.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Logos</p>
                        </a>
                    </li>
                </ul>
        </li>

                    <li class="nav-item has-treeview {{($prefix=='/sliders')?'menu-open':''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Slider Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('sliders.view')}}" class="nav-link {{($route=='sliders.view')?'active':''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Slider</p>
                                </a>
                            </li>


                </ul>
            <li class="nav-item has-treeview {{($prefix=='/missions')?'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Mission Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('missions.view')}}" class="nav-link {{($route=='missions.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Mission</p>
                        </a>
                    </li>


                </ul>
            </li>
            <li class="nav-item" has-treeview {{($prefix=='/visions')?'menu-open':''}}>
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Vision Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('visions.view')}}" class="nav-link {{($route=='visions.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Vision</p>
                        </a>
                    </li>


                </ul>
            </li>
            <li class="nav-item has-treeview {{($prefix=='/news_events')?'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        News and Events Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('news_events.view')}}" class="nav-link {{($route=='news_events.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View News and Events</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{($prefix=='/services')?'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Service Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('services.view')}}" class="nav-link {{($route=='services.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Services</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{($prefix=='/contacts')?'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Contact Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('contacts.view')}}" class="nav-link {{($route=='contacts.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Contacts</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contacts.communicate.view')}}" class="nav-link {{($route=='contacts.communicate')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Communicate</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{($prefix=='/abouts')?'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        About Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('abouts.view')}}" class="nav-link {{($route=='abouts.view')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Abouts</p>
                        </a>
                    </li>

                </ul>
            </li>
    </ul>
</nav>
