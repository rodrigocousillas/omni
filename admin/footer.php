    </div><!-- /#wrapper -->

       <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.4.3/morris.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
    <!--
    <script src="js/ckeditor/ckeditor.js"></script>
    <script src="js/ckfinder/ckfinder.js"></script>
    <script src="js/ckeditor/adapters/jquery.js"></script>  
    -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.js"></script>   

        <script>
        /*
        CKEDITOR.disableAutoInline = true;
        CKEDITOR.config.skin = 'bootstrapck';

        $( document ).ready( function() {
            var editor = CKEDITOR.replace( 'editor1' );
            CKFinder.setupCKEditor( editor, 'js/ckfinder/' );
        } );

        function setValue() {
            $( '#editor1' ).val( $( 'input#val' ).val() );
        }
        */
    
            $(function() {
                $( "#fecha" ).datepicker({ dateFormat: "yy-mm-dd" });
                jQuery('#fecha2').datetimepicker();
            });


        </script>
  </body>
</html>

