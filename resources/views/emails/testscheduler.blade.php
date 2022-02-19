@component('mail::message')
# Introduction

Your account just got credited kid. Smile on haha.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
