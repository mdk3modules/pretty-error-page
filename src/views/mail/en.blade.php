@extends('pretty-error-page::layouts.mail')
@section('mail.body')
Dear Support-Team,

On the website '{{ Request::server("HTTP_HOST") }}' occurs a recurring error.

Yours sincerly,
@stop
