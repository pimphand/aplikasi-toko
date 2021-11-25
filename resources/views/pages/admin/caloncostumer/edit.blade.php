@extends('layouts.dashboard', ['title' => 'COSTUMERS'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-user"></i> EDIT CALON COSTUMER</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.calonCostumers.update',$costumer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                       

                        <div class="form-group">
                            <label>NAMA </label>
                            <select name="costumer_id" class="form-control" >
                                <option value="{{ $costumer->costumer->id }}">{{ $costumer->costumer->name }}</option>
                                    
                            </select>
                        </div>

                       <div class="form-group">
                            <label>Tanggal Masuk </label>
                            <input type="date" name="tanggalMasuk" value="{{ old('tanggalMasuk',$costumer->tanggalMasuk) }}" 
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
                                <option value="PFU" {{ $costumer->status == "PFU" ? "selected" : ''}}>PFU</option>
                                <option value="MPHL" {{ $costumer->status == "MPHL" ? "selected" : ''}}>MPHL</option>
                                <option value="RO" {{ $costumer->status == "RO" ? "selected" : ''}}>RO</option>
                                <option value="C" {{ $costumer->status == "C" ? "selected" : ''}}>C</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label>Taksiran </label>
                            <select name="taksiran" class="form-control" >
                                <option value="FB" {{ $costumer->taksiran == "FB" ? "selected" : ''}}>FB</option>
                                <option value="BFB" {{ $costumer->taksiran == "BFB" ? "selected" : ''}}>BFB</option>
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control alamat @error('keterangan') is-invalid @enderror" name="keterangan" rows="6"
                                placeholder="Keterangan...">{{ old('keterangan',$costumer->keterangan) }}</textarea>

                            @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        
                        <div class="form-group">
                            <label>Tanggal Closing </label>
                            <input type="date" name="tanggalKeluar" value="{{ old('tanggalKeluar',$costumer->tanggalKeluar) }}" 
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