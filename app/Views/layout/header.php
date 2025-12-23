<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title><?= esc($title ?? 'Layanan Informasi Sumber Daya Air') ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts (Premium & Clean) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom Style -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    <!-- Global Design Tokens -->
    <style>
        :root {
            --primary-dark: #0a1a2f;
            --primary-main: #173f5f;
            --accent: #ff8c1a;
            --bg-light: #ffffff;
            --bg-soft: #f5f8ff;
            --text-dark: #0f172a;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }
    </style>
</head>

<body>
