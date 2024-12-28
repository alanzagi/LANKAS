<x-layout :title="$title">
    @section('page')
        <main class="bg-slate-100 h-screen pt-20 p-4 sm:ml-64 font-poppins">
            <div class="relative overflow-x-auto">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="">
                            <h1 class="text-2xl capitalize">{{ $title }}</h1>
                            <h2 class="text-xl">Rp{{ number_format($pembayaranPerminggu, 0, ',', '.') }} / minggu</h2>
                        </div>
                        <a href="{{ route('siswa') }}"
                            class=" flex items-center justify-center space-x-1 px-4 py-2 rounded bg-blue-500 text-white">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-6 h-6"
                                    fill="#ffffff">
                                    <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                                </svg>
                            </div>
                            <span>Siswa</span>
                        </a>
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
                                placeholder="data siswa...">
                        </div>
                    </div>
                </div>


                <!-- Table -->
                <div class="flex flex-col mt-4">
                    <div id="uangKasTableContainer" class="overflow-auto max-h-[calc(100vh-15rem)] border rounded">
                    </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <div id="editModal" class="hidden fixed inset-0 z-50 items-center justify-center bg-gray-800 bg-opacity-50">
                <div class="bg-white p-6 rounded shadow-lg w-1/3">
                    <h2 class="text-xl font-semibold mb-4">Edit Pembayaran</h2>
                    <form id="editForm">
                        <input type="hidden" id="id_siswa" name="id_siswa">
                        <input type="hidden" id="minggu_ke" name="minggu_ke">
                        <div class="mb-4">
                            <label for="nilai" class="block text-gray-700">Jumlah Bayar</label>
                            <input type="number" id="nilai" name="nilai" class="w-full p-2 border rounded"
                                max="{{ $pembayaranPerminggu }}" required>
                            <small class="text-gray-500">Nilai maksimal:
                                Rp{{ number_format($pembayaranPerminggu, 0, ',', '.') }}</small>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" id="closeModal"
                                class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Batal</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>


            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                function openEditModal(id_siswa, minggu_ke, nilai) {
                    $('#id_siswa').val(id_siswa);
                    $('#minggu_ke').val(minggu_ke);
                    $('#nilai').val(nilai);
                    $('#editModal').removeClass('hidden').addClass('flex');
                }

                $('#closeModal').on('click', function() {
                    $('#editModal').addClass('hidden').removeClass('flex');
                });

                $('#editForm').on('submit', function(e) {
                    e.preventDefault();

                    let id_siswa = $('#id_siswa').val();
                    let minggu_ke = $('#minggu_ke').val();
                    let nilai = $('#nilai').val();
                    let maxNilai = {{ $pembayaranPerminggu }}; // Pastikan ini diambil dari blade

                    if (nilai > maxNilai) {
                        alert('Nilai tidak boleh melebihi ' + maxNilai);
                        return;
                    }

                    $.ajax({
                        url: '{{ route('detailbulanpembayaran.update') }}',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id_siswa: id_siswa,
                            minggu_ke: minggu_ke,
                            nilai: nilai,
                            id_bulan_pembayaran: {{ $bulan->id }},
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                alert('Data berhasil diupdate');
                                location.reload();
                            } else {
                                alert('Gagal mengupdate data');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan saat memperbarui data');
                        }
                    });
                });


                function loadUangKas() {
                    let jumlah = $('#jumlah').val();
                    let search = $('#search').val();

                    $.ajax({
                        url: '{{ route('detailbulanpembayaran.filter', ['id' => $bulan->id]) }}',
                        type: 'GET',
                        data: {
                            jumlah: jumlah,
                            search: search
                        },
                        success: function(data) {
                            $('#uangKasTableContainer').html(data);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan saat memuat data');
                        }
                    });
                }

                // Trigger saat jumlah atau search berubah
                $('#jumlah, #search').on('change keyup', function() {
                    loadUangKas();
                });

                // Load data pertama kali
                loadUangKas();
            </script>
        </main>
    @endsection
</x-layout>
