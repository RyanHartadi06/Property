<div class="container-fluid">
    <div class="well well-lg">
        <div class="container">
            <h2>Daftar Rumah</h2>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="col mt-3">
                <?php echo $this->session->flashdata('pesan') ?>
            </div>
            <div class="d-flex bd-highlight">
                <div class="p-2 flex-grow-1 bd-highlight">
                    <a href="<?= base_url('Data_Rumah/add') ?>" class="btn btn-sm btn-info btn-icon-split shadow-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text"> Tambah Data Rumah</span>
                    </a>
                </div>
                <div class="p-2 bd-highlight"> <select name="" id="datakategori" class="form-control">
                        <option value="99">Pilih Kategori</option>
                        <?php foreach ($kategori as $r) { ?>
                            <option class="dropdown-item" value="<?= $r['id']; ?>"><?= $r['name']; ?></option>
                        <?php } ?>
                    </select></div>
                <div class="p-2 bd-highlight"> <select name="" id="dataStatus" class="form-control">
                        <option value="3">Pilih Status</option>
                        <option value="1">Tersedia</option>
                        <option value="2">Terjual</option>
                    </select></div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mt-3" id="dataTable">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Nama Pemilik</th>
                            <th>Alamat Lengkap</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th style="width:100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="target">

                    </tbody>
                </table>
                <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin
                                    untuk menghapus?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Pilih "Hapus" untuk menghapus, pilih "Batal"
                                untuk kembali ke Panel Admin.</div>
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" data-dismiss="modal">Batal</button>
                                <a id="delete_link" class="btn btn-danger" href="">Hapus</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
    foreach ($rumah as $r) {
    ?>
        <div class="modal fade" id="editData<?= $r->id_rumah ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered modal-xs">
                <div class="modal-content">
                    <form method="post" action="<?= base_url('Data_Rumah/editStatus') ?>">
                        <div class="modal-header">
                            <h4>Ubah Status Rumah</h4>
                        </div>
                        <div class="modal-body">
                            <p>Pilih Status : </p>
                            <input name="id_rumah" id="id_rumah" value="<?= $r->id_rumah ?>" hidden>
                            <select class="form-control" name="status">
                                <option value="2">Terjual</option>
                                <option value="1">Tersedia</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button class="btn btn-info" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php } ?>
    <script type="text/javascript">
        function confirm_modal(delete_url) {
            $('#hapusModal').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', delete_url);
        }
    </script>