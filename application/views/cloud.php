<section class="container-fluid" id="section1">
  	<div class="container">
  		
      <div class="row">
          <div class="col-sm-12">
					<?php
					$dir_list = explode('/', $dir);
					$count = 0;
					foreach ($dir_list as $key => $value) {
						$breadcrumb = "";

						if ($count > 1) {
							for ($i = 1; $i <= $count; $i++) {
								$breadcrumb .= $dir_list[$i] . '/';

							}
							echo '&nbsp;&raquo;&nbsp;<a href="' . base_url('fs?dir=' . $breadcrumb) . '">' . $value . '</a>';
						}

						$count++;
					}
					?>
					<?php
					/*
					 if ($location = substr(dirname($dir), 1))
					 $dirlist = explode('/', $location);
					 else
					 $dirlist = array();

					 $count = array_push($dirlist, $dir);

					 echo '<a href="' . $address . '">Home</a>';

					 for ($i = 0; $i < $count; $i++)
					 echo '&nbsp;&raquo;&nbsp;<a href="' . base_url('fs?dir=' . $dirlist[$i]) . '">' . $dirlist[$i] . '</a>';
					 */
	?>
			</div>
			</div>
			<div class="row">
          <div class="col-sm-12">
            	<table class="table" id="dirTable">
            		<thead>           			
            			<tr>
            				<th></th><th>Name</th><th>Type</th><th>Size</th><th>Creation Date</th>
            			</tr>
            		</thead>
            		<tbody>
            			<tr>
            				
            					<?php 
            						$parent= $info;
									
									if($parent != false){
										foreach ($parent as $key => $value):
									?>
								<tr>
									<?php
									if (strpos($value['name'], '.PLAN') !== false) {
										$file = "";
										$name = $value['name'];
										$type = 'dir';
									} else {
										$file = explode('.', $value['name']);
										$name = $file[0];
										$type = (count($file) > 1) ? $file[1] : 'dir';
									}
									$name_link = substr($value['server_path'], strlen("/home/cloud/public_html/"));
									$path_size = count(explode('/', $value['server_path']));
									$link = (count($file) > 1) ? base_url('download?f=' . $name_link . '&n=' . $value['name']) : base_url('fs?dir=' . $name_link);
									?>
									<td>
										<?php
											if(strcmp($type,'dir')==0 && $path_size>10):
										?>
											<a href="<?=base_url('download/zip?f=' . $name_link . '&n=' . $value['name']) ?>" title="Download"><i class="fa fa-file-archive-o"></i></a>
										<?php
										elseif(strcmp($type,'dir')!=0 && $path_size>10):
										?>
											<a href="<?=$link ?>" title="Download"><i class="fa fa-download"></i></a>
										<?php
										endif;
										?>
									</td>
									<th>
										<?php
											
											if(strcmp($type,'dir')==0):
										?>
											<a  href="<?=$link ?>"><?=$name ?></a>
										<?php
										elseif(strcmp($type,'dir')!=0 && $path_size>10):
										?>
											<?=$name ?>
										<?php
										endif;
										?>
										
										
										
									</th>
									<td><?php
									if (strcmp('jpg', $type) == 0 || strcmp('tif', $type) == 0 || strcmp('png', $type) == 0 || strcmp('jpeg', $type) == 0 || strcmp('JPG', $type) == 0 || strcmp('JPEG', $type) == 0 || strcmp('gif', $type) == 0)
										echo '<i class="fa fa-file-image-o"></i>';
									elseif (strcmp('zip', $type) == 0 || strcmp('rar', $type) == 0)
										echo '<i class="fa fa-file-archive-o"></i>';
									elseif (strcmp('pdf', $type) == 0)
										echo '<i class="fa fa-file-pdf-o"></i>';
									elseif (strcmp('xls', $type) == 0 || strcmp('xlsx', $type) == 0)
										echo '<i class="fa fa-file-excel-o"></i>';
									elseif (strcmp('doc', $type) == 0 || strcmp('docx', $type) == 0)
										echo '<i class="fa fa-file-word-o"></i>';
									elseif (strcmp('dir', $type) == 0)
										echo '<i class="fa fa-folder"></i>';
									else {
										echo $type;
									}
									 ?>
									 </td>
									<td><?=($value['size'] > 4096) ? number_format((float)($value['size'] / 1048576), 2) : '-' ?> <?=($value['size'] > 4096) ? 'MB' : '' ?></td>
									<td><?=date("d.m.y H:i:s", $value['date']) ?></td>
									
								</tr>
									<?php
									endforeach;

									}
								?>
            				
            			</tr>
            		</tbody>
            		
            	</table>
          </div>
      </div><!--/row-->
    <div class="row"><br></div>
  </div><!--/container-->
</section>
