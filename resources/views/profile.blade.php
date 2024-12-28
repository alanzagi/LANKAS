<x-layout :title="$title">
    @section('page')
        <main class="bg-slate-100 pt-20 p-4 sm:ml-64 font-poppins h-screen">
            <section class="space-y-2">
                <div>
                    <h1 class="text-2xl text-gray-900">{{ $title }}</h1>
                </div>
                <ul class="bg-white rounded-lg shadow-md p-2">
                    <li class="border-b border-slate-100 p-2 text-sm">
                        Nama: {{ $user->name }}
                    </li>
                    <li class="p-2 text-sm">
                        Email: {{ $user->email }}
                    </li>
                </ul>

                <div class="flex items-center space-x-2">
                    <button data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                        class="flex items-center justify-center gap-x-1 bg-[#218838] px-2.5 py-2 rounded-lg hover:bg-green-600 transition duration-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ffffff" class="w-5 h-5">
                            <path
                                d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                        </svg>
                        <p class="text-sm text-white">Ubah</p>
                    </button>

                    <div id="edit-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow">
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                    <h3 class="text-xl text-gray-900">
                                        Ubah Profil
                                    </h3>
                                    <button type="button"
                                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="edit-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <div class="p-4 md:p-5">
                                    @if (session('success'))
                                        <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <form class="space-y-4 -mt-4" action="{{ route('profile.update') }}" method="POST">
                                        @csrf
                                        <div>
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                            <input type="text" name="name" id="name"
                                                value="{{ old('name', Auth::user()->name) }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                                required />
                                        </div>

                                        <div>
                                            <label for="email"
                                                class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                            <input type="email" name="email" id="email"
                                                value="{{ old('email', Auth::user()->email) }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                                required />
                                        </div>

                                        <div class="flex justify-end">
                                            <button type="button" class="mr-2 bg-gray-500 text-white px-4 py-2 rounded"
                                                data-modal-hide="edit-modal">Batal</button>
                                            <button type="submit"
                                                class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button data-modal-target="changepassword-modal" data-modal-toggle="changepassword-modal"
                        class="flex items-center justify-center gap-x-1 bg-red-600 px-2.5 py-2 rounded-lg hover:bg-red-700 transition duration-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ffffff" class="w-5 h-5">
                            <path
                                d="M80-200v-80h800v80H80Zm46-242-52-30 34-60H40v-60h68l-34-58 52-30 34 58 34-58 52 30-34 58h68v60h-68l34 60-52 30-34-60-34 60Zm320 0-52-30 34-60h-68v-60h68l-34-58 52-30 34 58 34-58 52 30-34 58h68v60h-68l34 60-52 30-34-60-34 60Zm320 0-52-30 34-60h-68v-60h68l-34-58 52-30 34 58 34-58 52 30-34 58h68v60h-68l34 60-52 30-34-60-34 60Z" />
                        </svg>
                        <p class="text-sm text-white">Ganti Kata Sandi</p>
                    </button>

                    <div id="changepassword-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow">
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                    <h3 class="text-xl text-gray-900">
                                        Ganti Kata Sandi
                                    </h3>
                                    <button type="button"
                                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="changepassword-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <div class="p-4 md:p-5">
                                    <form class="space-y-4 -mt-4" action="{{ route('profile.updatepassword') }}"
                                        method="POST">
                                        @csrf

                                        <div>
                                            <label for="old_password"
                                                class="block mb-2 text-sm font-medium text-gray-900">Kata Sandi Lama</label>
                                            <input type="password" name="old_password" id="old_password"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 pr-16"
                                                value="{{ old('old_password') }}" required />
                                            @error('old_password')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="new_password"
                                                class="block mb-2 text-sm font-medium text-gray-900">Kata Sandi
                                                Baru</label>
                                            <input type="password" name="new_password" id="new_password"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                                value="{{ old('new_password') }}" required />
                                            @error('new_password')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="flex justify-end">
                                            <button type="button" class="mr-2 bg-gray-500 text-white px-4 py-2 rounded"
                                                data-modal-hide="changepassword-modal">Batal</button>
                                            <button type="submit"
                                                class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    @endsection
</x-layout>
