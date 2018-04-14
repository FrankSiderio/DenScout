@component('mail::message')
# Hi there

{{ $leader }} has requested you join their group.

<div style="display:flex">
  @component('mail::button', ['url' => ''])
  Join
  @endcomponent
  @component('mail::button', ['url' => '', 'color' => 'red'])
  Decline
  @endcomponent
</div>

Thanks,<br>
{{ config('app.name') }}
@endcomponent