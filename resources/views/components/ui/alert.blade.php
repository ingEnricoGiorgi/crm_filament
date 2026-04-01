@props([
    'type' => 'info', // success | error | warning | info
])

@php
    $styles = [
        'success' => 'bg-green-50 border-green-400 text-green-800',
        'error' => 'bg-red-50 border-red-400 text-red-800',
        'warning' => 'bg-yellow-50 border-yellow-400 text-yellow-800',
        'info' => 'bg-blue-50 border-blue-400 text-blue-800',
    ];

    $style = $styles[$type] ?? $styles['info'];
@endphp

<div
    x-data="{ show: true }"
    x-show="show"
    x-transition
    class="border-l-4 p-4 rounded shadow-sm mb-4 flex justify-between items-start {{ $style }}"
>
    <div class="text-sm">
        {{ $slot }}
    </div>

    <button
        @click="show = false"
        class="ml-4 text-lg font-bold opacity-60 hover:opacity-100"
    >
        ×
    </button>
</div>
