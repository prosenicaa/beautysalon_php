$(document).ready(function () {
  //ajax for READ data
  function showdata() {
    output = "";
    $.ajax({
      url: "handler/get.php",
      method: "GET",
      dataType: "json",
      success: function (data, status) {
        // console.log(data);
        if (data) {
          x = data;
        } else {
          x = "";
        }
        for (i = 0; i < x.length; i++) {
          output +=
            "<tr><td>" +
            x[i].id +
            "</td><td>" +
            x[i].fullname +
            "</td><td>" +
            x[i].date +
            "</td><td>" +
            x[i].service +
            "</td><td> <button class='btn btn-warning btn-sm btn-edit' data-sid=" +
            x[i].id +
            ">Edit</button> <button class='btn btn-danger btn-sm btn-del' data-sid=" +
            x[i].id +
            ">Delete</button></td></tr>";
        }
        $("#tbody").html(output);
      },
    });
  }

  showdata();
  //ajax for INSERT data
  $("#btnadd").click(function (e) {
    e.preventDefault();
    console.log("Save Button clicked");
    let aid = $("#apid").val();
    let fn = $("#fullnameid").val();
    let dt = $("#dateid").val();
    let sr = $("#serviceid").val();
    // console.log(fn);
    // console.log(dt);
    // console.log(sr);

    $.ajax({
      url: "handler/add.php",
      method: "POST",
      data: {
        idsend: aid,
        fullnameSend: fn,
        dateSend: dt,
        serviceSend: sr,
      },
      success: function (data, status) {
        console.log(data);
        msg = "<div class='alert alert-dark mt-3'>" + data + "</div>";
        $("#msg").html(msg);
        $("#myform")[0].reset();
        showdata();
      },
    });
  });

  //ajax for DELETE data
  $("tbody").on("click", ".btn-del", function () {
    console.log("Delete button clicked!");
    const deleteid = $(this).data("sid");
    console.log(deleteid);
    mythis = this;
    $.ajax({
      url: "handler/delete.php",
      method: "POST",
      data: {
        deletesend: deleteid,
      },
      success: function (data) {
        console.log(data);
        if (data == 1) {
          msg =
            "<div class='alert alert-dark mt-3'>Client deleted successfully!</div>";
          $(mythis).closest("tr").fadeOut();
        } else if (data == 0) {
          msg =
            "<div class='alert alert-dark mt-3'>Unable to delete client!</div>";
        }
        $("#msg").html(msg);
      },
    });
  });

  //ajax for UPDATE data

  $("tbody").on("click", ".btn-edit", function () {
    console.log("Edit button clicked!");
    const editid = $(this).data("sid");
    console.log(editid);
    $.ajax({
      url: "handler/update.php",
      method: "POST",
      data: {
        editsend: editid,
      },
      success: function (data) {
        // console.log(data);
        const jsonData = JSON.parse(data);

        const id = jsonData[0].id;
        const fullname = jsonData[0].fullname;
        const date = jsonData[0].date;
        const service = jsonData[0].service;

        $("#apid").val(id);
        $("#fullnameid").val(fullname);
        $("#dateid").val(date);
        $("#serviceid").val(service);
      },
    });
  });
});
