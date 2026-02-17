<ul class="main-menu">

    <!-- Start::slide -->
    <li class="slide">
        <a href="{{ route('admin.dashboard') }}"
            class="side-menu__item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bx bx-home side-menu__icon"></i>
            <span class="side-menu__label">{{ __('translation.main') }}</span>
        </a>
    </li>

    <!-- Start::about -->
    <li class="slide">
    <!-- Start::about -->
    <li class="slide">
        <a href="{{ route('admin.page.home-sliders') }}"
           class="side-menu__item {{ request()->routeIs('admin.page.home-sliders') ? 'active' : '' }}">
            <i class="bi bi-map side-menu__icon"></i>
            <span class="side-menu__label">السكشن المتحرك</span>
        </a>
    </li>

    <li class="slide">
        <a href="{{ route('admin.page.testimonial') }}"
           class="side-menu__item {{ request()->routeIs('admin.page.testimonial') ? 'active' : '' }}">
            <i class="bi bi-map side-menu__icon"></i>
            <span class="side-menu__label">اراء العملاء</span>
        </a>
    </li>

    <!-- Start::about -->
    <li class="slide">
        <a href="{{ route('admin.page.team') }}"
           class="side-menu__item {{ request()->routeIs('admin.page.team') ? 'active' : '' }}">
            <i class="bi bi-map side-menu__icon"></i>
            <span class="side-menu__label">اعضاء الشركة</span>
        </a>
    </li>

    <!-- Start::School Modules -->
    <li class="slide">
        <a href="{{ route('admin.page.why-choose-us') }}"
           class="side-menu__item {{ request()->routeIs('admin.page.why-choose-us') ? 'active' : '' }}">
            <i class="bi bi-patch-question side-menu__icon"></i>
            <span class="side-menu__label">لماذا تختارنا</span>
        </a>
    </li>

    <li class="slide">
        <a href="{{ route('admin.page.educational-stages') }}"
           class="side-menu__item {{ request()->routeIs('admin.page.educational-stages') ? 'active' : '' }}">
            <i class="bi bi-layers side-menu__icon"></i>
            <span class="side-menu__label">مراحل التعليم</span>
        </a>
    </li>

    <li class="slide">
        <a href="{{ route('admin.page.class-rooms') }}"
           class="side-menu__item {{ request()->routeIs('admin.page.class-rooms') ? 'active' : '' }}">
            <i class="bi bi-book side-menu__icon"></i>
            <span class="side-menu__label">الصفوف الدراسية</span>
        </a>
    </li>

    <li class="slide">
        <a href="{{ route('admin.page.campus-tour-categories') }}" class="side-menu__item">
            <i class="ri-list-check-2 side-menu__icon"></i>
            <span class="side-menu__label">{{ __('global.CampusTourCategories') }}</span>
        </a>
    </li>

    <li class="slide">
        <a href="{{ route('admin.page.campus-tours') }}"
           class="side-menu__item {{ request()->routeIs('admin.page.campus-tours') ? 'active' : '' }}">
            <i class="bi bi-camera-video side-menu__icon"></i>
            <span class="side-menu__label">جولة بالمدرسة</span>
        </a>
    </li>

    <li class="slide">
        <a href="{{ route('admin.page.student-registrations') }}"
           class="side-menu__item {{ request()->routeIs('admin.page.student-registrations') ? 'active' : '' }}">
            <i class="bi bi-person-lines-fill side-menu__icon"></i>
            <span class="side-menu__label">طلبات التسجيل</span>
        </a>
    </li>

    <li class="slide">
        <a href="{{ route('admin.page.facilities') }}"
           class="side-menu__item {{ request()->routeIs('admin.page.facilities') ? 'active' : '' }}">
            <i class="bi bi-building side-menu__icon"></i>
            <span class="side-menu__label">{{ __('global.Facilities') }}</span>
        </a>
    </li>


    <!-- Start::about -->
        <li class="slide">
            <a href="{{ route('admin.page.one-about') }}"
               class="side-menu__item {{ request()->routeIs('admin.page.one-about') ? 'active' : '' }}">
                <i class="bi bi-map side-menu__icon"></i>
                <span class="side-menu__label">صفحة من نحن</span>
            </a>
        </li>
    <!-- End::about -->


    


    <!-- Start::Settings -->
    <li class="slide has-sub {{ request()->routeIs('admin.page.setting') || request()->routeIs('admin.page.policies') || request()->routeIs('admin.page.contact-messages') || request()->routeIs('admin.page.one-about') ? 'active open' : '' }}" >
        <a href="javascript:void(0);"  class="side-menu__item {{ request()->routeIs('admin.page.setting') || request()->routeIs('admin.page.policies') || request()->routeIs('admin.page.contact-messages') || request()->routeIs('admin.page.one-about') ? 'active' : '' }}">
            <i class="bi bi-gear side-menu__icon"></i>
            <span class="side-menu__label">الاعدادات</span>
            <i class="fe fe-chevron-down side-menu__angle"></i>
        </a>
        <ul class="slide-menu child1">
            <li class="slide side-menu__label1">
                <a href="javascript:void(0)"> الاعدادات</a>
            </li>

            <li class="slide">
                <a href="{{ route('admin.page.setting') }}"
                   class="side-menu__item {{ request()->routeIs('admin.page.setting') ? 'active' : '' }}">
                    الاعدادات
                </a>
            </li>

            <li class="slide">
                <a href="{{ route('admin.page.policies') }}"
                   class="side-menu__item {{ request()->routeIs('admin.page.policies') ? 'active' : '' }}">
                    سياسات الشركة
                </a>
            </li>


            <li class="slide">
                <a href="{{ route('admin.page.contact-messages') }}"
                   class="side-menu__item {{ request()->routeIs('admin.page.contact-messages') ? 'active' : '' }}">
                    رسائل التواصل
                </a>
            </li>


        </ul>
    </li>


</ul>
