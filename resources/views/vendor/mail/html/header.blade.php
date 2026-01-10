@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            @else
                <div style="display:flex; flex-direction:column; align-items:center;">
                    <img src="{{ asset('/web/images/cohome-logo-150x150.png') }}" style="width: 64px;" alt="CoHomeSG logo">
                    {!! $slot !!}
                </div>
            @endif
        </a>
    </td>
</tr>
