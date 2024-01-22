@extends('layouts.main')

@section('content')
    @include('partials.nav')
    <div class="mx-12 py-10 px-10 grid gap-12">
        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-1 flex flex-col gap-4">
                <h1 class="text-2xl w-2/3 font-bold ">
                    Apa itu Rinitis Alergi pada Anak?
                </h1>

                <p class="text-base grid gap-6 ">
                    Rinitis pada anak adalah kondisi peradangan yang terjadi pada lapisan dalam hidung (mukosa hidung).
                    Kondisi ini
                    dapat disebabkan oleh berbagai faktor, termasuk infeksi virus, alergi, atau iritasi oleh benda asing
                    atau polusi
                    udara.
                </p>
                <p class="text-base grid gap-6 ">
                    Rhinitis alergi disebabkan oleh reaksi alergi. Kondisi ini menimbulkan beberapa gejala, seperti
                    bersin-bersin, hidung gatal, atau tersumbat. Rhinitis alergi juga dapat menyebabkan kemunculan ruam di
                    kulit, mata merah dan berair, serta sakit tenggorokan maupun tenggorokan gatal dan batuk.
                </p>
                <p class="text-base grid gap-6 ">
                    Rhinitis alergi dapat diperoleh pencegahannya dengan menghindari paparan faktor-faktor pemicunya,
                    seperti debu atau serbuk sari. Jika timbul gejala rhinitis alergi, dokter dapat meresepkan obat
                    antihistamin dan dekongestan guna meredakan gejalanya. Dengan meminimalisir kontak dengan alergen dan
                    menggunakan pengobatan yang sesuai, seseorang dapat mengelola dan mengurangi dampak rhinitis alergi pada
                    kesehariannya.
                </p>
            </div>
            <div class="col-span-1">
                <img src="https://o-cdn-cas.sirclocdn.com/parenting/images/Rhinitis-Alergi-pada-Anak-Hero.width-800.format-webp.webp"
                    alt="">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6">

            <div class="col-span-1 flex flex-col gap-4">
                <h1 class="text-2xl font-bold ">
                    Ada dua jenis rinitis utama pada anak-anak:
                </h1>

                <p class="text-base ">
                    <span class="font-bold">Rinitis Infeksi (Common Cold):</span>
                    Ini adalah jenis rinitis yang paling umum dan disebabkan oleh infeksi
                    virus, seperti virus rhinovirus atau virus lainnya. Gejalanya meliputi hidung tersumbat, pilek, bersin,
                    demam ringan, dan mungkin batuk.
                </p>
                <p class="text-base ">
                    <span class="font-bold">Rinitis Alergi:</span>
                    Ini disebabkan oleh reaksi alergi terhadap alergen tertentu, seperti serbuk sari, bulu
                    hewan, debu rumah, atau spora jamur. Gejala rinitis alergi melibatkan hidung gatal, bersin, hidung
                    tersumbat, dan hidung berair. Kadang-kadang, anak-anak dengan rinitis alergi juga dapat mengalami mata
                    gatal atau air mata, serta gejala alergi lainnya.
                </p>
                <h1 class="text-2xl font-bold ">
                    Gejala Rinitis Alergi
                </h1>

                <p class="text-base ">
                    Banyak hal yang dapat menyebabkan rinitis alergi terjadi. Faktor-faktor yang memicu kondisi ini adalah
                    serbuk sari bunga, debu, bulu binatang, hingga makanan. Hal yang dapat memicu alergi lainnya adalah asap
                    rokok atau asap kendaraan bermotor. Tanda dan gejala rinitis alergi dapat berbeda-beda. Bukan hanya pada
                    hidung, tetapi juga dapat terjadi pada organ lain, seperti tenggorokan, mata, dan juga telinga.
                </p>
                <p class="text-base ">
                    Gejala-gejala yang timbul, di antaranya:
                </p>
                <ul class="text-base grid gap-2 list-disc ms-5">
                    <li>Bersin dan ingus keluar terus-menerus dari hidung.</li>
                    <li>Hidung tersumbat dan gatal.</li>
                    <li>Batuk dan sakit tenggorokan.</li>
                    <li>Mata gatal dan berair.</li>
                    <li>Lingkaran gelap di bawah mata.</li>
                    <li>Sering mengalami sakit kepala.</li>
                    <li>Kelelahan yang berlebih.</li>
                </ul>

            </div>

            <div class="col-span-1 overflow-hidden  flex flex-col gap-8">
                <div class="h-[350px]">
                    <img class=" h-full w-full object-cover object-center"
                        src="https://d2jx2rerrg6sh3.cloudfront.net/images/news/ImageForNews_697674_16377672920464202.jpg"
                        alt="">
                </div>
                {{-- <h1 style=" writing-mode: vertical-lr; ">virus rhinovirus</h1> --}}
                <div class="col-span-1 flex flex-col gap-4">
                    <h1 class="text-2xl w-2/3 font-bold ">
                        Cara Mencegah Rinitis Alergi
                    </h1>

                    <p class="text-base">
                        Ibu dapat mencegah anak dari rinitis alergi dengan mengikuti langkah-langkah berikut:

                        <ol class=" grid gap-2 list-decimal ms-6 ">
                            <li>
                                Menghindari Alergen: Kenali penyebab alergi anak melalui uji kulit dan observasi harian.
                                Hindari paparan terhadap alergen yang telah diidentifikasi.
                            </li>
                            <li>
                                Pola Hidup Sehat: Pastikan anak mendapatkan waktu istirahat yang cukup, menjalani diet sehat,
                                berolahraga secara teratur, dan tinggal di lingkungan yang minim pemicu alergi.
                            </li>
                            <li>
                                Konsultasi dengan Dokter: Jika gejala muncul, konsultasikan dengan dokter. Dokter dapat
                                memberikan obat atau imunoterapi sesuai kebutuhan anak.
                            </li>
                        </ol>
                        Dengan langkah-langkah ini, dapat membantu mencegah dan mengelola rinitis alergi pada anak secara
                        efektif.
                    </p>

                </div>
            </div>
        </div>

    </div>
    </div>
    @include('partials.footer')
@endsection
