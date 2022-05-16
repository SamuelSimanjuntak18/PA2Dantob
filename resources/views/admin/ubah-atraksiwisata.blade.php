@include('admin.templateadmin.header')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1> UBAH ATRAKSI WISATA </h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin-wisata') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Kelola Atraksi</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('atraksiwisata.ubah', $update->atraksi_id) }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Judul Atraksi </label>
                                        <div class="col-sm-9">

                                            <input type="text" id="judulatrkasi" name="judul"
                                                class="form-control @error('judul') is-invalid @enderror"
                                                value="{{ $update->judul }}">
                                            @error('judul')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Kategori</label>
                                        <div class="col-sm-9">

                                            <select id="id_sampul_atraksi" name="nama_sampul"
                                                class="form-control @error('nama_sampul') is-invalid @enderror">

                                                <!-- {{-- <option value="">Pilih Kategori</option> --}} -->

                                                @foreach ($kategori as $kategories)
                                                    <option value="{{ $kategories->id }}" @if( $kategories->id == $update->id_sampul_atraksi)  selected  @endif>
                                                        {{ $kategories->nama_sampul }}</option>
                                                @endforeach
                                            </select>
                                            @error('nama_sampul')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Gambar Atraksi</label>
                                        <div class="col-sm-9">
                                            <img class="img-preview img-fluid mb-3 col-sm-5" alt=""
                                                src="{{ url('images/Atraksi/' . $update->file_foto) }}">

                                            <div class="custom-file">

                                                <input type="file" class="custom-file-input" id="gambaratraksi"
                                                    onchange="previewImage()" name="file_foto"
                                                    value="{{ $update->file_foto }}">

                                                <label class="custom-file-label" for="customFile">Pilih Gambar</label>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Deskripsi Atraksi</label>
                                    </div>
                                    <div class="mb-3 row">

                                        <textarea class=" form-control @error('deskripsi') is-invalid @enderror" type="text" id="editor"
                                            name="deskripsi" cols="200px"
                                            rows="20">{{ $update->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                    <br><br>
                                    <button type="button" class="btn btn-danger"
                                        onclick="window.location.href='/kelolaatraksi'"><i class="ti-close"></i>
                                        Batal</button>
                                    <button type="submit" class="btn btn-success"><i class="ti-check"></i>
                                        Ubah</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- /# card -->
                </div>
                <!-- /# column -->
        </div>
        <!-- /# row -->

        <script>
            function previewImage() {
                const image = document.querySelector('#gambaratraksi')
                const imgPreview = document.querySelector('.img-preview')
                imgPreview.style.display = 'block';
                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0])
                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script>
        @include('admin.templateadmin.footer')