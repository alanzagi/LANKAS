<x-layout :title="$title">
    @section('page')
        <main class="bg-slate-100 h-screen pt-20 p-4 sm:ml-64 font-poppins">
            <div class="relative overflow-x-auto">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <h1 class="text-2xl">{{ $title }}</h1>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-start space-x-2 mb-4">
                            <label for="jumlah" class="text-sm font-medium text-gray-700">Show</label>
                            <select id="jumlah" name="jumlah" class="p-1 text-sm border rounded">
                                <option value="5" {{ request('jumlah') == 5 ? 'selected' : '' }}>5</option>
                                <option value="20" {{ request('jumlah') == 20 ? 'selected' : '' }}>20</option>
                                <option value="50" {{ request('jumlah') == 50 ? 'selected' : '' }}>50</option>
                            </select>
                        </div>
                        <div class="flex items-center space-x-2 mb-4">
                            <label for="search" class="text-sm font-medium text-gray-700">Cari:</label>
                            <input type="text" id="search" name="search" class="p-1 text-sm border rounded w-40"
                                placeholder="data pengeluaran...">
                        </div>
                    </div>
                </div>
            </div>

            <x-table-riwayat-pengeluaran :riwayatPengeluaran="$riwayatPengeluaran"></x-table-riwayat-pengeluaran>

            <div id="tambahModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md sm:w-1/3">
                    <div class="flex items-center justify-between pb-5">
                        <h3 class="text-xl text-gray-900">Tambah Pengeluaran</h3>
                        <button type="button"
                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center close-modal-btn">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form id="tambahForm">
                        @csrf
                        <div class="mb-4">
                            <label for="jumlah_pengeluaran" class="block text-sm font-medium text-gray-700">Jumlah
                                Pengeluaran</label>
                            <input type="number" placeholder="Rp" id="jumlah_pengeluaran" name="jumlah_pengeluaran"
                                class="mt-1 p-2 border rounded w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" class="mt-1 p-2 border rounded w-full" rows="4" required></textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="button"
                                class="mr-2 bg-gray-500 text-white px-4 py-2 rounded close-modal-btn">Batal</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="editModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md sm:w-1/3">
                    <div class="flex items-center justify-between pb-5">
                        <h3 class="text-xl text-gray-900">Edit Pengeluaran</h3>
                        <button type="button" class="end-2.5 text-gray-400 close-modal-btn">
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form id="editForm">
                        @csrf
                        <div class="mb-4">
                            <label for="edit_jumlah_pengeluaran" class="block text-sm font-medium text-gray-700">Jumlah
                                Pengeluaran</label>
                            <input type="number" id="edit_jumlah_pengeluaran" name="jumlah_pengeluaran"
                                class="mt-1 p-2 border rounded w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="edit_keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea id="edit_keterangan" name="keterangan" class="mt-1 p-2 border rounded w-full" rows="4" required></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="button"
                                class="mr-2 bg-gray-500 text-white px-4 py-2 rounded close-modal-btn">Batal</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    @endsection
</x-layout>
