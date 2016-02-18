@extends('pretty-error-page::layouts.default')

@section('footer')
    <script>
        setTimeout(function() {
            location.reload(true);
        }, 5000);
    </script>
@stop
