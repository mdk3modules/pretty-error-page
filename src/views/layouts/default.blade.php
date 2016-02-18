<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ \Mscharl\PrettyErrorPage\PrettyErrorPageHelper::getPageText('header_title', $code) }}</title>
    <link rel="stylesheet" href="{{ url('packages/mscharl/pretty-error-page/error.css') }}">
</head>
<body class="pep-error pep-error--code-{{ $code }}">

@section('body')
    <h1 class="pep-error__title">{{ \Mscharl\PrettyErrorPage\PrettyErrorPageHelper::getPageText('title', $code) }}</h1>
    <h2 class="pep-error__description">{{ \Mscharl\PrettyErrorPage\PrettyErrorPageHelper::getPageText('description', $code) }}</h2>
@show

<footer class="pep-error__footer">
    @section('footer')
        {{ \Mscharl\PrettyErrorPage\PrettyErrorPageHelper::getPageText('submit_bug', $code, ['link' => \Mscharl\PrettyErrorPage\PrettyErrorPageHelper::getEmailBugLink($exception, $message)]) }}
    @show
</footer>
</body>
</html>
