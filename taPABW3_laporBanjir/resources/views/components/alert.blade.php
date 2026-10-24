@props([
    'type'  => 'success',
    'title' => null,
])

<div {{ $attributes->merge(['class' => 'alert ' . $type]) }} role="alert">
    @if ($title)
        <strong>{{ $title }}</strong>
    @endif
    {{ $slot }}
</div>
