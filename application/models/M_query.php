<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_query extends CI_Model
{
    function penghuni()
    {
        $this->db->select('*');
        $this->db->from('penghuni');
        $this->db->order_by('tanggal_pembayaran', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}
