<?php

class Mproduct extends CI_Model
{
 function fetch_filter_type($type)
 {
  $this->db->distinct();
  $this->db->select($type);
  $this->db->from('rumah');
  $this->db->where('status', '1');
  return $this->db->get();
 }

 function make_query($minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti)
 {
  $query = "
  SELECT * FROM rumah 
  WHERE status = '1' 
  ";

  if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
  {
   $query .= "
    AND harga BETWEEN '".$minimum_price."' AND '".$maximum_price."'
   ";
  }

  if(isset($properti))
  {
   $tipe_filter = implode("','", $properti);
   $query .= "
    AND id_kategori IN('".$tipe_filter."')
   ";
  }

  if(isset($kasur))
  {
   $kasur_filter = implode("','", $kasur);
   $query .= "
    AND jumlah_kamar IN ('".$kasur_filter."')
   ";
  }

  if(isset($kamar_mandi))
  {
   $kamar_filter = implode("','", $kamar_mandi);
   $query .= "
    AND kamar_mandi IN ('".$kamar_filter."')
   ";
  }

  if(isset($status_properti))
  {
   $status_filter = implode("','", $status_properti);
   $query .= "
    AND status_property IN ('".$status_properti."')
   ";
  }
  return $query;
 }

 function count_all($minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti)
 {
  $query = $this->make_query($minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti);
  $data = $this->db->query($query);
  return $data->num_rows();
 }

 function fetch_data($limit, $start, $minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti)
 {
  $query = $this->make_query($minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti);

  $query .= ' LIMIT '.$start.', ' . $limit;

  $data = $this->db->query($query);

  $output = '';
  if($data->num_rows() > 0)
  {
   foreach($data->result_array() as $row)
   {
    $status = $row['status_property'];
    $id_agent = $row['id_agent'];
    $id_kategori = $row['id_kategori'];
    $query = $this->db->query("SELECT * FROM agent WHERE id_agent = '$id_agent'")->row_array();
    $sql = $this->db->query("SELECT * FROM kategori WHERE id = '$id_kategori'")->row_array();
    if($status == 1) {
        $content = '<label class="label label-success mr-2">Jual</label><label class="label label-info">'.$sql['name'].'</label>';
    } else if($status == 2) {
        $content = '<label class="label label-secondary mr-2">Sewa</label><label class="label label-info">'.$sql['name'].'</label>';
    }
    $output .= '
    <div class="col-lg-6 col-md-6 col-sm-12">
									<div class="single_property_style property_style_2 modern">
								
										<div class="listing_thumb_wrapper">
											<div class="property_gallery_slide-thumb">
												<img src="'.base_url().'uploads/rumah/'. $row['banner'] .'" class="img-fluid mx-auto" alt="">
											</div>
										</div>
										
										<div class="property_caption_wrappers pb-0">
											<div class="property_short_detail">
                                                <div class="pr_type_status">
                                                    '.$content.'
													<h4 class="pr-property_title mb-1"><a href="single-property-1.html">'.$row['nama_pemilik_rumah'].'</a></h4>
													<div class="listing-location-name">'.$row['alamat_lengkap'].'</div>
												</div>
												<div class="property-real-price cl-blue">'.$row['harga'].'</div>
											</div>
										</div>
										
										<div class="modern_property_footer">
											<div class="property-lists flex-1">
												<ul>
													<li><span class="flatcons"><img src="assets/img/bed.svg" alt=""></span>'.$row['jumlah_kamar'].' Kamar</li>
													<li><span class="flatcons"><img src="assets/img/bath.svg" alt=""></span>'.$row['kamar_mandi'].' Kamar Mandi</li>
												</ul>
											</div>
											<div class="fp_types">'.$query['nama_agent'].'</div>
										</div>
									</div>
								</div>
    ';
   }
  }
  else
  {
   $output = '<h3>No Data Found</h3>';
  }
  return $output;
 }
}

?>