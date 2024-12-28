<x-layout :title="$title">
    @section('page')
        <main class="bg-slate-100 h-screen pt-20 p-4 sm:ml-64 font-poppins">
            <div class="relative overflow-x-auto">
                <div class="space-y-4">
                    <div class="flex items-center justify-between space-x-4">
                        <h1 class="text-2xl">{{ $title }}</h1>
                        <button
                            class="tambah-btn flex items-center justify-center space-x-1 px-4 py-2 rounded bg-blue-500 text-white">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-6 h-6" fill="#ffffff">
                                    <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                                </svg>
                            </div>
                            <span>Pengeluaran</span>
                        </button>
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

            <x-table-pengeluaran :pengeluaran="$pengeluaran"></x-table-pengeluaran>

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


            <script>
                $(document).ready(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    // Menampilkan modal tambah pengeluaran
                    $(document).on('click', '.tambah-btn', function() {
                        $('#tambahModal').removeClass('hidden').addClass('flex');
                    });

                    // Menambahkan data pengeluaran dari modal tambah pengeluaran ke tabel pengeluaran
                    $('#tambahForm').submit(function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: '{{ route('pengeluaran.store') }}',
                            method: 'POST',
                            data: $(this).serialize(),
                            success: function(response) {
                                alert(response.success);
                                closeModal();
                                location.reload();
                            },
                            error: function(xhr) {
                                alert('Gagal menyimpan pengeluaran');
                            }
                        });
                    });

                    // menampilkan modal edit pengeluaran
                    $(document).on('click', '.edit-btn', function() {
                        let id = $(this).data('id');
                        let jumlah_pengeluaran = $(this).data('jumlah_pengeluaran');
                        let keterangan = $(this).data('keterangan');

                        // Set values in edit modal
                        $('#edit_jumlah_pengeluaran').val(jumlah_pengeluaran);
                        $('#edit_keterangan').val(keterangan);

                        // Store ID in the modal for easy access during submit
                        $('#editModal').data('id', id).removeClass('hidden').addClass('flex');
                    });

                    // Mengedit data pengeluaran dari modal edit pengeluaran ke tabel pengeluaran
                    $('#editForm').on('submit', function(e) {
                        e.preventDefault();

                        // Retrieve ID and form data
                        let id = $('#editModal').data('id');
                        let formData = {
                            jumlah_pengeluaran: $('#edit_jumlah_pengeluaran').val(),
                            keterangan: $('#edit_keterangan').val(),
                            _token: '{{ csrf_token() }}'
                        };

                        // AJAX request for updating
                        $.ajax({
                            url: `/pengeluaran/${id}`,
                            type: 'PATCH',
                            data: formData,
                            success: function(response) {
                                alert('Data pengeluaran berhasil diperbarui!');
                                location.reload();
                            },
                            error: function() {
                                alert('Terjadi kesalahan. Silakan coba lagi.');
                            }
                        });
                    });

                    // Menampilkan alert hapus pengeluaran sekaligus menghapus data pengeluaran
                    $(document).on('click', '.hapus-btn', function() {
                        let id = $(this).data('id');

                        if (confirm('Apakah Anda yakin ingin menghapus pengeluaran ini?')) {
                            $.ajax({
                                url: `/pengeluaran/${id}`,
                                type: 'DELETE',
                                success: function(response) {
                                    alert(response.message);
                                    location.reload();
                                },
                                error: function() {
                                    alert('Terjadi kesalahan. Pengeluaran tidak dapat dihapus.');
                                }
                            });
                        }
                    });

                    // Menutup modal saat tombol batal atau close diklik
                    $(document).on('click', '.close-modal-btn', closeModal);

                    // Fungsi yang digunakan untuk menutup modal
                    function closeModal() {
                        $('#editModal, #tambahModal').addClass('hidden').removeClass('flex');
                        $('#editForm')[0].reset(); // Reset form edit siswa
                        $('#tambahForm')[0].reset(); // Reset form tambah siswa
                    }
                });
            </script>
        </main>
    @endsection
</x-layout>
