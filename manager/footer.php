<footer class="cm-footer"><span class="pull-left">Developed By Step Network - 0245908362 </span><span class="pull-right">&copy; <?php echo date('Y') ?></span></footer>
        </div>
        <script src="../js/lib/jquery-2.1.3.min.js"></script>
        <script src="../js/jquery.mousewheel.min.js"></script>
        <script src="../js/jquery.cookie.min.js"></script>
        <script src="../js/fastclick.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables.bootstrap.min.js"></script>
        <script src="../js/clearmin.min.js"></script>
        <script src="../js/demo/home.js"></script>
        <script src="../js/validator.js"></script>
        <script src="../my_ajax.js"></script>

        <script type="text/javascript">
            $("#my_selected_table").dataTable();
        </script>

        <?php  

        if(isset($_GET['dashboard'])){  ?>
        <script src="../js/demo/dashboard.js"></script>
        <script src="../js/lib/c3.min.js"></script>
        <script src="../js/lib/d3.min.js"></script>

         <script type="text/javascript">
        $(document).ready(function() {
        // Create two variable with the names of the months and days in an array
        var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
        var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

        // Create a newDate() object
        var newDate = new Date();
        // Extract the current date from Date object
        newDate.setDate(newDate.getDate());
        // Output the day, date, month and year
        $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

        setInterval( function() {
            // Create a newDate() object and extract the seconds of the current time on the visitor's
            var seconds = new Date().getSeconds();
            // Add a leading zero to seconds value
            $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
            },1000);

        setInterval( function() {
            // Create a newDate() object and extract the minutes of the current time on the visitor's
            var minutes = new Date().getMinutes();
            // Add a leading zero to the minutes value
            $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
            },1000);

        setInterval( function() {
            // Create a newDate() object and extract the hours of the current time on the visitor's
            var hours = new Date().getHours();
            // Add a leading zero to the hours value
            $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
            }, 1000);
        });
</script>

     <?php   }elseif (isset($_GET['add_supplier']) || isset($_GET['manage_supplier'])) {  ?>
         <script src="../js/select2.full.min.js"></script>
         <script type="text/javascript">
              $('.select2').select2();
         </script>
    
    <?php }else{};
         ?>
        
    </body>
</html>
