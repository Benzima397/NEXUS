@props(['status' => 'online'])

@php
    $config = match($status) {
        'online' => [
            'label' => 'Online',
            'dot' => 'bg-nexus-success',
            'glow' => 'glow-success',
            'text' => 'text-nexus-success',
            'bg' => 'bg-nexus-success/10',
            'border' => 'border-nexus-success/20',
        ],
        'in_development' => [
            'label' => 'In Development',
            'dot' => 'bg-nexus-warning',
            'glow' => '',
            'text' => 'text-nexus-warning',
            'bg' => 'bg-nexus-warning/10',
            'border' => 'border-nexus-warning/20',
        ],
        'offline' => [
            'label' => 'Offline',
            'dot' => 'bg-nexus-dim',
            'glow' => '',
            'text' => 'text-nexus-dim',
            'bg' => 'bg-nexus-dim/10',
            'border' => 'border-nexus-dim/20',
        ],
        default => [
            'label' => $status,
            'dot' => 'bg-nexus-muted',
            'glow' => '',
            'text' => 'text-nexus-muted',
            'bg' => 'bg-nexus-muted/10',
            'border' => 'border-nexus-muted/20',
        ],
    };
@endphp

<span class="inline-flex items-center gap-2 rounded-full border {{ $config['border'] }} {{ $config['bg'] }} px-3 py-1">
    <span class="relative flex h-2 w-2">
        <span class="absolute inline-flex h-full w-full rounded-full {{ $config['dot'] }} {{ $config['glow'] }} opacity-75" style="animation: pulse-glow 2s infinite"></span>
        <span class="relative inline-flex h-2 w-2 rounded-full {{ $config['dot'] }}"></span>
    </span>
    <span class="text-xs font-medium {{ $config['text'] }}">{{ $config['label'] }}</span>
</span>
