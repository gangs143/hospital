                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <!-- <script src="../js/jquery.js"></script> -->

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
    <!-- <script src="../sweetalert/src/sweetalert.js"></script> -->

    <!-- <script src="../js/bootbox.min.js"></script> -->
    <script src="../datatables/datatables.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootbox.min.js"></script>

    <script>
        $(document).ready( function () {
            // $('#table_id').DataTable();

        } );

    </script>

</body>

</html>

<script>
    $('#logout').click(function() {
        var logout = "logout";
        $.ajax({
            url: "../login/login.php",
            method: "POST",
            data: {logout: logout},
            success: function(data) {
                window.location.replace("../login");
            }
        })
    });

    loadColors();

    function loadColors() {
        var color = "color";
        $.ajax({
            url: "operations/select.php",
            method: "POST",
            data: {color: color},
            success: function(data) {
                $('#colorList').html(data);
            }
        });
    }

    $(document).on('click', '#colorName', function() {
        var color = $(this).attr('name');
        $('#navbar-inverse').css('background-color', color);
        $('.side-nav').css('background-color', color);
    });
    $(document).ajaxComplete(function(){
        $('.btn-edit').tooltip({
            placement:'top',
            title:'EDIT',
            animation:false
        }),
        $('.btn-delete').tooltip({
            placement:'top',
            title:'DELETE',
            animation:false
        }),
        $('.btn-assign').tooltip({
            placement:'top',
            title:'ASSIGN',
            animation:false,
            html:false
        })
    })
</script>
