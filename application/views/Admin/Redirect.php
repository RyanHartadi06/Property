<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirect</title>
</head>
<body>
    <?php
        if($respon === "Berhasil ditambahkan") {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                            Data Berhasil Ditambahkan
                </div>');
            redirect('Data_Rumah');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                            Data Gagal ditambahkan
                </div>');
            redirect('Data_Rumah');
        }
    ?>
</body>
</html>