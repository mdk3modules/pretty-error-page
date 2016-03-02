@extends('pretty-error-page::layouts.default')

@section('body')
    <div class="pep-error__mascot">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="260px" height="260px" viewBox="0 0 260 260" enable-background="new 0 0 260 260" xml:space="preserve">
	        <ellipse fill="#EEEEEE" cx="130" cy="130" rx="130" ry="125"/>
            <g fill="#DDDDDD">
                <ellipse cx="185" cy="46.7" rx="15.1" ry="10.1"/>
                <ellipse cx="84.6" cy="139.4" rx="13.8" ry="16.5"/>
                <ellipse cx="52.6" cy="190.4" rx="13.8" ry="13.4"/>
                <ellipse cx="27.9" cy="114.7" rx="8" ry="6.7"/>
                <ellipse cx="165.9" cy="208.6" rx="9.1" ry="7.6"/>
                <ellipse cx="215.8" cy="195.1" rx="6.9" ry="6.1"/>
                <ellipse cx="71.2" cy="71.4" rx="10.9" ry="8.9"/>
                <ellipse cx="107.3" cy="31.2" rx="8.9" ry="7.1"/>
                <ellipse cx="150" cy="87.1" rx="20" ry="13.2"/>
                <ellipse cx="155" cy="156.1" rx="20" ry="13.2"/>
                <ellipse cx="197.2" cy="139.9" rx="5.7" ry="9.8"/>
            </g>
        </svg>
    </div>
    <div class="pep-error__mascot__accessory sky">
        @for($i = 1; $i < 40; $i++)<i class="sky__star sky__star--{{ $i }}"></i>@endfor
    </div>
    @parent
@stop
