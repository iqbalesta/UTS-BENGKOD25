<x-layouts.app title="Edit Obat">
    <!-- Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i> Edit Obat
                            </h3>
                        </div>
                        <form action="{{ route('obat.update', $obat->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_obat" class="form-label">Nama Obat <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('nama_obat') is-invalid @enderror"
                                                id="nama_obat" name="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}"
                                                placeholder="Masukkan nama obat..." required>
                                            @error('nama_obat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kemasan" class="form-label">Kemasan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('kemasan') is-invalid @enderror"
                                                id="kemasan" name="kemasan" value="{{ old('kemasan', $obat->kemasan) }}"
                                                placeholder="Masukkan kemasan..." required>
                                            @error('kemasan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                                id="harga" name="harga" value="{{ old('harga', $obat->harga) }}"
                                                placeholder="Masukkan harga..." min="0" required>
                                            @error('harga')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">
                                    <i class="fas fa-save"></i> Update
                                </button>
                                <a href="{{ route('obat.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>