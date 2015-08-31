<?php if ( ! defined('BASE_PATH') ) exit('No direct script access allowed');
/**
 * View Semester View
 *  
 * PHP 5.4+
 *
 * eduTrac(tm) : Student Information System (http://www.7mediaws.org/)
 * @copyright (c) 2013 7 Media Web Solutions, LLC
 * 
 * @link        http://www.7mediaws.org/
 * @since       3.0.0
 * @package     eduTrac
 * @author      Joshua Parker <josh@7mediaws.org>
 */
$app = \Liten\Liten::getInstance();
$app->view->extend('_layouts/dashboard');
$app->view->block('dashboard');
$message = new \app\src\Messages;
$screen = 'sem';
?>

<script type="text/javascript">
$(".panel").show();
setTimeout(function() { $(".panel").hide(); }, 5000);
</script>

<ul class="breadcrumb">
	<li><?=_t( 'You are here');?></li>
	<li><a href="<?=url('/');?>dashboard/<?=bm();?>" class="glyphicons dashboard"><i></i> <?=_t( 'Dashboard' );?></a></li>
	<li class="divider"></li>
	<li><a href="<?=url('/');?>form/semester/<?=bm();?>" class="glyphicons adjust_alt"><i></i> <?=_t( 'Semester' );?></a></li>
	<li class="divider"></li>
	<li><?=_t( 'View Semester' );?></li>
</ul>

<h3><?=_t( 'View Semester' );?></h3>
<div class="innerLR">

<?=$message->flashMessage();?>
    
    <?php jstree_sidebar_menu($screen); ?>

	<!-- Form -->
	<form class="form-horizontal margin-none" action="<?=url('/');?>form/semester/<?=_h($semester[0]['semesterID']);?>/" id="validateSubmitForm" method="post" autocomplete="off">
		
		<!-- Widget -->
		<div class="widget widget-heading-simple widget-body-gray <?=(has_filter('sidebar_menu')) ? 'col-md-12' : 'col-md-10';?>">
		
			<!-- Widget heading -->
			<div class="widget-head">
				<h4 class="heading"><font color="red">*</font> <?=_t( 'Indicates field is required.' );?></h4>
			</div>
			<!-- // Widget heading END -->
			
			<div class="widget-body">
			
				<!-- Row -->
				<div class="row">
					
					<!-- Column -->
					<div class="col-md-6">
                        
                        <!-- Group -->
    					<div class="form-group">
                            <label class="col-md-3 control-label"><font color="red">*</font> <?=_t( 'Academic Year' );?></label>
							<div class="col-md-8">
								<select name="acadYearCode" class="selectpicker col-md-12 form-control" data-style="btn-info" data-size="10" data-live-search="true"<?=gio();?> required>
									<option value="">&nbsp;</option>
                            		<?php table_dropdown("acad_year", 'acadYearCode <> "NULL"', "acadYearCode", "acadYearCode", "acadYearDesc", _h($semester[0]['acadYearCode'])); ?>
                            	</select>
							</div>
						</div>
						<!-- // Group END -->
                    
                        <!-- Group -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="semCode"><font color="red">*</font> <?=_t( 'Semester Code' );?></label>
                            <div class="col-md-8"><input class="form-control" type="text"<?=gio();?> name="semCode" value="<?=_h($semester[0]['semCode']);?>" /></div>
                        </div>
                        <!-- // Group END -->
					
						<!-- Group -->
						<div class="form-group">
                            <label class="col-md-3 control-label" for="semName"><font color="red">*</font> <?=_t( 'Semester' );?></label>
							<div class="col-md-8"><input class="form-control"<?=gio();?> name="semName" type="text" value="<?=_h($semester[0]['semName']);?>" /></div>
						</div>
						<!-- // Group END -->
						
					</div>
					<!-- // Column END -->
					
					<!-- Column -->
					<div class="col-md-6">
					    
					    <!-- Group -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="semStartDate"><font color="red">*</font> <?=_t( 'Start Date' );?></label>
                            <div class="col-md-8">
                                <div class="input-group date col-md-8" id="datepicker6">
                                    <input class="form-control" <?=gio();?> name="semStartDate" type="text" value="<?=_h($semester[0]['semStartDate']);?>" required />
                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                </div>
                            </div>
                        </div>
                        <!-- // Group END -->
						
						<!-- Group -->
						<div class="form-group">
                            <label class="col-md-3 control-label" for="semEndDate"><font color="red">*</font> <?=_t( 'End Date' );?></label>
							<div class="col-md-8">
								<div class="input-group date col-md-8" id="datepicker8">
						    		<input class="form-control" <?=gio();?> name="semEndDate" type="text" value="<?=_h($semester[0]['semEndDate']);?>" required />
				    				<span class="input-group-addon"><i class="fa fa-th"></i></span>
								</div>
							</div>
						</div>
						<!-- // Group END -->
						
						<!-- Group -->
						<div class="form-group">
                            <label class="col-md-3 control-label" for="semester"><font color="red">*</font> <?=_t( 'Active' );?></label>
							<div class="col-md-8">
								<select name="active" class="selectpicker form-control" data-style="btn-info" data-size="10" data-live-search="true"<?=gio();?> required>
									<option value="">&nbsp;</option>
                            		<option value="1"<?php if($semester[0]['active'] == '1') { echo ' selected="selected"'; } ?>><?=_t( 'Yes' );?></option>
                            		<option value="0"<?php if($semester[0]['active'] == '0') { echo ' selected="selected"'; } ?>><?=_t( 'No' );?></option>
                            	</select>
							</div>
						</div>
						<!-- // Group END -->
						
					</div>
					<!-- // Column END -->
				</div>
				<!-- // Row END -->
			
				<hr class="separator" />
				
				<!-- Form actions -->
				<div class="form-actions">
					<button type="submit"<?=gids();?> class="btn btn-icon btn-primary glyphicons circle_ok"><i></i><?=_t( 'Save' );?></button>
					<button type="button" class="btn btn-icon btn-primary glyphicons circle_minus" onclick="window.location='<?=url('/');?>form/semester/<?=bm();?>'"><i></i><?=_t( 'Cancel' );?></button>
				</div>
				<!-- // Form actions END -->
			</div>
		</div>
		<!-- // Widget END -->
		
	</form>
	<!-- // Form END -->
	
</div>	
	
		
		</div>
		<!-- // Content END -->
<?php $app->view->stop(); ?>