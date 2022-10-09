$(document).ready(function(){
  $("input[name=search_requests]").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#request_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
    $("input[name=search_register]").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#register_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
$("input[name=search_events]").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#events_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
$("input[name=search_cre]").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#cre_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
$("input[name=search_pro]").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#prog_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
$("input[name=search_qu]").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#qu_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
$("input[name=search_gd]").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#gd_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
$("input[name=search_rob]").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#rob_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
$("input[name=search_game]").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#game_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
$("input[name=search_sur]").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#sur_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
$("input[name=search_fm]").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#fm_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
$("input[name=search_hh]").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#hh_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
$("input[name=search_filtered]").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#filtered_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

$("input[name=search_tk]").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tk_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

$("input[name=search_mm]").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mm_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

var acc = document.getElementsByClassName("accordion");
  var icons = document.getElementsByClassName("fa");
  var str = document.getElementsByClassName("fa icon");
  var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    var icon = this.children;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
      panel.style.display = "none";
      icon[0].classList.replace("fa-minus-circle","fa-plus-circle");
    } else {
      panel.style.maxHeight = "fit-content";
      panel.style.display = "block";
      icon[0].classList.replace("fa-plus-circle","fa-minus-circle");
    } 
  });
}
});

function download_csv(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV FILE
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // We have to create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Make sure that the link is not displayed
    downloadLink.style.display = "none";

    // Add the link to your DOM
    document.body.appendChild(downloadLink);

    // Lanzamos
    downloadLink.click();
}

function export_table_to_csv(html, filename) {
  var csv = [];
  var rows = html.querySelectorAll("tr");
    for (var i = 0; i < rows.length; i++) {
    var row = [], cols = rows[i].querySelectorAll("td, th");
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
    csv.push(row.join(","));    
  }

    // Download CSV
    download_csv(csv.join("\n"), filename);
}


function export_helper(id){
  const newew = document.getElementById(id);
  const filename = id + ".csv"
  export_table_to_csv(newew, filename);
}