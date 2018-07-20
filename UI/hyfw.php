<!DOCTYPE html>
<?php session_start(); ?>
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
		require ("conn.php");
		$yhtag = $_SESSION["yhtag"];
		$fenge = explode("h", "$yhtag");
		$bjm = $fenge[0];

		$tag = explode("h", $yhtag);
		switch($tag[0]) {
			case 0 :
				$sql = "select * from 消息  where 收信会员标记码='$yhtag' ";
				break;
			case 1 :
				$sql = "SELECT c.*FROM `项目申报` a,`本地会员` b,`消息` c WHERE a.`施工单位`=b.`企业名称` AND a.`会员标记码`=c.`收信会员标记码` AND b.`会员标记码`='" . $yhtag . "'UNION SELECT c.*FROM `本地会员` b,`消息` c WHERE b.`会员标记码`='" . $yhtag . "' AND b.`会员标记码`=c.`收信会员标记码`";
				break;
			case 2 :
				$sql = "SELECT c.*FROM `项目申报` a,`外地会员` b,`消息` c WHERE a.`施工单位`=b.`申请单位名称` AND a.`会员标记码`=c.`收信会员标记码` AND b.`会员标记码`='" . $yhtag . "'UNION SELECT c.*FROM `外地会员` b,`消息` c WHERE b.`会员标记码`='" . $yhtag . "' AND b.`会员标记码`=c.`收信会员标记码`";
				break;
			case 3 :
				$sql = "select * from 消息  where 收信会员标记码='$yhtag' ";
				break;
		}
		$result = $conn -> query($sql);
		$rec = $result -> num_rows;

		$sqli = "select * from 消息 where 发信会员标记码='$yhtag'";
		$result = $conn -> query($sqli);
		$sent = $result -> num_rows;
    	?>
    	<!--headbackground-->
        <div class="row-fluid" id="ImgBackground" >
        	<input type="text" class="span12 form-control hidden" id="sbm" name="sbm" value="<?php echo $bjm?>" />
        	
        </div>
		<!------->
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li >
                        	
	                            <a href="xmgl.php"><i class="icon-chevron-right"></i> 项目管理</a>
	                            <ul class="">
	                            	<li><a href="sqyzj1.php">市优质奖</a></li>
	                            	<li><a href="ssfgd1.php">市示范工地</a></li>
	                            	<li><a href="syzj1.php">省优质奖</a></li>
	                            	<li><a href="syzjgj1.php">省优质结构奖</a></li>
	                            	<li><a href="syzqc1.php">省优秀QC</a></li>
	                            	<li><a href="slssg1.php">省绿色施工</a></li>
	                            </ul>
	                            
                            </li>
                       
                        
                        <li class="myclass0">
                            <a href="hyrh.php"><i class="icon-chevron-right"></i>会员入会</a>
                        </li>
                        <li class="active">
                        	
	                            <a href="hyfw.php"><i class="icon-chevron-right"></i> 会员服务</a>
	                            <ul class="">
	                            	<li><a href="hfjn.php">会费缴纳</a></li>
	                            	<li><a href="xwzl.php">用工实名制管理</a></li>
	                            	<li><a href="cygm.php">活动</a></li>
	                            	
	                            	<li><a href="qt.php">其他</a></li>
	                            	<li><a href="zgbm.php">主管部门行政处罚</a></li>
	                            	<li><a href="bz.php">备注</a></li>
	                            	<li><a href="bbdy.php">报表打印</a></li>
	                            </ul>
	                            
                            </li>
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
                        <li class="myclass0">
                            <a href="cx.php">管理员功能</a>
                            
                        </li>
                        <li>
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
					  		
						  	<div class="tab-content ">
						    	<div id="home" class="tab-pane fade in active">
						      		<div class="block ">
						      			<div class="navbar navbar-inner block-header " >
	                                		<div class="btn-group">	
						      					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">会员类型<span class="caret"></span></button>
						      					<ul class="dropdown-menu">
													<li class="sx0"><a href="#qbhyys" tabindex="-1" data-toggle="tab">全部</a></li>
											
													<li class="sx1"><a href="#lsdw" tabindex="-1" data-toggle="tab">理事单位</a></li>
													<li class="sx2"><a href="#clsdw" tabindex="-1" data-toggle="tab">常务理事单位</a></li>
													<li class="sx3"><a href="#fhzdw" tabindex="-1" data-toggle="tab">副会长单位</a></li>
													<li class="sx4"><a href="#hzdw" tabindex="-1" data-toggle="tab">会长单位</a></li>
													<li class="sx5"><a href="#pthy" tabindex="-1" data-toggle="tab">普通会员</a></li>
												</ul>
												<button type="button" class="btn btn-default" data-toggle="modal" onclick="sc();">生成本年度评价表</button>
											</div>
	                            		</div>
						      	<div class="block-content collapse in " >
                                	<div class="span12">
                                		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered   " id="qbhyys" >
											<thead>
												<tr>
													<th>序号</th>
													<th>会员名称</th>
													<th>会员性质</th>
													<th>会员类型</th>
													<th>操作</th>
												</tr>
											</thead>
											
											<tbody id="" class="">
												
											<?php
											require("conn.php");
//					                   $yhtag=$_SESSION["yhtag"];
					                     $sql = "select 企业名称,会员状态,会员名称,会员标记码,id,会员性质 from 本地会员   where 会员状态='通过' UNION select  企业名称 ,会员状态,会员名称,会员标记码,id,会员性质  from 外地会员 where 会员状态='通过'    " ;
										
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {  
					                         					
					                 if( $row["会员名称"]=='外地会员'){   ?>
					                   	 															 
										    
										     <tr class="even gradeC " id="">
											<td><?php echo $i++; ?></td>
													<!--<td><input type="checkbox"></td>-->
													<td><?php echo $row["企业名称"]?></td>
													<td><?php echo $row["会员性质"]?></td>
													<td class="hidden" name="panduan1"  ><?php echo $row["会员状态"]?></td>
													<td class="center"><?php echo "外地会员"?></td>
													<td class="center">
														<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass3" data-toggle="modal" data-target="#myModal3" onclick="wd(this.id);">查看
</button>
														
														
														 
														 </tr>
														 
										 <?php  }else  { ?>
										 	 <tr class="even gradeC " >
                                                <td><?php echo $i++; ?></td>
													<td><?php echo $row["企业名称"]?></td>
													<td><?php echo $row["会员性质"]?></td>
													<td class="center hidden" name="panduan"  ><?php echo $row["会员状态"]?></td>
													<td class="center"><?php echo "本地会员"?></td>
													<td class="center">
														<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="mtk(this.id);">查看</button>
														
														
										                
										                
										                
										     </td>
										     </tr>
                                        
                                                   <?php }
											}
											$conn->close();
												?>
											
												
											</tbody>
										</table>
  										
  										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered   " id="lsdw" >
											<thead>
												<tr>
													<th>序号</th>
													<th>会员名称</th>
													<th>会员性质</th>
													<th>会员类型</th>
													<th>操作</th>
												</tr>
											</thead>
											
											<tbody id="" class="">
												
											<?php
											require("conn.php");
//					                   $yhtag=$_SESSION["yhtag"];
					                     $sql = "select 企业名称,会员状态,会员名称,会员标记码,id,会员性质 from 本地会员   where 会员状态='通过' UNION select  企业名称 ,会员状态,会员名称,会员标记码,id,会员性质  from 外地会员 where 会员状态='通过'    " ;
										
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {  
					                         					
					                 if( $row["会员性质"]=='理事单位'){
					                 	if( $row["会员名称"]=='外地会员'){   ?>
					                   	 															 
										    
										     <tr class="even gradeC " id="">
											<td><?php echo $i++; ?></td>
													<!--<td><input type="checkbox"></td>-->
													<td><?php echo $row["企业名称"]?></td>
													<td><?php echo $row["会员性质"]?></td>
													<td class="center"><?php echo $row["会员名称"]?></td>
													
													<td class="center">
														<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass3" data-toggle="modal" data-target="#myModal3" onclick="wd(this.id);">查看
</button>
														 </tr>
														 
										  
										 <?php  }else  { ?>
										 	 <tr class="even gradeC " >
                                                <td><?php echo $i++; ?></td>
													<td><?php echo $row["企业名称"]?></td>
													<td><?php echo $row["会员性质"]?></td>
													<td class="center hidden" name="panduan"  ><?php echo $row["会员状态"]?></td>
													<td class="center"><?php echo "本地会员"?></td>
													<td class="center">
														<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="mtk(this.id);">查看</button>
														
														
										                
										                
										                
										     </td>
										     </tr>
                                                   <?php }
												}
												}
												$conn->close();
												?>
											
												
											</tbody>
										</table>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered   " id="clsdw" >
											<thead>
												<tr>
													<th>序号</th>
													<th>会员名称</th>
													<th>会员性质</th>
													<th>会员类型</th>
													<th>操作</th>
												</tr>
											</thead>
											
											<tbody id="" class="">
												
											<?php
											require("conn.php");
//					                   $yhtag=$_SESSION["yhtag"];
					                     $sql = "select 企业名称,会员状态,会员名称,会员标记码,id,会员性质 from 本地会员   where 会员状态='通过' UNION select  企业名称 ,会员状态,会员名称,会员标记码,id,会员性质  from 外地会员 where 会员状态='通过'    " ;
										
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {  
					                         					
					                 if( $row["会员性质"]=='常务理事单位'){
					                 	if( $row["会员名称"]=='外地会员'){   ?>
					                   	 															 
										    
										     <tr class="even gradeC " id="">
											<td><?php echo $i++; ?></td>
													<!--<td><input type="checkbox"></td>-->
													<td><?php echo $row["企业名称"]?></td>
													<td><?php echo $row["会员性质"]?></td>
													<td class="center"><?php echo $row["会员名称"]?></td>
													
													<td class="center">
														<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass3" data-toggle="modal" data-target="#myModal3" onclick="wd(this.id);">查看
</button>
														 </tr>
														 
										  
										 <?php  }else  { ?>
										 	 <tr class="even gradeC " >
                                                <td><?php echo $i++; ?></td>
													<td><?php echo $row["企业名称"]?></td>
													<td><?php echo $row["会员性质"]?></td>
													<td class="center hidden" name="panduan"  ><?php echo $row["会员状态"]?></td>
													<td class="center"><?php echo "本地会员"?></td>
													<td class="center">
														<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="mtk(this.id);">查看</button>
														
														
										                
										                
										                
										     </td>
										     </tr>
                                                   <?php }
												}
												}
												$conn->close();
												?>
											
												
											</tbody>
										</table>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered   " id="fhzdw" >
											<thead>
												<tr>
													<th>序号</th>
													<th>会员名称</th>
													<th>会员性质</th>
													<th>会员类型</th>
													<th>操作</th>
												</tr>
											</thead>
											
											<tbody id="" class="">
												
											<?php
											require("conn.php");
//					                   $yhtag=$_SESSION["yhtag"];
					                     $sql = "select 企业名称,会员状态,会员名称,会员标记码,id,会员性质 from 本地会员   where 会员状态='通过' UNION select  企业名称 ,会员状态,会员名称,会员标记码,id,会员性质  from 外地会员 where 会员状态='通过'    " ;
										
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {  
					                         					
					                 if( $row["会员性质"]=='副会长单位'){
					                 	if( $row["会员名称"]=='外地会员'){   ?>
					                   	 															 
										    
										     <tr class="even gradeC " id="">
											<td><?php echo $i++; ?></td>
													<!--<td><input type="checkbox"></td>-->
													<td><?php echo $row["企业名称"]?></td>
													<td><?php echo $row["会员性质"]?></td>
													<td class="center"><?php echo $row["会员名称"]?></td>
													
													<td class="center">
														<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass3" data-toggle="modal" data-target="#myModal3" onclick="wd(this.id);">查看
</button>
														 </tr>
														 
										  
										 <?php  }else  { ?>
										 	 <tr class="even gradeC " >
                                                <td><?php echo $i++; ?></td>
													<td><?php echo $row["企业名称"]?></td>
													<td><?php echo $row["会员性质"]?></td>
													<td class="center hidden" name="panduan"  ><?php echo $row["会员状态"]?></td>
													<td class="center"><?php echo "本地会员"?></td>
													<td class="center">
														<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="mtk(this.id);">查看</button>
														
														
										                
										                
										                
										     </td>
										     </tr>
                                                   <?php }
												}
												}
												$conn->close();
												?>
											
												
											</tbody>
										</table>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered   " id="hzdw" >
											<thead>
												<tr>
													<th>序号</th>
													<th>会员名称</th>
													<th>会员性质</th>
													<th>会员类型</th>
													<th>操作</th>
												</tr>
											</thead>
											
											<tbody id="" class="">
												
											<?php
											require("conn.php");
//					                   $yhtag=$_SESSION["yhtag"];
					                     $sql = "select 企业名称,会员状态,会员名称,会员标记码,id,会员性质 from 本地会员   where 会员状态='通过' UNION select  企业名称 ,会员状态,会员名称,会员标记码,id,会员性质  from 外地会员 where 会员状态='通过'    " ;
										
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {  
					                         					
					                 if( $row["会员性质"]=='会长单位'){
					                 	if( $row["会员名称"]=='外地会员'){   ?>
					                   	 															 
										    
										     <tr class="even gradeC " id="">
											<td><?php echo $i++; ?></td>
													<!--<td><input type="checkbox"></td>-->
													<td><?php echo $row["企业名称"]?></td>
													<td><?php echo $row["会员性质"]?></td>
													<td class="center"><?php echo $row["会员名称"]?></td>
													
													<td class="center">
														<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass3" data-toggle="modal" data-target="#myModal3" onclick="wd(this.id);">查看
</button>
														 </tr>
														 
										  
										 <?php  }else  { ?>
										 	 <tr class="even gradeC " >
                                                <td><?php echo $i++; ?></td>
													<td><?php echo $row["企业名称"]?></td>
													<td><?php echo $row["会员性质"]?></td>
													<td class="center hidden" name="panduan"  ><?php echo $row["会员状态"]?></td>
													<td class="center"><?php echo "本地会员"?></td>
													<td class="center">
														<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="mtk(this.id);">查看</button>
														
														
										                
										                
										                
										     </td>
										     </tr>
                                                   <?php }
												}
												}
												$conn->close();
												?>
											
												
											</tbody>
										</table>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered   " id="pthy" >
											<thead>
												<tr>
													<th>序号</th>
													<th>会员名称</th>
													<th>会员性质</th>
													<th>会员类型</th>
													<th>操作</th>
												</tr>
											</thead>
											
											<tbody id="" class="">
												
											<?php
											require("conn.php");
//					                   $yhtag=$_SESSION["yhtag"];
					                     $sql = "select 企业名称,会员状态,会员名称,会员标记码,id,会员性质 from 本地会员   where 会员状态='通过' UNION select  企业名称 ,会员状态,会员名称,会员标记码,id,会员性质  from 外地会员 where 会员状态='通过'    " ;
										
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {  
					                         					
					                 if( $row["会员性质"]=='普通会员'){
					                 	if( $row["会员名称"]=='外地会员'){   ?>
					                   	 															 
										    
										     <tr class="even gradeC " id="">
											<td><?php echo $i++; ?></td>
													<!--<td><input type="checkbox"></td>-->
													<td><?php echo $row["企业名称"]?></td>
													<td><?php echo $row["会员性质"]?></td>
													<td class="center"><?php echo $row["会员名称"]?></td>
													
													<td class="center">
														<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass3" data-toggle="modal" data-target="#myModal3" onclick="wd(this.id);">查看
</button>
														 </tr>
														 
										  
										 <?php  }else  { ?>
										 	 <tr class="even gradeC " >
                                                <td><?php echo $i++; ?></td>
													<td><?php echo $row["企业名称"]?></td>
													<td><?php echo $row["会员性质"]?></td>
													<td class="center hidden" name="panduan"  ><?php echo $row["会员状态"]?></td>
													<td class="center"><?php echo "本地会员"?></td>
													<td class="center">
														<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="mtk(this.id);">查看</button>
														
														
										                
										                
										                
										     </td>
										     </tr>
                                                   <?php }
												}
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
                            
                            <!--本地会员-->
<!--模态框2-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
			 <div class="modal-dialog" >
				<div class="modal-content">
				    <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
				      <h4 class="modal-title" id="myModalLabel">本地会员</h4>
				    </div>
				     
					<form id="bdxgform" name="bdxgform" action="bdxg.php" method="post" class="" role="form" >
						
				      <div class="modal-body">
				      	
				    	<div class="form-group">
				    		
							<label for="djrq" class="span2 ">登记日期：</label>
							<div class="span4">
								<input type="text" class="span12 form-control" id="djrq" name="djrq" value="" >
															
							</div>
							<label for="hybh" class="span2 control-label">会员编号：</label>
							<div class="span4">
								<input type="text" class="span12 form-control " id="hybh" name="hybh" placeholder="">							
							</div>	
						</div>
				     	<div class="form-group">
							<label for="qymc" class="span2 control-label">企业名称：</label>
							<div class="span10">
								<input type="text" class="span12 form-control" id="qymc" name="qymc" placeholder="">							
							</div>
						</div>
						<div class="form-group">
							<label for="qydz" class="span2 control-label">企业地址：</label>
							<div class="span4">
								<input type="text" class="span12 form-control" id="qydz" name="qydz" placeholder="">							
							</div>
							<label for="yzbh" class="span2 control-label">邮政编号：</label>
							<div class="span4">
								<input type="text" class="span12 form-control" id="yzbh" name="yzbh" placeholder="">							
							</div>
						</div>
						<div class="form-group">
							<label for="qywz" class="span2 control-label">企业网址：</label>
							<div class="span4">
								<input type="text" class="span12 form-control" id="qywz" name="qywz" placeholder="">							
							</div>
							<label for="dzyx" class="span2 control-label">电子邮箱：</label>
							<div class="span4">
								<input type="text" class="span12 form-control" id="dzyx" name="dzyx" placeholder="">							
							</div>
						</div>
						<div class="form-group">
							<label for="gszch" class="span2 control-label">工商注册号：</label>
							<div class="span4">
								<input type="text" class="span12 form-control" id="gszch" name="gszch" placeholder="">							
							</div>
							<label for="zczj" class="span2 control-label">注册资金：</label>
							<div class="span4">
								<input type="text" class="span12 form-control" id="zczj" name="zczj" placeholder="">							
							</div>
						</div>
						&nbsp;
				        <div class="form-group">
							<label for="zzzsbh" class="span2 control-label">资质证书编号：</label>
							<div class="span10">
								<input type="text" class="span12 form-control" id="zzzsbh" name="zzzsbh" placeholder="">							
							</div>
						</div>
						&nbsp;
						<div class="form-group">
							<label for="djfw" class="span12 control-label">资质证书等级范围：</label>
						</div>
						<div class="form-group">
							<label for="zxzz" class="span2 control-label">主项资质:</label>
							<div class="span4">
						<textarea rows="5" class="span12" id="zxzz" name="zxzz"></textarea>
						    </div>
						    <label for="fxzz" class="span2 control-label">副项资质:</label>
							<div class="span4">
						<textarea rows="5" class="span12" id="fxzz" name="fxzz"></textarea>
						    </div>
						</div>
						&nbsp;
						<div class="form-group">
							<label for="qyfr" class="span2 control-label">企业法人：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="qyfr" name="qyfr" placeholder="">							
							</div>
							<label for="qydh" class="span2 control-label">企业电话：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="qydh" name="qydh" placeholder="">							
							</div>
							<label for="czhm" class="span2 control-label">传真号码：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="czhm" name="czhm" placeholder="">							
							</div>
						</div>
						<div class="form-group">
							<label for="dsz" class="span2 control-label">董事长：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="dsz" name="dsz" placeholder="">							
							</div>
							<label for="lxdh" class="span2 control-label">联系电话：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="lxdh" name="lxdh" placeholder="">							
							</div>
							<label for="sjhm" class="span2 control-label">手机号码：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="sjhm" name="sjhm" placeholder="">							
							</div>
						</div>
						<div class="form-group">
							<label for="zjl" class="span2 control-label">总经理：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="zjl" name="zjl" placeholder="">							
							</div>
							<label for="lxdh1" class="span2 control-label">联系电话：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="lxdh1" name="lxdh1" placeholder="">							
							</div>
							<label for="sjhm1" class="span2 control-label">手机号码：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="sjhm1" name="sjhm1" placeholder="">							
							</div>
						</div>
						<div class="form-group">
							<label for="lxr" class="span2 control-label">联系人：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="lxr" name="lxr" placeholder="">							
							</div>
							<label for="zw" class="span2 control-label">职务：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="zw" name="zw" placeholder="">							
							</div>
							<label for="sjhm2" class="span2 control-label">手机号码：</label>
							<div class="span2">
								<input type="text" class="span12 form-control " id="sjhm2" name="sjhm2" placeholder="">							
							</div>
						</div>
						 <label class="span12 control-label  ">声明:作为会员，本企业将遵守协会章程，履行会员义务，共同为推动行业的发展<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;而努力</label>
						    	
							<label class="span12 control-label">备注:1、填写《入会申请表》一式两份。<br>
								 &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2、附交（工商营业执照、资质证书复印件加盖公章）各一份。
							</label>
						<input type="text" class="span2 form-control hidden" id="hyid" name="hyid" value="">
						 
							
							
		            <div class="form-group">
			
				                   <lable class="span2 control-label">工商营业执照:</lable> 
					             <div id="fileDown1" class="span12" >
					            <div id="location1" ></div>
						          </div>
				                    </div>
				                    
				                    <div class="form-group">
					              <lable class="span2 control-label">资质证书:</lable> 
					 
				                  <div id="fileDown2" class="span12" >
					            <div id="location2" ></div>
						          </div>
				                    </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				        <button type="button" class="btn btn-default" data-dismiss="modal">确认</button>
				      </div>
				     
				    </form>
				    
			</div>
          </div>
          </div>
<!--模态框2-->

<!--外地会员-->
<!--模态框3-->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			 <div class="modal-dialog" >
				<div class="modal-content">
				    <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
				      <h4 class="modal-title" id="myModalLabel">外地会员</h4>
				    </div>
					<form id="wdxgform" name="wdxgform" action="wdxg.php" method="post" class="" role="form" >
				      <div class="modal-body">
				     	<div class="form-group">
							<label for="djrq1" class="span2 control-label">登记日期：</label>
							<div class="span4">
								<input type="text" class="span12 form-control" id="djrq1" name="djrq1" placeholder="">							
							</div>
							<label for="wdhybh" class="span2 control-label">会员编号：</label>
							<div class="span4">
								<input type="text" class="span12 form-control" id="wdhybh" name="wdhybh" placeholder="">							
							</div>
						</div>
						<div class="form-group">
							<label for="dwmc" class="span2 control-label">企业名称：</label>
							<div class="span10">
								<input type="text" class="span12 form-control" id="dwmc" name="dwmc" placeholder="">							
							</div>
							</div>
						&nbsp;
						<div class="form-group">
							<label for="xxdz" class="span2 control-label">企业地址：</label>
							<div class="span4">
								<input type="text" class="span12 form-control" id="xxdz" name="xxdz" placeholder="">							
							</div>
							<label for="wdyzbh" class="span2 control-label">邮政编号：</label>
							<div class="span4">
								<input type="text" class="span12 form-control" id="wdyzbh" name="wdyzbh" placeholder="">							
							</div>	
						</div>
						&nbsp;
						<div class="form-group">
							<label for="qywz1" class="span2 control-label">企业网址：</label>
							<div class="span4">
								<input type="text" class="span12 form-control" id="qywz1" name="qywz1" placeholder="">							
							</div>
						<label for="qyyx" class="span2 control-label">电子邮箱：</label>
							<div class="span4">
								<input type="text" class="span12 form-control" id="qyyx" name="qyyx" placeholder="">							
							</div>
							</div>
							<div class="form-group">
							<label for="gszc1" class="span2 control-label">工商注册号：</label>
							<div class="span4">
								<input type="text" class="span12 form-control" id="gszc1" name="gszc1" placeholder="">							
							</div>
						<label for="zczj1" class="span2 control-label">注册资金：</label>
							<div class="span4">
								<input type="text" class="span12 form-control" id="zczj1" name="zczj1" placeholder="">							
							</div>
							</div>
							<div class="span12">
								</div>
								<div class="form-group">
							<label for="zsbh" class="span2 control-label">资质证书编号：</label>
							<div class="span8">
								<input type="text" class="span12 form-control" id="zsbh" name="zsbh" placeholder="">							
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="djfw" class="span12 control-label">资质证书等级范围：</label>
						</div>
						<div class="form-group">
							<label for="wdzxzz" class="span2 control-label">主项资质:</label>
							<div class="span4">
						<textarea rows="5" class="span12" id="wdzxzz" name="wdzxzz"></textarea>
						    </div>
						    <label for="wdfxzz" class="span2 control-label">副项资质:</label>
							<div class="span4">
						<textarea rows="5" class="span12" id="wdfxzz" name="wdfxzz"></textarea>
						    </div>
						</div>
						<div class="form-group">
							<label for="fddbr" class="span2 control-label">企业法人：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="fddbr" name="fddbr" placeholder="">							
							</div>
							<label for="bgdh" class="span2 control-label">企业电话：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="bgdh" name="bgdh" placeholder="">							
							</div>	
					
						<label for="wdczdh" class="span2 control-label">传真号码：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="wdczdh" name="wdczdh" placeholder="">							
							</div>
							
						</div>
					
						
						
						<div class="form-group">
							<label for="fzr" class="span2 control-label">董事长：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="fzr" name="fzr" placeholder="">							
							</div>
							<label for="fzrbgdh" class="span2 control-label">联系电话</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="fzrbgdh" name="fzrbgdh" placeholder="">							
							</div>	
							<label for="zgsjhm" class="span2 control-label">手机号码</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="zgsjhm" name="zgsjhm" placeholder="">							
							</div>
							</div>
						<div class="form-group">
							<label for="zjl1" class="span2 control-label">总经理：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="zjl1" name="zjl1" placeholder="">							
							</div>
							<label for="zjllxdh1" class="span2 control-label">联系电话</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="zjllxdh1" name="zjllxdh1" placeholder="">							
							</div>	
							<label for="zjlsjhm1" class="span2 control-label">手机号码</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="zjlsjhm1" name="zjlsjhm1" placeholder="">							
							</div>
							</div>
						
						<div class="form-group">
							<label for="txy" class="span2 control-label">联系人：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="txy" name="txy" placeholder="">							
							</div>
							<label for="lxrzw1" class="span2 control-label">职务</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="lxrzw1" name="lxrzw1" placeholder="">							
							</div>
							<label for="txysjhm" class="span2 control-label">手机号码</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="txysjhm" name="txysjhm" placeholder="">							
							</div>
							</div>
						<div class="span12">
						
						<label class="span12 control-label">备注:1、填写《入会申请表》一式两份。<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2、同意协会章程，按规定交纳会费。<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3、提供在东莞注册《工商营业执照》及《资质证书》复印件各一份。
						</label> 
						</div>   
					<input type="text" class="span2 form-control hidden" id="wdid" name="wdid" value="wdid">	
				   
				    <div class="form-group">
			
				                   <lable class="span2 control-label">工商营业执照:</lable> 
					             <div id="fileDown3" class="span12" >
					            <div id="location" ></div>
						          </div>
				                    </div>
				                   
				     	            <div class="form-group">
				               <lable class="span2 control-label">资质证书:</lable> 
					
					
				              <div id="fileDown5" class="span12" >
					            <div id="location5" ></div>
						          </div>
				                    </div>
				       <div class="span12">
				       	</div>
				      <div class="span12"align="right">
				        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				        <button type="button" class="btn btn-default" data-dismiss="modal">确认</button>
				      </div>
				    </form>
				</div>
		     </div>
		  </div>
		</div>
<!--模态框3-->		
                           </div>
                            </div>
                <footer>
                <p>&copy; Vincent Gabriel 2013</p>
            </footer>
        
        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="assets/scripts.js"></script>       
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
        
        <script>$(function() {
	// Easy pie charts

	$('.chart').easyPieChart({
		animate: 1000
	});
});</script>
        <script type="text/javascript">$(function() {
	$(".lii").click(function() {
		//          第一种方法
		$(".lii").removeClass("active"); //删除指定的 class 属性
		$(this).addClass("active"); //向被选元素添加一个或多个类
		$(this).toggleClass("active"); //该函数会对被选元素进行添加/删除类的切换操作
		var text = $(this).text(); //获取当前选中的文本
		//或者使用第二种方法
		//          $(this).addClass("active").siblings().removeClass("active");
	});

	$(".lii0").click(function() {

		$("#bdhy").removeClass("my_none");
		$("#wdhy").addClass("my_none");

	})
	$(".lii1").click(function() {

		$("#wdhy").removeClass("my_none");
		$("#bdhy").addClass("my_none");

	});
	$(".sx1").click(function() {
		$("#lsdw").removeClass("my_none");
		$("#clsdw").addClass("my_none");
		$("#qbhyys").addClass("my_none");
		$("#fhzdw").addClass("my_none");
		$("#hzdw").addClass("my_none");
		$("#pthy").addClass("my_none");
	});

	$(".sx2").click(function() {

		$("#clsdw").removeClass("my_none");
		$("#qbhyys").addClass("my_none");
		$("#fhzdw").addClass("my_none");
		$("#hzdw").addClass("my_none");
		$("#pthy").addClass("my_none");
		$("#lsdw").addClass("my_none");
	});

	$(".sx3").click(function() {
		$("#fhzdw").removeClass("my_none");
		$("#clsdw").addClass("my_none");
		$("#qbhyys").addClass("my_none");
		$("#lsdw").addClass("my_none");
		$("#hzdw").addClass("my_none");
		$("#pthy").addClass("my_none");
	});
	$(".sx4").click(function() {
		$("#hzdw").removeClass("my_none");
		$("#clsdw").addClass("my_none");
		$("#qbhyys").addClass("my_none");
		$("#fhzdw").addClass("my_none");
		$("#lsdw").addClass("my_none");
		$("#pthy").addClass("my_none");
	});
	$(".sx5").click(function() {
		$("#pthy").removeClass("my_none");
		$("#clsdw").addClass("my_none");
		$("#qbhyys").addClass("my_none");
		$("#fhzdw").addClass("my_none");
		$("#hzdw").addClass("my_none");
		$("#lsdw").addClass("my_none");
	});

	$(".sx0").click(function() {
		$("#qbhyys").removeClass("my_none");
		$("#clsdw").addClass("my_none");
		$("#pthy").addClass("my_none");
		$("#fhzdw").addClass("my_none");
		$("#hzdw").addClass("my_none");
		$("#lsdw").addClass("my_none");
	});
})</script>
<script type="text/javascript">var djrq = document.getElementById("djrq");
var hybh = document.getElementById("hybh");
var qymc = document.getElementById("qymc");
var qydz = document.getElementById("qydz");
var yzbh = document.getElementById("yzbh");
var qywz = document.getElementById("qywz");
var dzyx = document.getElementById("dzyx");
var gszch = document.getElementById("gszch");
var zczj = document.getElementById("zczj");
var zzzsbh = document.getElementById("zzzsbh");
var zxzz = document.getElementById("zxzz");
var fxzz = document.getElementById("fxzz");
//				   function a(zxzz,fxzz){
//				   	zxzz=zxzz.replace(new RegExp(" ","g"),"\r\n");
//              	fxzz=fxzz.replace(new RegExp(" ","g"),"\r\n");
//              	}
//              	var zxzz=document.getElementById("zxzz1");
//				var fxzz=document.getElementById("fxzz1");
var qyfr = document.getElementById("qyfr");
var qydh = document.getElementById("qydh");
var czhm = document.getElementById("czhm");
var dsz = document.getElementById("dsz");
var lxdh = document.getElementById("lxdh");
var sjhm = document.getElementById("sjhm");
var zjl = document.getElementById("zjl");
var lxdh1 = document.getElementById("lxdh1");
var sjhm1 = document.getElementById("sjhm1");
var lxr = document.getElementById("lxr");
var zw = document.getElementById("zw");
var sjhm2 = document.getElementById("sjhm2");
var hyid = document.getElementById("hyid");

function mtk(id) {

	//				alert (id);
	var hyid = document.getElementById("hyid");
	hyid.value = id;
	//				
	//             
	$.ajax({
		type: "POST",
		url: "data/bdcz.php",
		data: {
			hyid: hyid.value
		},
		dataType: "json",
		timeout: 10000,
		success: function(data) {
			//				   			alert(data);
			var length = data.length;
			for(var i = 0; i < length - 1; i++) {
				djrq.value = data[i].登记日期;
				hybh.value = data[i].会员编号;
				qymc.value = data[i].企业名称;
				qydz.value = data[i].企业地址;
				yzbh.value = data[i].邮政编号;
				qywz.value = data[i].企业网址;
				dzyx.value = data[i].电子邮箱;
				gszch.value = data[i].工商注册号;
				zczj.value = data[i].注册资金;
				zzzsbh.value = data[i].资质证书编号;
				zxzz.value = data[i].主项资质;
				fxzz.value = data[i].副项资质;
				qyfr.value = data[i].企业法人;
				qydh.value = data[i].企业电话;
				czhm.value = data[i].企业传真号码;
				dsz.value = data[i].董事长;
				lxdh.value = data[i].董事长联系电话;
				sjhm.value = data[i].董事长手机号码;
				zjl.value = data[i].总经理;
				lxdh1.value = data[i].总经理联系电话;
				sjhm1.value = data[i].总经理手机号码;
				lxr.value = data[i].联系人;
				zw.value = data[i].联系人职务;
				sjhm2.value = data[i].联系人手机号码;
				//工商营业执照
				var fileDown1 = document.getElementById("fileDown1");

				var child1 = document.getElementById("location1");

				fileDown1.removeChild(child1); //删除指定的div以及子div
				var obj1 = document.createElement("div"); //创建div标签
				fileDown1.appendChild(obj1); //定位obj 
				obj1.id = "location1";
				var str1 = data[0].工商营业执照; //这是一字符串 
				var strs1 = str1.split("||"); //字符分割 

				for(i = 0; i < strs1.length - 1; i++) {

					var img1 = document.createElement("img");

					img1.setAttribute("src", strs1[i]);
					img1.setAttribute("style", "width: 150px;height: 100px;");
					obj1.appendChild(img1);
				}

				//资质证书
				var fileDown2 = document.getElementById("fileDown2");

				var child2 = document.getElementById("location2");

				fileDown2.removeChild(child2); //删除指定的div以及子div
				var obj2 = document.createElement("div"); //创建div标签
				fileDown2.appendChild(obj2); //定位obj 
				obj2.id = "location2";
				var str2 = data[0].资质证书; //这是一字符串 
				var strs2 = str2.split("||"); //字符分割 

				for(i = 0; i < strs2.length - 1; i++) {

					var img2 = document.createElement("img");
					img2.setAttribute("src", strs2[i]);
					img2.setAttribute("style", "width: 150px;height: 100px;");
					obj2.appendChild(img2);
				}

				//								hyid.value  =data[i].id;
			}
			//							alert(djrq.value);
		},
		error: function(xhr, type, errorThrown) {
			alert('ajxa错误' + type + '---' + errorThrown);
		}
	});

};</script>
<script type="text/javascript">var dwmc = document.getElementById("dwmc");
var wdhybh = document.getElementById("wdhybh");
var xxdz = document.getElementById("xxdz");
var wdyzbh = document.getElementById("wdyzbh");
var bgdh = document.getElementById("bgdh");
var wdczdh = document.getElementById("wdczdh");
var qyyx = document.getElementById("qyyx");
var zsbh = document.getElementById("zsbh");
var djrq1 = document.getElementById("djrq1");
var wdzxzz = document.getElementById("wdzxzz");
var wdfxzz = document.getElementById("wdfxzz");
var fddbr = document.getElementById("fddbr");
var qywz1 = document.getElementById("qywz1");
var fzr = document.getElementById("fzr");
var fzrbgdh = document.getElementById("fzrbgdh");
var txy = document.getElementById("txy");
var gszc1 = document.getElementById("gszc1");
var zczj1 = document.getElementById("zczj1");
var txysjhm = document.getElementById("txysjhm");
var zgsjhm = document.getElementById("zgsjhm");
var zjl1 = document.getElementById("zjl1");
var zjllxdh1 = document.getElementById("zjllxdh1");
var zjlsjhm1 = document.getElementById("zjlsjhm1");
var lxrzw1 = document.getElementById("lxrzw1");
//				var hyid =document.getElementById("hyid");
function wd(id) {
	//				alert (id);
	var wdid = document.getElementById("wdid");
	wdid.value = id;
	//				alert(wdid.value);	

	$.ajax({
		type: "POST",
		url: "data/wdcz.php",
		data: {
			wdid: wdid.value
		},
		dataType: "json",
		timeout: 10000,
		success: function(data) {
			//				   			alert(data);
			var length = data.length;
			for(var i = 0; i < length - 1; i++) {
				dwmc.value = data[i].企业名称;
				wdhybh.value = data[i].会员编号;
				xxdz.value = data[i].企业地址;
				wdyzbh.value = data[i].邮政编号;
				bgdh.value = data[i].企业电话;
				wdczdh.value = data[i].企业传真号码;
				qyyx.value = data[i].电子邮箱;
				zsbh.value = data[i].资质证书编号;
				djrq1.value = data[i].登记日期;
				wdzxzz.value = data[i].主项资质;
				wdfxzz.value = data[i].副项资质;
				fddbr.value = data[i].企业法人;
				qywz1.value = data[i].企业网址;
				fzr.value = data[i].董事长;
				fzrbgdh.value = data[i].董事长联系电话;
				txy.value = data[i].联系人;
				gszc1.value = data[i].工商注册号;
				txysjhm.value = data[i].联系人手机号码;
				zgsjhm.value = data[i].董事长手机号码;
				zczj1.value = data[i].注册资金;
				zjl1.value = data[i].总经理;
				zjllxdh1.value = data[i].总经理联系电话;
				zjlsjhm1.value = data[i].总经理手机号码;
				lxrzw1.value = data[i].联系人职务;

				//						   //总公司营业执照
				var fileDown3 = document.getElementById("fileDown3");

				var child = document.getElementById("location");

				fileDown3.removeChild(child); //删除指定的div以及子div
				var obj = document.createElement("div"); //创建div标签
				fileDown3.appendChild(obj); //定位obj 
				obj.id = "location";
				var str = data[0].工商营业执照; //这是一字符串 
				var strs = str.split("||"); //字符分割 

				for(i = 0; i < strs.length - 1; i++) {

					var img = document.createElement("img");

					img.setAttribute("src", strs[i]);
					img.setAttribute("style", "width: 150px;height: 100px;");
					obj.appendChild(img);
				}

				//资质证书
				var fileDown5 = document.getElementById("fileDown5");
				var child5 = document.getElementById("location5");
				fileDown5.removeChild(child5); //删除指定的div以及子div
				var obj5 = document.createElement("div"); //创建div标签
				fileDown5.appendChild(obj5); //定位obj 
				obj5.id = "location5";
				var str5 = data[0].资质证书; //这是一字符串 
				var strs5 = str5.split("||"); //字符分割 

				for(i = 0; i < strs5.length - 1; i++) {

					var img5 = document.createElement("img");
					img5.setAttribute("src", strs5[i]);
					img5.setAttribute("style", "width: 150px;height: 100px;");
					obj5.appendChild(img5);
				}

			}
			//							alert(djrq.value);
		},
		error: function(e) {
			alert("ajax数据请求失败，请重新加载！");
		}
	});
};</script>          
 </body>
 <!--<script type="text/javascript">
	function dianji(id){
//							alert(id);
							$.ajax({
				                cache: true,
				                type: "POST",
				                url:'data/bdsc.php',
				                data:{
				                	id1:id
				                },// 你的formid
				                async: false,
				                error: function(request) {
				                    alert("Connection error");
				                },
				                success: function(data) {
				                    alert("删除成功");
//				                    window.location.reload();
				                }
				            }); 
						};		
		function dianji1(id){
//							alert(id);
							$.ajax({
				                cache: true,
				                type: "POST",
				                url:'data/wdsc.php',
				                data:{
				                	id2:id
				                },// 你的formid
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
</script>             -->
<script type="text/javascript">function sc() {
	//							alert(id);
	$.ajax({
		cache: true,
		type: "POST",
		url: 'data/scpj.php',
		data: {

		}, // 你的formid
		async: false,
		error: function(request) {
			alert("Connection error");
		},
		success: function(data) {
			alert("生成成功");
			//				                    window.location.reload();
		}
	});
};</script>	
</html>