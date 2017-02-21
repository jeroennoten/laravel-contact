@extends('layouts.contact')

@section('form')
    <p>@lang('contact::form.form_message')</p>
    <form action="{{ url('contact') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nameField">@lang('contact::form.name')</label>
            <input type="text" name="name" class="form-control" id="nameField">
        </div>
        <div class="form-group">
            <label for="emailField">@lang('contact::form.email')</label>
            <input type="email" name="email" class="form-control" id="emailField">
        </div>
        <div class="form-group">
            <label for="phoneField">@lang('contact::form.phone')</label>
            <input type="tel" name="phone" class="form-control" id="phoneField">
        </div>
        <div class="form-group">
            <label for="messageField">@lang('contact::form.message')</label>
            <textarea name="text" class="form-control" id="messageField" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-default">@lang('contact::form.send')</button>
    </form>
@endsection