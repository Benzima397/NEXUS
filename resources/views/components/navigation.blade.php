<header
    x-data="navigation"
    class="fixed top-0 left-0 right-0 z-50 border-b border-nexus-border bg-nexus-bg/80 backdrop-blur-xl"
>
    <nav class="mx-auto flex h-16 max-w-6xl items-center justify-between px-6">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5">
            <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-nexus-primary text-[11px] font-bold text-white">N</span>
            <span class="text-sm font-semibold tracking-tight text-nexus-white">NEXUS</span>
        </a>

        <div class="hidden items-center gap-1 md:flex">
            @foreach(config('nexus.navigation') as $link)
                <a
                    href="{{ route($link['route']) }}"
                    class="rounded-lg px-3 py-2 text-sm font-medium transition-colors duration-200
                        {{ route($link['route']) === request()->url()
                            ? 'text-nexus-white bg-white/[0.06]'
                            : 'text-nexus-muted hover:text-nexus-white hover:bg-white/[0.03]'
                        }}"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>

        <button
            @click="toggle()"
            class="relative z-50 flex h-10 w-10 items-center justify-center rounded-lg text-nexus-muted transition-colors hover:text-nexus-white md:hidden"
            aria-label="Toggle navigation"
        >
            <svg x-show="!open" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-show="open" x-cloak class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </nav>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        x-cloak
        class="absolute inset-x-0 top-16 border-b border-nexus-border bg-nexus-bg/95 backdrop-blur-xl md:hidden"
    >
        <div class="mx-auto max-w-6xl px-6 py-4">
            @foreach(config('nexus.navigation') as $link)
                <a
                    href="{{ route($link['route']) }}"
                    @click="close()"
                    class="block rounded-lg px-3 py-3 text-sm font-medium transition-colors duration-200
                        {{ route($link['route']) === request()->url()
                            ? 'text-nexus-white bg-white/[0.06]'
                            : 'text-nexus-muted hover:text-nexus-white hover:bg-white/[0.03]'
                        }}"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</header>

<div class="h-16"></div>
