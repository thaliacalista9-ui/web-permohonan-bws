<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
AOS.init({ duration: 900, once: true, offset: 80 });

const nav = document.getElementById('navbarKaledo');
window.addEventListener('scroll', () => {
    nav.classList.toggle('navbar-kaledo-scrolled', window.scrollY > 80);
});
</script>

</body>
</html>