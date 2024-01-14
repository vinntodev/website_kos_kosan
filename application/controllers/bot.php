<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bot extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $tanggal1 = date('Y-m-d');
        $tanggal2 = date('Y-m-d', strtotime('+2 days', strtotime($tanggal1)));
        //$tanggal2 = date('Y-m-d', strtotime('+1 month', strtotime($tanggal1)));
        $query = $this->db->query("SELECT * FROM `penghuni` WHERE tanggal_pembayaran='$tanggal2'");
        foreach ($query->result_array() as $row) {
            $chat_id = '-960071087';
            $token = '6127198885:AAFr_nvXltJ_m2xwEL6NGXIU_T-UyHZZbd4';
            $data = [
                'nama' => $row['telegram'],
                'kamar' => $row['no_kamar'],
                'message' => 'Pembayaran anda akan jatuh tempo pada tanggal ',
                'tanggal'  => $row['tanggal_pembayaran'],
            ];
            $url = 'https://api.telegram.org/bot' . $token . '/sendmessage?chat_id=' . $chat_id . '&text=Hy Saudara @' . $data['nama'] . ' ' . $data['message'] . ' ' . $data['tanggal'];

            $tampil = file_get_contents($url);
            echo $tampil;
        }
    }
}
