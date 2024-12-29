<x-layout :title="$title">
    @section('page')
        <main class="bg-slate-100 h-screen pt-20 p-4 sm:ml-64 font-poppins">
            <div class="relative overflow-x-auto">
                <div class="space-y-4">
                    <form action="{{ route('laporan.print') }}" method="POST">
                        @csrf
                        <div class="flex flex-col space-y-4 max-w-sm">
                            <div
                                class="flex flex-col space-y-4 border-2 border-blue-600 p-4 rounded-lg hover:border-blue-800">
                                <h1 class="text-2xl">{{ $title }} Pemasukan</h1>
                                <div class="flex items-center space-x-4">
                                    <label for="bulan">Pilih Bulan:</label>
                                    <select name="bulan" id="bulan" class="capitalize" required>
                                        @foreach ($bulanPembayaran as $bulan)
                                            <option value="{{ $bulan->id }}">{{ $bulan->nama_bulan }} |
                                                {{ $bulan->tahun }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div
                                class="flex flex-col space-y-4 border-2 border-blue-600 p-4 rounded-lg hover:border-blue-800">
                                <h1 class="text-2xl">{{ $title }} Pengeluaran</h1>
                                <div>
                                    <label for="start_date">Dari Tanggal:</label>
                                    <input type="date" name="start_date" id="start_date">
                                </div>
                                <div>
                                    <label for="end_date">Sampai Tanggal:</label>
                                    <input type="date" name="end_date" id="end_date">
                                </div>
                            </div>
                            <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center justify-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ffffff"
                                    class="h-5 w-5">
                                    <path
                                        d="M640-640v-120H320v120h-80v-200h480v200h-80Zm-480 80h640-640Zm560 100q17 0 28.5-11.5T760-500q0-17-11.5-28.5T720-540q-17 0-28.5 11.5T680-500q0 17 11.5 28.5T720-460Zm-80 260v-160H320v160h320Zm80 80H240v-160H80v-240q0-51 35-85.5t85-34.5h560q51 0 85.5 34.5T880-520v240H720v160Zm80-240v-160q0-17-11.5-28.5T760-560H200q-17 0-28.5 11.5T160-520v160h80v-80h480v80h80Z" />
                                </svg>
                                <div>Print Berkas Laporan</div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    @endsection
</x-layout>
