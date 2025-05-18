<div wire:poll>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" data-navigate-track="reload"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}" data-navigate-track="reload"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" data-navigate-track="reload"></script>
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}" data-navigate-track="reload"></script>
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}" data-navigate-track="reload"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}" data-navigate-track="reload"></script>
    <script src="{{ asset('assets/js/script.js') }}" data-navigate-track="reload"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}" data-navigate-track="reload"></script>
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}" data-navigate-track="reload"></script>



    <script type="text/javascript">
        document.addEventListener("toast.success", event => {
            event.preventDefault();
            toastr.success(event.detail.message);
        });
        document.addEventListener("toast.error", event => {
            event.preventDefault();
            toastr.error(event.detail.message);
        });
    </script>



</div>
