<!DOCTYPE html>
<html lang="en" translate="no" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('lp/css/output.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/0297ba9f6f.js" crossorigin="anonymous"></script>
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <div
        class="decoration absolute -top-20 -left-[280px] w-[475px] h-[475px] rounded-full blur-[200px] bg-primary bg-opacity-25 z-50 pointer-events-none">
    </div>
    <div
        class="decoration absolute top-96 -right-[280px] w-[475px] h-[475px] rounded-full blur-[200px] bg-secondary bg-opacity-25 z-50 pointer-events-none">
    </div>
    <section id="">
        <header>
            <nav class="navbar h-28 w-full fixed left-0 top-0 bg-white z-40">
                <div class="container flex items-center justify-between border-b border-gray-200 outline-none relative">
                    <div class="logo text-3xl max-sm:text-2xl font-bold">e<span class="text-primary">Kamb</span>ing
                    </div>
                    <ul
                        class="nav-menu text-base flex gap-5 max-sm:flex-col max-sm:absolute max-sm:w-full max-sm:h-screen max-sm:top-28 max-sm:pt-10 max-sm:bg-white max-sm:translate-x-full transition-all duration-300 left-[30px] right-[30px]">
                        <a href="#" class="decoration-transparent group">
                            <li class="text-gray-400 relative w-fit active">Beranda
                                <div
                                    class="underline absolute h-[2px] w-[0px] group-hover:w-full bg-primary -bottom-1 transition-all duration-300">
                                </div>
                            </li>
                        </a>
                        <a href="#about" class="decoration-transparent group">
                            <li class="text-gray-400 relative w-fit">Tentang
                                <div
                                    class="underline absolute h-[2px] w-[0px] group-hover:w-full bg-primary -bottom-1 transition-all duration-300">
                                </div>
                            </li>
                        </a>
                        {{-- <a href="pages/" class="decoration-transparent group">
                            <li class="text-gray-400 relative w-fit">Galeri
                                <div
                                    class="underline absolute h-[2px] w-[0px] group-hover:w-full bg-primary -bottom-1 transition-all duration-300">
                                </div>
                            </li>
                        </a> --}}
                        <a href="https://e-kambing.com/blog" class="decoration-transparent group">
                            <li class="text-gray-400 relative w-fit">Berita
                                <div
                                    class="underline absolute h-[2px] w-[0px] group-hover:w-full bg-primary -bottom-1 transition-all duration-300">
                                </div>
                            </li>
                        </a>
                        <a href="{{ route('mobile.index') }}" class="decoration-transparent group">
                            <li class="text-gray-400 relative w-fit">Mobile App
                                <div
                                    class="underline absolute h-[2px] w-[0px] group-hover:w-full bg-primary -bottom-1 transition-all duration-300">
                                </div>
                            </li>
                        </a>
                        <a href="{{ route('statistik.index') }}" class="decoration-transparent group">
                            <li class="text-gray-400 relative w-fit">Statistik
                                <div
                                    class="underline absolute h-[2px] w-[0px] group-hover:w-full bg-primary -bottom-1 transition-all duration-300">
                                </div>
                            </li>
                        </a>
                        <a href="#faq" class="decoration-transparent group">
                            <li class="text-gray-400 relative w-fit">FaQ
                                <div
                                    class="underline absolute h-[2px] w-[0px] group-hover:w-full bg-primary -bottom-1 transition-all duration-300">
                                </div>
                            </li>
                        </a>
                        <a href="{{ route('auth.login') }}" class="py-3 px-7 rounded-lg bg-primary text-sm text-white lg:hidden w-fit">Login</a>
                    </ul>
                    <a href="{{ route('auth.login') }}"
                        class="py-3 px-7 rounded-lg bg-primary text-sm text-white max-sm:hidden">Login</a>
                    <div class="nav-toggle w-12 h-10 rounded-lg bg-primary bg-opacity-20 flex items-center justify-center cursor-pointer hover:bg-opacity-100 transition-all duration-500 group lg:hidden"
                        onclick="showNavbar()"><i
                            class="fa-solid fa-bars text-primary text-xl group-hover:text-white"></i>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 mt-28 items-center py-16 lg:py-20">
                    <div class="max-sm:order-2">
                        <div class="title-banner">
                            <span class="text-primary text-sm font-medium">#SaveChildrenWithUs</span>
                            <h1
                                class="font-bold text-3xl lg:text-[40px] leading-[45px] lg:leading-[60px] uppercase mt-1">
                                Aplikasi <span class="text-primary">Pencegahan</span> dan <span
                                    class="text-primary">Pengelolaan</span> Data Stunting</h1>
                            <p class="text-base text-justify leading-7 mt-1">lorem ipsum is placeholder text commonly
                                used
                                in the graphic, print, and publishing industries for previewing layouts and visual
                                mockups
                            </p>
                            <div class="flex gap-3 mt-4 flex-wrap">
                                <a href="" class="py-3 px-7 rounded-lg bg-primary text-sm text-white">
                                    Login Petugas    
                                </a>
                                
                                <a href="https://e-kambing.com/blog/2023/07/17/cara-install-aplikasi-ekambing-di-android/"
                                    class="py-3 px-7 rounded-lg bg-white text-sm text-primary border border-primary hover:bg-primary hover:text-white transition-all duration-500">
                                    Cara Install Di Android
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="image-banner relative flex justify-end max-sm:mb-10">
                        <img class="mx-auto lg:mx-0 w-3/4 lg:w-4/6 object-cover"
                            src="{{ asset('lp/src/assets/image/Height meter-pana.svg') }}" alt="logo">
                    </div>
                </div>
            </div>
        </header>
    </section>
    <section id="about">
        <div class="container">
            <div class="section-title mt-20 lg:mt-28 text-center lg:w-1/2 lg:mx-auto">
                <p class="uppercase">Layanan Kami</p>
                <h2 class="text-2xl lg:text-3xl font-semibold text-gray-600 mt-2">Solusi Lengkap untuk Pencegahan
                    dan Pengelolaan Stunting</h2>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-10">
                <div
                    class="rounded-lg py-9 px-8 bg-secondary bg-opacity-[.15] min-h-[300px] hover:bg-opacity-100 transition-all duration-500 cursor-pointer group">
                    <div
                        class="w-16 h-16 rounded-lg bg-secondary flex items-center justify-center text-4xl group-hover:bg-white transition-all duration-500">
                        <i class="fa-solid fa-child text-white group-hover:text-secondary"></i>
                    </div>
                    <h3
                        class="mt-5 text-[24px] font-semibold text-gray-600 group-hover:text-white transition-all duration-500">
                        Pendataan Balita</h3>
                    <p
                        class="text-sm mt-2 text-gray-600 leading-[26px] group-hover:text-white transition-all duration-500">
                        Data Bayi di bawah lima tahun yang menjadi sasaran pencegahan stunting</p>
                </div>
                <div
                    class="rounded-lg py-9 px-8 bg-secondary bg-opacity-[.15] min-h-[300px] hover:bg-opacity-100 transition-all duration-500 cursor-pointer group">
                    <div
                        class="w-16 h-16 rounded-lg bg-secondary flex items-center justify-center text-4xl group-hover:bg-white transition-all duration-500">
                        <i class="fa-solid fa-square-root-variable text-white group-hover:text-secondary"></i>
                    </div>
                    <h3
                        class="mt-5 text-[24px] font-semibold text-gray-600 group-hover:text-white transition-all duration-500">
                        Pengukuran</h3>
                    <p
                        class="text-sm mt-2 text-gray-600 leading-[26px] group-hover:text-white transition-all duration-500">
                        Digunakan sebagai media untuk menginput data pengukuran balita untuk pencegahan dan penanganan
                        stunting</p>
                </div>
                <div
                    class="rounded-lg py-9 px-8 bg-secondary bg-opacity-[.15] min-h-[300px] hover:bg-opacity-100 transition-all duration-500 cursor-pointer group">
                    <div
                        class="w-16 h-16 rounded-lg bg-secondary flex items-center justify-center text-4xl group-hover:bg-white transition-all duration-500">
                        <i class="fa-solid fa-child text-white group-hover:text-secondary"></i>
                    </div>
                    <h3
                        class="mt-5 text-[24px] font-semibold text-gray-600 group-hover:text-white transition-all duration-500">
                        Pendataan Balita</h3>
                    <p
                        class="text-sm mt-2 text-gray-600 leading-[26px] group-hover:text-white transition-all duration-500">
                        Data Bayi di bawah lima tahun yang menjadi sasaran pencegahan stunting</p>
                </div>
                <div
                    class="rounded-lg py-9 px-8 bg-secondary bg-opacity-[.15] min-h-[300px] hover:bg-opacity-100 transition-all duration-500 cursor-pointer group">
                    <div
                        class="w-16 h-16 rounded-lg bg-secondary flex items-center justify-center text-4xl group-hover:bg-white transition-all duration-500">
                        <i class="fa-solid fa-child text-white group-hover:text-secondary"></i>
                    </div>
                    <h3
                        class="mt-5 text-[24px] font-semibold text-gray-600 group-hover:text-white transition-all duration-500">
                        Pendataan Balita</h3>
                    <p
                        class="text-sm mt-2 text-gray-600 leading-[26px] group-hover:text-white transition-all duration-500">
                        Data Bayi di bawah lima tahun yang menjadi sasaran pencegahan stunting</p>
                </div>
                <div
                    class="rounded-lg py-9 px-8 bg-secondary bg-opacity-[.15] min-h-[300px] hover:bg-opacity-100 transition-all duration-500 cursor-pointer group">
                    <div
                        class="w-16 h-16 rounded-lg bg-secondary flex items-center justify-center text-4xl group-hover:bg-white transition-all duration-500">
                        <i class="fa-solid fa-child text-white group-hover:text-secondary"></i>
                    </div>
                    <h3
                        class="mt-5 text-[24px] font-semibold text-gray-600 group-hover:text-white transition-all duration-500">
                        Pendataan Balita</h3>
                    <p
                        class="text-sm mt-2 text-gray-600 leading-[26px] group-hover:text-white transition-all duration-500">
                        Data Bayi di bawah lima tahun yang menjadi sasaran pencegahan stunting</p>
                </div>
                <div
                    class="rounded-lg py-9 px-8 bg-secondary bg-opacity-[.15] min-h-[300px] hover:bg-opacity-100 transition-all duration-500 cursor-pointer group">
                    <div
                        class="w-16 h-16 rounded-lg bg-secondary flex items-center justify-center text-4xl group-hover:bg-white transition-all duration-500">
                        <i class="fa-solid fa-child text-white group-hover:text-secondary"></i>
                    </div>
                    <h3
                        class="mt-5 text-[24px] font-semibold text-gray-600 group-hover:text-white transition-all duration-500">
                        Pendataan Balita</h3>
                    <p
                        class="text-sm mt-2 text-gray-600 leading-[26px] group-hover:text-white transition-all duration-500">
                        Data Bayi di bawah lima tahun yang menjadi sasaran pencegahan stunting</p>
                </div>
            </div>
            <div class="section-title mt-20">
                <p class="uppercase">Tentang Kami</p>
                <h2 class="text-2xl lg:text-3xl font-semibold text-gray-600 mt-2">Apa itu E-Kambing?</h2>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 mt-16">
                <div class="img-box relative aspect-[5/3] rounded-lg bg-gray-200 lg:col-span-2">
                    <div
                        class="absolute aspect-square w-32 bg-primary -z-10 -top-4 -left-4 lg:-top-4 lg:-left-4 rounded-lg">
                    </div>
                    <img src="{{ asset('lp/src/assets/image/group-kids-friend-laughing-together 1.png') }}"
                        class="object-cover rounded-lg">
                </div>
                <div class="lg:col-span-3">
                    <p class="text-gray-500 text-justify leading-7">Selamat datang di E-Kambing, solusi terdepan dalam
                        pencegahan dan pencatatan stunting. Kami adalah tim yang berdedikasi untuk menghadapi tantangan
                        serius yang dihadapi anak-anak terkait stunting, dan kami percaya bahwa dengan teknologi yang
                        inovatif, kita dapat membuat perubahan yang positif.
                    </p>
                    <p class="text-gray-500 text-justify leading-7 mt-5">
                        Visi kami adalah menciptakan dunia di mana setiap anak memiliki kesempatan yang adil untuk
                        tumbuh dan berkembang secara optimal. Melalui [Nama Aplikasi Anda], kami berkomitmen untuk
                        memberdayakan orangtua, pengasuh, tenaga medis, peneliti, dan pembuat kebijakan dalam upaya
                        melawan stunting.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="statistic">
        <div class="container">
            <div class="section-title mt-20 lg:mt-28 text-center lg:w-1/2 lg:mx-auto">
                <p class="uppercase">Statistik</p>
                <h2 class="text-2xl lg:text-3xl font-semibold text-gray-600 mt-2">Infografis Data Stunting</h2>
            </div>
            <div class="lg:mx-16 py-10 px-12 rounded-lg bg-white shadow-lg my-14">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-5">
                    <img src="{{ asset('lp/src/assets/image/undraw_growing.svg') }}" alt="">
                    <form action="{{ route('grafik_pengukuran.cariAnak') }}" method="POST">
                        @csrf
                        <h4 class="text-xl lg:text-3xl font-semibold text-primary max-sm:text-center">Pantau Tumbuh
                            Kembang Balita Anda</h4>
                        <input name="nik" type="text"
                            class="rounded-lg border w-full px-3 lg:px-4 h-12 mt-6 text-sm outline-none"
                            placeholder="Masukan NIK Anak">
                        <button class="text-sm text-white bg-primary rounded-lg h-12 px-3 lg:px-4 mt-4 float-right">Cek
                            Grafik</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="program" class="mt-20 lg:mt-28">
        <div class="container">
            <div class="section-title">
                <p class="uppercase">Program Kami</p>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-14">
                    <h2 class="text-2xl lg:text-3xl font-semibold text-gray-600 mt-2">Program-program Penanganan
                        Stunting</h2>
                    <p class="mt-2 text-gray-600">Pemerintah telah banyak mengeluarkan paket kebijakan dan regulasi
                        terkait intervensi stunting. Adapun beberapa program gizi spesifik yang telah dilakukan sebagai
                        berikut:</p>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 mt-[50px] gap-12">
                <div class="bg-primary bg-opacity-[.15] rounded-lg px-10 py-9 min-h-[300px] relative overflow-hidden">
                    <div
                        class="rounded-full w-[200px] h-[200px] bg-primary bg-opacity-40 absolute -bottom-16 -left-12 -z-10">
                    </div>
                    <div class="rounded-full w-[100px] h-[100px] bg-primary bg-opacity-40 absolute -top-5 -right-5">
                    </div>
                    <h3 class="text-gray-600 text-2xl font-semibold">Intervensi Gizi Spesifik</h3>
                    <ol class="flex flex-col gap-[10px] mt-6 font-medium text-sm text-gray-600 list-decimal ml-2">
                        <li>Pemberian Makanan Tambahan bagi ibu hamil</li>
                        <li>Pemberian Tablet Tambah Darah (bumil dan remaja putri)</li>
                        <li>Promosi dan konseling menyusui</li>
                        <li>Promosi dan konseling Pemberian Makan Bayi dan Anak</li>
                    </ol>
                </div>
                <div
                    class="bg-secondary bg-opacity-[.15] rounded-lg px-10 py-9 min-h-[300px] relative overflow-hidden">
                    <div
                        class="rounded-full w-[200px] h-[200px] bg-secondary bg-opacity-40 absolute -bottom-16 -left-12 -z-10">
                    </div>
                    <div class="rounded-full w-[100px] h-[100px] bg-secondary bg-opacity-40 absolute -top-5 -right-5">
                    </div>
                    <h3 class="text-gray-600 text-2xl font-semibold">Intervensi Gizi Sensitif</h3>
                    <ol class="flex flex-col gap-[10px] mt-6 font-medium text-sm text-gray-600 list-decimal ml-2">
                        <li>Program penyehatan lingkungan</li>
                        <li>Akses pelayanan KB, jaminan kesehatan, dan bantuan bagi keluarga miskin</li>
                        <li>Konseling perubahan perilaku bagi orang tua dan anak</li>
                        <li>Penyebarluasan informasi melalui berbagai media</li>
                        <li>Pembentukan Pekarangan Pangan Lestari</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section id="faq" class="mt-24">
        <div class="container">
            <div class="section-title text-center lg:w-1/2 lg:mx-auto">
                <p class="uppercase">FaQ</p>
                <h2 class="text-2xl lg:text-3xl font-semibold text-gray-600 mt-2">Pertanyaan Seputar Stunting</h2>
            </div>
            <div class="lg:mx-32">
                <div class="accordion mt-10">
                    <!-- Accordion Item 1 -->
                    <div class="border-b border-gray-200 outline-none">
                        <button
                            class="flex items-center gap-5 accordion-button text-gray-600 font-medium py-5 w-full text-start bg-white"
                            type="button" data-toggle="accordion-content-1">
                            <div class="ml-4 h-full flex item-center justify-center">
                                <div
                                    class="w-8 aspect-square rounded-full bg-primary flex items-center justify-center">
                                    <i class="fa-solid fa-plus text-white"></i>
                                </div>
                            </div>
                            <p class="flex-grow">Apakah yang dimaksud dengan stunting ?</p>
                        </button>
                        <div id="accordion-content-1"
                            class="accordion-content hidden transition-all duration-300 pt-3 pb-6">
                            <p class="block text-justify ml-[66px]">Stunting adalah kondisi gagal pertumbuhan pada
                                anak-anak yang disebabkan
                                oleh kekurangan gizi yang kronis dan berkelanjutan, biasanya terjadi pada periode 1.000
                                hari pertama kehidupan anak, yaitu mulai dari konsepsi hingga usia dua tahun. Stunting
                                ditandai dengan pertumbuhan tubuh yang terhambat, sehingga tinggi badan anak tidak
                                mencapai potensi genetiknya.
                                <br><br>
                                Stunting adalah kondisi gagal pertumbuhan pada anak-anak yang disebabkan oleh kekurangan
                                gizi yang kronis dan berkelanjutan, biasanya terjadi pada periode 1.000 hari pertama
                                kehidupan anak, yaitu mulai dari konsepsi hingga usia dua tahun. Stunting ditandai
                                dengan pertumbuhan tubuh yang terhambat, sehingga tinggi badan anak tidak mencapai
                                potensi genetiknya.
                            </p>
                        </div>
                    </div>

                    <!-- Accordion Item 2 -->
                    <div class="border-b border-gray-200 outline-none">
                        <button
                            class="flex items-center gap-5 accordion-button text-gray-600 font-medium py-5 w-full text-start bg-white"
                            type="button" data-toggle="accordion-content-2">
                            <div class="ml-4 h-full flex item-center justify-center">
                                <div
                                    class="w-8 aspect-square rounded-full bg-primary flex items-center justify-center">
                                    <i class="fa-solid fa-plus text-white"></i>
                                </div>
                            </div>
                            Apakah anak yang pendek selalu
                            stunting?
                        </button>
                        <div id="accordion-content-2"
                            class="accordion-content hidden transition-all duration-300 pt-3 pb-6">
                            <p class="block text-justify ml-[66px]">Stunting adalah kondisi gagal pertumbuhan pada
                                anak-anak yang disebabkan
                                oleh kekurangan gizi yang kronis dan berkelanjutan, biasanya terjadi pada periode 1.000
                                hari pertama kehidupan anak, yaitu mulai dari konsepsi hingga usia dua tahun. Stunting
                                ditandai dengan pertumbuhan tubuh yang terhambat, sehingga tinggi badan anak tidak
                                mencapai potensi genetiknya.
                                <br><br>
                                Stunting adalah kondisi gagal pertumbuhan pada anak-anak yang disebabkan oleh kekurangan
                                gizi yang kronis dan berkelanjutan, biasanya terjadi pada periode 1.000 hari pertama
                                kehidupan anak, yaitu mulai dari konsepsi hingga usia dua tahun. Stunting ditandai
                                dengan pertumbuhan tubuh yang terhambat, sehingga tinggi badan anak tidak mencapai
                                potensi genetiknya.
                            </p>
                        </div>
                    </div>

                    <!-- Accordion Item 3 -->
                    <div class="border-b border-gray-200 outline-none">
                        <button
                            class="flex items-center gap-5 accordion-button text-gray-600 font-medium py-5 w-full text-start bg-white"
                            type="button" data-toggle="accordion-content-3">
                            <div class="ml-4 h-full flex item-center justify-center">
                                <div
                                    class="w-8 aspect-square rounded-full bg-primary flex items-center justify-center">
                                    <i class="fa-solid fa-plus text-white"></i>
                                </div>
                            </div>
                            Apakah stunting tergolong penyakit?
                        </button>
                        <div id="accordion-content-3"
                            class="accordion-content hidden transition-all duration-300 pt-3 pb-6">
                            <p class="block text-justify ml-[66px]">Stunting adalah kondisi gagal pertumbuhan pada
                                anak-anak yang disebabkan
                                oleh kekurangan gizi yang kronis dan berkelanjutan, biasanya terjadi pada periode 1.000
                                hari pertama kehidupan anak, yaitu mulai dari konsepsi hingga usia dua tahun. Stunting
                                ditandai dengan pertumbuhan tubuh yang terhambat, sehingga tinggi badan anak tidak
                                mencapai potensi genetiknya.
                                <br><br>
                                Stunting adalah kondisi gagal pertumbuhan pada anak-anak yang disebabkan oleh kekurangan
                                gizi yang kronis dan berkelanjutan, biasanya terjadi pada periode 1.000 hari pertama
                                kehidupan anak, yaitu mulai dari konsepsi hingga usia dua tahun. Stunting ditandai
                                dengan pertumbuhan tubuh yang terhambat, sehingga tinggi badan anak tidak mencapai
                                potensi genetiknya.
                            </p>
                        </div>
                    </div>

                    <!-- Accordion Item 4 -->
                    <div class="border-b border-gray-200 outline-none">
                        <button
                            class="flex items-center gap-5 accordion-button text-gray-600 font-medium py-5 w-full text-start bg-white"
                            type="button" data-toggle="accordion-content-4">
                            <div class="ml-4 h-full flex item-center justify-center">
                                <div
                                    class="w-8 aspect-square rounded-full bg-primary flex items-center justify-center">
                                    <i class="fa-solid fa-plus text-white"></i>
                                </div>
                            </div>
                            <p class="flex-grow">Apakah yang menjadi faktor
                                resiko/penyebab stunting sebagai indikasi masalah gizi kronis?</p>
                        </button>
                        <div id="accordion-content-4"
                            class="accordion-content hidden transition-all duration-300 pt-3 pb-6">
                            <p class="block text-justify ml-[66px]">Stunting adalah kondisi gagal pertumbuhan pada
                                anak-anak yang disebabkan
                                oleh kekurangan gizi yang kronis dan berkelanjutan, biasanya terjadi pada periode 1.000
                                hari pertama kehidupan anak, yaitu mulai dari konsepsi hingga usia dua tahun. Stunting
                                ditandai dengan pertumbuhan tubuh yang terhambat, sehingga tinggi badan anak tidak
                                mencapai potensi genetiknya.
                                <br><br>
                                Stunting adalah kondisi gagal pertumbuhan pada anak-anak yang disebabkan oleh kekurangan
                                gizi yang kronis dan berkelanjutan, biasanya terjadi pada periode 1.000 hari pertama
                                kehidupan anak, yaitu mulai dari konsepsi hingga usia dua tahun. Stunting ditandai
                                dengan pertumbuhan tubuh yang terhambat, sehingga tinggi badan anak tidak mencapai
                                potensi genetiknya.
                            </p>
                        </div>
                    </div>

                    <!-- Accordion Item 5 -->
                    <div class="border-b border-gray-200 outline-none">
                        <button
                            class="flex items-center gap-5 accordion-button text-gray-600 font-medium py-5 w-full text-start bg-white"
                            type="button" data-toggle="accordion-content-5">
                            <div class="ml-4 h-full flex item-center justify-center">
                                <div
                                    class="w-8 aspect-square rounded-full bg-primary flex items-center justify-center">
                                    <i class="fa-solid fa-plus text-white"></i>
                                </div>
                            </div>
                            Apa dampak dari masalah gizi kronis
                            selain stunting?
                        </button>
                        <div id="accordion-content-5"
                            class="accordion-content hidden transition-all duration-300 pt-3 pb-6">
                            <p class="block text-justify ml-[66px]">Stunting adalah kondisi gagal pertumbuhan pada
                                anak-anak yang disebabkan
                                oleh kekurangan gizi yang kronis dan berkelanjutan, biasanya terjadi pada periode 1.000
                                hari pertama kehidupan anak, yaitu mulai dari konsepsi hingga usia dua tahun. Stunting
                                ditandai dengan pertumbuhan tubuh yang terhambat, sehingga tinggi badan anak tidak
                                mencapai potensi genetiknya.
                                <br><br>
                                Stunting adalah kondisi gagal pertumbuhan pada anak-anak yang disebabkan oleh kekurangan
                                gizi yang kronis dan berkelanjutan, biasanya terjadi pada periode 1.000 hari pertama
                                kehidupan anak, yaitu mulai dari konsepsi hingga usia dua tahun. Stunting ditandai
                                dengan pertumbuhan tubuh yang terhambat, sehingga tinggi badan anak tidak mencapai
                                potensi genetiknya.
                            </p>
                        </div>
                    </div>

                    <!-- Accordion Item 6 -->
                    <div class="border-b border-gray-200 outline-none">
                        <button
                            class="flex items-center gap-5 accordion-button text-gray-600 font-medium py-5 w-full text-start bg-white"
                            type="button" data-toggle="accordion-content-6">
                            <div class="ml-4 h-full flex item-center justify-center">
                                <div
                                    class="w-8 aspect-square rounded-full bg-primary flex items-center justify-center">
                                    <i class="fa-solid fa-plus text-white"></i>
                                </div>
                            </div>
                            Apakah stunting dapat dicegah atau
                            dikoreksi?
                        </button>
                        <div id="accordion-content-6"
                            class="accordion-content hidden transition-all duration-300 pt-3 pb-6">
                            <p class="block text-justify ml-[66px]">Stunting adalah kondisi gagal pertumbuhan pada
                                anak-anak yang disebabkan
                                oleh kekurangan gizi yang kronis dan berkelanjutan, biasanya terjadi pada periode 1.000
                                hari pertama kehidupan anak, yaitu mulai dari konsepsi hingga usia dua tahun. Stunting
                                ditandai dengan pertumbuhan tubuh yang terhambat, sehingga tinggi badan anak tidak
                                mencapai potensi genetiknya.
                                <br><br>
                                Stunting adalah kondisi gagal pertumbuhan pada anak-anak yang disebabkan oleh kekurangan
                                gizi yang kronis dan berkelanjutan, biasanya terjadi pada periode 1.000 hari pertama
                                kehidupan anak, yaitu mulai dari konsepsi hingga usia dua tahun. Stunting ditandai
                                dengan pertumbuhan tubuh yang terhambat, sehingga tinggi badan anak tidak mencapai
                                potensi genetiknya.
                            </p>
                        </div>
                    </div>

                    <!-- Accordion Item 7 -->
                    <div class="border-b border-gray-200 outline-none">
                        <button
                            class="flex items-center gap-5 accordion-button text-gray-600 font-medium py-5 w-full text-start bg-white"
                            type="button" data-toggle="accordion-content-7">
                            <div class="ml-4 h-full flex item-center justify-center">
                                <div
                                    class="w-8 aspect-square rounded-full bg-primary flex items-center justify-center">
                                    <i class="fa-solid fa-plus text-white"></i>
                                </div>
                            </div>
                            Apakah 5 (lima) Pilar pencegahan
                            stunting?
                        </button>
                        <div id="accordion-content-7"
                            class="accordion-content hidden transition-all duration-300 pt-3 pb-6">
                            <p class="block text-justify ml-[66px]">Stunting adalah kondisi gagal pertumbuhan pada
                                anak-anak yang disebabkan
                                oleh kekurangan gizi yang kronis dan berkelanjutan, biasanya terjadi pada periode 1.000
                                hari pertama kehidupan anak, yaitu mulai dari konsepsi hingga usia dua tahun. Stunting
                                ditandai dengan pertumbuhan tubuh yang terhambat, sehingga tinggi badan anak tidak
                                mencapai potensi genetiknya.
                                <br><br>
                                Stunting adalah kondisi gagal pertumbuhan pada anak-anak yang disebabkan oleh kekurangan
                                gizi yang kronis dan berkelanjutan, biasanya terjadi pada periode 1.000 hari pertama
                                kehidupan anak, yaitu mulai dari konsepsi hingga usia dua tahun. Stunting ditandai
                                dengan pertumbuhan tubuh yang terhambat, sehingga tinggi badan anak tidak mencapai
                                potensi genetiknya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-gray-600 mt-24">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 py-14 border-b border-gray-300">
                <div>
                    <div class="logo text-3xl max-sm:text-2xl text-white font-bold">e<span
                            class="text-primary">Kamb</span>ing</div>
                    <p class="text-sm text-white font-medium mt-2 w-[300px] text-opacity-80">solusi terdepan dalam
                        pencegahan dan pencatatan
                        stunting</p>
                    {{-- <a href="" class="relative block overflow-hidden mt-4 w-[160px] h-fit">
                        <img src="{{ asset('lp/src/assets/image/new-get-it-on-google-play-png-logo-20.png') }}"
                            class="w-full object-cover">
                    </a> --}}
                </div>
                <div>
                    <p class="text-white font-medium">Didukung oleh;</p>
                    <div class="grid grid-cols-6 gap-3 lg:gap-6 mt-5">
                        <a href="" class="bg-white bg-opacity-20 rounded-lg aspect-square overflow-hidden"></a>
                        <a href="" class="bg-white bg-opacity-20 rounded-lg aspect-square overflow-hidden"></a>
                        <a href="" class="bg-white bg-opacity-20 rounded-lg aspect-square overflow-hidden"></a>
                        <a href="" class="bg-white bg-opacity-20 rounded-lg aspect-square overflow-hidden"></a>
                        <a href="" class="bg-white bg-opacity-20 rounded-lg aspect-square overflow-hidden"></a>
                        <a href="" class="bg-white bg-opacity-20 rounded-lg aspect-square overflow-hidden"></a>
                    </div>
                </div>
            </div>
            <div class="py-9">
                <p class="text-xs text-white font-medium">©Copyright 2023 Nusa Agency. All Rights Reserved</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('lp/src/js/app.js') }}"></script>
</body>

</html>
