<!DOCTYPE html>
<?php
     session_start();
	      if($_SESSION['yhtag']){
     	$yhtag=$_SESSION['yhtag'];
     }
     else{
     	header("refresh:0;url=login.php");
     }
?>
<html class="no-js">

	<head>
		<meta charset="utf-8">
		<title>东莞市建筑业协会创优项目申报系统</title>
		<!-- Bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
		<link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
		<link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<link href="assets/styles.css" rel="stylesheet" media="screen">
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		<script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>

	</head>

	<body>
		<?php
    		require("conn.php");
    		$yhtag=$_SESSION["yhtag"];
			$fenge=explode("h","$yhtag");
			$bjm=$fenge[0];
			
			$tag=explode("h",$yhtag);
					                   switch($tag[0])
					                   {
					                   	case 0:
					                   	$sql = "select * from 消息  where 收信会员标记码='$yhtag' ";
					                   	break;
					                   	case 1:
					                   	$sql = "SELECT c.*FROM `项目申报` a,`本地会员` b,`消息` c WHERE a.`施工单位`=b.`企业名称` AND a.`会员标记码`=c.`收信会员标记码` AND b.`会员标记码`='".$yhtag."'UNION SELECT c.*FROM `本地会员` b,`消息` c WHERE b.`会员标记码`='".$yhtag."' AND b.`会员标记码`=c.`收信会员标记码`";	  
					                   	break;
					                   	case 2:
					                   	$sql =  "SELECT c.*FROM `项目申报` a,`外地会员` b,`消息` c WHERE a.`施工单位`=b.`申请单位名称` AND a.`会员标记码`=c.`收信会员标记码` AND b.`会员标记码`='".$yhtag."'UNION SELECT c.*FROM `外地会员` b,`消息` c WHERE b.`会员标记码`='".$yhtag."' AND b.`会员标记码`=c.`收信会员标记码`"; 
					                   	break;
					                   	case 3:
					                   	$sql = "select * from 消息  where 收信会员标记码='$yhtag' ";
					                   	break;
					                   }
			$result = $conn->query($sql);
			$rec=$result->num_rows;


			$sqli="select * from 消息 where 发信会员标记码='$yhtag'";
			$result = $conn->query($sqli);
			$sent=$result->num_rows;
    		?>
		<!--headbackground-->
		<div class="row-fluid" id="ImgBackground">
			<input type="text" id="sbm" name="sbm" value="<?php echo $bjm ?>" class="hidden" >
		</div>
		<!------->
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li >
                            <a href="sqyzj1.php"><i class="icon-chevron-right"></i> 项目管理</a>
                            <ul class="">
                            	<li><a href="sqyzj1.php">市优质奖</a></li>
                            	<li><a href="ssfgd1.php">市示范工地</a></li>
                            	<li><a href="syzj1.php">省优质奖</a></li>
                            	<li><a href="syzjgj1.php">省优质结构奖</a></li>
                            	<li><a href="syzqc1.php">省优秀QC</a></li>
                            	<li><a href="slssg1.php">省绿色施工</a></li>
                            </ul>
                        </li>
                        <li class="myclass9">
                            <a href="gctz.php"><i class="icon-chevron-right"></i> 工程台账</a>
                           
                        </li>
                        <li class="myclass0">
                            <a href="hyrh.php"><i class="icon-chevron-right"></i>会员入会</a>
                        </li>
                        <!--<li >
                        	
	                            <a href="hyfw.php"><i class="icon-chevron-right"></i> 会员服务</a>
	                            <ul class="">
	                            	<li><a href="hfjn.php">会费缴纳</a></li>
	                            	<li><a href="xwzl.php">行为自律</a></li>
	                            	<li><a href="cygm.php">创优观摩</a></li>
	                            	<li><a href="cyjz.php">创优讲座</a></li>
	                            	<li><a href="xxjl.php">学习交流</a></li>
	                            	<li><a href="qt.php">其他</a></li>
	                            	<li><a href="zgbm.php">主管部门行政处罚</a></li>
	                            	<li><a href="bz.php">备注</a></li>
	                            	<li><a href="bbdy.php">报表打印</a></li>
	                            </ul>
	                            
                            </li>-->
                        <li>
                            <a href="xx.php"><i class="icon-chevron-right"></i>消息</a>
                            <ul>
                            	<li>发送消息</li>
                            	<li>消息列表<span class="badge badge-info pull-right"><?php echo $rec; ?></span></li>
								<li>已发消息<span class="badge badge-success pull-right"><?php echo $sent; ?></span></li>
                            </ul>
                        </li>
                        <li>
                            <a href="sz.php"> 设置</a>
                           
                        </li>
                        <li class="myclass1">
                            <a href="cx.php">管理员功能</a>
                        </li>
                        <li class="active ">
                            <a href="czsc.php">操作手册</a>
                           
                        </li>
                        <li>
                            <a href="login.php"> 退出</a>
                        </li>
                    </ul>
                </div>

				<!--/span-->
				<div class="span9" id="content">
					<div class="block" id="Tcontent">
						<div class="row-fluid">
							<ul class="nav navbar-inner block-header  nav-tabs">
								<li><i class="icon-chevron-left hide-sidebar" style="display: inline-block;"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>

									<i class="icon-chevron-right show-sidebar" style="display: none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i>
								</li>
								<li class="active">
									<a data-toggle="tab" href="#home">系统帮助手册</a>
								</li>
								<li>
									<a data-toggle="tab" href="#menu1">各申报工作支持性文件、办法和要求（附件）</a>
								</li>
								<li>
									<a data-toggle="tab" href="#menu2">下载空白表格（附件）</a>
								</li>
							</ul>
							<div class="tab-content ">
								<div id="home" class="tab-pane fade in active">
									<div class="block ">
										<div class="navbar navbar-inner block-header ">

											<div class="btn-group">
												<a href="upload/czscdownload/东莞市建筑业协会创优项目用户手册.doc"><button type="button" class="btn btn-default " >操作手册文件下载</button></a>
												<a href="upload/czscdownload/东莞市建筑业协会创优项目管理员手册.doc"><button type="button" class="btn btn-default myclass7 " >管理员手册文件下载</button></a>

											</div>

										</div>
									</div>
								</div>

								<div id="menu1" class="tab-pane fade">
									<div class="block ">
										<div class="navbar navbar-inner block-header ">

											<div class="btn-group">
												<button type="button" class="btn btn-default myclass6" data-toggle="modal" data-target="#myModal1">文件上传 </button>

											</div>

										</div>
									</div>
									<div class="block-content collapse in">
										<div class="span12">
											<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example1">
												<thead>
													<tr>
														<th>序号</th>
														<th class="hidden">标记码</th>
														<th>文件</th>
														<th>操作</th>
													</tr>
												</thead>
												<tbody>
													<?php
                   						require("conn.php");
                   						$sql = "select * from 操作手册附件   where 附件类型='附件A'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
														<tr class="">
															<td>
																<?php echo $row["文件id"];?>
															</td>
															<td class="hidden"name="qufen">
																<?php echo $bjm?>
															</td>
															<td>
																<?php echo $row["附件名称"];?>
															</td>
															<td>
																<a href="upload/czscupload/<?php echo $row['文件下载地址'];?>"><button type="button" class="btn btn-primary">下载</button></a>
																<button id="<?php echo $row["文件id"];?>" onclick="dianji(this.id);" type="button" class="btn btn-primary myclass5">
                   	 		删除
                   	 	</button>
															</td>
														</tr>
														<?php
															}
															$conn->close();		
														?>

												</tbody>
												
											</table>
										</div>
									</div>
								</div>

								<div id="menu2" class="tab-pane fade">
									<div class="block ">
										<div class="navbar navbar-inner block-header ">
											<div class="btn-group">
												<button type="button" class="btn btn-default myclass4" data-toggle="modal" data-target="#myModal2">文件上传 </button>

											</div>
										</div>
										<div class="block-content collapse in">
											<div class="span12">
												<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
													<thead>
														<tr>
															<th>序号</th>
															<th class="hidden">编号</th>
															<th>文件</th>
															<th>操作</th>
														</tr>
													</thead>
													<tbody>
														<?php
                   						require("conn.php");
                   						$sql = "select * from 操作手册附件   where 附件类型='附件B'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
															<tr class="">
																<td>
																	<?php echo $row["文件id"];?>
																</td>
																<td class="hidden" name="qufen1">
																	<?php echo $bjm?>
																</td>
																<td>
																	<?php echo $row["附件名称"];?>
																</td>
																<td>
																	<a href="upload/czscupload/<?php echo $row['文件下载地址'];?>"><button type="button" class="btn btn-primary ">下载</button></a>
																	<button id="<?php echo $row[" 文件id "];?>" onclick="dianji(this.id);" type="button" class="btn btn-primary myclass3">
                   	 		删除
                   	 	</button>
																</td>

																
															</tr>
															<?php
															}
															$conn->close();		
														?>

													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<footer>
				<p>&copy; Vincent Gabriel 2013</p>
			</footer>
		</div>
		<div class="block-content collapse in">
			<div class="span12">
				<!--模态框1-->
				<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog">
						<div class="modal-content">
							<form id="" action="data/czscupload.php" method="post" enctype="multipart/form-data" class="form-horizontal cmxform" role="form">

								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">附件上传</h4>
								</div>
								<div class="modal-body">
									<div class="control-group">
										<label class="control-label" for="fileInput">文件上传(大小应<10MB)</label>
										<div class="controls">
											<input class="input-file uniform_on" id="fileInput" name="file" type="file">
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<input type="text" class="form-control hidden" id="fj" name="fj" value="附件A">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
									<button type="submit" class="btn btn-primary">保存</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--模态框1-->
				<!--模态框2-->
				<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog">
						<div class="modal-content">
							<form id="" action="data/czscupload.php" method="post" enctype="multipart/form-data" class="form-horizontal cmxform" role="form">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">附件上传</h4>
								</div>
								<div class="modal-body">
									<div class="control-group">
										<label class="control-label" for="fileInput">文件上传(大小应<10MB)</label>
										<div class="controls">
											<input class="input-file uniform_on" id="fileInput" type="file" name="file">
										</div>
									</div>
									<div class="control-group"> 
										<div class="controls">
											<input type="text" class="form-control hidden" id="fj" name="fj" value="附件B">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
									<button type="submit" class="btn btn-primary">保存</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--模态框2-->
			</div>
		</div>
		<!--/.fluid-container-->
		<script src="vendors/jquery-1.9.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
		<script src="assets/scripts.js"></script>
		<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
		<script src="assets/DT_bootstrap.js"></script>
		<!--添加-->
		<link href="vendors/datepicker.css" rel="stylesheet" media="screen">
		<link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
		<link href="vendors/chosen.min.css" rel="stylesheet" media="screen">
		<link href="vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">
		<script src="vendors/jquery.uniform.min.js"></script>
		<script src="vendors/chosen.jquery.min.js"></script>
		<script src="vendors/bootstrap-datepicker.js"></script>
		<script src="vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
		<script src="vendors/wysiwyg/bootstrap-wysihtml5.js"></script>
		<script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>
		<script type="text/javascript" src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="assets/form-validation.js"></script>

		<script>
			$(function() {
				// Easy pie charts
				$('.chart').easyPieChart({
					animate: 1000
				});
			});
		</script>
		<script type="text/javascript">
			function dianji(id) {
				//							alert(id);
				$.ajax({
					cache: true,
					type: "POST",
					url: 'data/czscDe.php',
					data: {
						gcid1: id
					}, // 你的formid
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert("删除成功");
						window.location.reload();
					}
				});
			};
		</script>
		<script>
			jQuery(document).ready(function() {
				FormValidation.init();
			});

			$(function() {
				$(".datepicker").datepicker();
				$(".uniform_on").uniform();
				$(".chzn-select").chosen();
				$('.textarea').wysihtml5();

				$('#rootwizard').bootstrapWizard({
					onTabShow: function(tab, navigation, index) {
						var $total = navigation.find('li').length;
						var $current = index + 1;
						var $percent = ($current / $total) * 100;
						$('#rootwizard').find('.bar').css({
							width: $percent + '%'
						});
						// If it's the last tab then hide the last button and show the finish instead
						if($current >= $total) {
							$('#rootwizard').find('.pager .next').hide();
							$('#rootwizard').find('.pager .finish').show();
							$('#rootwizard').find('.pager .finish').removeClass('disabled');
						} else {
							$('#rootwizard').find('.pager .next').show();
							$('#rootwizard').find('.pager .finish').hide();
						}
					}
				});
				$('#rootwizard .finish').click(function() {
					alert('Finished!, Starting over!');
					$('#rootwizard').find("a[href*='tab1']").trigger('click');
				});
			});
		</script>
				<script type="text/javascript">
        	var sbm=document.getElementById("sbm");
        	var myclass1=document.getElementsByClassName("myclass1");
        	var myclass0=document.getElementsByClassName("myclass0");
        	var myclass9=document.getElementsByClassName("myclass9");
        	var myclass6=document.getElementsByClassName("myclass6");
        	var myclass7=document.getElementsByClassName("myclass7");
        	var myclass5=document.getElementsByClassName("myclass5");
        	var myclass4=document.getElementsByClassName("myclass4");
        	var myclass3=document.getElementsByClassName("myclass3");
        	var qufen=document.getElementsByName("qufen");
        	var qufen1=document.getElementsByName("qufen1");
        	
        	for(var i=0;i<qufen.length;i++){
//				alert(qufen[i].innerHTML);
	  			if(qufen[i].innerHTML !=0){
	  			myclass5[0].setAttribute("class","hidden");
	  			
	  			}
	  		}
	  		for(i=0;i<qufen1.length;i++){
//	  			alert(qufen1[i].innerHTML);
	  			if(qufen1[i].innerHTML !=0){
	  			myclass3[0].setAttribute("class","hidden");
	  			}
	  		}
        	
        	
        	
        	
        	
        	if(sbm.value !='0'){
			myclass1[0].setAttribute("class","hidden");
			myclass0[0].setAttribute("class","hidden");
			myclass6[0].setAttribute("class","hidden");
			myclass4[0].setAttribute("class","hidden");
			myclass7[0].setAttribute("class","hidden");
			
			
			
        	}else{
			myclass9[0].setAttribute("class","hidden");
        		
        	}
        	
//      	for( var i=0;i<qufen.data;i++){
//				alert("111");
//      		
//      		if(qufen[1].innerHTML =='0'){
//      			myclass5[1].setAttribute("class","hidden");
//      		}
//      	}
        	
        </script>
	</body>

</html>