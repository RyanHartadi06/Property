  <!-- Begin Page Content -->
  <div class="container-fluid">

<form method="post" enctype="multipart/form-data">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Feedback</h1>
 
    <div class="card shadow mb-4">
    
        <div class="card-body">
        <?php foreach ($feedback as $d) {?>
        <p>Nama Pengirim</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
             
                aria-describedby="basic-addon2"
                value="<?php echo $d['nama'] ?>"
                disabled>
        </div>
        <p>Email</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['email'] ?>"
                disabled>
        </div>
        <p>Subjek</p>
        <div class="input-group">
            <textarea name="nama"
                id="nama"
                type="text"
                style="height:200"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                disabled><?php echo $d['subjek'] ?></textarea>
        </div>
        <p>Pesan</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                style="height:200"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['pesan'] ?>"
                disabled>
        </div>
        <p>Tanggal Feedback</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['createdDate'] ?>"
                disabled>
        </div>
       
        <?php } ?>
        <a href="<?php echo site_url('Feedback_Admin/lama') ?>" class="btn btn-danger btn-icon-split">
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

</div>