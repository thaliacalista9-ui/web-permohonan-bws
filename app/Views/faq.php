<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ | Sistem Permohonan Data - BWS Sumatera V</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background:#f7f9fc;
    }

    /* NAVBAR */
    .navbar-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 9999;
    }
    .navbar-top-strip {
        height: 6px;
        background: linear-gradient(90deg, #f0c400, #ffe892, #f0c400);
        width: 100%;
    }
    .navbar {
        background: rgba(10, 42, 67, 0.92);
        backdrop-filter: blur(8px);
        transition: all .35s ease-in-out;
        transform: translateY(-70px);
        opacity: 0;
    }
    .navbar.nav-animate {
        transform: translateY(0);
        opacity: 1;
    }
    .navbar-scrolled {
        background: rgba(10, 42, 67, 1) !important;
        box-shadow: 0 6px 25px rgba(0,0,0,.18);
    }
    .navbar .nav-link {
        color: white !important;
        font-weight: 500;
        position: relative;
        padding: 10px 16px;
        transition: .3s;
    }
    .navbar .nav-link:hover {
        color: #f0c400 !important;
    }

    /* underline hover */
    .navbar .nav-link::after {
        content: "";
        position: absolute;
        width: 0;
        height: 2px;
        background: #f0c400;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        transition: .3s;
    }
    .navbar .nav-link:hover::after {
        width: 70%;
    }

    .navbar-brand {
        font-weight: 800;
        color: #f0c400 !important;
    }

    /* FAQ HEADER */
    .faq-header {
        margin-top: 130px;
        text-align: center;
        padding: 50px 20px 20px;
    }
    .faq-header h2 {
        color: #0A2A43;
        font-weight: 800;
        font-size: 42px;
    }
    .faq-header p {
        font-size: 18px;
        color: #444;
    }

    /* ACCORDION STYLE */
    .accordion-button {
        font-weight: 600;
        padding: 18px;
        font-size: 17px;
        background:white;
        border-radius:10px !important;
    }
    .accordion-button:not(.collapsed) {
        background:#f0c400;
        color:#000;
        box-shadow:none;
    }
    .accordion-item {
        border: none;
        margin-bottom: 18px;
        border-radius: 14px;
        box-shadow: 0 6px 20px rgba(0,0,0,.05);
    }
    .accordion-body {
        font-size: 15px;
        line-height: 1.7;
        background:white;
        border-radius: 0 0 14px 14px;
    }

    footer {
        background:#0A2A43;
        color:white;
        padding:60px 0 30px;
        margin-top:100px;
    }
    footer hr {
        border-color:#355670;
    }

    .floating-wa {
        position:fixed;
        bottom:25px;
        right:25px;
        background:#25D366;
        padding:14px 22px;
        border-radius:50px;
        color:white;
        text-decoration:none;
        font-weight:700;
        box-shadow:0 4px 20px rgba(0,0,0,.25);
    }
</style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar-wrapper">
    <div class="navbar-top-strip"></div>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <img src="/img/logo.png" height="50" class="me-3">
            <a class="navbar-brand">SISTEM PERMOHONAN DATA</a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="/" class="nav-link">Beranda</a></li>
                    <li class="nav-item"><a href="/permohonan" class="nav-link">Permohonan</a></li>
                    <li class="nav-item"><a href="/tracking" class="nav-link">Tracking</a></li>
                    <li class="nav-item"><a href="/grafik" class="nav-link">Grafik</a></li>
                    <li class="nav-item"><a href="/faq" class="nav-link">FAQ</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- FAQ HEADER -->
<div class="faq-header" data-aos="fade-down">
    <h2>Frequently Asked Questions (FAQ)</h2>
    <p>Pertanyaan yang paling sering diajukan terkait layanan permohonan data.</p>
</div>

<!-- FAQ CONTENT -->
<div class="container pb-5">
    <div class="accordion" id="faqAccordion">

        <!-- 1 -->
        <div class="accordion-item" data-aos="fade-up">
            <h2 class="accordion-header">
                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq1">
                    Apakah seluruh informasi publik bisa diakses oleh masyarakat?
                </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    Tidak. Informasi publik dibagi menjadi beberapa kategori, termasuk informasi yang wajib diumumkan, informasi yang tersedia setiap saat, dan informasi yang dikecualikan sesuai peraturan perundang-undangan.
                </div>
            </div>
        </div>

        <!-- 2 -->
        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq2">
                    Berapa lama pemohon menerima pemberitahuan atas permohonan data?
                </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse">
                <div class="accordion-body">
                    Pemberitahuan diberikan paling lambat 10 hari kerja setelah permohonan diterima, dan dapat diperpanjang 7 hari kerja jika diperlukan.
                </div>
            </div>
        </div>

        <!-- 3 -->
        <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq3">
                    Apakah layanan permohonan data dikenakan biaya?
                </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse">
                <div class="accordion-body">
                    Layanan informasi publik tidak dipungut biaya, kecuali biaya penggandaan atau pengiriman dokumen jika diperlukan.
                </div>
            </div>
        </div>

        <!-- 4 -->
        <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq4">
                    Mengapa permohonan data saya ditolak?
                </button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse">
                <div class="accordion-body">
                    Penolakan dapat terjadi jika dokumen tidak lengkap, data termasuk kategori dikecualikan, atau permohonan tidak sesuai dengan ketentuan perundang-undangan.
                </div>
            </div>
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer>
    <div class="container">
        <hr>
        <div class="text-center pt-3">2025 © BWS Sumatera V – Sistem Layanan Informasi SDA</div>
    </div>
</footer>

<a class="floating-wa" href="https://wa.me/xxxx" target="_blank">💬 Chat Admin</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init({ duration: 900, once:true });

window.addEventListener("load", () => {
    document.querySelector('.navbar').classList.add('nav-animate');
});
window.addEventListener('scroll', () => {
    const nav = document.querySelector('.navbar');
    if (window.scrollY > 80) nav.classList.add('navbar-scrolled');
    else nav.classList.remove('navbar-scrolled');
});
</script>

</body>
</html>
