const backToTopBtn = document.getElementById("backToTopBtn");

window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
        backToTopBtn.classList.remove("opacity-0", "scale-75", "invisible");
        backToTopBtn.classList.add("opacity-100", "scale-100", "visible");
    } else {
        backToTopBtn.classList.remove("opacity-100", "scale-100", "visible");
        backToTopBtn.classList.add("opacity-0", "scale-75", "invisible");
    }
});

backToTopBtn.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});


const faqToggles = document.querySelectorAll('.faq-toggle');

faqToggles.forEach(toggle => {
    toggle.addEventListener('click', () => {
        const parent = toggle.parentElement;
        const content = parent.querySelector('.faq-content');
        const plusIcon = toggle.querySelector('.icon-plus');
        const minusIcon = toggle.querySelector('.icon-minus');
        const isOpen = parent.classList.contains('faq-active');

        // Tutup semua
        document.querySelectorAll('.faq-content').forEach(item => {
            item.style.maxHeight = null;
        });
        document.querySelectorAll('.faq-toggle .icon-plus').forEach(icon => icon.classList.remove('hidden'));
        document.querySelectorAll('.faq-toggle .icon-minus').forEach(icon => icon.classList.add('hidden'));
        document.querySelectorAll('.faq-active').forEach(item => item.classList.remove('faq-active'));

        // Jika belum aktif, buka
        if (!isOpen) {
            parent.classList.add('faq-active');
            content.style.maxHeight = content.scrollHeight + 'px';
            plusIcon.classList.add('hidden');
            minusIcon.classList.remove('hidden');
        }
    });
});
