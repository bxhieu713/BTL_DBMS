<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_controller extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->database();
    $this->load->model('model_san');
    $this->load->model('model_dichvu');
    $this->load->model('model_hoadon');
    $this->load->model('model_hoadonchitiet');
    $this->load->model('model_customer');
    $this->checkRole();
  }
  public function index()
  {
    $result['data'] = $this->model_hoadon->getBillToBillManager();
    $result['error'] = '';
    if (count($result['data']) == 0) {
      $result['error'] = 'Hiện tại chưa có hóa đơn nào được đặt!';
      //$this->load->view('quan-ly-bill',$result);
    }
    $this->load->view('admin/quan-ly-bill', $result);
  }

  public function duyetdon()
  {
    $result['data'] = '';
    $result['error'] = '';
    $status = $this->input->post('status');
    $idhoadon = $this->input->post('idhoadon');
    $idkhachhang = $this->input->post('idkhachhang');
    $tongthanhtoan = $this->input->post('tongthanhtoan');
    $diemthuong = round(floatval($tongthanhtoan) / 1000) + $this->session->userdata('diemthuong');
    if ($status == 0) {
      $updateStatus = array('status' => 1);
      $updateCoin = '';
    }
    if ($status == 1) {
      $updateStatus = array('status' => 2);
      $updateCoin = array('diemthuong' => $diemthuong);
      $this->session->unset_userdata('diemthuong');
      $this->session->set_userdata('diemthuong', $diemthuong);
    }

    $this->db->trans_begin();

    //Update trạng thái đơn
    $this->model_hoadon->duyetdon($updateStatus, $idhoadon);

    if ($updateCoin != '') {
      //Update điểm thưởng
      $this->model_customer->updateCoin($updateCoin, $idkhachhang);
    }
    if ($this->db->trans_status() === FALSE) {
      log_message('error', $this->db->last_query());
      $this->db->trans_rollback();
      $result['data'] = 0;
      $result['error'] = 'Lỗi khi thực hiện cập nhật dữ liệu!';
    } else {
      log_message('info', $this->db->last_query());
      $this->db->trans_commit();
      $result['data'] = 1;
      $result['error'] = '';
    }
    echo json_encode($result);
  }

  public function checkRole()
  {
    if (is_null($this->session->userdata('username')) || $this->session->userdata('idrole') == '3') {
      redirect('/', 'refresh');
    }
  }
  public function quanlysan()
  {
    $data['data'] = $this->model_san->getAllsan();
    $data['error'] = '';
    $this->load->view('pitchmanager', $data);
  }
}
