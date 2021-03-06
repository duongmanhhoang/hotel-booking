<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1"
     m-menu-scrollable="1" m-menu-dropdown-timeout="500">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
            <a href="" class="m-menu__link ">
                <i class="m-menu__link-icon flaticon-line-graph"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">{{ __('messages.Dashboard') }}</span>
                    </span>
                </span>
            </a>
        </li>
        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-cubes"></i>
                <span class="m-menu__link-text">{{ __('messages.Users_manage') }}</span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item" aria-haspopup="true">
                        <a href="{{ route('admin.users.create') }}" class="m-menu__link ">
                            <i class="m-menu__link-bullet fa fa-plus">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">{{ __('messages.Add') }}</span>
                        </a>
                    </li>
                    <li class="m-menu__item" aria-haspopup="true">
                        <a href="{{ route('admin.users.index') }}" class="m-menu__link ">
                            <i class="m-menu__link-bullet fa fa-list">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">{{ __('messages.List') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-building"></i>
                <span class="m-menu__link-text">{{ __('messages.Location_manage') }}</span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item" aria-haspopup="true">
                        <a href="{{ route('admin.locations.create') }}" class="m-menu__link ">
                            <i class="m-menu__link-bullet fa fa-plus">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">{{ __('messages.Add') }}</span>
                        </a>
                    </li>
                    <li class="m-menu__item" aria-haspopup="true">
                        <a href="{{ route('admin.locations.index') }}" class="m-menu__link ">
                            <i class="m-menu__link-bullet fa fa-list">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">{{ __('messages.List') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-home"></i>
                <span class="m-menu__link-text">{{ __('messages.Room_manage') }}</span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    @foreach ($locations_for_sidebar as $location)
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('admin.rooms.index', $location->id) }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet fa fa-angle-right">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">{{ $location->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
        <li class="m-menu__item" aria-haspopup="true">
            <a href="{{ route('admin.properties.index') }}" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-magic"></i>
                <span class="m-menu__link-text">{{ __('messages.Properties_manage') }}</span>
            </a>
        </li>
        <li class="m-menu__item" aria-haspopup="true">
            <a href="{{ route('admin.invoices.index') }}" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-money-bill"></i>
                <span class="m-menu__link-text">{{ __('messages.Invoices_manage') }}</span>
            </a>
        </li>
        <li class="m-menu__item" aria-haspopup="true">
            <a href="{{ route('admin.category.index') }}" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-bars"></i>
                <span class="m-menu__link-text">{{ __('messages.Category_manage') }}</span>
            </a>
        </li>
        <li class="m-menu__item" aria-haspopup="true">
            <a href="{{ route('admin.post.index') }}" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-copy"></i>
                <span class="m-menu__link-text">{{ __('messages.Post_manage') }}</span>
            </a>
        </li>
        <contact v-bind:contacts="contacts" v-bind:name="name"></contact>
        <input type="hidden" name="" id="hiddenNameContact" value="{{ __('messages.Contact_manage') }}">
        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-comments"></i>
                <span class="m-menu__link-text">{{ __('messages.Comment_manage') }}</span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    @foreach ($comments as $comment)
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('admin.comment.index', $comment) }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet fa fa-angle-right">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">{{ $comment }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
        <li class="m-menu__item" aria-haspopup="true">
            <a href="{{ route('admin.web-setting.index') }}" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-wrench"></i>
                <span class="m-menu__link-text">{{ __('messages.Websetting') }}</span>
            </a>
        </li>
        <li class="m-menu__item" aria-haspopup="true">
            <a href="{{ route('admin.chat.index', config('chat.default')) }}" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-comment-alt"></i>
                <span class="m-menu__link-text">{{ __('messages.Chat') }}</span>
            </a>
        </li>
    </ul>
</div>
