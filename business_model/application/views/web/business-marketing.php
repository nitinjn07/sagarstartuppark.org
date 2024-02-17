<?php include('header.php'); ?>

<div class="content-wrapper">

	<div class="row">
		
		<div class="col-md-12">
			
			<div class="card">
				
				<div class="card-header">
					<h4>How will the Business be Marketed?</h4>
				</div>

				<div class="card-body">

					<?php  $response = $this->db->get_where('business_marketing', array('uid'=>$this->session->userdata('uid')));

        				if($response->num_rows() > 0) {

        				$d = $response->row();  ?>

					
						<form action="<?= base_url(); ?>PhaseTwo/business_marketing" method="post">
							
							<div class="form-group">
								<div class="col-md-12">	<label>Add Marketing Plan:</label></div>
								<label class="radio-inline">
							      <input type="radio" name="marketing_plan" class="market_plan" <?php if($d->marketing_plan == 1){ echo 'checked'; } ?> value="1"> Yes
							    </label>
							    &nbsp;&nbsp;&nbsp;
							    <label class="radio-inline">
							      <input type="radio" name="marketing_plan" class="market_plan" <?php if($d->marketing_plan == 0){ echo 'checked'; } ?> value="0"> No
							    </label>
							</div>

							<div class="form-group" id="current_resone" <?php if($d->marketing_plan == 0) echo 'style="display: none;"'; ?>>
								<label>Describe your marketing/promotion plan and methods (use complete sentences):</label>
								<div class="col-md-4">
									<textarea class="form-control" rows="5" name="mp"><?= $d->mp; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								 <button type="submit" class="btn btn-success text-white">Update</button>
							</div>

						</form>

        			<?php } else { ?>
					
						<form action="<?= base_url(); ?>PhaseTwo/business_marketing" method="post">
							
							<div class="form-group">
								<div class="col-md-12">	<label>Add Marketing Plan:</label></div>
								<label class="radio-inline">
							      <input type="radio" name="marketing_plan" class="market_plan" value="1"> Yes
							    </label>
							    &nbsp;&nbsp;&nbsp;
							    <label class="radio-inline">
							      <input type="radio" name="marketing_plan" class="market_plan" value="0"> No
							    </label>
							</div>

							<div class="form-group" id="current_resone"  style="display: none;">
								<label>Describe your marketing/promotion plan and methods (use complete sentences):</label>
								<div class="col-md-4">
									<textarea class="form-control" rows="5" name="mp"></textarea>
								</div>
							</div>

							<div class="form-group">
								 <button type="submit" class="btn btn-success text-white">Save & Continue</button>
							</div>

						</form>

					<?php } ?>

				</div>

			</div>

		</div>

	</div>


</div>
<?php include('footer.php'); ?>

<script type="text/javascript">

	$('.market_plan').click(function(e){

		var market_plan = $(this).val();

		if(market_plan == '1'){
			$('#current_resone').show();
		}else{
			$('#current_resone').hide();
		}

	});

</script>