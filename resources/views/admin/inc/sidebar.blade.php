<ul style="padding:20px 0;">
                <p>{{ __('dashboard.navigation') }}</p>
                <li class="active">
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
                <li class="">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="icon"><i class="fas fa-question-circle"></i></span> {{ trans_choice('dashboard.module_faq', 2) }} </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{ route('admin.faq.index') }}">{{ trans_choice('dashboard.module_faq_list', 2) }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.faq-category.index') }}">{{ trans_choice('dashboard.module_faq_category', 2) }}</a>
                        </li>
                    </ul>
                </li>
                <li>

                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="icon"><i class="far fa-file-alt"></i></span> {{ trans_choice('dashboard.module_page', 2) }} </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{ route('admin.header-page.index') }}">{{ trans_choice('dashboard.module_header_pages', 2) }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.header.index') }}">{{ trans_choice('dashboard.module_header', 2) }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.page.index') }}">{{ trans_choice('dashboard.module_footer_page', 2) }}</a>
                        </li>
                    </ul>
                </li>

                <li>

                    <a href="#bookingSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="icon"><i class="far fa-file-alt"></i></span> {{ trans_choice('dashboard.module_booking', 2) }} </a>
                    <ul class="collapse list-unstyled" id="bookingSubmenu">
                        <li>
                            <a href="{{ route('admin.booking.index') }}">{{ trans_choice('dashboard.module_booking_list', 2) }}</a>
                        </li>
{{--                        <li>--}}
{{--                            <a href="{{ route('admin.booking.create') }}">{{ trans_choice('dashboard.module_booking_add', 2) }}</a>--}}
{{--                        </li>--}}
                        <li>
                            <a href="{{ route('admin.timeslot.index') }}">{{ trans_choice('dashboard.module_time_slot', 2) }}</a>
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
