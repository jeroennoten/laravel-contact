<html>
<body>
<p>
@lang('contact::form.name'): {{ $name }}<br>
@lang('contact::form.email'): {{ $email }}<br>
@lang('contact::form.phone'): {{ $phone }}
</p>

<div style="white-space: pre;">{{ $text }}</div>
</body>
</html>