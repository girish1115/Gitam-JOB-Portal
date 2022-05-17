<?
 include 'includes/config.php';
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type='text/javascript' src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
<table id="example" class="display" style="width:100%">
          <thead>
            <tr>
                <td>S. No</td>
                <td>Student Name</td>
                <td>ID Number</td>            
                <td>Branch</td>  
                <td>Batch</td>  
                <td>Tenth %</td>  
                <td>Inter %</td>  
                <td>Btech %</td> 
                <td>Image</td> 
                <td>Edit</td>   
                <td>Delete</td>  
            </tr>
          </thead>
        <tbody>
        <?  
            $result=$con->query("SELECT * FROM `student` ORDER BY student_id ASC"); 
            $j=1;
            while($row = mysqli_fetch_assoc($result)) { ?> 
            <tr>
                <td><?= $j++; ?></td>
                <td><?=$row['student_name']?></td>
                <td><?=$row['student_idno'] ?></td>  
                <td><?=$row['student_branch'] ?></td> 
                <td><?=$row['student_batch'] ?></td>  
                <td><?=$row['student_tenth'] ?></td> 
                <td><?=$row['student_inter'] ?></td>  
                <td><?=$row['student_grad']?></td> 
                <td><img src="uploads/students/<?=$row['student_profile']?>" width="100px"/></td>  
                <td><a class="btn btn-success" href="edit_student.php?edit=<?=$row['student_id']?>">Edit</a></td> 
                <td><a class="btn btn-danger" href="verify_student.php?del=<?=$row['student_id']?>">Delete</a></td> 
            </tr>
            <? } ?>
        </tbody>
         <tfoot>
            <tr>
                <td>S. No</td>
                <td>Student Name</td>
                <td>ID Number</td>            
                <td>Branch</td>  
                <td>Batch</td>  
                <td>Tenth %</td>  
                <td>Inter %</td>  
                <td>Btech %</td> 
                <td>Image</td> 
                <td>Edit</td>   
                <td>Delete</td>  
            </tr>
         </tfoot>
        </table>
        <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example thead tr').clone(true).appendTo('#example thead');
            $('#example thead tr:eq(1) th').each(function(i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');

                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            }); 
            var table = $('#example').DataTable({
                orderCellsTop: true,
                fixedHeader: true
            });
        });
    </script>