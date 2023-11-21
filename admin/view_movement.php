<?php include 'db_connect.php' ?> 
<thead>
								<tr>
									
									<th class="">Borrower</th>
									<th class="">Date Pick-up</th>
									<th class="">Date Drop-off</th>
									<th class="">Car Info</th>
									<th class="">Status</th>
									
								</tr>
							</thead>
<tbody>
								<?php 
								$i = 1;
								$cat = array();
								$cat[] = '';
								$qry = $conn->query("SELECT * FROM categories ");
								while($row = $qry->fetch_assoc()){
									$cat[$row['id']] = $row['name'];
								}
								$tt = array();
								$tt[] = '';
								$qry = $conn->query("SELECT * FROM transmission_types ");
								while($row = $qry->fetch_assoc()){
									$tt[$row['id']] = $row['name'];
								}
								$et = array();
								$et[] = '';
								$qry = $conn->query("SELECT * FROM engine_types ");
								while($row = $qry->fetch_assoc()){
									$et[$row['id']] = $row['name'];
								}
								$movements = $conn->query("SELECT bc.status as bstatus,b.*,c.model,c.brand,c.transmission_id,c.engine_id,c.price FROM borrowed_cars bc inner join books b on b.id = bc.booked_id inner join cars c on c.id = b.car_id ");
								while($row=$movements->fetch_assoc()):
									
								?>
								<tr>
									
									<td class="">
										 <p> <b>Name <?php echo ucwords($row['name']) ?></b></p>
										 <p><b>ID <?php echo ucwords($row['identification']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo date("M d,Y h:i A",strtotime($row['pickup_datetime'])) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo date("M d,Y h:i A",strtotime($row['dropoff_datetime'])) ?></b></p>
									</td>
									<td>
										 <p>Brand: <b><?php echo ucwords($row['brand']) ?></b></p>
										 <p>Model: <b><?php echo ucwords($row['model']) ?></b></p>
										 <p>Registration #: <b><?php echo ($row['car_registration_no']) ?></b></p>
										 <p>Plate #: <b><?php echo ($row['car_plate_no']) ?></b></p>
										 <p>Price #: <b><?php echo ($row['price']) ?></b></p>
									</td>
									<td>
										<?php if($row['bstatus'] == 1): ?>
										<span class="badge badge-primary">Picked-up</span>
										<?php else: ?>
										<span class="badge badge-success">Droped-off</span>
										<?php endif; ?>

										<div class="modal-footer display">
	<div class="row">
		<div class="col-lg-12">
			<br>
			<button type="button" class="btn btn-primary" onclick="window.print()">Print Receipt</button><br><br><br><br>
			<button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
									</td>
									
								</tr>
								<?php endwhile; ?>
							</tbody>
<style type="text/css">
	
	.avatar {
	    max-width: calc(100%);
	    max-height: 27vh;
	    align-items: center;
	    justify-content: center;
	    padding: 5px;
	}
	.avatar img {
	    max-width: calc(100%);
	    max-height: 27vh;
	}
	p{
		margin:unset;
	}
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: block
	}
</style>
<div class="container-field">
	<div class="col-lg-12">
		<div>
			<center>
				<div class="avatar">
				 <img src="assets/uploads/cars_img/<?php echo $img_path ?>" class="" alt="">
				</div>
			</center>
		</div>
		<hr>
		
	</div>
</div>

<script>
	
</script>
