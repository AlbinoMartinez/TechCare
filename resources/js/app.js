import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

/**
 * First-Party Privacy-Preserving Event Tracker
 */
window.trackTechCareEvent = function(eventName, metadata = {}) {
    try {
        fetch('/api/track-event', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            },
            body: JSON.stringify({ event_name: eventName, metadata: metadata })
        }).catch(() => {});
    } catch (e) {
        // fail silently without affecting user experience
    }
};

document.addEventListener('DOMContentLoaded', () => {
    // Automatically track any clicks on WhatsApp action buttons/links
    document.querySelectorAll('a[href*="wa.me"]').forEach(link => {
        link.addEventListener('click', () => {
            window.trackTechCareEvent('wa_click', {
                target: link.innerText.trim() || 'WhatsApp CTA',
                href: link.getAttribute('href')
            });
        });
    });
});
