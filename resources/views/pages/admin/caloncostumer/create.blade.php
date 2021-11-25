@extends('layouts.dashboard', ['title' => 'COSTUMERS'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-user"></i> TAMBAH CALON COSTUMER</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.calonCostumers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                       

                        <div class="form-group">
                            <label>NAMA </label>
                            <select name="costumer_id" class="form-control" >
                                @foreach ($costumer as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    
                                @endforeach
                            </select>
                        </div>

                       <div class="form-group">
                            <label>Tanggal Masuk </label>
                            <input type="date" name="tanggalMasuk" value="{{ old('tanggalMasuk') }}" placeholder="Masukkan No Handphone"
                                class="form-control @error('tanggalMasuk') is-invalid @enderror">

                            @error('tanggalMasuk')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Status </label>
                            <select name="status" class="form-control" >
                                <option value="PFU">PFU</option>
                                <option value="MPHL">MPHL</option>
                                <option value="RO">RO</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label>Taksiran </label>
                            <select name="taksiran" class="form-control" >
                                <option value="FB">FB</option>
                                <option value="BFB">BFB</option>
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control alamat @error('keterangan') is-invalid @enderror" name="keterangan" rows="6"
                                placeholder="Keterangan...">{{ old('keterangan') }}</textarea>

                            @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        
                        <div class="form-group">
                            <label>Tanggal Closing </label>
                            <input type="date" name="tanggalKeluar" value="{{ old('tanggalKeluar') }}" 
                                class="form-control @error('tanggalKeluar') is-invalid @enderror">

                            
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