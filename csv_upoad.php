  public function testImportCSV(){


    	if(isset($_POST['submit']))
    	{

	    	$data = array('ssss');
	    	$filename=$_FILES["file"]["tmp_name"];
	    	if($_FILES["file"]["size"] > 0)
	    	{


	    		$file = fopen($filename, "r");

	    		while (($csv= fgetcsv($file, 10000, ",")) !== FALSE)
	    		{

	    			$checkPresent=$this->Dbfunction->getAllResultArray('test_users', array('name'=>$csv['0']));


	    			if(empty($checkPresent) && $csv['0']!=""){

	    				$dataImport=array(
	    					'name'=>$csv['0']
	    				);

	    				$this->db->insert('test_users', $dataImport); 

	    				$id=$this->db->insert_id();

	    				echo "inserted id ".$id."<br/>";


	    			}


	    		}  


	    	}
	    }


	    ?>

	    <form method="post" action="" enctype="multipart/form-data">
	    	<input type="file" name="file" />
	    	<input type="submit" name="submit" value="submit" />
	    </form>

	    <?php
    }
