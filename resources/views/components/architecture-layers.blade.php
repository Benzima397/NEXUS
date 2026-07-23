@props(['layers' => []])

<div class="flex flex-col gap-1">
    @foreach($layers as $layer)
        <div class="rounded-lg border border-nexus-border bg-nexus-glass px-3 py-2 transition-all duration-300 hover:border-nexus-border-hover hover:bg-white/[0.04]">
            <div class="flex items-center justify-between gap-2">
                <span class="text-[10px] font-semibold uppercase tracking-wider text-nexus-primary">{{ $layer['name'] }}</span>
                <div class="flex flex-wrap items-center justify-end gap-1">
                    @foreach($layer['tech'] as $tech)
                        <span class="rounded bg-white/[0.04] px-1.5 py-0.5 text-[9px] font-medium text-nexus-muted">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        @if(!$loop->last)
            <div class="flex justify-center py-0.5">
                <svg class="h-2.5 w-2.5 text-nexus-dim" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75"/>
                </svg>
            </div>
        @endif
    @endforeach
</div>
