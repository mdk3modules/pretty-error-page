---------- BITTE NICHT LÖSCHEN / DO NOT DELETE ----------
Timestamp:
{{ date('Y-m-d H:i:s (e)') }}
------------
Message:
{{ $message }}
------------
Code:
{{ $exception->getCode() }}
------------
SERVER Data:
- REQUEST_URI: '{{ Request::server('REQUEST_URI') }}'
- USER_AGENT: '{{ Request::server('HTTP_USER_AGENT') }}'
------------
Input Data:
@if(count(Input::all()) == 0) NONE {{ "\n" }} @endif
@foreach(Input::all() as $key => $data)
    - {{ $key }}: '{{ $data }}'
@endforeach
------------
COOKIE:
@foreach($_COOKIE as $key => $data)
    - {{ $key }}: '{{ $data }}'
@endforeach
------------
File and Line:
{{ $exception->getFile() }}::{{ $exception->getLine() }}
------------
Backtrace:
{{ $exception->getTraceAsString() }}
