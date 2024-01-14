<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function total()
    {
        $this->db->select_sum('jumlah_tagihan');
        $query = $this->db->get('pembayaran');
        if ($query->num_rows() > 0) {
            return $query->row()->jumlah_tagihan;
        } else {
            return 0;
        }
    }

    public function jumlahTagihan()
    {
        $this->db->select_sum('jumlah_tagihan');
        $this->db->where('status', 'Proses');
        $query = $this->db->get('pembayaran');
        if ($query->num_rows() > 0) {
            return $query->row()->jumlah_tagihan;
        } else {
            return 0;
        }
    }

    public function jumlahPenghuni()
    {
        $this->db->select_sum('jumlah_tagihan');
        $this->db->where('status', 'Proses');
        $query = $this->db->get('pembayaran');
        if ($query->num_rows() > 0) {
            return $query->row()->jumlah_tagihan / 1000000;
        } else {
            return 0;
        }
    }


    public function kamarKosong()
    {
        $this->db->select_sum('status');
        $this->db->where('status', '1');
        $query = $this->db->get('kamar');
        if ($query->num_rows() > 0) {
            return $query->row()->status;
        } else {
            return 0;
        }
    }

    public function getPembayaran($ambil)
    {

        $query = "SELECT pembayaran.*, user.name FROM `pembayaran` JOIN user ON user.id=pembayaran.nama_penghuni WHERE user.id='$ambil'";
        return $this->db->query($query)->result_array();
    }

    public function halaman()
    {
        return $this->db->get('penghuni')->num_rows();
    }


    public function halamanPending()
    {
        $this->db->where('pembayaran.status', 'Proses');
        return $this->db->get('pembayaran')->num_rows();
    }

    public function totalPenghuni($limit, $start)
    {
        return $this->db->get('penghuni', $limit, $start)->result_array();
    }

    public function totalPembayaran($limit, $start)
    {
        return $this->db->get('pembayaran', $limit, $start)->result_array();
    }

    public function getPembayarann()
    {

        $query = "SELECT pembayaran.*, user.name FROM `pembayaran` JOIN user ON user.id=pembayaran.nama_penghuni";
        return $this->db->query($query)->result_array();
    }

    public function nomor()
    {

        $query = "SELECT no_hp FROM pembayaran where nomor_kamar='201'";
        return $this->db->query($query)->result_array();
    }

    public function pembayaran($limit, $start)
    {
        $this->db->join('pembayaran', 'pembayaran.nomor_kamar=penghuni.no_kamar');
        $this->db->where('pembayaran.status', 'Proses');
        return $this->db->get('penghuni', $limit, $start)->result_array();
    }
}
