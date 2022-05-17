<?
include 'includes/auth.php';
include 'includes/header.php';
include 'includes/header2.php'; 
include 'includes/config.php';

$rs=mysqli_query($con,"SELECT * from `student` WHERE student_branch='".$_GET['student_branch']."' AND student_tenth>='".$_GET['student_tenth']."' AND student_inter>='".$_GET['student_inter']."' AND student_grad>='".$_GET['student_grad']."'");
$counter=mysqli_num_rows($rs);
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Email</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Bulk Email</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <table id="studentverify" class="table table-bordered table-hover">
              <thead>
                  <tr>
                      <td>S. No</td>
                      <td>Name</td>
                      <td>ID No</td> 
                      <td>Branch</td>
                      <td>10%</td>
                      <td>Inter%</td>
                      <td>B. Tech%</td>
                      <td>Select</td> 
                      <td>Send Email</td>
                  </tr>
              </thead>
              <tbody>
                <? $j=1; 
                  $count = 0;
                  
                 while($rw = mysqli_fetch_assoc($rs)) {
                   $count = $count + 1; 
                   ?>
                   <tr>
                    <td><?=$j++;?></td>
                    <td><?=$rw['student_name']?></td>
                    <td><?=$rw['student_idno']?></td> 
                    <td><?=$rw['student_branch']?></td>
                    <td><?=$rw['student_tenth']?></td>
                    <td><?=$rw['student_inter']?></td>
                    <td><?=$rw['student_grad']?></td>
                    <td>
                        <input type="checkbox" name="single_select" class="single_select" data-email="<?=$rw["student_email"]?>" data-name="<?=$rw["student_name"]?>" />
						        </td>
                    <td>
                        <button type="button" name="email_button" class="btn btn-info btn-xs email_button" id="<?=$count?>" data-email="<?=$rw["student_email"]?>" data-name="<?=$rw["student_name"]?>" data-action="single">Send Single</button>
                    </td>
                 </tr>
                 <? } ?>
              </tbody>
              <? if($counter>=1){ ?>
              <tfoot>
              <tr>
                  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  <td>
                  
                    <label for='selectAll'>Select All</label><br/>
                    <input id="selectAll" type="checkbox">
                    
                  </td>
                  <td>
                    <button type="button" name="bulk_email" class="btn btn-info email_button" id="bulk_email" data-action="bulk">Send Bulk</button>
                  </td> 
                 
              </tr>
              </tfoot>
              <? } ?>
          </table>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
  <? include 'includes/footer.php'; ?>
  <script>

$(function() { 
   $('#studentverify').DataTable({
           "paging": true,
           "lengthChange": true,
           "searching": true,
           "ordering": true,
           "info": true,
           "autoWidth": true,
           "responsive": true,
       }); 
   });
   $(document).ready(function(){
	$('.email_button').click(function(){
		$(this).attr('disabled', 'disabled');
		var id  = $(this).attr("id");
		var action = $(this).data("action");
		var email_data = [];
		if(action == 'single')
		{
			email_data.push({
				email: $(this).data("email"),
				name: $(this).data("name")
			});
		}
		else
		{
			$('.single_select').each(function(){
				if($(this).prop("checked") == true)
				{
					email_data.push({
						email: $(this).data("email"),
						name: $(this).data('name')
					});
				} 
			});
		}

		$.ajax({
			url:"send_mail.php",
			method:"POST",
			data:{email_data:email_data},
			beforeSend:function(){
				$('#'+id).html('Sending...');
				$('#'+id).addClass('btn-danger');
			},
			success:function(data){
				if(data == 'ok')
				{
					$('#'+id).text('Success');
					$('#'+id).removeClass('btn-danger');
					$('#'+id).removeClass('btn-info');
					$('#'+id).addClass('btn-success');
				}
				else
				{
					$('#'+id).text(data);
				}
				$('#'+id).attr('disabled', false);
			}
		})

	});
});
$("#selectAll").click(function() {
  $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
});

$("input[type=checkbox]").click(function() {
  if (!$(this).prop("checked")) {
    $("#selectAll").prop("checked", false);
  }
}); 
</script>