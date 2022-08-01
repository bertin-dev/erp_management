
$(function () {

    var dataTable1 = $('#transactiontable1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                text: 'COPIER'
            },
            {
                extend: 'excel',
                text: 'EXPORTER EXCEL'
            },
            {
                extend: 'pdf',
                orientation: 'landscape',
                text: 'EXPORTER PDF'
            },{
                extend: 'print',
                text: 'IMPRIMER',
            }
        ],
        "aaSorting": [[ 0, "desc" ]],
        responsive: {
            details: false
        }
    });

    $("#startdate").datepicker({
        "dateFormat": "dd/mm/yy",
        "onSelect": function(date) { 
          minDateFilter = new Date(date).getTime();
          dataTable1.draw(); // Redraw the table with the filtered data.
        }
      }).change(function() {
        minDateFilter = new Date(this.value).getTime();
        dataTable1.draw();
      });
      
      $("#enddate").datepicker({
        "dateFormat": "dd/mm/yy",
        "onSelect": function(date) {
          maxDateFilter = new Date(date).getTime();
          dataTable1.draw();
        }
      }).change(function() {
        maxDateFilter = new Date(this.value).getTime();
        dataTable1.draw();
      });
      
      // The below code actually does the date filtering.
      minDateFilter = "";
      maxDateFilter = "";
      
      $.fn.dataTableExt.afnFiltering.push(
        function(oSettings, aData, iDataIndex) {
          if (typeof aData._date == 'undefined') {
            aData._date = new Date(aData[1]).getTime(); // Your date column is 3, hence aData[3].
        }
      
          if (minDateFilter && !isNaN(minDateFilter) && !isNaN(aData._date)) {
            console.log(minDateFilter);
            console.log(aData._date);
            if (aData._date < minDateFilter) {
              return false;
            }
          }
      
          if (maxDateFilter && !isNaN(maxDateFilter) && !isNaN(aData._date)) {
            console.log(maxDateFilter);
            console.log(aData._date);
            if (aData._date > maxDateFilter) {
              return false;
            }
          }
      
          return true;
        }
      );
 

    var dataTable = $('#datatable1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                text: 'COPIER'
            },
            {
                extend: 'excel',
                text: 'EXPORTER EXCEL'
            },
            {
                extend: 'pdf',
                orientation: 'landscape',
                text: 'EXPORTER PDF'
            },{
                extend: 'print',
                text: 'IMPRIMER',
            }
        ],
        "aaSorting": [[ 0, "desc" ]],
        responsive: {
            details: false
        }
    });



    $(document).on('sidebarChanged', function () {

        dataTable.columns.adjust();

        dataTable.responsive.recalc();

        dataTable.responsive.rebuild();

    });


    var dataTable2 = $('#datatable2').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                text: 'COPIER'
            },
            {
                extend: 'excel',
                text: 'EXPORTER EXCEL'
            },
            {
                extend: 'pdf',
                orientation: 'landscape',
                text: 'EXPORTER PDF'
            },{
                extend: 'print',
                text: 'IMPRIMER',
            }
        ],
        "aaSorting": [[ 0, "desc" ]],
        responsive: {
            details: false
        }
    }

    );



    $(document).on('sidebarChanged', function () {

        dataTable2.columns.adjust();

        dataTable2.responsive.recalc();

        dataTable2.responsive.rebuild();

    });



});



