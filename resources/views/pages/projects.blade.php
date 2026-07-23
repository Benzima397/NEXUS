<x-layout.app :title="'The Laboratory — ' . config('nexus.title')">
    @php
        $projects = config('nexus.projects');
        $online = collect($projects)->where('status', 'online');
        $inDev = collect($projects)->where('status', 'in_development');
    @endphp

    <section class="py-12 sm:py-20">
        <div class="mx-auto max-w-5xl px-6">
            <x-section-heading
                eyebrow="The Laboratory"
                title="Projects"
                description="Each project is an experiment in building production-grade software systems."
            />

            {{-- Status Legend --}}
            <div class="mb-8 flex flex-wrap items-center gap-4 text-xs text-nexus-dim">
                <span class="font-medium uppercase tracking-wider">Status:</span>
                <div class="flex items-center gap-1.5">
                    <span class="h-2 w-2 rounded-full bg-nexus-success"></span>
                    <span>Online</span>
                    <span class="text-nexus-dim/50">({{ $online->count() }})</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <span class="h-2 w-2 rounded-full bg-nexus-warning"></span>
                    <span>In Development</span>
                    <span class="text-nexus-dim/50">({{ $inDev->count() }})</span>
                </div>
            </div>

            {{-- Online Projects --}}
            @if($online->isNotEmpty())
                <div class="mb-10">
                    <h3 class="mb-4 flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-nexus-success">
                        <span class="h-1.5 w-1.5 rounded-full bg-nexus-success"></span>
                        Online — Production Systems
                    </h3>
                    <div class="space-y-4">
                        @foreach($online as $project)
                            <x-architecture-card :project="$project" />
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- In Development Projects --}}
            @if($inDev->isNotEmpty())
                <div class="mb-10">
                    <h3 class="mb-4 flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-nexus-warning">
                        <span class="h-1.5 w-1.5 rounded-full bg-nexus-warning"></span>
                        In Development — Active Engineering
                    </h3>
                    <div class="space-y-4">
                        @foreach($inDev as $project)
                            <x-architecture-card :project="$project" />
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Closed Projects --}}
            @php
                $closed = collect($projects)->where('status', 'offline');
            @endphp
            @if($closed->isNotEmpty())
                <div>
                    <h3 class="mb-4 flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-nexus-dim">
                        <span class="h-1.5 w-1.5 rounded-full bg-nexus-dim"></span>
                        Archived
                    </h3>
                    <div class="space-y-4">
                        @foreach($closed as $project)
                            <x-architecture-card :project="$project" />
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-layout.app>
