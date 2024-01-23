@extends('layouts.main')

@section('content')
    @include('partials.nav')
    <div class="mx-12 py-10 px-10 grid gap-12">

        <!-- List Group -->
        <ul class="mt-3 flex flex-col w-1/2 mx-auto border rounded-lg p-2 shadow-md ">
            <li
                class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-semibold  text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:-gray-700 dark:text-gray-200">
                <div class="flex items-center justify-between w-full">
                    <span>Diagnosa ID </span>
                    <span>$2kj4h23jkh42b4h</span>
                </div>
            </li>
            <li
                class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-semibold  text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-slate-800 dark:-gray-700 dark:text-gray-200">
                <div class="flex items-center justify-between w-full">
                    <span>Nama Penyakit</span>
                    <span>Rinitis Infeksi (Common Cold)</span>
                </div>
            </li>
            <li
                class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-semibold  text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:-gray-700 dark:text-gray-200">
                <div class="flex items-center justify-between w-full">

                    <span>Presntase CF</span>
                    <span>78%</span>
                </div>
            </li>

        </ul>
        <!-- End List Group -->

        <div class=" gap-6 mx-auto w-1/2">
            <h1 class="pb-6 font-semibold text-base">Nilai gejala</h1>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-start whitespace-nowrap">
                                <span
                                    class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                    #
                                </span>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                Gejala (Pakar)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nilai (Pakar)
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                Gejala (User)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nilai (User)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="h-px w-px whitespace-nowrap px-6 py-3">
                                <button type="button" class="flex items-center gap-x-2">
                                    <svg class="flex-shrink-0 w-4 h-4 text-gray-800 dark:text-white"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                    </svg>
                                    <span class="text-sm text-gray-800 dark:text-gray-200">1</span>
                                </button>
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                G1 P1
                            </th>
                            <td class="px-6 py-4 ">
                                0.1
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                G1 P1
                            </th>
                            <td class="px-6 py-4 ">
                                0.6
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        {{-- Tabel hasil --}}

        <div class="flex flex-col gap-6 mx-auto w-1/2">

            <h1 class=" font-semibold text-base">Result</h1>

            <div class=" overflow-x-auto shadow-md sm:rounded-lg w-full ">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800 w-1/2">
                                Rinitis Infeksi (Common Cold)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nilai CF
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 ">

                            </td>
                            <td class="px-6 py-4 ">
                                0.3
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                0.9
                            </th>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class=" overflow-x-auto shadow-md sm:rounded-lg w-full">
                <div
                    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">P1 | P1</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                        Berdasarkan hasil diagnosa dengan menggunakan metode Certainty Factor, kesimpulannya adalah bahwa
                        pasien didiagnosis mengalami <span>Rinitis Infeksi (Common Cold)</span> dengan tingkat kepastian :
                    </p>
                    <p href="#" class="inline-flex items-center text-lg text-blue-600 ">
                        98,35%
                    </p>
                </div>
            </div>

            <div class=" overflow-x-auto shadow-md sm:rounded-lg w-full flex flex-col gap-6 ">
                <div
                    class="flex flex-col w-full items-center bg-white border border-gray-200 rounded-lg shadow   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full  h-auto"
                        src="https://d2jx2rerrg6sh3.cloudfront.net/images/news/ImageForNews_697674_16377672920464202.jpg"
                        alt="">
                    <div class="flex flex-col justify-between p-6 pb-0 leading-normal">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Tentang Rinitis
                        </h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            Rinitis pada anak adalah kondisi peradangan yang terjadi pada lapisan dalam hidung (mukosa
                            hidung). Kondisi ini dapat disebabkan oleh berbagai faktor, termasuk infeksi virus, alergi, atau
                            iritasi oleh benda asing atau polusi udara.
                        </p>
                    </div>
                    <div class="flex flex-col justify-between pt-0 mb-4 p-6 leading-normal">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Cara Mencegah Rinitis Alergi
                        </h5>

                        <p class="text-base">
                            Ibu dapat mencegah anak dari rinitis alergi dengan mengikuti langkah-langkah berikut:

                        <ol class=" grid gap-2 list-decimal ms-6 ">
                            <li>
                                Menghindari Alergen: Kenali penyebab alergi anak melalui uji kulit dan observasi harian.
                                Hindari paparan terhadap alergen yang telah diidentifikasi.
                            </li>
                            <li>
                                Pola Hidup Sehat: Pastikan anak mendapatkan waktu istirahat yang cukup, menjalani diet
                                sehat,
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

        <div class="flex flex-col gap-6 mx-auto w-1/2">
            <a href="landingPage"
                class="text-white w-1/4 bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm py-2 p-0.5 px-5 text-center ">
                Kembali</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "SuccesFuly",
                text: "",
            });
        </script>
    @endif

    @include('partials.footer')
@endsection
