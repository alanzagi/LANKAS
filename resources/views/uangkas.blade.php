<x-layout :title="$title">
    @section('page')
        <main class="bg-slate-100 pt-20 p-4 sm:ml-64 font-poppins min-h-screen">
            <div class="space-y-2">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl">{{ $title }}</h1>
                    <button
                        class="tambah-btn flex items-center justify-center space-x-1 px-4 py-2 rounded bg-blue-500 text-white">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-6 h-6" fill="#ffffff">
                                <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                            </svg>
                        </div>
                        <span class="flex items-center space-x-1">
                            <span>Bulan</span>
                            <span class="hidden md:block">Pembayaran</span>
                        </span>
                    </button>
                </div>

                <div class="space-y-2">
                    <div>
                        <h2 class="text-md">Pilih Bulan Pembayaran</h2>
                    </div>

                    <div class="grid grid-cols-1 gap-y-6 lg:grid-cols-4 lg:gap-x-6">
                        @foreach ($bulanPembayaran as $bulan)
                            <div class="flex flex-col p-6 bg-white rounded-lg max-w-lg">
                                <span class="text-xl text-gray-900 mb-2">{{ ucfirst($bulan->nama_bulan) }}</span>
                                <span class="text-sm text-gray-500 mb-2">{{ $bulan->tahun }}</span>
                                <span
                                    class="text-sm text-gray-900 mb-4">Rp{{ number_format($bulan->pembayaran_perminggu, 0, ',', '.') }}
                                    / minggu</span>

                                <div class="text-sm text-gray-900 mb-4 lg:flex lg:flex-col lg:space-y-2">
                                    <span>Total Uang Kas Bulan Ini:</span>
                                    <span class="p-2 bg-green-700 rounded text-white lg:w-24 text-center">
                                        Rp{{ number_format($bulan->total_uang_kas, 0, ',', '.') }}
                                    </span>
                                </div>

                                <div class="flex items-center justify-start space-x-2">
                                    <form action="{{ route('detailbulanpembayaran', ['id' => $bulan->id]) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="bg-sky-600 h-10 w-12 flex items-center justify-center rounded-lg hover:bg-sky-700 transition duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ffffff"
                                                class="h-6 w-6">
                                                <path
                                                    d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                                            </svg>
                                        </button>
                                    </form>

                                    <button
                                        class="btn-hapus bg-red-600 h-10 w-12 flex items-center justify-center rounded-lg hover:bg-red-700 transition duration-300"
                                        data-id="{{ $bulan->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ffffff"
                                            class="w-6 h-6">
                                            <path
                                                d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>

        <div class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center p-4" id="tambahBulanModal">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md sm:w-1/3">
                <div class="flex items-center justify-between pb-5">
                    <h3 class="text-xl text-gray-900">Tambah Bulan Pembayaran</h3>
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
                <form id="form-tambah-bulan">
                    @csrf
                    <div class="flex items-center justify-between">
                        <div class="mb-4 space-y-2">
                            <label for="nama_bulan" class="block text-sm font-medium text-gray-700">Nama Bulan</label>
                            <select id="nama_bulan" name="nama_bulan" required>
                                <option value="januari">Januari</option>
                                <option value="februari">Februari</option>
                                <option value="maret">Maret</option>
                                <option value="april">April</option>
                                <option value="mei">Mei</option>
                                <option value="juni">Juni</option>
                                <option value="juli">Juli</option>
                                <option value="agustus">Agustus</option>
                                <option value="september">September</option>
                                <option value="oktober">Oktober</option>
                                <option value="november">November</option>
                                <option value="desember">Desember</option>
                            </select>
                        </div>

                        <div class="mb-4 space-y-2">
                            <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                            <input type="number" id="tahun" name="tahun" value="{{ date('Y') }}" required>
                        </div>
                    </div>

                    <div class="mb-4 space-y-2">
                        <label for="pembayaran_perminggu" class="block text-sm font-medium text-gray-700">Pembayaran
                            Perminggu</label>
                        <input type="number" id="pembayaran_perminggu" name="pembayaran_perminggu"
                            class="mt-1 p-2 border rounded w-full" placeholder="Rp" required>
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
                // Toggle Modal
                $('.tambah-btn').on('click', function() {
                    $('#tambahBulanModal').removeClass('hidden').addClass('flex');
                });

                $('.close-modal-btn').on('click', function() {
                    $('#tambahBulanModal').addClass('hidden').removeClass('flex');
                });

                // AJAX Form Submission
                $('#form-tambah-bulan').on('submit', function(e) {
                    e.preventDefault();

                    let formData = {
                        _token: $('input[name="_token"]').val(),
                        nama_bulan: $('#nama_bulan').val(),
                        tahun: $('#tahun').val(),
                        pembayaran_perminggu: $('#pembayaran_perminggu').val()
                    };

                    $.ajax({
                        url: "{{ route('uangkas.store') }}",
                        type: "POST",
                        data: formData,
                        success: function(response) {
                            alert('Bulan pembayaran berhasil ditambahkan!');
                            $('#tambahBulanModal').addClass('hidden');
                            location.reload(); // Optionally reload to reflect changes
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            alert('Terjadi kesalahan, silakan coba lagi.');
                        }
                    });
                });

                $('.btn-hapus').on('click', function(e) {
                    e.preventDefault(); // Mencegah reload halaman

                    let id = $(this).data('id'); // Ambil ID dari tombol yang ditekan
                    let url = "{{ route('uangkas.destroy', ':id') }}".replace(':id', id);

                    if (confirm('Apakah Anda yakin ingin menghapus bulan pembayaran ini?')) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                alert(response.success); // Tampilkan pesan sukses
                                location.reload(); // Reload halaman untuk memperbarui tampilan
                            },
                            error: function(xhr) {
                                console.error(xhr.responseText); // Debug jika ada error
                                alert('Terjadi kesalahan. Data gagal dihapus.');
                            }
                        });
                    }
                });
            });
        </script>
    @endsection
</x-layout>
