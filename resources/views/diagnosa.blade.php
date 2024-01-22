@extends('layouts.main')

@section('content')
    @include('partials.nav')
    <div class="mx-12 py-10 px-10 grid gap-2">
        <h1 class="text-2xl w-2/3 font-bold ">
            Cek Diagnosa Anda
        </h1>
        <p class="text-base grid gap-6 w-1/2">
            Dalam 2 minggu terakhir, seberapa sering masalah-masalah berikut ini mengganggu kamu?
            Tidak semua field harus diisi, jadi pastikan untuk memberikan jawaban yang tepat sesuai dengan pengalamanmu.
        </p>
        {{-- @dd($data) --}}
        <form action="{{ route('riwayats') }}" class="grid gap-2" method="POST">
            @csrf
            <div class="grid gap-2 justify-start">
                <h1 class="text-xl w-2/3 font-bold ">
                    1. Apakah anda merasa demam ?
                </h1>
                <div class="container mx-auto flex gap-8 justify-center  px-5 py-3 btn-group">
                    <label class="option">
                        <input type="radio" name="demam" value="0.0" class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md  focus:outline-none bg-yellow"
                            href="">Tidak Tahu
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="demam" value="0.1" class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md focus:outline-none bg-yellow"
                            href="">Mungkin Tidak
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="demam" value="Kemungkinan Besar Tidak" class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md   focus:outline-none bg-yellow"
                            href="">Kemungkinan Besar Tidak
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="demam" value="0.1"  class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md focus:outline-none bg-yellow"
                            href="">Mungkin
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="demam" value="Kemungkinan Besar" class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md  focus:outline-none bg-yellow"
                            href="">Kemungkinan Besar
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="demam" value="Hampir Pasti" class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md  focus:outline-none bg-yellow"
                            href="">Hampir Pasti
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="demam" value="Pasti" class="">
                        <span
                            class="btn-option bg-bg  font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md  focus:outline-none bg-yellow"
                            href="">Pasti
                        </span>
                    </label>

                </div>

            </div>
            <div class="grid gap-2 justify-start">
                <h1 class="text-xl w-2/3 font-bold ">
                    1. Apakah anda merasa mual?
                </h1>
                <div class="container mx-auto flex gap-8 justify-center  px-5 py-3 btn-group">
                    <label class="option">
                        <input type="radio" name="mual" value="0.1"  class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md  focus:outline-none bg-yellow"
                            href="">Tidak Tahu
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="mual" value="0.1"  class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md focus:outline-none bg-yellow"
                            href="">Mungkin Tidak
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="mual" value="0.1"  class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md   focus:outline-none bg-yellow"
                            href="">Kemungkinan Besar Tidak
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="mual" value="0.1"  class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md focus:outline-none bg-yellow"
                            href="">Mungkin
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="mual" value="0.1"  class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md  focus:outline-none bg-yellow"
                            href="">Kemungkinan Besar
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="mual" value="0.1"  class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md  focus:outline-none bg-yellow"
                            href="">Hampir Pasti
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="mual" value="0.1"  class="">
                        <span
                            class="btn-option bg-bg  font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md  focus:outline-none bg-yellow"
                            href="">Pasti
                        </span>
                    </label>

                </div>

            </div>
            <div class="grid gap-2 justify-start">
                <h1 class="text-xl w-2/3 font-bold ">
                    1. Apakah anda merasa pilek ?
                </h1>
                <div class="container mx-auto flex gap-8 justify-center  px-5 py-3 btn-group">
                    <label class="option">
                        <input type="radio" name="pilek" value="0.1"  class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md  focus:outline-none bg-yellow"
                            href="">Tidak Tahu
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="pilek" value="0.1"  class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md focus:outline-none bg-yellow"
                            href="">Mungkin Tidak
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="pilek" value="0.1"  class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md   focus:outline-none bg-yellow"
                            href="">Kemungkinan Besar Tidak
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="pilek" value="0.1"  class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md focus:outline-none bg-yellow"
                            href="">Mungkin
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="pilek" value="0.1"  class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md  focus:outline-none bg-yellow"
                            href="">Kemungkinan Besar
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="pilek" value="0.1"  class="">
                        <span
                            class="btn-option bg-bg font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md  focus:outline-none bg-yellow"
                            href="">Hampir Pasti
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" name="pilek" value="0.1"  class="">
                        <span
                            class="btn-option bg-bg  font-bold text-center text-sm border-2 border-blue-700 py-2 px-2 rounded-md  focus:outline-none bg-yellow"
                            href="">Pasti
                        </span>
                    </label>

                </div>

            </div>
            <div class="">
                @foreach ($data as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
                <button type="submit"
                    class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-5">Submit</button>
            </div>
        </form>
    </div>
    @include('partials.footer')
@endsection
