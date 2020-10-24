<div class="container-fluid">
<div class="well well-lg">
    <div class="container">
        <h2>Kategori Rumah</h2>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <div class="col mt-3">
        <?php echo $this->session->flashdata('pesan')?>
    </div>
    <a href="<?php echo site_url('Kategori/add') ?>"
        class="btn btn-sm btn-info btn-icon-split shadow-sm">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Kategori Rumah</span>
    </a>    
</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mt-3" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Logo</th>
                        <th>Aksi</th> 
                    </tr>
                </thead>
                <tbody> 
                <?php 
                    $no = 1;
                    foreach ($dataku as $row){  
                    ?>
                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $row['name']?></td>
                            <td><img src="<?= base_url('uploads/kategori/') . $row['image']; ?>" alt="" srcset="" style="width:120px"></td>
                            <td>
                                <a href="<?php echo base_url("kategori/edit/" .$row['id']);?>"
                                class="btn btn-sm btn-success btn-circle">
                                <i class="fas fa-pen"></i>
                                </a>
                                <a href="<?php echo base_url("kategori/hapus/" .$row['id']);?>"
                                        onclick="confirm_modal('<?php echo 'kategori/hapus/' .$row['id']; ?>')"
                                        class="btn btn-sm btn-danger btn-circle"
                                        data-toggle="modal" data-target="#hapusModal">
                                        <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
                    <!-- //start -->
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
        <!-- //end  -->
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