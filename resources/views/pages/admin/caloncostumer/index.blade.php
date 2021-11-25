@extends('layouts.dashboard', ['title' => 'COSTUMERS'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fa fa-shopping-bag"></i> CALON COSTUMERS</h6>
                </div>

                <div class="card-body">
                    *Note <br>
                    PFU &nbsp; &nbsp;&nbsp;= Perlu Follow Up
                    <br>
                    MHPL = Mendekati Hari Perkiraan Lahir
                    <br>
                    RO  &nbsp;&nbsp;&nbsp;&nbsp; = Repeat Order
                    <br>
                    C  &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;  = Close
                    <form action="{{ route('admin.calonCostumers.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <a href="{{ route('admin.calonCostumers.create') }}" class="btn btn-primary btn-sm"
                                        style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                </div>
                                <input type="text" class="form-control" value="{{ request()->q }}" name="q"
                                    placeholder="cari berdasarkan nama costumers">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                    <th scope="col" class="text-center">Nama </th>
                                    <th scope="col" class="text-center"> Tanggal Masuk</th>
                                    <th scope="col" class="text-center">Tanggal Close</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Taksiran</th>
                                    <th scope="col" class="text-center">Keterangan</th>
                                    
                                    <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($calonCostumers as $no => $costumer)
                                <tr>
                                    <th scope="row" style="text-align: center">
                                        {{ ++$no + ($calonCostumers->currentPage()-1) * $calonCostumers->perPage() }}</th>
                                    <td class="text-center"> {{ $costumer->costumer->name }}</td>
                                    <td class="text-center"> {{ $costumer->tanggalMasuk }}</td>
                                    <td class="text-center"> {{ $costumer->tanggalKeluar ?? "-" }}</td>
                                    <td class="text-center"> {{ $costumer->status }}</td>
                                    <td class="text-center"> {{ $costumer->taksiran }}</td>
                                    <td class="text-center"> {!! $costumer->keterangan !!}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.calonCostumers.edit', $costumer->id) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>

                                        <button onClick="Delete(this.id)" class="btn btn-sm btn-danger"
                                            id="{{ $costumer->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                @empty

                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <div class="alert alert-danger">
                                       Calon Costumers Belum Tersedia!
                                    </div>
                                        </td>
                                    </tr>

                                @endforelse
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$calonCostumers->links("vendor.pagination.bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script>
    //ajax delete
    function Delete(id) {
        var id = id;
        var token = $("meta[name='csrf-token']").attr("content");

        swal({
            title: "APAKAH KAMU YAKIN ?",
            text: "INGIN MENGHAPUS DATA INI!",
            icon: "warning",
            buttons: [
                'TIDAK',
                'YA'
            ],
            dangerMode: true,
        }).then(function (isConfirm) {
            if (isConfirm) {

                //ajax delete
                jQuery.ajax({
                    url: "{{ route("admin.calonCostumers.index") }}/" + id,
                    data: {
                        "id": id,
                        "_token": token
                    },
                    type: 'DELETE',
                    success: function (response) {
                        if (response.status == "success") {
                            swal({
                                title: 'BERHASIL!',
                                text: 'DATA BERHASIL DIHAPUS!',
                                icon: 'success',
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            swal({
                                title: 'GAGAL!',
                                text: 'DATA GAGAL DIHAPUS!',
                                icon: 'error',
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function () {
                                location.reload();
                            });
                        }
                    }
                });

            } else {
                return true;
            }
        })
    }
</script>
@endsection