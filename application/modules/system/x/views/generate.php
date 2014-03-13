       <hr>
       <form action='<?php echo base_url();?>x/generate' method='POST'>
       <input type='hidden' class='form-control' name='table' placeholder='nama table' value='<?php echo $table;?>'>
       <strong>Table : </strong><input type='text' value='<?php echo $table;?>' disabled><br>
       <strong>Controllers : </strong><input type='text' name='file' placeholder='Nama Controller' required><br>
       <strong>Views : </strong><input type='text' name='views' placeholder='views' required><br>
       <strong>Path  : </strong><input type='text' name='path' placeholder='Path' required><br>

       <hr>
       <!--FORM-->
       <?php
      $db = $this->load->database($this->session->userdata('database'),TRUE);
       $fields = $db->field_data($table);
       $i = 0;
       foreach ($fields as $field):
       {
	get_field($table,$field->name,$field->type,$field->primary_key,$i); 
       }
       $i++;
       endforeach;
       ?>
       <br>
       <input type='submit' value='GENERATE' class='btn btn-primary btn-large btn-block'><br>
       </form>
       <!--END FORM-->.


<?php
function get_field($table,$name,$type,$primary_key,$i)
	{
	      $text     = '';
	      $password = '';
	      $textarea = '';
	      $null     = '';
	        if($type != 'text' AND $primary_key != 1){
		     $text = 'selected';
		}
	        elseif($type == 'text' AND $primary_key != 1){
		     $textarea = 'selected';
	        }
	        else{
		     $null = 'selected';
		}
		
		
                $label = str_replace('_',' ',$name);

		echo "<input type='hidden'  name='x[$i][name]' value='".$name."'>";
		echo "<div class='well clearfix'>Field : <b>".$name."</b><br>";
		echo "<div class='pull-left'>";
		echo "Label  <input type='text'  name='x[$i][label]' value='".$label."'><br>";
		
			echo "Type <select name='x[$i][type]'>";
			echo "<option value='text' $text>Text</option>";
			echo "<option value='password' >Password</option>";
			echo "<option value='textarea' $textarea>Textarea</option>";
			echo "<option value='email' $null>Email</option>";
			echo "<option value='number' $null>Number</option>";
			echo "<option value='null' $null>Do not Include</option>";
			echo "</select><br>";
			
			echo "Include : <select name='x[$i][include]'>";
			echo "<option value='all' selected>All</option>";
			echo "<option value='list_search' >List and Search</option>";
			echo "<option value='created_update' >Created and Update</option>";
			echo "</select><br>";
			
		
		
                echo "Class <select name='x[$i][class]'>";
                        for($n = 1;$n <= 12;$n++)
                        {
			echo "<option value='span$n'";
                        if($n == 5){
                            echo "selected='selected'";
                            }
                        echo ">span$n</option>";
                        }
			echo "</select><br>";
			
	        echo "</div><div class='pull-right'>";
		//echo "Include :<br>
		//<label class='checkbox inline'>
		//<input type='checkbox' name='include_status'> <code>List</code>
		//</label>
		//<label class='checkbox inline'>
		//<input type='checkbox' name='include_status'> <code>Detail</code>
		//</label>
		//<label class='checkbox inline'>
		//<input type='checkbox' name='include_status'> <code>Create and Update</code>
		//</label>
		//
		//<br><br>";
		
		
		echo "
		Validation : <br>
		<label class='checkbox inline'>
		<input type='checkbox' name='x[$i][val][]' value='required' checked> <code>required</code>
		</label>
		<label class='checkbox inline'>
	        <input type='checkbox' name='x[$i][val][]' value='trim' checked> <code>trim</code>
		</label>
		<label class='checkbox inline'>
	        <input type='checkbox' name='x[$i][val][]' value='valid_email'> <code>Valid email</code>
		</label>
		<label class='checkbox inline'>
	        <input type='checkbox' name='x[$i][val][]' value='xss_clean' checked> <code>Xss_Clean</code>
		</label>
		<label class='checkbox inline'>
	        <input type='checkbox' name='x[$i][val][]' value='prep_for_form'> <code>prep_html</code>
		</label>
		<label class='checkbox inline'>
	        <input type='checkbox' name='x[$i][val][]' value='prep_url'> <code>prep_url</code>
		</label><br>
		<label class='checkbox inline'>
	        <input type='checkbox' name='x[$i][val][]' value='is_unique[$table.$name]'>
		<code>is_unique [$table.$name]</code>
		</label>
		<label class='checkbox inline'>
	        <input type='checkbox' name='x[$i][val][]' value='numeric'>
		<code>numeric</code>
		</label>
		 
		<br><br>
	        <code>Min length </code>
		<select class='span2' name='x[$i][val][]' style='margin-bottom:0px;'>
		<option value='' selected>Do not include</option>";
		
		for($o = 1;$o < 100;$o++)
		{
		     echo "<option value='min_length[$o]'>$o</option>";
		}
		
		echo "</select>
                <code>Max length </code>
		<select class='span2' name='x[$i][val][]' style='margin-bottom:0px;'>
		<option value='' selected>Do not include</option>";
		
		for($o = 1;$o < 100;$o++)
		{
		     echo "<option value='max_length[$o]'>$o</option>";
		}
		
		echo "</select>
		</div></div>";
	}
?>

