import './bootstrap';
import Alpine from 'alpinejs';

window.portfolioNav = () => ({
    open: false,
    scrolled: false,
    active: 'home',
    items: [
        { id: 'home', label: 'Home' }, { id: 'projects', label: 'Projects' },
        { id: 'about', label: 'About' }, { id: 'services', label: 'Services' },
        { id: 'skills', label: 'Skills' }, { id: 'contact', label: 'Contact' },
    ],
    init() {
        const updateScroll = () => { this.scrolled = window.scrollY > 16; };
        updateScroll();
        window.addEventListener('scroll', updateScroll, { passive: true });
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => { if (entry.isIntersecting) this.active = entry.target.id; });
        }, { rootMargin: '-30% 0px -60% 0px' });
        this.items.forEach(({ id }) => { const section = document.getElementById(id); if (section) observer.observe(section); });
    },
});

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const revealItems = document.querySelectorAll('[data-reveal]');
    if (reducedMotion) revealItems.forEach((item) => item.classList.add('is-visible'));
    else {
        const revealObserver = new IntersectionObserver((entries, observer) => entries.forEach((entry) => {
            if (entry.isIntersecting) { entry.target.classList.add('is-visible'); observer.unobserve(entry.target); }
        }), { threshold: 0.12 });
        revealItems.forEach((item) => revealObserver.observe(item));
    }

    const typing = document.getElementById('typing-text');
    if (!typing || reducedMotion) return;
    const words = JSON.parse(typing.dataset.text); let word = 0; let char = words[0].length; let deleting = true;
    const tick = () => {
        const current = words[word]; char += deleting ? -1 : 1; typing.textContent = current.slice(0, char);
        let delay = deleting ? 45 : 75;
        if (!deleting && char === current.length) { deleting = true; delay = 1400; }
        if (deleting && char === 0) { deleting = false; word = (word + 1) % words.length; delay = 250; }
        window.setTimeout(tick, delay);
    };
    window.setTimeout(tick, 1200);
});
