@extends('layouts.dashboard', ['title' => 'COSTUMERS'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas shopping-bag"></i> TAMBAH PRODUK</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                       

                        <div class="form-group">
                            <label>NAMA </label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama"
                                class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                       <div class="form-group">
                            <label>Jumlah Domba </label>
                            <input type="number" name="jumlahDomba" value="{{ old('jumlahDomba') }}" placeholder="Masukkan Jumlah"
                                class="form-control @error('jumlahDomba') is-invalid @enderror">

                            @error('jumlahDomba')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                         <div class="form-group">
                            <label>Type </label>
                            <select name="type" class="form-control" >
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis </label>
                            <select name="jenis" class="form-control" >
                                <option value="Jantan">Jantan</option>
                                <option value="Betina">Betina</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jumlah Box </label>
                            <input type="number" name="jumlahBox" value="{{ old('jumlahBox') }}" placeholder="Masukkan Jumlah"
                                class="form-control @error('jumlahBox') is-invalid @enderror">

                            @error('jumlahBox')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jumlah Sate </label>
                            <input type="number" name="jumlahSate" value="{{ old('jumlahSate') }}" placeholder="Masukkan Jumlah"
                                class="form-control @error('jumlahSate') is-invalid @enderror">

                            @error('jumlahSate')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Menu</label>
                            <textarea class="form-control alamat @error('menu') is-invalid @enderror" name="menu" rows="6"
                                placeholder="Masukan menu...">{{ old('menu') }}</textarea>

                            @error('menu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Harga </label>
                            <input type="number" name="harga" value="{{ old('harga') }}" placeholder="Masukkan Harga Product"
                                class="form-control @error('harga') is-invalid @enderror">

                            @error('harga')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                            SIMPAN</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.8.2/tinymce.min.js"></script>

<script>
    var editor_config = {
        selector: "textarea.alamat",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
    };

    tinymce.init(editor_config);
</script>

@endsection