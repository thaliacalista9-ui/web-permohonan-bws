<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<!-- PAGE HEADER -->
<section class="page-header">
    <div class="container container-compact">
        <h1>Frequently Asked Questions</h1>
        <p>
            Pertanyaan yang paling sering diajukan terkait layanan
            permohonan data.
        </p>
    </div>
</section>

<main class="content-offset bg-soft py-5">
    <div class="container container-compact">

        <!-- CARD UTAMA -->
        <div class="card-premium">

            <div class="accordion" id="faqAccordion">

                <!-- 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            Apakah seluruh informasi publik bisa diakses oleh masyarakat?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            Tidak. Informasi publik dibagi menjadi beberapa kategori,
                            termasuk informasi yang wajib diumumkan, informasi yang
                            tersedia setiap saat, dan informasi yang dikecualikan
                            sesuai peraturan perundang-undangan.
                        </div>
                    </div>
                </div>

                <!-- 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Berapa lama pemohon menerima pemberitahuan atas permohonan data?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Pemberitahuan diberikan paling lambat 10 hari kerja setelah
                            permohonan diterima, dan dapat diperpanjang 7 hari kerja
                            jika diperlukan.
                        </div>
                    </div>
                </div>

                <!-- 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq3">
                            Apakah layanan permohonan data dikenakan biaya?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Layanan informasi publik tidak dipungut biaya,
                            kecuali biaya penggandaan atau pengiriman dokumen
                            jika diperlukan.
                        </div>
                    </div>
                </div>

                <!-- 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq4">
                            Mengapa permohonan data saya ditolak?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Penolakan dapat terjadi jika dokumen tidak lengkap,
                            data termasuk kategori dikecualikan, atau permohonan
                            tidak sesuai dengan ketentuan perundang-undangan.
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</main>

<?= $this->include('layout/footer') ?>
