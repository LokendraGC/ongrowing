<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>On Growing</title>



    @livewireStyles
    @include('shared.cssfiles')
    @yield('custom-css')

</head>

<body>
    <div class="main-wrapper">

        @include('layouts.header')

        <livewire:sidebar />

        <div class="page-wrapper">

            @hasSection('main-content')
                @yield('main-content')
            @else
                {{ $slot }}
            @endif

            @include('layouts.footer')

        </div>
    </div>

    <x-toaster-hub />

    @livewireScripts
    @yield('custom-js')

    @include('shared.jsfiles')

    <script>
        document.addEventListener("livewire:load", function() {
            // Re-initialize dropdowns on every Livewire update
            Livewire.hook('message.processed', (message, component) => {
                $('[data-toggle="dropdown"]').dropdown(); // for Bootstrap 4
            });
        });
    </script>


    <script>
        function initSidebarDropdowns() {
            // Toggle submenu visibility on click
            $('.sidebar .submenu > a').off('click').on('click', function(e) {
                e.preventDefault();
                var $submenu = $(this).next('ul');

                if (!$submenu.is(':visible')) {
                    // Close all open submenus
                    $('.sidebar .submenu ul:visible').slideUp(200);
                    $('.sidebar .submenu').removeClass('active');
                }

                // Toggle current submenu
                $submenu.slideToggle(200);
                $(this).parent().toggleClass('active');
            });
        }

        document.addEventListener('livewire:navigated', function() {
            initSidebarDropdowns();
        });

        // Initial run
        document.addEventListener('DOMContentLoaded', function() {
            initSidebarDropdowns();
        });

    </script>


</body>


</html>
