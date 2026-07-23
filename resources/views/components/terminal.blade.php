@props(['lines' => []])

<div class="overflow-hidden rounded-2xl border border-nexus-border bg-[#0a0e1a] font-mono text-sm">
    {{-- Title Bar --}}
    <div class="flex items-center gap-2 border-b border-nexus-border px-4 py-3">
        <div class="flex gap-1.5">
            <span class="h-3 w-3 rounded-full bg-[#ff5f56]"></span>
            <span class="h-3 w-3 rounded-full bg-[#ffbd2e]"></span>
            <span class="h-3 w-3 rounded-full bg-[#27c93f]"></span>
        </div>
        <span class="ml-2 text-xs text-nexus-dim">nexus ~ terminal</span>
    </div>

    {{-- Content --}}
    <div class="p-5 space-y-1.5">
        @foreach($lines as $line)
            @if($line['type'] === 'comment')
                <div class="text-nexus-dim">{{ $line['text'] }}</div>
            @elseif($line['type'] === 'command')
                <div class="flex items-center gap-2">
                    <span class="text-nexus-primary">❯</span>
                    <span class="text-nexus-white">{{ $line['text'] }}</span>
                </div>
            @elseif($line['type'] === 'output')
                <div class="pl-5 text-nexus-muted">{{ $line['text'] }}</div>
            @elseif($line['type'] === 'cursor')
                <div class="flex items-center gap-2">
                    <span class="text-nexus-primary">❯</span>
                    <span class="inline-block h-4 w-2 animate-[blink_1s_infinite] bg-nexus-primary"></span>
                </div>
            @endif
        @endforeach
    </div>
</div>
