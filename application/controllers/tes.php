<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $tgl1 = new DateTime("2020-01-01");
        $tgl2 = new DateTime("2020-01-20");
        $jarak = $tgl2->diff($tgl1);

        echo $jarak->d;
    }
}
