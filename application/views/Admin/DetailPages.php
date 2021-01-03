  <!-- Begin Page Content -->
  <div class="container-fluid">

<form method="post" enctype="multipart/form-data">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Rumah</h1>
 
    <div class="card shadow mb-4">
    
        <div class="card-body">
        <?php foreach ($dataku as $d) {?>
        <div class="row">
            <div class="col">
                <p>Banner Rumah</p>
                <div class="input-group">
                    <img src="<?= base_url('uploads/artikel/') . $d['gambar']; ?>" alt="" style="width:700px">
                </div>
            </div>
        </div> 
        <br/>
        <p>Nama Artikel</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['name'] ?>"
                disabled>
        </div>
        <p>Deskripsi</p>
        <div class="input-group">
            <textarea name="desc"
                id="desc"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                disabled><?php echo $d['description'] ?></textarea>
        </div>
        
        <?php } ?>
        <a href="<?php echo site_url('Pages') ?>" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
            <i class="fas fa-reply"></i>
            </span>
            <span class="text">Kembali</span>
        </a>

        </div>
    </div>
    <!-- /.card -->



</form>
</div>
<!-- /.container-fluid -->

</div>\