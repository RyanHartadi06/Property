<div class="container-fluid">
<div class="well well-lg">
    <div class="container">
        <h2>Daftar Rumah</h2>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <div class="col mt-3">
            <?php echo $this->session->flashdata('pesan')?>
        </div>
    <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1 bd-highlight"> 
        <a href="<?php echo site_url('Data_Rumah/add') ?>"
                class="btn btn-sm btn-info btn-icon-split shadow-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text"> Tambah Data Rumah</span>
            </a>   
        </div>
        <div class="p-2 bd-highlight"> <select name="" id="datakategori" class="form-control">
                         <option value="99">Pilih Kategori</option>
                        <?php foreach($kategori as $r){ ?>
                            <option class="dropdown-item" value="<?= $r['id']; ?>"><?= $r['name'];?></option>
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
                        <th>Nama Pemilik</th>
                        <th>Alamat Lengkap</th>
                        <th style="width:50px">Luas Tanah</th>
                        <th style="width:50px">Luas Bangunan</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th> 
                    </tr>
                </thead>
                <tbody id="target"> 
                  
                </tbody>
            </table>
            <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin
                            untuk menghapus?</h5>
                        <button class="close" type="button" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Hapus" untuk menghapus, pilih "Batal"
                        untuk kembali ke Panel Admin.</div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="button"
                            data-dismiss="modal">Batal</button>
                        <a id="delete_link" class="btn btn-danger" href="">Hapus</a>
                    </div>
                </div>
            </div>
            
        </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function confirm_modal(delete_url) {
        $('#hapusModal').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
    }
</script>