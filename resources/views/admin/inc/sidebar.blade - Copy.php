<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">{{ __('dashboard.navigation') }}</li>

        <li>
            <a href="{{ route('admin.dashboard.index') }}">
                <span class="icon"><i class="fas fa-desktop"></i></span>
                <span> {{ trans_choice('dashboard.module_dashboard', 1) }} </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.service.index') }}">
                <span class="icon"><i class="fas fa-tools"></i></span>
                <span> {{ trans_choice('dashboard.module_service', 2) }} </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.pricing.index') }}">
                <span class="icon"><i class="fas fa-tags"></i></span>
                <span> {{ trans_choice('dashboard.module_pricing', 2) }} </span>
            </a>
        </li>
        <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="fas fa-question-circle"></i></span>
                <span> {{ trans_choice('dashboard.module_faq', 2) }} </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ route('admin.faq.index') }}">{{ trans_choice('dashboard.module_faq_list', 2) }}</a>
                    <a href="{{ route('admin.faq-category.index') }}">{{ trans_choice('dashboard.module_faq_category', 2) }}</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="far fa-file-alt"></i></span>
                <span> {{ trans_choice('dashboard.module_page', 2) }} </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ route('admin.header-page.index') }}">{{ trans_choice('dashboard.module_header_pages', 2) }}</a>
                    <a href="{{ route('admin.header.index') }}">{{ trans_choice('dashboard.module_header', 2) }}</a>
                    <a href="{{ route('admin.page.index') }}">{{ trans_choice('dashboard.module_footer_page', 2) }}</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ route('admin.slider.index') }}">
                <span class="icon"><i class="fas fa-photo-video"></i></span>
                <span> {{ trans_choice('dashboard.module_slider', 2) }} </span>
            </a>
        </li>

       

        <li>
            <a href="{{ route('admin.contact.index') }}">
                <span class="icon"><i class="fas fa-envelope-open-text"></i></span>
                <span> {{ trans_choice('dashboard.module_email', 2) }} </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.subscriber.index') }}">
                <span class="icon"><i class="fas fa-mail-bulk"></i></span>
                <span> {{ trans_choice('dashboard.module_subscriber', 2) }} </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.about.index') }}">
                <span class="icon"><i class="fas fa-pen-square"></i></span>
                <span> {{ trans_choice('dashboard.module_about', 2) }} </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.template.index') }}">
                <span class="icon"><i class="fas fa-inbox"></i></span>
                <span> {{ trans_choice('dashboard.module_template', 2) }} </span>
            </a>
        </li>

       
        <li>
            <a href="{{ route('admin.livechat.index') }}">
                <span class="icon"><i class="fas fa-comment-alt"></i></span>
                <span> {{ trans_choice('dashboard.module_live_chat', 2) }} </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.setting.index') }}">
                <span class="icon"><i class="fas fa-cog"></i></span>
                <span> {{ trans_choice('dashboard.module_setting', 2) }} </span>
            </a>
        </li>

    </ul>

</div>
<!-- End Sidebar -->