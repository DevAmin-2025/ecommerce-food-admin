<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                    href="{{ route('dashboard') }}">
                    <i class="bi bi-grid me-2"></i>
                    داشبورد
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-people me-2"></i>
                    کاربران
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}"
                    href="{{ route('product.index') }}">
                    <i class="bi bi-box-seam me-2"></i>
                    محصولات
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}"
                    href="{{ route('category.index') }}">
                    <i class="bi bi-grid-3x3-gap me-2"></i>
                    دسته بندی
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('orders*') ? 'active' : '' }}" href="{{ route('order.index') }}">
                    <i class="bi bi-basket me-2"></i>
                    سفارشات
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('transactions*') ? 'active' : '' }}"
                    href="{{ route('transactions') }}">
                    <i class="bi bi-currency-dollar me-2"></i>
                    تراکنش ها
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('coupons*') ? 'active' : '' }}"
                    href="{{ route('coupon.index') }}">
                    <i class="bi bi-percent me-2"></i>
                    تخفیف ها
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('contact-us*') ? 'active' : '' }}"
                    href="{{ route('contact-us.index') }}">
                    <i class="bi bi-chat-left-text me-2"></i>
                    پیام های ارتباط با ما
                </a>
            </li>
            <li class="nav-item dropdown-center">
                <a class="nav-link dropdown-toggle
                    {{ request()->is('sliders*', 'features*', 'about-us*', 'footer*') ? 'active' : '' }}"
                    href="#" role="button" data-bs-toggle="dropdown">
                    <i class="bi bi-gear  me-2"></i>
                    تنظیمات سایت
                </a>
                <ul class="dropdown-menu sidebar-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('slider.index') }}">اسلایدر صفحه اصلی</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('feature.index') }}">بخش ویژگی ها</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('about-us.index') }}">بخش درباره ما</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('footer.index') }}">بخش فوتر</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
