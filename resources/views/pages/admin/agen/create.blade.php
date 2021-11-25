@extends('layouts.dashboard', ['title' => 'COSTUMERS'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-user"></i> TAMBAH AGEN</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.agens.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label>No Handpone </label>
                            <input type="number" name="phone" value="{{ old('phone') }}" placeholder="Masukkan No Handphone"
                                class="form-control @error('phone') is-invalid @enderror">

                            @error('phone')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin </label>
                            <select name="jk" class="form-control" >
                                <option value="0">Perempuan</option>
                                <option value="1">Laki Laki</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control alamat @error('alamat') is-invalid @enderror" name="alamat" rows="6"
                                placeholder="Alamat...">{{ old('alamat') }}</textarea>

                            @error('alamat')
                            <div class="invalid-feedback">
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