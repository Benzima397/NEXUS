<x-layout.app :title="'The Control Center — ' . config('nexus.title')">
    @php
        $contact = config('nexus.contact');
    @endphp

    <section class="py-12 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-5xl px-6">
            <x-section-heading
                eyebrow="The Control Center"
                title="Contact"
                description="{{ $contact['message'] }}"
            />

            <div class="grid gap-8 lg:grid-cols-5">
                {{-- Channels Panel --}}
                <div class="lg:col-span-2">
                    <div class="glass rounded-2xl p-6">
                        <h3 class="mb-4 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Communication Channels</h3>
                        <div class="space-y-3">
                            @foreach(config('nexus.channels') as $channel)
                                <x-channel-card
                                    :name="$channel['name']"
                                    :description="$channel['description']"
                                    :url="$channel['url']"
                                    :status="$channel['status']"
                                    :type="$channel['type']"
                                    :external="$channel['type'] === 'external'"
                                />
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-6 glass rounded-2xl p-6">
                        <h3 class="mb-4 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Availability</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-nexus-muted">Status</span>
                                <x-status-badge status="online" />
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-nexus-muted">Response Time</span>
                                <span class="text-xs text-nexus-white">Within 24 hours</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-nexus-muted">Preferred Channel</span>
                                <span class="text-xs text-nexus-white">Email</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Transmission Form --}}
                <div class="lg:col-span-3">
                    @if(session('success'))
                        <div class="mb-6 rounded-xl border border-nexus-success/20 bg-nexus-success/5 p-4 text-sm text-nexus-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="glass rounded-2xl p-6">
                        <h3 class="mb-5 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Send Transmission</h3>
                        <form method="POST" action="{{ route('contact') }}" class="space-y-5">
                            @csrf

                            <div class="grid gap-5 sm:grid-cols-2">
                                <div>
                                    <label for="name" class="mb-1.5 block text-xs font-medium text-nexus-muted">Identifier</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                        class="w-full rounded-xl border border-nexus-border bg-nexus-bg px-4 py-3 text-sm text-nexus-white placeholder-nexus-dim outline-none transition-colors focus:border-nexus-primary/50 focus:ring-1 focus:ring-nexus-primary/30"
                                        placeholder="Your name">
                                    @error('name') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label for="email" class="mb-1.5 block text-xs font-medium text-nexus-muted">Return Address</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                        class="w-full rounded-xl border border-nexus-border bg-nexus-bg px-4 py-3 text-sm text-nexus-white placeholder-nexus-dim outline-none transition-colors focus:border-nexus-primary/50 focus:ring-1 focus:ring-nexus-primary/30"
                                        placeholder="your@email.com">
                                    @error('email') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div>
                                <label for="subject" class="mb-1.5 block text-xs font-medium text-nexus-muted">Subject Line</label>
                                <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                                    class="w-full rounded-xl border border-nexus-border bg-nexus-bg px-4 py-3 text-sm text-nexus-white placeholder-nexus-dim outline-none transition-colors focus:border-nexus-primary/50 focus:ring-1 focus:ring-nexus-primary/30"
                                    placeholder="What is this about?">
                                @error('subject') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="message" class="mb-1.5 block text-xs font-medium text-nexus-muted">Payload</label>
                                <textarea id="message" name="message" rows="5" required
                                    class="w-full resize-none rounded-xl border border-nexus-border bg-nexus-bg px-4 py-3 text-sm text-nexus-white placeholder-nexus-dim outline-none transition-colors focus:border-nexus-primary/50 focus:ring-1 focus:ring-nexus-primary/30"
                                    placeholder="Your message...">{{ old('message') }}</textarea>
                                @error('message') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                            </div>

                            <button type="submit" class="w-full rounded-xl bg-nexus-primary px-6 py-3 text-sm font-semibold text-white transition-all duration-300 hover:bg-nexus-primary-hover hover:shadow-lg hover:shadow-nexus-primary/20">
                                Transmit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout.app>
