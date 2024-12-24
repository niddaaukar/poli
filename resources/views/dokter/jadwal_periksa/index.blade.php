@extends('components.app')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Jadwal Periksa</h1>
        <!-- Wrapper Card -->
        <div class="card shadow">
            <div class="card-header bg-primary">
                <h5 class="mb-0 text-white text-center">Pilih Hari Jadwal Periksa</h5>
            </div>
            <div class="card-body">
                <!-- Nav Pills Horizontal -->
                <ul class="nav nav-pills mt-3 mb-4 d-flex justify-content-start" id="pills-tab" role="tablist">
                    @php
                        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                    @endphp
                    @foreach ($days as $key => $day)
                        <li class="nav-item me-2" role="presentation">
                            <button class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                    id="pills-{{ strtolower($day) }}-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-{{ strtolower($day) }}"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-{{ strtolower($day) }}"
                                    aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                                {{ $day }}
                            </button>
                        </li>
                    @endforeach
                </ul>
                <!-- Tab Content -->
                <div class="tab-content" id="pills-tabContent">
                    @foreach ($days as $key => $day)
                        <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                             id="pills-{{ strtolower($day) }}"
                             role="tabpanel"
                             aria-labelledby="pills-{{ strtolower($day) }}-tab"
                             tabindex="0">
                            <!-- Card untuk Konten Jadwal -->
                            <div class="card mb-3">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">Jadwal Hari {{ $day }}</h6>
                                    <!-- Tombol Tambah Slot -->
                                    <button type="button" class="btn btn-sm btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#addSlotModal"
                                            data-hari="{{ $day }}">
                                       Tambah Jadwal
                                    </button>
                                </div>
                                <div class="card-body">
                                    <!-- Daftar Jadwal -->
                                    <ul class="list-group">
                                        @forelse ($jadwal_periksa->where('hari', $day) as $jadwal)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</span>
                                                <span class="badge {{ $jadwal->is_active ? 'bg-success' : 'bg-danger' }} rounded-circle d-flex justify-content-center align-items-center" style="width: 30px; height: 30px; font-size: 20px;">
                                                    <i class="fa-solid {{ $jadwal->is_active ? 'fa-circle-check' : 'fa-circle-xmark' }}"></i>
                                                </span>
                                                <div class="d-flex">
                                                    <!-- Tombol Aktifkan dan Nonaktifkan -->
                                                    <form action="{{ route('dokter.jadwal_periksa.activate', $jadwal->id) }}" method="POST" class="mx-1">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn btn-sm btn-success" type="submit" {{ $jadwal->is_active ? 'disabled' : '' }}>
                                                            <i class="fa-solid fa-check"></i> Aktifkan
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('dokter.jadwal_periksa.deactivate', $jadwal->id) }}" method="POST" class="mx-1">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn btn-sm btn-danger" type="submit" {{ !$jadwal->is_active ? 'disabled' : '' }}>
                                                            <i class="fa-solid fa-times"></i> Nonaktifkan
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        @empty
                                            <li class="list-group-item text-muted">Belum ada jadwal.</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Modal Tambah Slot -->
        <div class="modal fade" id="addSlotModal" tabindex="-1" aria-labelledby="addSlotModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSlotModalLabel">Tambah Slot Jadwal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('dokter.jadwal_periksa.store') }}">
                            @csrf
                            <input type="hidden" name="id_dokter" value="{{ auth()->guard('dokter')->user()->id }}">
                            <input type="hidden" name="hari" id="hari" value="">

                            <div class="mb-3">
                                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" required>
                            </div>
                            <div class="mb-3">
                                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                <input type="time" class="form-control" name="jam_selesai" id="jam_selesai" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                             Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
