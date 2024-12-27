@extends('components.app')
@push('title')
    <title>Detail Periksa</title>
@endpush
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/select2/select2-bootstrap-5-theme.min.css') }}">
@endpush
@section('content')
    <!-- Detail Periksa -->
    <section id="detail-periksa">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h3>Detail Periksa</h3>
                        </div>
                        <div class="card-body pt-0">
                            @include('components.alert')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row pb-3 mx-1">
                                        <label for="nama" class="col-form-label">Nama Pasien</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" id="nama" value="{{ old('nama', $daftarpoli->pasien->nama) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3 mx-1">
                                        <label for="tgl_periksa" class="col-form-label">Tanggal Periksa</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control @error('tgl_periksa') is-invalid @enderror"
                                                name="tgl_periksa" id="tgl_periksa" value="{{ old('tgl_periksa', $daftarpoli->tgl_periksa) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3 mx-1">
                                        <label for="keluhan" class="col-form-label">Keluhan</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control @error('keluhan') is-invalid @enderror"
                                                name="keluhan" id="keluhan" readonly>{{ old('keluhan', $daftarpoli->keluhan) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{ route('dokter.periksa.store', $daftarpoli->id) }}" method="POST">
                                        @csrf
                                        <div class="form-group row pb-3 mx-1">
                                            <label for="catatan" class="col-form-label">Catatan</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control @error('catatan') is-invalid @enderror"
                                                    name="catatan" id="catatan" required>{{ old('catatan', $periksa ? $periksa->catatan : '') }}</textarea>
                                            </div>
                                        </div>                                      
                                        <div class="form-group row pb-3 mx-1">
                                            <label for="biaya_periksa" class="col-form-label">Biaya Periksa</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control @error('biaya_periksa') is-invalid @enderror" 
                                                    name="biaya_periksa" id="biaya_periksa" readonly>
                                            </div>
                                        </div>         
                                        <div class="form-group row pb-3 mx-1">
                                            <label for="obat" class="col-form-label">Obat</label>
                                            <div class="col-sm-12">
                                                <select class="form-control select2 @error('obat') is-invalid @enderror" name="obat[]" id="obat" multiple>
                                                    @foreach ($obats as $obat)
                                                        <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}"
                                                            {{ in_array($obat->id, $daftarObat) ? 'selected' : '' }}>
                                                            {{ $obat->nama_obat }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('obat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div> 
                                        <div class="d-flex justify-content-end mt-4">
                                             <a href="{{ route('dokter.periksa.index') }}" class="btn btn-secondary me-4" >
                                                Batal
                                            </a>
                                            <button type="submit" class="btn btn-primary me-4">
                                                Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/vendor/select2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#obat').select2({
                placeholder: "Pilih Obat",
                width: '100%',
                theme: 'bootstrap-5'
            });

            function hitungTotalHarga() {
                let totalHarga = 150000;
                $('#obat').find('option:selected').each(function () {
                    let harga = $(this).data('harga');
                    totalHarga += parseFloat(harga);
                });

                let formattedTotal = formatRibuan(totalHarga);
                $('#biaya_periksa').val(formattedTotal);
            }

            function formatRibuan(angka) {
                return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }

            $('#obat').on('change', function () {
                hitungTotalHarga();
            });

            hitungTotalHarga();
        });
    </script>
@endpush
