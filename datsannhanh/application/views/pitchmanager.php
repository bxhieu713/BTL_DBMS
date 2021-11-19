<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Đặt sân nhanh</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/ico" href="/datsannhanh/icon/favicon.ico" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> -->
  <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="/datsannhanh/css/style2.css">
  <link rel="stylesheet" href="/datsannhanh/css/datepicker.css">
  <link rel="stylesheet" href="/datsannhanh/css/toggle.css">

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <link href="/datsannhanh/css/mdtimepicker.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
  <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
  <style type="text/css">
    .wrapper {
      display: flex;
      width: 100%;
    }

    #sidebar {
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      z-index: 999;
      background: #7386D5;
      color: #fff;
      transition: all 0.3s;
    }

    .dropdown:hover>.dropdown-menu {
      display: block;
    }

    .dropdown>.dropdown-toggle:active {
      /*Without this, clicking will make it sticky*/
      pointer-events: none;
    }

    .dropdown-item-menu {
      font-size: 14px;
    }

    .dropdown-item-menu:hover {
      font-size: 14px;
      background: grey;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <?php $this->load->view('/common/sidebar'); ?>
    <!-- Page Content -->
    <div class="header-web">
      <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                
            </div>
        </nav> -->

      <div class="form-inline">
        <button type="button" id="sidebarCollapse" class="btn btn-info">
          <i class="fas fa-align-left"></i>
          <span>Toggle Sidebar</span>
        </button>
        <?php if ($this->session->userdata('username') == '') { ?>
          <input type="button" name="register" class="btn btn-warning btn-register" value="Đăng ký">
          <input type="button" name="login" class="btn btn-success btn-login" style="margin-right: 10px;" value="Đăng nhập">
        <?php } else { ?>
          <div class="form-inline" style="float: right;color: white;display: flex; letter-spacing: 2px;margin-right: 50px;">Wellcome
            <div class="dropdown d-inline" style="margin: 0 5px;">
              <a href="#" style="text-decoration: none;color: blue;" id="dropdownMenuButton"><?php echo $this->session->userdata('tenkhachhang'); ?></a>
              <div class="dropdown-menu" style="background-color: #2b90e2;color: cornsilk;" aria-labelledby="dropdownMenuButton">
                <?php if ($this->session->userdata('idrole') != 3) { ?>
                  <p class="dropdown-item-menu" style="color: white;"><a class="dropdown-item" href="#">Trang quản trị</a></p>
                <?php } ?>
                <p class="dropdown-item-menu" style="color: white;"><a class="dropdown-item" href="<?php echo base_url(); ?>acountmanager">Quản lý tài khoản</a></p>
                <p class="dropdown-item-menu" style="color: white;"><a class="dropdown-item" href="#">Thay đổi mật khẩu</a></p>
                <p class="dropdown-item-menu" style="color: white;"><a class="dropdown-item" href="#">Điểm thưởng<span style="color: red;"><?php echo $this->session->userdata('diemthuong'); ?></span></a></p>
                <p class="dropdown-item-menu" style="color: white;"><a class="dropdown-item" href="#">Đăng xuất</a></p>
              </div>
            </div>
            <a class="d-inline" href="<?php echo base_url(); ?>index.php/logout" style="text-decoration: none;color: green;">Logout</a>
          </div>
        <?php }; ?>
      </div>
    </div>

    <div id="content">
      <h1>Trang quản lý Sân</h1>
      <div class="row">
        <p><?php echo $error; ?></p>
        <p><input type="button" name="" id="btnAddPitch" class="btn btn-success" value="Thêm sân"></p>
        <table class="table">
          <thead>
            <tr>
              <th>Mã sân</th>
              <th>Tên sân</th>
              <th>Loại sân</th>
              <th>Đơn giá</th>
              <th>Ngày tạo</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody id="">
            <?php foreach ($data as $key => $value) { ?>
              <tr class="sandisplay">
                <td><?php echo $value->idsan; ?></td>
                <td><?php echo  $value->tensan; ?></td>
                <td><?php echo  $value->loaisan; ?></td>
                <td><?php echo  $value->dongia; ?></td>
                <td><?php echo  $value->createdDate; ?></td>
                <td><input type="button" name="" class="btn btn-danger" value="Xóa"></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>


      </div>
    </div>
  </div>
  <!-- Modal dat san -->
  <script src="/datsannhanh/js/mdtimepicker.js"></script>


  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <script type="text/javascript">
    function duyetdon(idhoadon, idkhachhang, tongthanhtoan, status) {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "admin/duyetdon",
        dataType: 'json',
        data: {
          idhoadon: idhoadon,
          idkhachhang: idkhachhang,
          status: status,
          tongthanhtoan: tongthanhtoan
        },
        success: function(res) {
          if (res.error == "") {
            toastr.success('Duyệt đơn thành công!');
            location.reload();
          } else {
            toastr.error(res.error);
          }
        },
        error: function(error) {

        }
      });
    }
  </script>
  <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: #f7f7f7;">
        <div class="modal-header" style="text-align: center;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h3 class="modal-title" style="font-size: -webkit-xxx-large;font-family: -webkit-body;">Xác nhận</h3>
        </div>
        <form action="<?php echo base_url(); ?>login_controller/index" method="POST">
          <div class="modal-body" style="text-align: center;">
            <p>Bạn có muốn cập nhật thông tin tài khoản không?</p>
          </div>
          <div class="modal-footer" style="text-align: center;">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="btnExcuteUpdate">Xóa</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal add san -->
  <div class="modal fade" id="mdAddPicth" tabindex="-1" role="dialog" aria-labelledby="mdAddPicth" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: #f7f7f7;">
        <div class="modal-header" style="text-align: center;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h3 class="modal-title" style="font-size: -webkit-xxx-large;font-family: -webkit-body;">Thêm sân</h3>
        </div>
        <form action="<?php echo base_url(); ?>login_controller/index" method="POST">
          <div class="modal-body" style="text-align: center;">
            <p>Bạn có muốn cập nhật thông tin tài khoản không?</p>
          </div>
          <div class="modal-footer" style="text-align: center;">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success" id="btnExAddPitch">Thêm</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal update pitch -->
  <div class="modal fade" id="mdUpdatePicth" tabindex="-1" role="dialog" aria-labelledby="mdUpdatePicth" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: #f7f7f7;">
        <div class="modal-header" style="text-align: center;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h3 class="modal-title" style="font-size: -webkit-xxx-large;font-family: -webkit-body;">Cập nhật sân</h3>
        </div>
        <form action="<?php echo base_url(); ?>login_controller/index" method="POST">
          <div class="modal-body" style="text-align: center;">
            <div class="form-inline col-lg-offset-0" style="margin: 5px;">
              <label style="margin-right: 5px;">Tên sân</label>
              <input name="txtPitchName" class="form-control input-sm" id="txtPitchName" type="text" value=""><input name="idsan" id="hdIdSan" type="hidden" value="1">
            </div>
            <div class="form-inline" style="margin: 5px;">
              <label style="margin-right: 6px;">Giá sân</label>
              <input name="txtUnitPrice" class="form-control input-sm" id="txtUnitPrice" type="text" value="">
            </div>
            <div class="form-inline">
              <label class="col-md-offset-0" style="margin-right: 6px; display: inline-table;">Loại sân</label>
              <select class="form-control input-sm" id="slLoaiSan" style="width: 45%;">
                <option value="1">Sân 5</option>
                <option value="2">Sân 7</option>
                <option value="3">Sân 11</option>
              </select>
            </div>
          </div>
          <div class="modal-footer" style="text-align: center;">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="btnExUpdatePicth">Cập nhật</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#btnExUpdatePicth').on('click', function() {
        $('#formUpdateInfo').submit();
      });
      $('.sandisplay').on('click', function() {
        $('#mdUpdatePicth').modal('show');
        var pitchName = $(this).find('td:eq(1)').html();
        var idsan = $(this).find('td:eq(0)').html();
        var loaisan = $(this).find('td:eq(2)').html();
        var dongia = $(this).find('td:eq(3)').html();
        $('#txtPitchName').val(pitchName);
        $('#txtUnitPrice').val(dongia);
        $('#hdIdSan').val(idsan);
        $('#slLoaiSan').val(loaisan);
      });
    });
  </script>

</body>

</html>