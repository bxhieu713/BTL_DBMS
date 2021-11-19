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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>Đặt sân nhanh</h3>
      </div>

      <ul class="list-unstyled components">
        <li>
          <a href="<?php echo base_url(); ?>">Trang chủ</a>
        </li>
        <li class="active">
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Xem theo loại sân</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
            <?php foreach ($type as $key => $value) { ?>
              <li>
                <a href="<?php echo base_url(); ?>loaisan/<?php echo $value->idloaisan; ?>"><?php echo $value->loaisan; ?></a>
              </li>
            <?php } ?>
          </ul>
        </li>
        <li>
          <a href="#">Giới thiệu</a>
        </li>
        <li>
          <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Liên hệ</a>
          <ul class="collapse list-unstyled" id="pageSubmenu">
            <li>
              <a href="#">Số điện thoại: 0336.603.923</a>
            </li>
            <li>
              <a href="#">Facebook</a>
            </li>
            <li>
              <a href="#">Gmail</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">Hỗ trợ</a>
        </li>
        <li>
          <a href="#">Feedback</a>
        </li>
      </ul>

    </nav>
    <!-- Page Content -->
    <div class="header-web">
      <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid"> 
            </div>
        </nav> -->
        <div class="nav-header">
        <h1>Sân bóng Mini Đại học QGHN</h1>
        <p>Địa chỉ: 144 Xuân Thủy, Dịch Vọng Hậu, Cầu Giấy, Hà Nội</p>
      </div>
      <div class="form-inline">
     
        <button type="button" id="sidebarCollapse" class="btn btn-info">
          <i class="fas fa-align-left"></i>
          <span>Toggle Sidebar</span>
        </button>
       
        <?php if ($this->session->userdata('username') == '') { ?>
          <input type="button" name="register" class="btn btn-warning btn-register" value="Đăng ký">
          <input type="button" name="login" class="btn btn-success btn-login" style="margin-right: 10px;" data-toggle="modal" data-target="#loginModal" value="Đăng nhập">
        <?php } else { ?>
          <div class="form-inline" style="float: right;color: white;display: flex; letter-spacing: 2px;margin-right: 50px;">Wellcome
            <div class="dropdown d-inline" style="margin: 0 5px;">
              <a href="#" style="text-decoration: none;color: blue;" id="dropdownMenuButton"><?php echo $this->session->userdata('tenkhachhang'); ?></a>
              <div class="dropdown-menu" style="background-color: #2b90e2;color: cornsilk;" aria-labelledby="dropdownMenuButton">
                <?php if ($this->session->userdata('idrole') != 3) { ?>
                  <p class="dropdown-item-menu" style="color: white;"><a class="dropdown-item" href="<?php echo base_url(); ?>admin">Trang quản trị</a></p>
                <?php } ?>
                <p class="dropdown-item-menu" style="color: white;"><a class="dropdown-item" href="<?php echo base_url(); ?>acountmanager">Quản lý tài khoản</a></p>
                <p class="dropdown-item-menu" style="color: white;"><a class="dropdown-item" href="#">Thay đổi mật khẩu</a></p>
                <p class="dropdown-item-menu" style="color: white;"><a class="dropdown-item" href="#">Điểm thưởng<span style="color: red;"><?php echo $this->session->userdata('diemthuong'); ?></span></a></p>
                <p class="dropdown-item-menu" style="color: white;"><a class="dropdown-item" href="<?php echo base_url(); ?>logout">Đăng xuất</a></p>
              </div>
            </div>
            <a class="d-inline" href="<?php echo base_url(); ?>logout" style="text-decoration: none;color: green;">Logout</a>
          </div>
        <?php }; ?>
      </div>
    </div>

    <div id="content">

      <h1>Trang đặt sân nhanh</h1>
      <div class="row">
        <?php foreach ($data as $key => $value) {
          # code...
        ?>
          <div class="col-sm-3 display-pitch text-center">
            <h3 class="text-center pitch-name"><?php echo  $value->tensan; ?></h3>
            <img src="/datsannhanh/image/san3.png" style="width:70%">
            <p class="text-center price-pitch">Giá:<span style="padding-left: 10px;padding-right: 5px;"><?php echo  $value->dongia; ?></span>đ</p>
            <p class="text-center">
              <input type="button" name="datsan" id="btnDatSan" data-toggle="modal" data-target="#" onclick="choosesan(<?php echo  $value->idsan; ?>)" class="btn btn-primary" value="Đặt sân">
            </p>
          </div>
        <?php } ?>

      </div>
    </div>
  </div>
  <!-- Modal dat san -->

  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script> -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: #b5a59d;">
        <div class="modal-header" style="text-align: center;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h3 class="modal-title" style="font-size: -webkit-xxx-large;font-family: -webkit-body;">Đăng nhập</h3>
        </div>
        <form action="<?php echo base_url(); ?>/login_controller/index" method="POST">
          <div class="modal-body" style="text-align: center;">
            <img src="/datsannhanh/image/player2.png" alt="login" style="width: 40%;margin-bottom: 20px;">
            <div class="form-inline">
              <label>Tài khoản:</label>
              <input type="text" name="username" class="form-control">
            </div>
            <div class="form-inline" style="margin-top: 10px;">
              <label>Mật khẩu:</label>
              <input type="password" name="password" class="form-control" style="margin-left: 4px;">
            </div>

          </div>
          <div class="modal-footer" style="text-align: center;">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="/datsannhanh/js/mdtimepicker.js"></script>

  <div class="modal fade" id="bookPicthModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Đặt sân</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="pitch-name" class="col-form-label">Tên sân:</label>
              <input type="text" class="form-control" id="pitch-name" disabled="true">
              <input type="hidden" name="pitchid" id="pitchid">
            </div>
            <div class="form-group">
              <table class="table">
                <tr>
                  <td style="width: 50%">
                    <p class="text-center">Danh mục dịch vụ</p>
                    <div>
                      <table class="table">
                        <thead>
                          <tr>
                            <th width="10%" style="vertical-align: middle;">STT</th>
                            <th width="35%" style="vertical-align: middle;">Tên dịch vụ</th>
                            <th width="30%" style="vertical-align: middle;">Đơn giá</th>
                            <th width="20%" style="vertical-align: middle;">Số lượng</th>
                            <th width="5%" style="vertical-align: middle;">Chọn</th>
                          </tr>
                        </thead>
                        <tbody id="danhmucdichvu">
                          <?php
                          $i = 1;
                          foreach ($dichvu as $key => $value) {
                          ?>
                            <tr id="dichvu-<?php echo $i; ?>">
                              <td class="text-center"><?php echo $i; ?></td>
                              <td class="text-center"><?php echo $value->tendichvu; ?></td>
                              <td class="text-center"><?php echo $value->dongia ?></td>
                              <td class="text-center">
                                <div class="form-group">
                                  <select class="soluongchon-<?php echo $i; ?>">
                                    <?php for ($j = 1; $j <= 20; $j++) {
                                    ?>
                                      <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                                    <?php }; ?>
                                  </select>
                                </div>
                              </td>
                              <td class="text-center"><input type="checkbox" name="dichvuchon" onchange="chooseService(<?php echo $i; ?>)" data-id="<?php echo $value->iddichvu; ?>" data-name="<?php echo $value->tendichvu; ?>" data-index="<?php echo $i; ?>" data-price="<?php echo $value->dongia; ?>" class="dichvuchon-<?php echo $i; ?>"></td>
                            </tr>
                          <?php
                            $i++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </td>
                  <td style="width: 50%">
                    <p class="text-center">Dịch vụ đã chọn</p>
                    <div>
                      <table>
                        <thead>
                          <tr>
                            <th width="10%" class="text-center">STT</th>
                            <th width="45%" class="text-center">Tên dịch vụ</th>
                            <th width="30%" class="text-center">Số lượng</th>
                            <th width="15%" class="text-center">Xóa</th>
                          </tr>
                        <tbody id="dichvudachon">

                        </tbody>
                      </table>
                  </td>
                </tr>
              </table>
            </div>
            <div class="form-group">
              <label for="dp3" class="col-form-label">Ngày đặt sân:</label>
              <input type="text" class="form-control" id="dp3" />
            </div>
            <div class="form-group">
              <div class="form-inline">
                <div class="form-group" style="width: 50%;float: left;">
                  <label for="timestart" class="col-form-label">Thời gian bắt đầu:</label>
                  <input type="text" class="form-control" id="timestart" />
                </div>
                <div class="form-group" style="width: 50%;float: left;">
                  <label for="timeend" class="col-form-label">Thời gian kết thúc:</label>
                  <input type="text" class="form-control" id="timeend" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="pitch-type" class="col-form-label">Loại sân:</label>
              <input type="text" class="form-control" id="pitch-type" disabled="true" />
            </div>
            <div class="form-group">

              <label for="pitch-price" class="col-form-label">Giá sân:</label>
              <input type="text" class="form-control" id="pitch-price" disabled="true" />

            </div>

            <div class="form-group">
              <label for="total-price" class="col-form-label">Tổng tiền cần thanh toán:</label>
              <input type="text" class="form-control" id="total-price" disabled="true" />
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="btndatsan" class="btn btn-primary">Đặt sân</button>
        </div>
      </div>
    </div>
  </div>
  <!-- <script src="/datsannhanh/js/bootstrap-datepicker.js"></script>
<script>
    $(function(){
      //window.prettyPrint && prettyPrint();           
            
      $('#dp3').datepicker();
        
    });
  
</script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {

      $("#dp3").datepicker();
      $("#dp3").datepicker("option", "dateFormat", "yy-mm-dd");
      $("#sidebar").mCustomScrollbar({
        theme: "minimal"
      });

      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
      });
      // $(window).resize(function(){
      //   var width = $(window).width();
      //   //console.log(width);
      //   if (width > 768){
      //       $('#sidebar').toggleClass('active');
      //   }
      // });
      $('#timestart').mdtimepicker({
        format: 'hh:mm'
      });
      $('#timeend').mdtimepicker({
        format: 'hh:mm'
      });
      $("#bookPicthModal").on('hide.bs.modal', function() {
        // var c = confirm('Bạn có muốn xóa tất cả dữ liệu vừa nhập không?');
        // if(c == false){
        // return;
        // }
        $('#timestart').val('');
        $('#timeend').val('');
        dichvudachon.splice(0, dichvudachon.length);
        $('#danhmucdichvu input[type=checkbox]').each(function() {
          $(this).prop('checked', false);
        });
        loaddichvu();
        $('#total-price').val('');
      });
      $('#btndatsan').on('click', function() {
        var timestart = $('#timestart').val();
        var timeend = $('#timeend').val();
        var tongthanhtoan = $('#total-price').val();
        var ngaydatsan = $("#dp3").val();
        var idsan = $('#pitchid').val();
        if (ngaydatsan.length == 0) {
          toastr.warning("Vui lòng chọn ngày đặt sân trước khi thực hiện đặt sân!");
          return;
        }
        if (timestart.length == 0 || timeend.length == 0) {
          toastr.warning("Vui lòng chọn thời gian bắt đầu và kết thúc trước khi thực hiện đặt sân!");
          return;
        }
        if (parseInt(timeend.substring(3, 5)) != 30 && parseInt(timeend.substring(3, 5)) != 0 || parseInt(timestart.substring(3, 5)) != 30 && parseInt(timestart.substring(3, 5)) != 0) {
          toastr.warning("Vui lòng chọn thời gian là bội của 30 phút!");
          return;
        }
        if (parseInt(timeend.substring(0, 2)) < parseInt(timestart.substring(0, 2)) || parseInt(timeend.substring(0, 2)) == parseInt(timestart.substring(0, 2)) && parseInt(timeend.substring(3, 5)) < parseInt(timestart.substring(3, 5))) {
          toastr.warning('Vui lòng nhập thời gian kết thúc lớn hơn thời gian bắt đầu!');
          return;
        }
        var datainput = {
          idsan: idsan,
          timestart: timestart,
          timeend: timeend,
          ngaydatsan: ngaydatsan,
          tongthanhtoan: tongthanhtoan,
          dichvulist: dichvudachon
        };
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>" + "index.php/homepage_controller/datsan",
          dataType: 'json',
          data: datainput,
          success: function(res) {
            if (res.result > 0) {
              toastr.success('Đặt sân thành công!');
              $('#bookPicthModal').modal('hide');
            } else {
              toastr.error(res.error);
            }
          },
          error: function(e) {
            toastr.error('Đặt sân thất bại!');
          }
        });
      });
    });

    function choosesan(id) {
      //var keywords = $("#ipkeyword").val();
      var username = '<?php echo $this->session->userdata('username'); ?>';
      if (username == '') {
        alert('Bạn phải đăng nhập mới có thể đặt sân!');
        $('#loginModal').modal('show');
        return false;
      } else {
        $('#bookPicthModal').modal('show');
      }

      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "homepage_controller/getSanById",
        dataType: 'json',
        data: {
          id: id
        },
        success: function(res) {
          if (res != "") {
            $('#pitch-name').val(res.tensan);
            $('#pitch-price').val(res.dongia);
            $('#pitch-type').val(res.loaisan);
            $('#pitchid').val(res.idsan);
          }
        }
      });
    }
    var dichvudachon = [];

    function chooseService(id) {
      var soluong = $(".soluongchon-" + id).val();
      var iddichvu = $('.dichvuchon-' + id).attr('data-id');
      var tendichvu = $('.dichvuchon-' + id).attr('data-name');
      var dongia = $('.dichvuchon-' + id).attr('data-price');
      if ($('.dichvuchon-' + id).prop('checked') == true) {
        var dichvu = {
          iddichvu: iddichvu,
          tendichvu: tendichvu,
          dongia: dongia,
          soluong: soluong,
          thanhtien: parseInt(dongia) * parseInt(soluong)
        };
        dichvudachon.push(dichvu);
        caculator();
        loaddichvu();
      } else {
        for (var i = 0; i < dichvudachon.length; i++) {
          if (dichvudachon[i].iddichvu == $('.dichvuchon-' + id).attr('data-id')) {
            dichvudachon.splice(i, 1);
          }
        }
        caculator();
        loaddichvu();
      }

    }

    function deletesv(id) {
      for (var i = 0; i < dichvudachon.length; i++) {
        if (dichvudachon[i].iddichvu == id) {
          $('#danhmucdichvu input[type=checkbox]').each(function() {
            if ($(this).attr('data-id') == id) {
              $(this).prop('checked', false);
            }
          });
          dichvudachon.splice(i, 1);

        }
      }
      caculator();
      loaddichvu();
    }
    $('#timestart').on('change', function() {
      var timestart = $('#timestart').val();
      var timeend = $('#timeend').val();
      if (parseInt(timeend.substring(0, 2)) < parseInt(timestart.substring(0, 2)) || parseInt(timeend.substring(0, 2)) == parseInt(timestart.substring(0, 2)) && parseInt(timeend.substring(3, 5)) < parseInt(timestart.substring(3, 5))) {
        toastr.warning('Vui lòng nhập thời gian kết thúc lớn hơn thời gian bắt đầu!');
        return;
      }
      caculator();
    });
    $('#timeend').on('change', function() {
      var timestart = $('#timestart').val();
      var timeend = $('#timeend').val();
      if (parseInt(timeend.substring(0, 2)) < parseInt(timestart.substring(0, 2)) || parseInt(timeend.substring(0, 2)) == parseInt(timestart.substring(0, 2)) && parseInt(timeend.substring(3, 5)) < parseInt(timestart.substring(3, 5))) {
        toastr.warning('Vui lòng nhập thời gian kết thúc lớn hơn thời gian bắt đầu!');
        return;
      }
      if (parseInt(timeend.substring(0, 2)) == parseInt(timestart.substring(0, 2))) {
        if (parseInt(timeend.substring(3, 5)) <= parseInt(timestart.substring(3, 5))) {
          toastr.warning('Vui lòng nhập thời gian kết thúc lớn hơn thời gian bắt đầu!');
          return;
        }

      }
      caculator();
    });

    function caculator() {
      var timestart = $('#timestart').val();
      var timeend = $('#timeend').val();
      var sum = 0;

      for (var i = 0; i < dichvudachon.length; i++) {
        sum += parseInt(dichvudachon[i].dongia) * parseInt(dichvudachon[i].soluong);
      }
      if (timeend != '' && timestart != '') {
        var sumtime = (parseInt(timeend.substring(0, 2)) * 60 + 
        parseInt(timeend.substring(3, 5))) - (parseInt(timestart.substring(0, 2)) * 60 + parseInt(timestart.substring(3, 5)));
        sum += parseInt($('#pitch-price').val()) * (sumtime / 60);
      } else {
        sum += parseInt($('#pitch-price').val());
      }
      $('#total-price').val(Math.round(sum));
      //return sum;
    }

    function loaddichvu() {
      $('#dichvudachon').empty();
      for (var i = 0; i < dichvudachon.length; i++) {
        var html = '<tr>' +
          '<td class="text-center">' + (i + 1) + '</td>' +
          '<td class="text-center">' + dichvudachon[i].tendichvu + '</td>' +
          '<td class="text-center">' + dichvudachon[i].soluong + '</td>' +
          '<td class="text-center"><input type="checkbox" class="delete-dichvu" onclick="deletesv(' + dichvudachon[i].iddichvu + ')"></td></tr>';
        $('#dichvudachon').append(html);
      }

    }
  </script>

</body>

</html>