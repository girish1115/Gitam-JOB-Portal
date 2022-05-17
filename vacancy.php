<?
    include 'includes/config.php';
    //include 'includes/auth.php';
    include 'includes/header.php';
    include 'includes/header2.php';
?> 
    <div class="container mt-4">
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) --> 
        <table id="example" class="display" style="width:100%">
          <thead>
            <tr>
                <td>S. No</td>
                <td>Profile Type</td>
                <td>Designation</td>            
                <td>Annual Salary</td>   
                <td>Venue</td>  
                <td>Event Date</td>  
                <td>Total Vacancy</td> 
                <td>Company Name</td> 
            </tr>
          </thead>
        <tbody>
        <?  
            $result=$con->query("SELECT * FROM `vacancy` ORDER BY vac_id ASC"); 
            $j=1;
            while($row = mysqli_fetch_assoc($result)) { ?> 
            <tr>
                <td><?= $j++; ?></td>
                <td><?=$row['vac_profile']?></td> 
                 <td>Register to View the details and contact</td>
                 <td> </td>
                 <td> </td>
                 <td> </td> 
                 <td> </td> 
                <td><?=$row['vac_company']?></td>  
            </tr>
            <? } ?>
        </tbody> 
        </table>
      </div><!-- /.container-fluid -->
    </section> 
            </div>
         <? include 'includes/footer.php'; ?>
        <script>
        $(document).ready(function() {
            
            var table = $('#example').DataTable({
                orderCellsTop: true,
                fixedHeader: true
            });
        });
    </script>
    </body>  
</html>