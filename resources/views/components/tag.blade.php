@props(['tag', 'active' => false])

<span
    class="inline-flex items-center rounded-lg px-2.5 py-1 text-xs font-medium
    {{ $active
        ? 'bg-nexus-primary/10 text-nexus-primary border border-nexus-primary/20'
        : 'bg-nexus-bg-card text-nexus-muted border border-nexus-border'
    }}"
>
    {{ $tag }}
</span>
