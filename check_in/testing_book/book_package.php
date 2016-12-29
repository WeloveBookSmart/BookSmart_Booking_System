<h1>$service_name</h1>

<table class="table table-striped"<thead>
   <tr>
	  <th>ID</th>
	  <th>Name</th>
	  <th>Price</th>
	  <th>Booking Condition</th>
   </tr>
   </thead>
   <tbody>
	  <tr data-toggle="modal" data-id="1" data-target="#packageModal">
		<td><?php echo $package_id; ?></td>
		<td><?php echo $package_name; ?></td>
		<td><?php echo $package_price; ?></td>
		<td><?php echo $package_status; ?></td>
	  </tr>
    </tbody>
   </table>
   <div id="packageModal" class="modal hide fade" role="dialog" aria-labelledby = "packageModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h3>Package Provided:</h3>
			<div id="packageDetails" class="modal-body"></div>
			<div id="packageItem" class="modal-body"></div>
			  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>
<script>
$(function(){
	$('#packageModal').modal({
		keyboard: true,
		backdrop: "static",
		show: false,
		
	}).on('show',function(){
		var getIdFromRow = $(event.target).closest('tr').data('id');
		//making the ajax populate with items 
		$(this).find('#packageDetails').html($('<b>Package provided:'+getIdFromRow + '</br>'))
	  });
	 }); 
</script>