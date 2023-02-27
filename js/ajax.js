$(function () {
  /* Login ajax code */
  $("#loginsubmit").click(function () {
    var user_email = $("#user_email").val();
    var user_pass = $("#user_pass").val();

    var dataString = "user_email=" + user_email + "&user_pass=" + user_pass;
    $.ajax({
      type: "POST",
      url: "action/getlogin.php",
      data: dataString,
      success: function (data) {
        if ($.trim(data) == "empty") {
          $(".welcome").hide();
          document.getElementById("empty").style.display = "block";
          setTimeout(function () {
            $(".empty").fadeOut();
            $(".welcome").show();
          }, 3000);
        } else if ($.trim(data) == "eror") {
          $(".welcome").hide();
          document.getElementById("eror").style.display = "block";
          setTimeout(function () {
            $(".eror").fadeOut();
            $(".welcome").show();
          }, 3000);
          $("#user_email").val("");
          $("#user_pass").val("");
        } else {
          window.location = "dashboard.php";
        }
      },
    });
    return false;
  });
  /* add_category ajax code */
  $("#add_category").click(function () {
    var category = $("#category").val();
    var dataString = "category=" + category;
    $.ajax({
      type: "POST",
      url: "action/category_add.php",
      data: dataString,
      success: function (data) {
        if ($.trim(data) == "cat_error") {
          document.getElementById("msg_eror").style.display = "block";
          document.getElementById("al1").style.display = "block";
          setTimeout(function () {
            $("#msg_eror").fadeOut();
            $("#al1").fadeOut();
          }, 3000);
          $("#category").val("");
        } else if ($.trim(data) == "cat_empty") {
          document.getElementById("al3").style.display = "block";
          document.getElementById("msg_empty").style.display = "block";
          setTimeout(function () {
            $("#msg_empty").fadeOut();
            $("#al3").fadeOut();
          }, 3000);
        } else {
          if ($.trim(data) == "cat_success") {
            document.getElementById("msg").style.display = "block";
            document.getElementById("al2").style.display = "block";
            setTimeout(function () {
              $("#msg").fadeOut();
              $("#al2").fadeOut();
            }, 3000);
            $("#category").val("");
          }
        }
      },
    });
    return false;
  });
  /* add_product ajax code */
  $("#productSubmit").click(function () {
    var product_name = $("#product_name").val();
    var cat_id = $("#cat_id").val();
    var product_qty = $("#product_qty").val();
    var product_price = $("#product_price").val();

    var dataString =
      "product_name=" +
      product_name +
      "&cat_id=" +
      cat_id +
      "&product_qty=" +
      product_qty +
      "&product_price=" +
      product_price;
    $.ajax({
      type: "POST",
      url: "action/product_add.php",
      data: dataString,
      success: function (data) {
        if ($.trim(data) == "pd_empty") {
          document.getElementById("pd_eror").style.display = "block";
          document.getElementById("ap1").style.display = "block";
          setTimeout(function () {
            $("#pd_eror").fadeOut();
            $("#ap1").fadeOut();
          }, 1000);
        } else {
          if ($.trim(data) == "pd_success") {
            document.getElementById("pd_msg").style.display = "block";
            document.getElementById("ap2").style.display = "block";
            setTimeout(function () {
              $("#pd_msg").fadeOut();
              $("#ap2").fadeOut();
            }, 1000);
            $("#product_name").val("");
            $("#cat_id").val("");
            $("#product_qty").val("");
            $("#product_price").val("");
          }
        }
      },
    });
    return false;
  });
  /* sell Product ajax code */
  $("#saleSubmit").click(function () {
    var customer_name = $("#customer_name").val();
    var customer_num = $("#customer_num").val();
    var product_name = $("#product_name").val();
    var product_imei = $("#product_imei").val();
    var product_qty = $("#product_qty").val();
    var product_price = $("#product_price").val();
    var product_id = $("#product_id").val();
    var selling_price = $("#selling_price").val();
    var selling_qty = $("#selling_qty").val();
    var total_amount = $("#total_amount").val();
    var payment = $("#payment").val();
    var discount = $("#discount").val();
    var due = $("#due").val();
    var profit = $("#profit").val();

    var dataString =
      "customer_name=" +
      customer_name +
      "&customer_num=" +
      customer_num +
      "&product_name=" +
      product_name +
      "&product_imei=" +
      product_imei +
      "&product_qty=" +
      product_qty +
      "&product_price=" +
      product_price +
      "&product_id=" +
      product_id +
      "&selling_price=" +
      selling_price +
      "&selling_qty=" +
      selling_qty +
      "&total_amount=" +
      total_amount +
      "&payment=" +
      payment +
      "&discount=" +
      discount +
      "&due=" +
      due +
      "&profit=" +
      profit;

    $.ajax({
      type: "POST",
      url: "action/sell_product.php",
      data: dataString,
      success: function (data) {
        if ($.trim(data) == "sell_empty") {
          document.getElementById("sp_eror").style.display = "block";
          document.getElementById("sp1").style.display = "block";
          setTimeout(function () {
            $("#sp_eror").fadeOut();
            $("#sp1").fadeOut();
          }, 1000);
        } else {
          if ($.trim(data) == "sell_success") {
            document.getElementById("sp_msg").style.display = "block";
            document.getElementById("sp2").style.display = "block";
            setTimeout(function () {
              $("#sp_msg").fadeOut();
              $("#sp2").fadeOut();
            }, 1000);
            $("#customer_name").val("");
            $("#customer_num").val("");
            $("#product_name").val("");
            $("#product_imei").val("");
            $("#product_qty").val("");
            $("#product_price").val("");
            $("#product_id").val("");
            $("#selling_price").val("");
            $("#selling_qty").val("");
            $("#total_amount").val("");
            $("#payment").val("");
            $("#discount").val("");
            $("#due").val("");
            $("#profit").val("");
            window.location = "sale_list.php";
          }
        }
      },
    });
    return false;
  });
  /* Registration ajax code */
  $("#userSubmit").click(function () {
    var user_name = $("#user_name").val();
    var user_email = $("#user_email").val();
    var user_pass = $("#user_pass").val();
    var role = $("#role").val();

    var dataString =
      "user_name=" +
      user_name +
      "&user_email=" +
      user_email +
      "&user_pass=" +
      user_pass +
      "&role=" +
      role;
    $.ajax({
      type: "POST",
      url: "action/user_add.php",
      data: dataString,
      success: function (data) {
        if ($.trim(data) == "reg_empty") {
          document.getElementById("r1").style.display = "block";
          document.getElementById("r_empty").style.display = "block";
          setTimeout(function () {
            $("#r1").fadeOut();
            $("#r_empty").fadeOut();
          }, 1000);
        } else if ($.trim(data) == "email_error") {
          document.getElementById("r2").style.display = "block";
          document.getElementById("r_email_error").style.display = "block";
          setTimeout(function () {
            $("#r2").fadeOut();
            $("#r_email_error").fadeOut();
          }, 1000);
        } else if ($.trim(data) == "user_exsit") {
          document.getElementById("r3").style.display = "block";
          document.getElementById("r_user_exsit").style.display = "block";
          setTimeout(function () {
            $("#r3").fadeOut();
            $("#r_user_exsit").fadeOut();
          }, 1000);
        } else {
          if ($.trim(data) == "reg_success") {
            document.getElementById("r4").style.display = "block";
            document.getElementById("r_msg").style.display = "block";
            setTimeout(function () {
              $("#r4").fadeOut();
              $("#r_msg").fadeOut();
            }, 1000);
            $("#user_name").val("");
            $("#user_email").val("");
            $("#user_pass").val("");
            $("#role").val("");
          }
        }
      },
    });
    return false;
  });
  /* return Product ajax code */
  $("#returnSubmit").click(function () {
    var customer_name = $("#customer_name").val();
    var customer_num = $("#customer_num").val();
    var product_name = $("#product_name").val();
    var product_price = $("#product_price").val();
    var selling_qty = $("#selling_qty").val();
    var selling_price = $("#selling_price").val();
    var product_id = $("#product_id").val();
    var total_amount = $("#total_amount").val();
    var payment = $("#payment").val();
    var return_qty = $("#return_qty").val();
    var due = $("#due").val();
    var profit = $("#profit").val();
    var sale_id = $("#sale_id").val();

    var dataString =
      "customer_name=" +
      customer_name +
      "&customer_num=" +
      customer_num +
      "&product_name=" +
      product_name +
      "&product_price=" +
      product_price +
      "&selling_qty=" +
      selling_qty +
      "&selling_price=" +
      selling_price +
      "&product_id=" +
      product_id +
      "&total_amount=" +
      total_amount +
      "&payment=" +
      payment +
      "&return_qty=" +
      return_qty +
      "&due=" +
      due +
      "&profit=" +
      profit +
      "&sale_id=" +
      sale_id;

    $.ajax({
      type: "POST",
      url: "action/return_add.php",
      data: dataString,
      success: function (data) {
        if ($.trim(data) == "return_empty") {
          document.getElementById("rt_empty").style.display = "block";
          document.getElementById("rt1").style.display = "block";
          setTimeout(function () {
            $("#rt_empty").fadeOut();
            $("#rt1").fadeOut();
          }, 1000);
        } else {
          if ($.trim(data) == "return_success") {
            document.getElementById("rt_msg").style.display = "block";
            document.getElementById("rt2").style.display = "block";
            setTimeout(function () {
              $("#rt_msg").fadeOut();
              $("#rt2").fadeOut();
            }, 1000);
            $("#customer_name").val("");
            $("#customer_num").val("");
            $("#product_name").val("");
            $("#product_price").val("");
            $("#selling_qty").val("");
            $("#selling_price").val("");
            $("#product_id").val("");
            $("#total_amount").val("");
            $("#payment").val("");
            $("#return_qty").val("");
            $("#due").val("");
            $("#profit").val("");
            $("#sale_id").val("");
            window.location = "return_list.php";
          }
        }
      },
    });
    return false;
  });
  /* Due pyamnent */
  $("#dueSubmit").click(function () {
    var exsist_due = $("#exsist_due").val();
    var exsist_payment = $("#exsist_payment").val();
    var due_pay = $("#due_pay").val();
    var saleID = $("#saleID").val();
    var customer_name = $("#customer_name").val();
    var customer_num = $("#customer_num").val();
    var product_name = $("#product_name").val();

    var dataString =
      "exsist_due=" +
      exsist_due +
      "&exsist_payment=" +
      exsist_payment +
      "&due_pay=" +
      due_pay +
      "&saleID=" +
      saleID +
      "&customer_name=" +
      customer_name +
      "&customer_num=" +
      customer_num +
      "&product_name=" +
      product_name;

    $.ajax({
      type: "POST",
      url: "action/due_payment.php",
      data: dataString,
      success: function (data) {
        if ($.trim(data) == "d_empty") {
          document.getElementById("d_eorr").style.display = "block";
          document.getElementById("d1").style.display = "block";
          setTimeout(function () {
            $("#d_msg").fadeOut();
            $("#d1").fadeOut();
          }, 1000);
        } else {
          if ($.trim(data) == "success") {
            document.getElementById("d_msg").style.display = "block";
            document.getElementById("d2").style.display = "block";
            setTimeout(function () {
              $("#d_msg").fadeOut();
              $("#d2").fadeOut();
            }, 1000);
            $("#exsist_due").val("");
            $("#exsist_payment").val("");
            $("#due_pay").val("");
            $("#saleID").val("");
            window.location = "due_list.php";
          }
        }
      },
    });
    return false;
  });
  /* new service  */
  $("#ServiceSubmit").click(function () {
    var customer_name = $("#customer_name").val();
    var customer_num = $("#customer_num").val();
    var service_details = $("#service_details").val();
    var service_price = $("#service_price").val();
    var service_exp = $("#service_exp").val();

    var dataString =
      "customer_name=" +
      customer_name +
      "&customer_num=" +
      customer_num +
      "&service_details=" +
      service_details +
      "&service_price=" +
      service_price +
      "&service_exp=" +
      service_exp;

    $.ajax({
      type: "POST",
      url: "action/service_add.php",
      data: dataString,
      success: function (data) {
        if ($.trim(data) == "ser_empty") {
          document.getElementById("sr_eror").style.display = "block";
          document.getElementById("sr1").style.display = "block";
          setTimeout(function () {
            $("#sr_eror").fadeOut();
            $("#sr1").fadeOut();
          }, 1000);
        } else {
          if ($.trim(data) == "ser_success") {
            document.getElementById("sr_msg").style.display = "block";
            document.getElementById("sr2").style.display = "block";
            setTimeout(function () {
              $("#sr_msg").fadeOut();
              $("#sr2").fadeOut();
            }, 1000);
            $("#customer_name").val("");
            $("#customer_num").val("");
            $("#service_details").val("");
            $("#service_price").val("");
            $("#service_exp").val("");
          }
        }
      },
    });
    return false;
  });
  /* Staff Add  */
  $("#StaffSubmit").click(function () {
    var staff_name = $("#staff_name").val();
    var staff_num = $("#staff_num").val();
    var staff_nid = $("#staff_nid").val();
    var staff_salary = $("#staff_salary").val();
    var staff_address = $("#staff_address").val();

    var dataString =
      "staff_name=" +
      staff_name +
      "&staff_num=" +
      staff_num +
      "&staff_nid=" +
      staff_nid +
      "&staff_salary=" +
      staff_salary +
      "&staff_address=" +
      staff_address;

    $.ajax({
      type: "POST",
      url: "action/staff_add.php",
      data: dataString,
      success: function (data) {
        if ($.trim(data) == "stf_empty") {
          document.getElementById("st_eror").style.display = "block";
          document.getElementById("st1").style.display = "block";
          setTimeout(function () {
            $("#st_eror").fadeOut();
            $("#st1").fadeOut();
          }, 1000);
        } else {
          if ($.trim(data) == "stf_success") {
            document.getElementById("st_msg").style.display = "block";
            document.getElementById("st2").style.display = "block";
            setTimeout(function () {
              $("#st_msg").fadeOut();
              $("#st2").fadeOut();
            }, 1000);
            $("#staff_name").val("");
            $("#staff_num").val("");
            $("#staff_nid").val("");
            $("#staff_salary").val("");
            $("#staff_address").val("");
          }
        }
      },
    });
    return false;
  });
  /* expence Add  */
  $("#ExpenceSubmit").click(function () {
    var expence_details = $("#expence_details").val();
    var expence_amount = $("#expence_amount").val();

    var dataString =
      "expence_details=" +
      expence_details +
      "&expence_amount=" +
      expence_amount;

    $.ajax({
      type: "POST",
      url: "action/expence_add.php",
      data: dataString,
      success: function (data) {
        if ($.trim(data) == "ex_empty") {
          document.getElementById("e_empty").style.display = "block";
          document.getElementById("e1").style.display = "block";
          setTimeout(function () {
            $("#e_empty").fadeOut();
            $("#e1").fadeOut();
          }, 1000);
        } else {
          if ($.trim(data) == "ex_success") {
            document.getElementById("e_msg").style.display = "block";
            document.getElementById("e2").style.display = "block";
            setTimeout(function () {
              $("#e_msg").fadeOut();
              $("#e2").fadeOut();
            }, 1000);
            $("#expence_details").val("");
            $("#expence_amount").val("");
          }
        }
      },
    });
    return false;
  });
  //
});
