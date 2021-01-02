<?php

class Mproduct extends CI_Model
{
    public function fetch_filter_type($type)
    {
        $this->db->distinct();
        $this->db->select($type);
        $this->db->from('rumah');
        $this->db->where('status', '1');
        return $this->db->get();
    }

    public function fetch_filter_type2($type)
    {
        $this->db->distinct();
        $this->db->select($type);
        $this->db->from('rumah');
        $this->db->where('status', '2');
        return $this->db->get();
    }

    public function make_query($minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti, $kategori, $lokasi)
    {
        $query = "
  SELECT * FROM rumah
  WHERE status = '1'
  ";

        if (isset($minimum_price, $maximum_price) && !empty($minimum_price) && !empty($maximum_price)) {
            $query .= "
    AND harga BETWEEN '" . $minimum_price . "' AND '" . $maximum_price . "'
   ";
        }

        if (isset($properti)) {
            $tipe_filter = implode("','", $properti);
            $query .= "
    AND id_kategori IN('" . $tipe_filter . "')
   ";
        }

        if (isset($lokasi)) {
            $query .= "
        AND alamat_lengkap LIKE '%" . $lokasi . "%'
        ";
        }

        if (isset($kasur)) {
            $kasur_filter = implode("','", $kasur);
            $query .= "
    AND jumlah_kamar IN ('" . $kasur_filter . "')
   ";
        }

        if (isset($kamar_mandi)) {
            $kamar_filter = implode("','", $kamar_mandi);
            $query .= "
    AND kamar_mandi IN ('" . $kamar_filter . "')
   ";
        }

        if (isset($kategori)) {
            $date = date('Y-m-D');
            if ($kategori == 1) {
                $query .= "AND populer > 5";
            } else {
                $query .= "AND createdDate = '$date'";
            }
        }

        if (isset($status_properti)) {
            $status_filter = implode("','", $status_properti);
            $query .= "
    AND status_property IN ('" . $status_filter . "')
   ";
        }
        return $query;
    }


    public function count_all($minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti, $kategori, $lokasi)
    {
        $query = $this->make_query($minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti, $kategori, $lokasi);
        $data = $this->db->query($query);
        return $data->num_rows();
    }

    public function fetch_data($limit, $start, $minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti, $kategori, $lokasi)
    {
        $query = $this->make_query($minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti, $kategori, $lokasi);

        $query .= ' LIMIT ' . $start . ', ' . $limit;

        $data = $this->db->query($query);

        $output = '';
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row) {
                $status = $row['status_property'];
                $id_agent = $row['id_agent'];
                $id_kategori = $row['id_kategori'];
                $query = $this->db->query("SELECT * FROM agent WHERE id_agent = '$id_agent'")->row_array();
                $sql = $this->db->query("SELECT * FROM kategori WHERE id = '$id_kategori'")->row_array();
                if ($status == 1) {
                    $content = '<label class="label label-success mr-2">Jual</label><label class="label label-info">' . $sql['name'] . '</label>';
                } else if ($status == 2) {
                    $content = '<label class="label label-success mr-2">Sewa</label><label class="label label-info">' . $sql['name'] . '</label>';
                }
                $output .= '
    <div class="col-lg-6 col-md-6 col-sm-12">
									<div class="single_property_style property_style_2 modern">

										<div class="listing_thumb_wrapper">
											<div class="property_gallery_slide-thumb">
												<a href="' . base_url() . 'product/detail/' . $row['id_rumah'] . '"><img src="' . base_url() . 'uploads/rumah/' . $row['banner'] . '" class="img-fluid mx-auto" alt=""></a>
											</div>
										</div>

										<div class="property_caption_wrappers pb-0">
											<div class="property_short_detail">
                                                <div class="pr_type_status">
                                                    ' . $content . '
                                                    <label class="label label-primary mr-2"><b>Listing ' . $query['nama_agent'] . '</b></label>
													<h4 class="pr-property_title mb-1"><a href="' . base_url() . 'product/detail/' . $row['id_rumah'] . '">' . $row['nama_pemilik_rumah'] . '</a></h4>
													<div class="listing-location-name text-justify"><i class="fas fa-map-marker-alt"></i>  ' . $row['alamat_lengkap'] . '</div>
												</div>
												<div class="property-real-price cl-blue">Rp ' . number_format($row['harga'], 0, ',', '.') . '</div>
											</div>
										</div>

										<div class="modern_property_footer">
										<div class="table-responsive">
                                              <table class="table">
                                                <tbody>
                                                    <tr colspan="1">
                                                        <td><img src="' . base_url() . 'global/logo/Luas_Bangunan.svg" style="height: 23px !important;"/>&nbsp;&nbsp;LB ' . $row['luas_bangunan'] . ' M<sup>2</sup></td>
                                                        <td><img src="' . base_url() . 'global/logo/Kamar_tidur.svg" style="height: 23px !important;"/>&nbsp;&nbsp;' . $row['jumlah_kamar'] . ' Kamar Tidur</td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="' . base_url() . 'global/logo/Luas_tanah.svg" style="height: 23px !important;"/>&nbsp;&nbsp;LT ' . $row['luas_tanah'] . ' M<sup>2</sup></td>
                                                        <td><img src="' . base_url() . 'global/logo/kamar_mandi.svg" style="height: 23px !important;"/>&nbsp;&nbsp;' . $row['kamar_mandi'] . ' Kamar Mandi</td>
                                                    </tr>
                                                </tbody>
                                              </table>
                                            </div>
											
										</div>
									</div>
								</div>
    ';
            }
        } else {
            $output .= '
            <div class="col-lg-5 justify-content-center mx-auto">
                <img class="img-fluid mb-4" src="' . base_url() . 'global/logo/not_found.svg">
                    <div class="clearfix"></div>
                        <div class="text-center">
                            <h5>Maaf :(</h5>
                            <p class="text-muted">Produk yang sedang kamu cari tidak ditemukan. Coba Ulangi kembali ya</p>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
        return $output;
    }


    public function make_query_terjual($minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti, $kategori, $lokasi)
    {
        $query = "
  SELECT * FROM rumah
  WHERE status = '2'
  ";

        if (isset($minimum_price, $maximum_price) && !empty($minimum_price) && !empty($maximum_price)) {
            $query .= "
    AND harga BETWEEN '" . $minimum_price . "' AND '" . $maximum_price . "'
   ";
        }

        if (isset($properti)) {
            $tipe_filter = implode("','", $properti);
            $query .= "
    AND id_kategori IN('" . $tipe_filter . "')
   ";
        }

        if (isset($lokasi)) {
            $query .= "
        AND alamat_lengkap LIKE '%" . $lokasi . "%'
        ";
        }

        if (isset($kasur)) {
            $kasur_filter = implode("','", $kasur);
            $query .= "
    AND jumlah_kamar IN ('" . $kasur_filter . "')
   ";
        }

        if (isset($kamar_mandi)) {
            $kamar_filter = implode("','", $kamar_mandi);
            $query .= "
    AND kamar_mandi IN ('" . $kamar_filter . "')
   ";
        }

        if (isset($kategori)) {
            $date = date('Y-m-D');
            if ($kategori == 1) {
                $query .= "AND populer > 5";
            } else {
                $query .= "AND createdDate = '$date'";
            }
        }

        if (isset($status_properti)) {
            $status_filter = implode("','", $status_properti);
            $query .= "
    AND status_property IN ('" . $status_filter . "')
   ";
        }
        return $query;
    }


    public function count_all_terjual($minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti, $kategori, $lokasi)
    {
        $query = $this->make_query_terjual($minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti, $kategori, $lokasi);
        $data = $this->db->query($query);
        return $data->num_rows();
    }



    public function fetch_data_terjual($limit, $start, $minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti, $kategori, $lokasi)
    {
        $query = $this->make_query_terjual($minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti, $kategori, $lokasi);

        $query .= ' LIMIT ' . $start . ', ' . $limit;

        $data = $this->db->query($query);

        $output = '';
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row) {
                $status = $row['status_property'];
                $id_agent = $row['id_agent'];
                $id_kategori = $row['id_kategori'];
                $query = $this->db->query("SELECT * FROM agent WHERE id_agent = '$id_agent'")->row_array();
                $sql = $this->db->query("SELECT * FROM kategori WHERE id = '$id_kategori'")->row_array();
                if ($status == 1) {
                    $content = '<label class="label label-success mr-2">Jual</label><label class="label label-info">' . $sql['name'] . '</label>';
                } else if ($status == 2) {
                    $content = '<label class="label label-success mr-2">Sewa</label><label class="label label-info">' . $sql['name'] . '</label>';
                }
                $output .= '
    <div class="col-lg-6 col-md-6 col-sm-12">
									<div class="single_property_style property_style_2 modern">

										<div class="listing_thumb_wrapper">
											<div class="property_gallery_slide-thumb">
												<a href="' . base_url() . 'product/detail/' . $row['id_rumah'] . '"><img src="' . base_url() . 'uploads/rumah/' . $row['banner'] . '" class="img-fluid mx-auto" alt=""></a>
											</div>
										</div>

										<div class="property_caption_wrappers pb-0">
											<div class="property_short_detail">
                                                <div class="pr_type_status">
                                                    ' . $content . '
                                                    <label class="label label-primary mr-2"><b>Listing ' . $query['nama_agent'] . '</b></label>
													<h4 class="pr-property_title mb-1"><a href="' . base_url() . 'product/detail/' . $row['id_rumah'] . '">' . $row['nama_pemilik_rumah'] . '</a></h4>
													<div class="listing-location-name text-justify"><i class="fas fa-map-marker-alt"></i>  ' . $row['alamat_lengkap'] . '</div>
												</div>
												<div class="property-real-price cl-blue">Rp ' . number_format($row['harga'], 0, ',', '.') . '</div>
											</div>
										</div>

										<div class="modern_property_footer">
										<div class="table-responsive">
                                              <table class="table">
                                                <tbody>
                                                    <tr colspan="1">
                                                        <td><img src="' . base_url() . 'global/logo/Luas_Bangunan.svg" style="height: 23px !important;"/>&nbsp;&nbsp;LB ' . $row['luas_bangunan'] . ' M<sup>2</sup></td>
                                                        <td><img src="' . base_url() . 'global/logo/Kamar_tidur.svg" style="height: 23px !important;"/>&nbsp;&nbsp;' . $row['jumlah_kamar'] . ' Kamar Tidur</td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="' . base_url() . 'global/logo/Luas_tanah.svg" style="height: 23px !important;"/>&nbsp;&nbsp;LT ' . $row['luas_tanah'] . ' M<sup>2</sup></td>
                                                        <td><img src="' . base_url() . 'global/logo/kamar_mandi.svg" style="height: 23px !important;"/>&nbsp;&nbsp;' . $row['kamar_mandi'] . ' Kamar Mandi</td>
                                                    </tr>
                                                </tbody>
                                              </table>
                                            </div>
											
										</div>
									</div>
								</div>
    ';
            }
        } else {
            $output .= '
            <div class="col-lg-5 justify-content-center mx-auto">
                <img class="img-fluid mb-4" src="' . base_url() . 'global/logo/not_found.svg">
                    <div class="clearfix"></div>
                        <div class="text-center">
                            <h5>Maaf :(</h5>
                            <p class="text-muted">Produk yang sedang kamu cari tidak ditemukan. Coba Ulangi kembali ya</p>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
        return $output;
    }
}
