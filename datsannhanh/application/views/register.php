<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <div id="content col-lg-13" style="margin: auto;width: 30%;margin-top: 100px;">

        <h1>Đăng ký tài khoản</h1>
        <form id="formUpdateInfo" action="<?php echo base_url(); ?>accountmanager/updateinfo" method="POST">
            <div class="form-group">
                <label>Họ và tên</label>
                <input type="text" class="form-control input-sm" name="tenkhachhang" value="<?php echo $data->tenkhachhang; ?>">
                <input type="hidden" name="idkhachhang" value="<?php echo $this->session->userdata('id'); ?>">
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" class="form-control input-sm" name="sodt" value="<?php echo $this->session->userdata('sodt'); ?>">
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" class="form-control input-sm" name="diachi" value="<?php echo $this->session->userdata('diachi'); ?>">
            </div>
            <div class="form-group">
                <label>Giới tính</label>
                <input type="text" class="form-control input-sm" name="gioitinh" value="<?php echo $this->session->userdata('gioitinh'); ?>">
            </div>
            <div class="form-group">
                <label>Ngày tháng năm sinh</label>
                <input type="text" class="form-control input-sm" name="ngaysinh" value="<?php echo $this->session->userdata('ngaysinh'); ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="Email" class="form-control input-sm" name="email" value="<?php echo $this->session->userdata('email'); ?>">
            </div>
            <div class="form-group">
                <label>Diểm thưởng</label>
                <input type="number" class="form-control input-sm" value="<?php echo $this->session->userdata('diemthuong'); ?>" disabled="true">
            </div>
            <p style="text-align:center;">
                <input type="button" value="Cập nhật thông tin" class="btn btn-warning" data-toggle="modal" data-target="#confirm" id="btnUpdateInfo">
            </p>
        </form>
    </div>
    </div>
</body>

</html>