import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

Alpine.plugin(collapse);

Alpine.data('navigation', () => ({
    open: false,
    toggle() {
        this.open = !this.open;
    },
    close() {
        this.open = false;
    },
}));

Alpine.data('digitalEngineer', () => ({
    messages: [],
    input: '',
    loading: false,
    hasSentMessage: false,

    init() {
        const welcomeEl = document.getElementById('digital-engineer-welcome');
        this.messages.push({
            role: 'assistant',
            content: welcomeEl ? welcomeEl.textContent.trim() : 'Hello, I\'m Benjamin\'s Digital Engineer.',
        });
    },

    async send() {
        const message = this.input.trim();
        if (!message || this.loading) return;

        this.hasSentMessage = true;
        this.messages.push({ role: 'user', content: message });
        this.input = '';
        this.loading = true;

        try {
            const response = await fetch('/api/digital-engineer', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ message }),
            });

            const data = await response.json();
            this.messages.push({ role: 'assistant', content: data.answer || 'I received your message. Full AI integration is coming soon.' });
        } catch {
            this.messages.push({ role: 'assistant', content: 'The Digital Engineer is not yet available. Full AI integration coming soon.' });
        } finally {
            this.loading = false;
            this.$nextTick(() => {
                const container = this.$refs.chatContainer;
                if (container) {
                    container.scrollTop = container.scrollHeight;
                }
            });
        }
    },

    askSuggestion(suggestion) {
        this.input = suggestion;
        this.send();
    },
}));

Alpine.start();
