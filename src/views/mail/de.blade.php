@extends('pretty-error-page::layouts.mail')
@section('mail.body')
Liebes Support-Team,

Auf dem Server '{{ Request::server("HTTP_HOST") }}' tritt ein wiederkehrender Fehler auf.

Mit freundlichen Grüßen
@stop
