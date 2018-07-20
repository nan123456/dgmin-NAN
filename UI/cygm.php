<!DOCTYPE html>
<?php
session_start();
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
                        <li class="myclass0">
                        	
	                            <a href="hyfw.php"><i class="icon-chevron-right"></i> 会员服务</a>
	                            <ul class="">
	                            	<li><a href="hfjn.php">会费缴纳</a></li>
	                            	<li><a href="xwzl.php">用工实名制管理</a></li>
	                            	<li style="text-decoration:underline"><a href="cygm.php">活动</a></li>
	                            	
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
                <div class="span9" id="content">
                    <div class="block" id="Tcontent">
					  	<div class="row-fluid">
					  		
						  <div class="tab-content ">
						    <div id="home" class="tab-pane fade in active">
						      <div class="block ">
						      	<div class="navbar navbar-inner block-header ">
												<div class="btn-group">
													<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1"> 新增</button>
													<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" >查看<span class="caret"></span></button>
						      	<ul class="dropdown-menu">
						      		<li class="sx4"><a href="#qb" tabindex="-1" data-toggle="tab">全部</a></li>
											<li class="sx0"><a href="#cygm" tabindex="-1" data-toggle="tab">创优观摩</a></li>
											
											<li class="sx1"><a href="#cyjz" tabindex="-1" data-toggle="tab">创优讲座</a></li>
											<li class="sx2"><a href="#xxjl" tabindex="-1" data-toggle="tab">学习交流</a></li>
											<li class="sx3"><a href="#qt" tabindex="-1" data-toggle="tab">其他</a></li>
											
											</ul>
												</div>
											</div>
                <div class="block-content collapse in " >
                                	<div class="span12">
                                		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="qb" >
											<thead>
												<tr>
													<th>序号</th>
													
													<th>活动名称</th>
													<th>活动信息</th>
													
														</tr>
											</thead>
											
											<tbody id="" class="">
												
											<?php
											require("conn.php");
//					                   $yhtag=$_SESSION["yhtag"];
					                     $sql = "select * from 活动" ;
										
					                   $result = $conn->query($sql);
									   
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
//					                   	  $sql1 = "select 报名单位,Id from 会员参与活动的具体信息  " ;
////										
//					                   $result1 = $conn->query($sql1);
//					                   while($row = $result1->fetch_assoc()) {      					
					                   ?>
					                   	 															 
										    
										     <tr class="even gradeC " id="">
											<td><?php echo $i++;?></td>
													<!--<td><input type="checkbox"></td>-->
													
													<td><?php echo $row["活动名称"];?></td>
													<td class="center">
														
														
														<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="dianji(this.id);" >
																			修改信息
																		</button>
														<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass1" onclick="shanchu(this.id);" >删除</button>
														<button id="<?php echo $row["活动名称"];?>" type="button" class="btn btn-primary myclass7"   onclick="bmqy(this.id);" >
																			查看单位
																		</button>
														</td>
														<!--<td class="center">
															
															
															<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass3" onclick="tianj(this.id);" >
																			添加
																		</button>
																		
																		</td>
																		<td class="center"><button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass5" data-toggle="modal" data-target="#myModal5" onclick="tianjia1(this.id);" >
																			签到信息
																		</button>
																		
																		</td>-->
																		
														</tr>
														 
										
										 	 
                                                   <?php 
                                                }     
//                                              }
											$conn->close();
												?>
											
												
											</tbody>
											</table>
											<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered fade my_none" id="cygm" >
											<thead>
												<tr>
													<th>序号</th>
													
													<th>活动名称</th>
													<th>活动信息</th>
													
														</tr>
											</thead>
											
											<tbody id="" class="">
												
											<?php
											require("conn.php");
//					                   $yhtag=$_SESSION["yhtag"];
					                     $sql = "select * from 活动 where 活动类别='创优观摩'" ;
										
					                   $result = $conn->query($sql);
									   
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
//					                   	  $sql1 = "select 报名单位,Id from 会员参与活动的具体信息  " ;
////										
//					                   $result1 = $conn->query($sql1);
//					                   while($row = $result1->fetch_assoc()) {      					
					                   ?>
					                   	 															 
										    
										     <tr class="even gradeC " id="">
											<td><?php echo $i++;?></td>
													<!--<td><input type="checkbox"></td>-->
													
													<td><?php echo $row["活动名称"];?></td>
													<td class="center">
														
														
														<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="dianji(this.id);" >
																			修改信息
																		</button>
														<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass1" onclick="shanchu(this.id);" >删除</button>
														<button id="<?php echo $row["活动名称"];?>" type="button" class="btn btn-primary myclass7"   onclick="bmqy(this.id);" >
																			查看单位
																		</button>
														</td>
														</tr>
														 
										
										 	 
                                                   <?php 
                                                }     
//                                              }
											$conn->close();
												?>
											
												
											</tbody>
											</table>
											<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered fade my_none" id="cyjz" >
											<thead>
												<tr>
													<th>序号</th>
													
													<th>活动名称</th>
													<th>活动信息</th>
													
														</tr>
											</thead>
											
											<tbody id="" class="">
												
											<?php
											require("conn.php");
//					                   $yhtag=$_SESSION["yhtag"];
					                     $sql = "select * from 活动 where 活动类别='创优讲座'" ;
										
					                   $result = $conn->query($sql);
									   
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
//					                   	  $sql1 = "select 报名单位,Id from 会员参与活动的具体信息  " ;
////										
//					                   $result1 = $conn->query($sql1);
//					                   while($row = $result1->fetch_assoc()) {      					
					                   ?>
					                   	 															 
										    
										     <tr class="even gradeC " id="">
											<td><?php echo $i++;?></td>
													<!--<td><input type="checkbox"></td>-->
													
													<td><?php echo $row["活动名称"];?></td>
													<td class="center">
														
														
														<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="dianji(this.id);" >
																			修改信息
																		</button>
														<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass1" onclick="shanchu(this.id);" >删除</button>
														<button id="<?php echo $row["活动名称"];?>" type="button" class="btn btn-primary myclass7"   onclick="bmqy(this.id);" >
																			查看单位
																		</button>
														</td>
														</tr>
														 
										
										 	 
                                                   <?php 
                                                }     
//                                              }
											$conn->close();
												?>
											
												
											</tbody>
											</table>
											<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered fade my_none" id="xxjl" >
											<thead>
												<tr>
													<th>序号</th>
													
													<th>活动名称</th>
													<th>活动信息</th>
													
														</tr>
											</thead>
											
											<tbody id="" class="">
												
											<?php
											require("conn.php");
//					                   $yhtag=$_SESSION["yhtag"];
					                     $sql = "select * from 活动 where 活动类别='学习交流'" ;
										
					                   $result = $conn->query($sql);
									   
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
//					                   	  $sql1 = "select 报名单位,Id from 会员参与活动的具体信息  " ;
////										
//					                   $result1 = $conn->query($sql1);
//					                   while($row = $result1->fetch_assoc()) {      					
					                   ?>
					                   	 															 
										    
										     <tr class="even gradeC " id="">
											<td><?php echo $i++;?></td>
													<!--<td><input type="checkbox"></td>-->
													
													<td><?php echo $row["活动名称"];?></td>
													<td class="center">
														
														
														<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="dianji(this.id);" >
																			修改信息
																		</button>
														<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass1" onclick="shanchu(this.id);" >删除</button>
														<button id="<?php echo $row["活动名称"];?>" type="button" class="btn btn-primary myclass7"   onclick="bmqy(this.id);" >
																			查看单位
																		</button>
														</td>
														</tr>
														 
										
										 	 
                                                   <?php 
                                                }     
//                                              }
											$conn->close();
												?>
											
												
											</tbody>
											</table>
											<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered fade my_none" id="qt" >
											<thead>
												<tr>
													<th>序号</th>
													
													<th>活动名称</th>
													<th>活动信息</th>
													
														</tr>
											</thead>
											
											<tbody id="" class="">
												
											<?php
											require("conn.php");
//					                   $yhtag=$_SESSION["yhtag"];
					                     $sql = "select * from 活动 where 活动类别='其他'" ;
										
					                   $result = $conn->query($sql);
									   
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
//					                   	  $sql1 = "select 报名单位,Id from 会员参与活动的具体信息  " ;
////										
//					                   $result1 = $conn->query($sql1);
//					                   while($row = $result1->fetch_assoc()) {      					
					                   ?>
					                   	 															 
										    
										     <tr class="even gradeC " id="">
											<td><?php echo $i++;?></td>
													<!--<td><input type="checkbox"></td>-->
													
													<td><?php echo $row["活动名称"];?></td>
													<td class="center">
														
														
														<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="dianji(this.id);" >
																			修改信息
																		</button>
														<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass1" onclick="shanchu(this.id);" >删除</button>
														<button id="<?php echo $row["活动名称"];?>" type="button" class="btn btn-primary myclass7"   onclick="bmqy(this.id);" >
																			查看单位
																		</button>
														</td>
														</tr>
														 
										
										 	 
                                                   <?php 
                                                }     
//                                              }
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
										<!--模态框1-->
										<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
										<h4 class="modal-title" id="myModalLabel">新增</h4>
									</div>
									<form id="gmhd" name="gmhd" action="data/gmhd.php" method="post" enctype="multipart/form-data"  role="form">
									<div class="modal-body">	
										<div class="form-group">
												<label for="hdmc" class="span2 control-label">活动名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="hdmc" name="hdmc" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="hdzt" class="span2 control-label">活动主题</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="hdzt" name="hdzt" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="hddd" class="span2 control-label">活动地点</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="hddd" name="hddd" placeholder="">
												</div>
												<label for="bmzrs" class="span2 control-label">报名总人数</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="bmzrs" name="bmzrs" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="hdsj" class="span2 control-label">活动时间</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="hdsj" name="hdsj" placeholder="">
												</div>
												<div class="span6">
												<label for="hdlb" class="span4 control-label">活动类别</label>
												<select id="hdlb" name="hdlb"  class="span6">
													<option value="创优观摩">创优观摩</option>
													<option value="创优讲座">创优讲座</option>
													<option value="学习交流">学习交流</option>
													<option value="其他">其他</option>
												</select>
												
													
													</div>
												</div>
												<div class="form-group">
												<label for="hdks" class="span2 control-label">报名开始时间</label>
												<div class="span4">
													<input type="date" class="span10 form-control" id="hdks" name="hdks" placeholder="">
												</div>
												<label for="hdjs" class="span2 control-label">报名结束时间</label>
												<div class="span4">
													<input type="date" class="span10 form-control" id="hdjs" name="hdjs" placeholder="">
												</div>
											</div>
											<div class="form-group">
												
												<div class="span6">
													<label for="hdlx" class="span4 control-label">活动路线</label>
													<input type="text" class="span8 form-control" id="hdlx" name="hdlx" placeholder="">
												</div>
												
												<div class="span6">
													<label for="hdxz" class="span4 control-label">活动性质</label>
													<input type="text" class="span8 form-control" id="hdxz" name="hdxz" placeholder="">
												</div>
											</div>
											<div class="form-group">
												
												<div class="span12">
													<label for="bz" class="span2 control-label">备注</label>
													<input type="text" class="span10 form-control" id="bz" name="bz" placeholder="">
												</div>
											</div>
										<div class="form-group">
												<label for="hd2w" class="span6 control-label">活动报名二维码</label>
												<label for="hd3w" class="span6 control-label">活动签到二维码</label>
											</div>
										    </div>
										    <div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
											<button type="submit" class="btn btn-primary" id="save1">保存</button>
										</div>
									</form>
									</div>
							</div>
						</div>
							<!--模态框1-->	
							<!--模态框2-->
						<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
										<h4 class="modal-title" id="myModalLabel">活动信息修改</h4>
									</div>
									<form id="gmhd1" name="gmhd1" action="data/gmhd1.php" method="post" role="form" enctype="multipart/form-data">		
									<div class="modal-body">	
										<div class="form-group">
												<label for="hdmc1" class="span2 control-label">活动名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="hdmc1" name="hdmc1" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="hdzt1" class="span2 control-label">活动主题</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="hdzt1" name="hdzt1" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="hddd1" class="span2 control-label">活动地点</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="hddd1" name="hddd1" placeholder="">
												</div>
												<label for="bmzrs1" class="span2 control-label">报名总人数</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="bmzrs1" name="bmzrs1" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="hdsj1" class="span2 control-label">活动时间</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="hdsj1" name="hdsj1" placeholder="">
												</div>
												<div class="span6">
												<label for="hdlb1" class="span4 control-label">活动类别</label>
												<select id="hdlb1" name="hdlb1"  class="span6">
													<option value="创优观摩">创优观摩</option>
													<option value="创优讲座">创优讲座</option>
													<option value="学习交流">学习交流</option>
													<option value="其他">其他</option>
												</select>
												
													
													</div>
												</div>
												
											
											<div class="form-group">
												<label for="hdks1" class="span2 control-label">报名开始时间</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="hdks1" name="hdks1" placeholder="">
												</div>
												<label for="hdjs1" class="span2 control-label">报名结束时间</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="hdjs1" name="hdjs1" placeholder="">
												</div>
											</div>
											<div class="form-group">
												
												<div class="span6">
													<label for="hdlx1" class="span4 control-label">活动路线</label>
													<input type="text" class="span8 form-control" id="hdlx1" name="hdlx1" placeholder="">
												</div>
												
												<div class="span6">
													<label for="hdxz1" class="span4 control-label">活动性质</label>
													<input type="text" class="span8 form-control" id="hdxz1" name="hdxz1" placeholder="">
												</div>
											</div>
											<div class="form-group">
												
												<div class="span12">
													<label for="bz1" class="span2 control-label">备注</label>
													<input type="text" class="span10 form-control" id="bz1" name="bz1" placeholder="">
												</div>
											</div>
										<div class="form-group">
											<div class="span6">
											<button type="button" class="btn btn-default" onclick="bm()">活动报名二维码</button>
											</div>
											<div class="span6">
											<button  type="button" class="btn btn-default" onclick="cd()">活动签到二维码</button>
											</div>
											<div>
												<div class="form-group">
											<div class="span6" id="ma1">
												
											</div>
											<div class="span6" id="ma2">	
												
												</div>
											</div>
											<input type="type" class="span12 form-control hidden" id="gcid" name="gcid"value="gcid">
										    </div>
										    
										    <div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
											<button type="submit" class="btn btn-primary" id="save2">保存</button>
										</div>
									</form>
									</div>
							</div>
						</div>	
							<!--模态框2-->	
							<!--模态框3-->
							<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
										<h4 class="modal-title" id="myModalLabel">报名信息</h4>
									</div>
									<form id="bmqy1" name="bmqy1" action="data/gmhdbm1.php" method="post" role="form" enctype="multipart/form-data">		
									<div class="modal-body">		
								   <div class="form-group">
												
												<div class="span12">
													<label for="bmdw" class="span2 control-label">报名单位</label>
													<input type="text" class="span10 form-control" id="bmdw" name="bmdw" placeholder="">
												</div>
											</div>
											<div class="form-group">
												
												<div class="span6">
													<label for="bmrs" class="span4 control-label">报名人数</label>
													<input type="text" class="span8 form-control" id="bmrs" name="bmrs" placeholder="">
														</div>
														<div class="span6">
													<label for="bmxm" class="span4 control-label">报名人姓名</label>
													<input type="text" class="span8 form-control" id="bmxm" name="bmxm" placeholder="">	
												</div>
											</div>
											<div class="form-group">
												
												<div class="span6">
													<label for="bmdh" class="span4 control-label">报名人手机号码</label>
													<input type="text" class="span8 form-control" id="bmdh" name="bmdh" placeholder="">
														</div>
														<div class="span6">
													<label for="bmzw" class="span4 control-label">报名人职务</label>
													<input type="text" class="span8 form-control" id="bmzw" name="bmzw" placeholder="">	
												</div>
											</div>
											<input type="type" class="span12 form-control hidden" id="gcid1" name="gcid1">
												<input type="type" class="span12 form-control hidden" id="gcid2" name="gcid2"value="gcid2">
											</div>
											<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
											<button type="submit" class="btn btn-primary" id="save3">保存</button>
										</div>
									</form>
									</div>
							</div>
						</div>	
							<!--模态框4-->
							<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
										<h4 class="modal-title" id="myModalLabel">签到信息</h4>
									</div>
									<form id="qdqy1" name="qdqy1" action="data/tianj1.php" method="post" role="form" enctype="multipart/form-data">		
									<div class="modal-body">	
									<div class="form-group">
												
												<div class="span6">
													<label for="chrs" class="span4 control-label">参会人数</label>
													<input type="text" class="span8 form-control" id="chrs" name="chrs" placeholder="">
														</div>
														<div class="span6">
													<label for="qdxm" class="span4 control-label">签到人姓名</label>
													<input type="text" class="span8 form-control" id="qdxm" name="qdxm" placeholder="">	
												</div>
											</div>	
											<div class="form-group">
												
												<div class="span6">
													<label for="qdrzw" class="span4 control-label">签到人职务</label>
													<input type="text" class="span8 form-control" id="qdrzw" name="qdrzw" placeholder="">
														</div>
														<div class="span6">
													<label for="qdrdh" class="span4 control-label">签到人电话</label>
													<input type="text" class="span8 form-control" id="qdrdh" name="qdrdh" placeholder="">	
												</div>
											</div>
											<input type="type" class="span12 form-control hidden" id="gcid3" name="gcid3"value="gcid3">
											</div>
											<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
											<button type="submit" class="btn btn-primary" id="save4">保存</button>
										</div>
									</form>
									</div>
							</div>
						</div>	
									
										</div>
										</div>
										</div>
										<div class="span12">
										<footer>
                <p>&copy; Vincent Gabriel 2013</p>
            </footer>
            </div>
            <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="jquery.qrcode.js"></script>
        <script type="text/javascript" src="qrcode.js"></script>
        <script type="text/javascript" src="utf.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="assets/scripts.js"></script>       
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
        
        <script>
        $(function() {
            // Easy pie charts
            
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
        <script type="text/javascript">
        $(".sx0").click(function(){
        	$("#cygm").removeClass("my_none");
        	$("#cyjz").addClass("my_none");
        	$("#xxjl").addClass("my_none");
        	$("#qt").addClass("my_none");
        	$("#qb").addClass("my_none");
        	  });
        	   $(".sx1").click(function(){
        	$("#cyjz").removeClass("my_none");
        	$("#cygm").addClass("my_none");
        	$("#xxjl").addClass("my_none");
        	$("#qt").addClass("my_none");
        	$("#qb").addClass("my_none");
        	  });
        	   $(".sx2").click(function(){
        	$("#xxjl").removeClass("my_none");
        	$("#cygm").addClass("my_none");
        	$("#cyjz").addClass("my_none");
        	$("#qt").addClass("my_none");
        	$("#qb").addClass("my_none");
        	  });
        	  $(".sx3").click(function(){
        	$("#qt").removeClass("my_none");
        	$("#cygm").addClass("my_none");
        	$("#cyjz").addClass("my_none");
        	$("#xxjl").addClass("my_none");
        	$("#qb").addClass("my_none");
        	  });
        	  $(".sx4").click(function(){
        	$("#qb").removeClass("my_none");
        	$("#cygm").addClass("my_none");
        	$("#cyjz").addClass("my_none");
        	$("#xxjl").addClass("my_none");
        	$("#qt").addClass("my_none");
        	  });
        	   </script>
        	   <script type="text/javascript">
        	   function bm(){
        	   var a=$('#ma1').qrcode({
        	   	render: "canvas", //也可以替换为table
                        width: 120,
                        height: 120,
                        text: "http://127.0.0.1:8030/dgmin4-31/UI/bmma.php"
        	   });
        	   }
        	   function cd(){
        	   	$('#ma2').qrcode({
        	   	render: "canvas", //也可以替换为table
                        width: 120,
                        height: 120,
                        text: "签到成功"
        	   });
        	   }
        	   </script>
        <!--修改-->
		<script type="text/javascript">
			function dianji(id){
				var hdmc1 = document.getElementById("hdmc1");
				var hddd1 = document.getElementById("hddd1");
				var hdzt1 = document.getElementById("hdzt1");
				var hdsj1 = document.getElementById("hdsj1");
				var hdks1 = document.getElementById("hdks1");
				var hdjs1 = document.getElementById("hdjs1");
				var hdlx1 = document.getElementById("hdlx1");
				var hdxz1 = document.getElementById("hdxz1");
				var bz1 = document.getElementById("bz1");
				var bmzrs1 = document.getElementById("bmzrs1");
				var gcid=document.getElementById("gcid");
				var hdlb1=document.getElementById("hdlb1");
				
				gcid.value=id;
				gcid1.value=id;
				$.ajax({
					type:"POST",
					url:"data/gmhd2.php",
					data:{
						gcid:gcid.value
					},
					dataType : "json",
					timeout: 10000,
   					success : function(data){
						var length = data.length;			
   						for (var i=0;i<length-1;i++) {
   							hdmc1.value = data[i].活动名称;
							hdzt1.value = data[i].活动主题;
							hddd1.value = data[i].活动地点;
							hdsj1.value = data[i].活动时间;
							hdks1.value = data[i].报名开始时间;
							hdjs1.value = data[i].报名结束时间;
							hdlx1.value = data[i].活动路线;
							hdxz1.value = data[i].活动性质;
							bz1.value = data[i].备注;
							bmzrs1.value = data[i].报名总人数;
							hdlb1.value = data[i].活动类别;
				}
//						 						alert(gcmc.value); 
					},
					error: function(e) {
						alert("ajax数据请求失败，请重新加载！");
					}
				});
			};
		</script>
				
        <script type="text/javascript">
			function shanchu(id) { 
//				alert(id);
				
				$.ajax({
					cache: true,
					type: "POST",
					url: 'data/gmhdsc.php',
					data: {
						id1: id
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
		 <!--报名信息-->
		<script type="text/javascript">
			function bmqy(id){
				
				
				
				
				
				$.ajax({
					type:"POST",
					url:"cygm3.php",
					data:{
						id1:id,
						
					},	
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						
					window.location.href="cygm3.php";
					}		
			
//					
					
				});
			};
		</script>
			<!--添加-->
		<script type="text/javascript">
			function tianj(id) { 
//				alert(id);
				
				$.ajax({
					cache: true,
					type: "POST",
					url: 'data/tianj.php',
					data: {
						gcid2: id
					}, // 你的formid
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert("添加成功");
						window.location.reload();
					}

				});

			};
			
		</script>	
		<script type="text/javascript">
			function tianjia1(id) { 
//				alert(id);
				var chrs=document.getElementById("chrs");
				var qdxm=document.getElementById("qdxm");
				var qdrzw=document.getElementById("qdrzw");
				var qdrdh=document.getElementById("qdrdh");
				var gcid3=document.getElementById("gcid3");
				gcid3.value=id;
				
				$.ajax({
					type:"POST",
					url:"data/tianj2.php",
					data:{
						gcid3:gcid3.value,
					
					},
					dataType : "json",
					timeout: 10000,
   					success : function(data){
						var length = data.length;			
   						for (var i=0;i<length-1;i++) {
   							chrs.value = data[i].参会人数;
							qdxm.value = data[i].签到人姓名;
							qdrzw.value = data[i].签到人职务;
							qdrdh.value = data[i].签到人电话;
							
							
				}
//						 						alert(gcmc.value); 
					},
					error: function(e) {
						alert("ajax数据请求失败，请重新加载！");
					}
				});

			};
			
		</script>	
        </body> 
      </html>	
										                
										                
										         

