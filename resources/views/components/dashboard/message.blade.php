@php
    $alertType = session('success') ? 'success' : (session('error') ? 'error' : null);
    $alertMessage = session('success') ?? session('error');
@endphp

@if ($alertType && $alertMessage)
    <div x-data="{ open: true, type: '{{ $alertType }}', message: @js($alertMessage) }" x-init="setTimeout(() => open = false, 5000)" x-show="open" x-transition x-cloak
        class="mb-4 p-4 rounded-lg border"
        :class="{
            'bg-green-100 text-green-800 border-green-300': type === 'success',
            'bg-red-100 text-red-800 border-red-300': type === 'error'
        }">
        <i class="fas mr-2"
            :class="{
                'fa-check-circle': type === 'success',
                'fa-times-circle': type === 'error'
            }"></i>

        <span x-text="message"></span>
    </div>
@endif
