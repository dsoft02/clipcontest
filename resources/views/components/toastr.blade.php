<!-- resources/views/components/flash-messages.blade.php -->

@if (session()->has('error'))
    @push('custom-js')
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endpush
@endif

@if (session()->has('success'))
    @push('custom-js')
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endpush
@endif

@if (session()->has('message'))
    @push('custom-js')
        <script>
            toastr.info("{{ Session::get('message') }}");
        </script>
    @endpush
@endif
