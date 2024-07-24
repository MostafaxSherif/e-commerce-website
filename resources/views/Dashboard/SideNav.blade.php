<div class="nav-left flex-column nav-pills me-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link-left {{ request()->routeIs('items.index') ? 'active' : '' }}" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
        <i class="fa-solid fa-house"></i>
        <a href="{{ route('items.index') }}">Products</a>
    </button>
    <button class="nav-link-left {{ request()->routeIs('items.create') ? 'active' : '' }}" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
        <i class="fa-solid fa-square-plus"></i>
        <a href="{{ route('items.create') }}">Add Product</a>
    </button>
    <button class="nav-link-left {{ request()->routeIs('users.index') ? 'active' : '' }}" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
        <i class="fa-solid fa-user"></i>
        <a href="{{ route('users.index') }}">Customers</a>
    </button>
    <button class="nav-link-left {{ request()->routeIs('users.create') ? 'active' : '' }}" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
        <i class="fa-solid fa-user-plus"></i>
        <a href="{{ route('users.create') }}">Add Customers</a>
    </button>
    <button class="nav-link-left {{ request()->routeIs('texts.index') ? 'active' : '' }}" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
        <i class="fa-solid fa-calendar"></i>
        <a href="{{ route('texts.index') }}">Events</a>
    </button>
    <button class="nav-link-left {{ request()->routeIs('contact.Dashindex') ? 'active' : '' }}" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
        <i class="fa-solid fa-address-book"></i>
        <a href="{{ route('contact.Dashindex') }}">Contacts</a>
    </button>
    <button class="nav-link-left {{ request()->routeIs('cart.all') ? 'active' : '' }}" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
    <i class="fa-solid fa-basket-shopping"></i>
        <a href="{{ route('cart.all') }}">Orders</a>
    </button>
</div>
<div class="nav-left-mobile">
    <a data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" class="mobile-nav-btn"><i class="fa-solid fa-bars"></i> Side Menu</a>
    <div id="multiCollapseExample1"  class=" collapse multi-collapse nav-left flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link-left {{ request()->routeIs('items.index') ? 'active' : '' }}" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
            <i class="fa-solid fa-chevron-left"></i>
            <a data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">back</a>
        </button>
        <button class="nav-link-left {{ request()->routeIs('items.index') ? 'active' : '' }}" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
            <i class="fa-solid fa-house"></i>
            <a href="{{ route('items.index') }}">Products</a>
        </button>
        <button class="nav-link-left {{ request()->routeIs('items.create') ? 'active' : '' }}" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
            <i class="fa-solid fa-square-plus"></i>
            <a href="{{ route('items.create') }}">Add Product</a>
        </button>
        <button class="nav-link-left {{ request()->routeIs('users.index') ? 'active' : '' }}" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
            <i class="fa-solid fa-user"></i>
            <a href="{{ route('users.index') }}">Customers</a>
        </button>
        <button class="nav-link-left {{ request()->routeIs('users.create') ? 'active' : '' }}" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
            <i class="fa-solid fa-user-plus"></i>
            <a href="{{ route('users.create') }}">Add Customers</a>
        </button>
        <button class="nav-link-left {{ request()->routeIs('texts.index') ? 'active' : '' }}" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
            <i class="fa-solid fa-calendar"></i>
            <a href="{{ route('texts.index') }}">Events</a>
        </button>
        <button class="nav-link-left {{ request()->routeIs('contact.Dashindex') ? 'active' : '' }}" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
            <i class="fa-solid fa-address-book"></i>
            <a href="{{ route('contact.Dashindex') }}">Contacts</a>
        </button>
        <button class="nav-link-left {{ request()->routeIs('cart.all') ? 'active' : '' }}" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
        <i class="fa-solid fa-basket-shopping"></i>
            <a href="{{ route('cart.all') }}">Orders</a>
        </button>
    </div>
</div>

