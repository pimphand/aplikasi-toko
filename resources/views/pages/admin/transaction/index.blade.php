@extends('layouts.dashboard', ['title' => 'TRANSACTIONS'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fa fa-shopping-bag"></i> TRANSACTIONS</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.transactions.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <a href="{{ route('admin.transactions.create') }}" class="btn btn-primary btn-sm"
                                        style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                </div>
                                <input type="text" class="form-control" name="q"
                                    placeholder="cari berdasarkan nama transactions">
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
                                    <th scope="col" class="text-center">Order </th>
                                    <th scope="col" class="text-center">Cash</th>
                                    <th scope="col" class="text-center">Transfer</th>
                                    <th scope="col" class="text-center">Ongkos</th>
                                    <th scope="col" class="text-center">Jam Delivery</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Keterangan</th>
                                    <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $no => $transaction)
                                <tr>
                                    <th scope="row" style="text-align: center">
                                        {{ ++$no + ($transactions->currentPage()-1) * $transactions->perPage() }}</th>
                                 
                                </tr>

                                @empty

                                    <tr>
                                        <td colspan="9" class="text-center">
                                            <div class="alert alert-danger">
                                        Product Belum Tersedia!
                                    </div>
                                        </td>
                                    </tr>

                                @endforelse
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$transactions->links("vendor.pagination.bootstrap-4")}}
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
                    url: "{{ route("admin.transactions.index") }}/" + id,
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