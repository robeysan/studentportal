<div class="row toprow"> 
    <div class="span11">
        <div class="middle">
        	<input type="hidden" name="user_type" id="user_type" value="<?php echo $user_type; ?>">
        	<input type="hidden" name="Degree" id="Degree" value="">
        	<input type="hidden" name="Level" id="Level" value="">
        	<input type="hidden" name="Interest1" id="Interest1" value="">
<div style="margin-bottom: 32px; margin-top: 24px;">
            <?php if($show_program_chooser) { ?>
        	<?php 
					echo "<h3 style='margin-bottom: 18px; display: inline;'>" .$program_name. "</h3>";
			?>

            <div style="float: right;">
                    <div class="controls">
                        <select id="programchooser" name="programchooser" onchange='update_program();'>
                            <option value="">Program Options</option>
<?php
                foreach($programs as $program) {
                    echo '<option value=' . $program['program_id'] . '>' . $program['name'] . '</option>';
                }
?>
                        </select>
                    </div>
            </div>
<?php } ?>
</div>
