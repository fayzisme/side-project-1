<div class="grid grid-cols-2 items-center py-16 pb-14 px-10 mb-12">
    <div 
    data-aos="fade-right"
      data-aos-easing="linear"
     data-aos-offset="500"
     data-aos-duration="700"
    class="col-span-1 space-y-6">
        <h1 class="text-5xl  font-bold ">
            Diagnosa
            Rinitis Pada Anak
        </h1>
        <p class="text-base grid gap-6">
            <span>Rinitis pada anak dapat menjadi masalah yang umum dan biasanya tidak serius. Namun, gejala yang
                berkepanjangan atau berat dapat memengaruhi kualitas hidup anak dan memerlukan perhatian medis.</span>
            <span>
                Jika Anda memiliki kekhawatiran tentang kesehatan anak Anda atau jika gejala rinitis berlangsung lama
                atau semakin memburuk, disarankan untuk berkonsultasi dengan dokter atau profesional kesehatan anak
                untuk evaluasi lebih lanjut dan penanganan yang tepat dan anda bisa mengecek kodisi anak anda dalam aplikasi ini.</span>
        </p>
        <button type="button" data-modal-target="informasi" data-modal-toggle="informasi"
        class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm py-2 p-0.5 px-5 text-center ">
        Cek sekarang</button>
    </div>
    <div
    data-aos="fade-left"
      data-aos-easing="linear"
     data-aos-offset="500"
     data-aos-duration="700"
    class="col-span-1 flex justify-end">
        <img src="assets/img/bg-dokter.png" alt="">
    </div>
</div>

<!-- Main modal -->
<div id="informasi" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Isi Identitas Dulls
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="informasi">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="{{ route('simpanData') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="nama" id="email" placeholder="Youre Name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <input type="text" name="alamat" placeholder="Sleman, Yogyakarta"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                        <input type="text" name="umur" placeholder="12"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>

                    <button type="submit"
                        class="w-full mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
