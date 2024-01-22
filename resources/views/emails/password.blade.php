@component('mail::message')
# Introduction

The body of your message.
Your six-digit code is :
@component('mail::button', ['url' => ''])
{{$pin}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
