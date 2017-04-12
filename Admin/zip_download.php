<?php
include "component/config.php";
                    $fetchdocstr = "SELECT * FROM `cust_doc` ";
					$fetchdocres = mysql_query($fetchdocstr);
					//$i=0;
					
					//$fetchrow = mysql_fetch_array($fetchdocres);
					
					/*while($fetchrow = mysql_fetch_array($fetchdocres))
					{
					$files = array([$i].$fetchrow['doc_src']);
					$i++;
					}*/
					while($fetchrow = mysql_fetch_array($fetchdocres))
					{
					$files = array($fetchrow['doc_src']);
					}
					
$zipname = 'test.zip';
$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE);

foreach ($files as $file) {
  $zip->addFile($file);
}
$zip->close();
header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$zipname);
header('Content-Length: ' . filesize($zipname));
readfile($zipname);
					
	
				/*while($fetchrow = mysql_fetch_array($fetchdocres))
					{
						$files =$fetchrow['doc_src'];
							echo $files;			
						$zipname = 'forms.zip';
						$zip = new ZipArchive;
						$zip->open($zipname, ZipArchive::CREATE);
						//foreach ($files as $file)
						 //{
							 
							 
						  $zip->addFile('../docs/6070D022CCCF22093D9465321DC218B49059.txt', 'newname.txt');
						//}
						echo "file added";
						exit();
						$zip->close();
						header('Content-Type: application/zip');
						header('Content-disposition: attachment; filename=forms.zip');
						header('Content-Length: ' . filesize($zipfilename));
						readfile($zipname);	
					}*/
?>