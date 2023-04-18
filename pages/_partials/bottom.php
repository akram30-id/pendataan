        </div> <!-- ./col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main -->
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../assets/js/bootstrap.min.js"></script>

    <!-- Datatable -->
    <script src="../../assets/js/jquery.dataTables.min.js" charset="utf-8"></script>
    <script src="../../assets/js/dataTables.bootstrap.min.js" charset="utf-8"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').DataTable();
    });
    </script>

    <!-- Date Range Picker -->
    <script type="text/javascript" src="../../assets/js/moment.min.js"></script>
    <script type="text/javascript" src="../../assets/js/daterangepicker.js"></script>
    <script type="text/javascript">
    $(function() {
        $('.datepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'YYYY-MM-DD',
              monthNames: [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember"
             ],
              "daysOfWeek": [
                "Mg",
                "Sn",
                "Sl",
                "Rb",
                "Km",
                "Jm",
                "Sb"
              ]
            }
        });
    });
    </script>

    <!-- Bootstrap Select -->
    <script src="../../assets/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">
    $('.selectlive').selectpicker({
      liveSearch: true,
      size: 6
    });
    $('.selectpicker').selectpicker();
    </script>

    <!-- Lightbox -->
    <script src="../../assets/lib/lightbox/js/lightbox.min.js"></script>

    <!-- JQuery Auto-Complete -->
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <?php if (isset($chart)) { ?>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src=<?= $chart ?> type="module"></script>
    <?php } ?>

    <?php if (isset($ajax)) { ?>
      <script src=<?= $ajax ?> type="module"></script>
    <?php } ?>
  </body>
</html>
