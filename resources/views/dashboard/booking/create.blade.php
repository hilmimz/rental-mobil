@extends('layouts.dashboard')

@section('content')
  <!-- Table -->
  <div class="container mt-3 d-flex justify-content-center">
    <div class="card rounded-3" style="width: 1100px;">
      <div class="card-header mw-100 h-100 text-center btn-secondary rounded-3 shadow-lg">
        <h2 class="mt-0 mb-0" style="color: #fff; font-size: 22px;"><b>Silahkan Isi Data Berikut</b></h2>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('booking.store') }}">
          {{-- <input type="hidden" value="{{ $nomor }}" name="nomor"> --}}
          @csrf

          <div class="mb-3 mt-4 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Invoice :</label>
            <div class="col-sm-10">
              <input type="text" name="no_invoice" class="form-control" id="no_invoice"
                placeholder="Masukkan Nomor Invoice" autocomplete="off" value="{{ old('no_invoice') }}">
            </div>
            @error('no_invoice')
            <div class="col-sm-2"></div>
            <div class="text-danger col-sm-10">
              {{ $message }}
            </div>
             @enderror
          </div>


          <div class="mb-3 mt-4 row">
            <label for="pelanggan_id" class="col-sm-2 col-form-label">Pelanggan</label>
            <div class="col-sm-10">
              <select class="form-control" name="pelanggan_id" id="pelanggan_id">
                <option {{ (old('pelanggan_id')) ? '' : 'selected'  }} value="">Pilih Pelanggan</option>
                @foreach ($pelanggans as $pelanggan)
                  <option {{ (old('pelanggan_id') == $pelanggan->id) ? 'selected' : ''  }} value="{{ $pelanggan->getKey() }}">{{ $pelanggan->nama }}</option>
                @endforeach
              </select>
            </div>
            @error('pelanggan_id')
            <div class="col-sm-2"></div>
            <div class="text-danger col-sm-10">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="mb-3 mt-4 row">
            <label for="" class="col-sm-2 col-form-label">Tgl Transaksi :</label>
            <div class="col-sm-10">
              <input type="text" name="tgl_transaksi" class="form-control" id="tgl_transaksi"
                placeholder="Format: TTTT-BB-HH, contoh: 2022-01-02" autocomplete="off" value="{{ old('tgl_transaksi') }}">
            </div>
            @error('tgl_transaksi')
            <div class="col-sm-2"></div>
            <div class="text-danger col-sm-10">
              {{ $message }}
            </div>
             @enderror
          </div>


         
          {{-- <div class="mb-3 mt-4 row">
            <label for="" class="col-sm-2 col-form-label">Harga Total:</label>
            <div class="col-sm-10">
              <input type="number" name="harga_total" class="form-control" id="harga_total"
                placeholder="Masukkan Harga Total" autocomplete="off" value="{{ old('harga_total') }}">
            </div>
            @error('harga_total')
            <div class="col-sm-2"></div>
            <div class="text-danger col-sm-10">
              {{ $message }}
            </div>
             @enderror
          </div> --}}


          {{-- <div class="mb-3 mt-4 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Status :</label>
            <div class="col-sm-10">
            <select class="form-select  @error('status') is-invalid @enderror" aria-label="Default select example" name="status">
              <option @if(!old('status')) selected @endif >Pilih Status</option>
              <option @if(old('status') == "Lunas") selected @endif value="Lunas">Lunas</option>
              <option @if(old('status') == "Belum Lunas") selected @endif value="Belum Lunas">Belum Lunas</option>
              </select>
            </div>
            @error('status')
            <div class="col-sm-2"></div>
            <div class="text-danger col-sm-10">
              {{ $message }}
            </div>
             @enderror
          </div> --}}


          <div class="mb-3 mt-4 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Keterangan :</label>
            <div class="col-sm-10">
              <input type="text" name="keterangan" class="form-control" id="keterangan"
                placeholder="Masukkan Keterangan" autocomplete="off" value="{{ old('keterangan') }}" >
            </div>
            @error('keterangan')
            <div class="col-sm-2"></div>
            <div class="text-danger col-sm-10">
              {{ $message }}
            </div>
             @enderror
          </div>

          <div class="mb-3 row mt-4">
            <div class="col">
              <button type="submit" name="aksi" value="tambah" class="btn btn-primary">
                Submit
              </button>
              <a href="{{ route('booking.index') }}" type="button" class="btn btn-danger">
                Cancel
              </a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- End Table -->
@endsection
