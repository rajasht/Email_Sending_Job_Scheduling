@component('mail::message')
# Happy Birthday {{$customer->first_name}}

Dear {{$customer->first_name}} {{$customer->last_name}}, From ABC.com we Wish you a very Happy Birthday.

@component('mail::button', ['url' => ''])
Gift Voucher
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
