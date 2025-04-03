<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <span class="brand-text font-weight-light">OZI-RIS</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                @if(auth()->check())
                @role('admin')
                @include('menus.admin')
                @endrole

                @role('staff')
                @include('menus.staff')
                @endrole

                @role('radiographer')
                @include('menus.radiographer')
                @endrole

                @role('doctor')
                @include('menus.doctor')
                @endrole
                @endif


            </ul>
        </nav>
    </div>
</aside>