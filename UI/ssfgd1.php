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
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
		<link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
		<link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<link href="assets/styles.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" type="text/css" href="style.css"/>
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
//					                   $cjdw=$_GET["cjdw"];
					                   $fenge=explode("h","$yhtag");
					                   $bjm=$fenge[0];
					                   if($bjm=='1'){
					                     $sql = "select * from 本地会员 where 会员标记码='$yhtag'";
					                     $result = $conn->query($sql);
					                     while($row = $result->fetch_assoc()){
					                     $cjdw=$row["企业名称"];
//					                   	echo $cjdw;
                                       }
                                       		
					                   }elseif($bjm=='2'){
					                   	$sql = "select * from 外地会员 where 会员标记码='$yhtag'";
					                    $result = $conn->query($sql);
					                    while($row = $result->fetch_assoc()){
					                   	  $cjdw=$row["申请单位名称"];
					                    }
					                    	
					                   }elseif($bjm=='3'){
					                   	$sql = "select * from 项目申报 where 会员标记码='$yhtag'";
					                    $result = $conn->query($sql);
					                    while($row = $result->fetch_assoc()){
					                   	  $cjdw=$row["施工单位"];
					                   } 
					                   }											

//										消息数目↓
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
			
			//提取可添加字段内容
			$sql="select * from 修改字段内容表 where id='1'";
			$result=$conn->query($sql);
			while($row = $result->fetch_assoc()){
					$jglx=$row["结构类型"];
			}										
									?>	
									
										
					                  
		
		<div class="row-fluid" id="ImgBackground">
			<input type="text" class="span12 form-control hidden " id="sbm" name="sbm" value="<?php echo $bjm?>" />
</div>
			<!------->
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span3" id="sidebar">
						<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
							<li class="active ">
	                            <a href="xmgl.php"><i class="icon-chevron-right"></i> 项目管理</a>
	                            <ul class="">
	                            	<li><a href="sqyzj1.php">市优质奖</a></li>
	                            	<li  style="background: bisque;"><a href="ssfgd1.php">市示范工地</a></li>
	                            	<li><a href="syzj1.php">省优质奖</a></li>
	                            	<li><a href="syzjgj1.php">省优质结构奖</a></li>
	                            	<li><a href="syzqc1.php">省优秀QC</a></li>
	                            	<li><a href="slssg1.php">省绿色施工</a></li>
	                            </ul>
                            </li>
							<li class="myclass2"><a href="gctz.php"><i class="icon-chevron-right"></i> 工程台账</a></li>
							<li class="myclass"><a href="hyrh.php"><i class="icon-chevron-right"></i>会员入会</a></li>
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
							<li><a href="xx.php"><i class="icon-chevron-right"></i>消息</a>
								<ul>
								<li>发送消息</li>
                            	<li>消息列表<span class="badge badge-info pull-right"><?php echo $rec; ?></span></li>
								<li>已发消息<span class="badge badge-success pull-right"><?php echo $sent; ?></span></li>
								</ul>
							</li>
							<li><a href="sz.php"> 设置</a>
								
							</li>
							<li class="myclass9">
								<a href="cx.php">管理员功能</a>
							</li>
							<li><a href="czsc.php">操作手册</a>
								
							</li>
							<li><a href="login.php"> 退出</a></li>
						</ul>
					</div>
					<div class="span9" id="content">
						<div class="block" id="Tcontent">
							<div class="row-fluid">
								<ul class="nav navbar-inner block-header  nav-tabs" id="myUl">
									<li><i class="icon-chevron-left hide-sidebar" style="display: inline-block;"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>

										<i class="icon-chevron-right show-sidebar" style="display: none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i>
									</li>
									<li class="active"><a data-toggle="tab" href="#home">待受理</a></li>
									<li><a data-toggle="tab" href="#menu1">已受理</a></li>
									<li><a data-toggle="tab" href="#menu2">已退件记录</a></li>
									
								</ul>
								 <div class="tab-content ">
						    <div id="home" class="tab-pane fade in active">
						      <div class="block ">
	                            <div class="navbar navbar-inner block-header " >
	                                <!--<div class="btn-group">
											
											<button type="button"  class="btn btn-default dropdown-toggle" data-toggle="dropdown">汇总<span class="caret"></span></button>
											<ul class=" dropdown-menu"  role="menu" aria-labelledby="dropdownMenu1">
											<li class=""><a href="#aqx7" tabindex="-1" data-toggle="tab">全年</a></li>
											<li class=""><a href="#aqx7" tabindex="-1" data-toggle="tab">上半年</a></li>
											<li class=""><a href="#aqx7" tabindex="-1" data-toggle="tab">下半年</a></li>
											</ul>
									</div>-->
	                            </div>
                            	<div class="block-content collapse in">
                                	<div class="span12">
  										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
											<thead>
												<tr>
													<th class="">序号</th>
													<!--<th class="myclass8">项目编号</th>-->
													<th class="hidden">会员标记码</th>
													<th>工程名称</th>
													<th>承建单位</th>
													<th>施工单位联系人姓名</th>
													<th>联系电话</th>
													<th>申报日期</th>
													<th>操作</th>
													<!--<th>下载</th>-->
												</tr>
											</thead>
											<tbody>
								 <?php
					                   require("conn.php");
					                   $yhtag=$_SESSION["yhtag"];
//					                   $cjdw=$_GET["cjdw"];
					                   if($yhtag=='0h0000001'){
					                     $sql = "select * from 市示范工地 where 工程状态='待受理'order by Id1 asc ";
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
					                   	?>
									  <tr class="odd gradeX">
													<td class=""><?php if($yhtag!='0h0000001'){echo $i++;}else{echo $row["Id1"];}?></td>
													<td class="hidden" name="hybjm"><?php echo $bjm ?></td>
													<td><?php echo $row["工程名称"]?></td>
													<td class="center"> <?php echo $row["承建单位"]?></td>
													<td class="center"><?php echo $row["施工单位联系人"]?></td>
													<td class="center"><?php echo $row["施工单位联系人手机"]?></td>
													<td class="center"><?php echo $row["申报日期"]?></td>
													<td class="center">
														<button id="<?php echo $row["id"] ?> " type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" onclick="dianji(this.id)">查看</button>
														<button type="submit" id="<?php echo $row["id"]?>" class="btn btn-primary " data-toggle="modal" data-target="#myModal4" onclick="sh(this.id)">审核</button>
														
														
												   
												    
														<!--<a href="upload/sfupload/<?php echo $row['绿色通道'];?>"><button type="button" class="btn btn-primary" style="font-size: xx-small;">施工许可或绿色通道</button></a>
														<a href="upload/sfupload/<?php echo $row['重点工程批文'];?>"><button type="button" class="btn btn-primary">重要工程</button></a>-->
														
												    </td>
												</tr>
									  <?php
									  }
									  
									   }else{
									   if($bjm=='1'||$bjm=='2'){
					                   	 $sql = "select * from 市示范工地  where 会员标记码='$yhtag'and 工程状态='待受理'  order by Id1 asc  ";
					                   }else{
					                   	 $sql = "select * from 市示范工地  where 会员标记码='$yhtag'and 工程状态='待受理' order by Id1 asc ";
					                   }
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
					                         					
					                   ?>
												<tr class="odd gradeX">
													<td class=""><?php if($yhtag!='0h0000001'){echo $i++;}else{echo $row["Id1"];}?></td>
													<td class="hidden" name="hybjm"><?php echo $bjm ?></td>
													<td><?php echo $row["工程名称"]?></td>
													<td class="center"> <?php echo $row["承建单位"]?></td>
													<td class="center"><?php echo $row["施工单位联系人"]?></td>
													<td class="center"><?php echo $row["施工单位联系人手机"]?></td>
													<td class="center"><?php echo $row["申报日期"]?></td>
													<td class="center">
														<button id="<?php echo $row["id"] ?> " type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" onclick="dianji(this.id)">查看</button>
														
														<button type="submit" id="<?php echo $row["id"]?>" class="btn btn-primary " data-toggle="modal" data-target="#" onclick="ch(this.id)">撤回</button>
														
												    </td>
												    <!--<td class="center">
														<a href="upload/sfupload/<?php echo $row['绿色通道'];?>"><button type="button" class="btn btn-primary" style="font-size: xx-small;">施工许可或绿色通道</button></a>
														<a href="upload/sfupload/<?php echo $row['重点工程批文'];?>"><button type="button" class="btn btn-primary">重要工程</button></a>
														
												    </td>-->
												</tr>
										<?php
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
						    <div id="menu1" class="tab-pane fade">
						      	<div class="block ">
	                            	<div class="navbar navbar-inner block-header " >
	                                	<div class="btn-group">
											
											<<button type="button"  class="btn btn-default dropdown-toggle myclass5" data-toggle="modal" data-target="#myModal3">汇总</button>
											
											<!--<ul class=" dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
											<li class="lii"><a href="#aqx7" tabindex="-1" data-toggle="tab">全年</a></li>
											<li class="lii"><a href="#aqx7" tabindex="-1" data-toggle="tab">上半年</a></li>
											<li class="lii"><a href="#aqx7" tabindex="-1" data-toggle="tab">下半年</a></li>
											</ul>-->
										</div>
									</div>     
	                          	</div>
                            	<div class="block-content collapse in">
                                	<div class="span12" >
  										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example1">
											<thead>
												<tr>
													<th class="">序号</th>
													<!--<th class="myclass11">项目编号</th>-->
													<th>工程名称</th>
													<th>工程状态</th>
													<th>承建单位</th>
													<th>施工单位联系人姓名</th>
													<th>联系电话</th>
													<th>申报日期</th>
													<th>审核通过时间</th>
													<th>操作</th>
													
												</tr>
											</thead>
											<tbody>
								 <?php
					                   require("conn.php");
					                   $yhtag=$_SESSION["yhtag"];
//					                   $cjdw=$_GET["cjdw"];
					                   if($yhtag=='0h0000001'){
					                     $sql = "select * from 市示范工地 where 工程状态='已受理'order by Id1 asc ";
					                   }elseif($bjm=='1'||$bjm=='2'){
					                   	 $sql = "select * from 市示范工地  where 会员标记码='$yhtag'and 工程状态='已受理' or 承建单位='$cjdw' and 工程状态='已受理'order by Id1 asc   ";
					                   }else{
					                   	 $sql = "select * from 市示范工地  where 会员标记码='$yhtag'and 工程状态='已受理' order by Id1 asc ";
					                   }
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
					                         					
					             ?>
												<tr class="odd gradeX">
													<td class=""><?php if($yhtag!='0h0000001'){echo $i++;}else{echo $row["Id1"];}?></td>
													<td><?php echo $row["工程名称"]?></td>
													<td>已审核</td>
													<td class="center"> <?php echo $row["承建单位"]?></td>
													<td class="center"><?php echo $row["施工单位联系人"]?></td>
													<td class="center"><?php echo $row["施工单位联系人手机"]?></td>
													<td class="center"><?php echo $row["申报日期"]?></td>
													<td class=""><?php echo $row["审核通过时间"]?></td>
													<td class="center">
														<button id="<?php echo $row["id"] ?> " type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" onclick="dianji(this.id)">查看</button>
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
	                            <div class="navbar navbar-inner block-header " >
	                                <!--<div class="btn-group">
											
											<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">汇总<span class="caret"></span></button>
											<ul class=" dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
											<li class="lii"><a href="#aqx7" tabindex="-1" data-toggle="tab">全年</a></li>
											<li class="lii"><a href="#aqx7" tabindex="-1" data-toggle="tab">上半年</a></li>
											<li class="lii"><a href="#aqx7" tabindex="-1" data-toggle="tab">下半年</a></li>
											</ul>
									</div>-->
	                            </div>
                            	<div class="block-content collapse in">
                                	<div class="span12">
  										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
											<thead>
												<tr>
													<th class="">序号</th>
													<!--<th class="myclass13">项目编号</th>-->
												
													<th>工程名称</th>
													
													<th style="width: 500px;">退件理由</th>
													<th>操作</th>
												</tr>
											</thead>
											<tbody>
								 <?php
					                   require("conn.php");
					                   $yhtag=$_SESSION["yhtag"];
//					                   $cjdw=$_GET["cjdw"];
					                  if($yhtag=='0h0000001'){
					                     $sql = "select * from 市示范工地 where 工程状态='已退件' order by Id1 asc ";
					                  
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
					                         					
					             ?>
												<tr class="odd gradeX">
													<td class=""><?php if($yhtag!='0h0000001'){echo $i++;}else{echo $row["Id1"];}?></td>
													<td><?php echo $row["工程名称"]?></td>
													
													
													<td><?php echo $row["退件理由"]?></td>
													<td class="center">
													<button id="<?php echo $row["id"] ?> " type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" onclick="dianji(this.id)">查看</button>	
														
														
													</td>
												</tr>
									    <?php
											}
											}else{
											if($bjm=='1'||$bjm=='2'){
					                   	 $sql = "select * from 市示范工地  where 会员标记码='$yhtag'and 工程状态='已退件' or 承建单位='$cjdw' and 工程状态='已退件'order by Id1 asc   ";
					                   }else{
					                   	 $sql = "select * from 市示范工地  where 会员标记码='$yhtag'and 工程状态='已退件' order by Id1 asc ";
					                   }
					                  
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
					                         					
					             ?>
												<tr class="odd gradeX">
													<td class=""><?php if($yhtag!='0h0000001'){echo $i++;}else{echo $row["Id1"];}?></td>
													<td><?php echo $row["工程名称"]?></td>
													
													
													<td><?php echo $row["退件理由"]?></td>
													<td class="center">
														
														<button id="<?php  echo $row["id"] ?> " type="button" class="btn btn-primary myclass20" data-toggle="modal" data-target="#myModal9" onclick="shenbao(this.id)">修改</button>
														<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary " onclick="tijiao(this.id);">提交</button>
														
													</td>
												</tr>
									    <?php
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
<!--查看-->						
						<!--模态框1-->
						<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			 <div class="modal-dialog" >
				<div class="modal-content">
				    <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
				        <h4 class="modal-title" id="myModalLabel">审核</h4>
				    </div>
				    <div class="btn-group " >
						<button type="button " class=" btn  btn-large" data-toggle="dropdown">
							选择
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li class="lii lii0 " onclick="shtg();"><a href="#shtg" tabindex="-1" data-toggle="tab">审核通过</a></li>
							<li class="lii lii1  " onclick="tjly2();"><a href="#tjly" tabindex="-1" data-toggle="tab">退件理由</a></li>	
						</ul>
			        </div>
			    
				<div class="btn-group tab-pane fade my_none "  id="shtg">
					<form id="tjlyform" name="tjlyform" action="" method="post" class="" role="form" >
				      <div class="modal-body">
				     
						<div class="form-group ">
							<label for="shtg1" class="span12 control-label" ><h1 style="text-align: center;">审核通过</h1></label>
							<div class="span8 hidden ">
						<textarea rows="5" class="span12" id="shtg1" name="shtg1" value=""></textarea>
						<input id="shid" name="shid" class="">
						    </div>
						    <label for="" class="span2 control-label hidden"></label>
							<div class="span4">
								<textarea rows="1" class="span2 hidden" id="" name=""></textarea>
								
						    </div>
						</div>
						<div class="span12">
				        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				        <button type="button" id="save1" class="btn btn-primary" onclick="window.location.reload()">保存</button>
				      </div>
				    </div>
				     
				    </form>
				</div>
				<div class="btn-group tab-pane fade my_none "  id="tjly">
					<form id="tjlyform1" name="tjlyform1" action="" method="post" class="" role="form" >
				      <div class="modal-body">
				     
						<div class="form-group">
							<label for="tjly1" class="span12 control-label">退件理由:</label>
							<div class="span8">
						<textarea rows="5" class="span12" id="tjly1" name="tjly1" value=""></textarea>
						<input id="tjid" class="hidden" value="">
						<input id="ytj" value=""class="hidden" >
						    </div>
						    <label for="" class="span2 control-label hidden"></label>
							<div class="span4">
								<textarea rows="1" class="span2 hidden" id="" name=""></textarea>
						    </div>
						    </div>
						</div>
						<div class="span12">
				        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				        <button type="button" id="save4" class="btn btn-primary" onclick="window.location.reload()">保存</button>
				      </div>
				    
									</form>
								</div>
							</div>
						</div>
						</div>
						
    <!--查看	-->		
						<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  						 &times;
	                  					</button>
										<h4 class="modal-title" id="myModalLabel">查看</h4>
									</div>
									<form id="bdhyform2" name="bdhyform2" action="" method="post" class="" role="form">
										<!--<input id="gcfl" value="省优质结构奖" name="syzjgj" class="hidden" />-->
										<!--<input id="gczt" value="" name="" class="hidden" />-->
										<!--<input class="hidden " id="hybjm" name="hybjm" value="<?php echo $yhtag;?>">-->
										<div class="modal-body" >
											<div class="form-group">
												<label for="xggcmc" class="span2 control-label">工程名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xggcmc" name="xggcmc" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xggcdz" class="span2 control-label">工程地址(镇街村)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xggcdz" name="xggcdz" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgsbrq" class="span2 control-label">申报日期</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgsbrq" name="xgsbrq" placeholder="" />
												</div>
											</div>
											<div class="form-group">
												<label for="xgcjdw" class="span2 control-label">承建单位(申报)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgcjdw" name="xgcjdw" placeholder="" readonly="true" value="<?php echo $cjdw?>">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgjzsxm" class="span2 control-label">项目经理姓名</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgjzsxm" name="xgjzsxm" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgjzszzh" class="span2 control-label">建造师证证号</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgjzszzh" name="xgjzszzh" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgcjlxr" class="span2 control-label" >施工单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgcjlxr" name="xgcjlxr" placeholder="">
												</div>
												<label for="xgcjlxrdh" class="span2 control-label " >联系人手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgcjlxrdh" name="xgcjlxrdh" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgjldw" class="span2 control-label">监理单位</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgjldw" name="xgjldw" placeholder="">
												</div>
												
											</div>
											<div class="form-group">
												<label for="xgzjxm" class="span2 control-label">总监姓名</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgzjxm" name="xgzjxm" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgzyzzgzh" class="span2 control-label">执业证资格证号</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgzyzzgzh" name="xgzyzzgzh" placeholder="">
												</div> 
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgjldwlxr" class="span2 control-label" >监理单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgjldwlxr" name="xgjldwlxr" placeholder="">
												</div>
												<label for="xgjldwlxrdh" class="span2 control-label ">联系人电话</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgjldwlxrdh" name="xgjldwlxrdh" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgcjdw1" class="span2 control-label">参建单位</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgcjdw1" name="xgcjdw1" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgcj1lxr" class="span2 control-label" >参建单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgcj1lxr" name="xgcj1lxr" placeholder="">
												</div>
												<label for="xgcj1lxrdh" class="span2 control-label " >联系人手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgcj1lxrdh" name="xgcj1lxrdh" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											
											<div class="form-group">
												<label for="xggc" class="span2 control-label">建筑面积(平方)</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xggc" name="xggc" placeholder="">
												</div>
												<label for="xggm" class="span2 control-label">规模(万元)</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xggm" name="xggm" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
												<div class="form-group">
													<label for="xgjg" class="span2 control-label">结构类型</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgjg" name="xgjg" placeholder="">
												</div>
													
													
												</div>
												<div class="form-group ">
												<label for="xgsc" class="span2 control-label">地上</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgsc" name="xgsc" placeholder="">
												</div>
												<label for="xgxc" class="span2 control-label">地下</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgxc" name="xgxc" placeholder="">
												</div>
											</div>
											
											<div class="form-group hidden">
												<label for="xgkgsj" class="span2 control-label">开工时间</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="xgkgsj" name="xgkgsj" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgjgsj" class="span2 control-label">计划竣工时间</label>
												<div class="span10">
													<input type="date" class="span12 form-control" id="xgjgsj" name="xgjgsj" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgxxjd" class="span2 control-label">申报时的工程形象进度</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgxxjd" name="xgxxjd" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgbeizhu" class="span2 control-label">备注</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgbeizhu" name="xgbeizhu" placeholder=""  />
												</div>
											</div>
											<input class="hidden" id="gcid" name="gcid">
                                          <div class="form-group">
			
				                   <lable class="span2 control-label">施工许可或监督文件，重点工程或绿色通道批文:</lable> 
					             <div id="fileDown3" class="span12" >
					            <div id="location" ></div>
						          </div>
				                    </div>
				                    <div class="span12"></div>
				                   <div class="form-group">
					              <lable class="span2 control-label">用工实名制证明文件:</lable> 
					 
				                  <div id="fileDown4" class="span12" >
					            <div id="location4" ></div>
						          </div>
				                    </div>
				     	           
										</div>
										<div class="modal-footer">
											
											<button type="button" class="btn btn-default" data-dismiss="modal">确认</button>
										</div>
									</form>
								</div>
							</div>
						</div>

	<!--模态框1-->
<!--申报-->
<!--模态框2-->
<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  						 &times;
	                  					</button>
										<h4 class="modal-title" id="myModalLabel">修改</h4>
									</div>
									<form id="bdhyform1" name="bdhyform1" action="data/ssfgd1bc.php" method="post" class="" role="form" enctype="multipart/form-data">
										<!--<input id="gcfl" value="省优质结构奖" name="syzjgj" class="hidden" />-->
										<!--<input id="gczt" value="" name="" class="hidden" />-->
										<!--<input class="hidden " id="hybjm" name="hybjm" value="<?php echo $yhtag;?>">-->
										<div class="modal-body" >
											<div class="form-group">
												<label for="gcmc" class="span2 control-label">工程名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="gcmc" name="gcmc" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="gcdz" class="span2 control-label">工程地址(镇街村)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="gcdz" name="gcdz" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="sbrq" class="span2 control-label">申报日期</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="sbrq" name="sbrq" placeholder="" readonly="true">
												</div>
											</div>
											<div class="form-group">
												<label for="cjdw2" class="span2 control-label">承建单位(申报)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="cjdw2" name="cjdw2" placeholder=""  value="<?php echo $cjdw?>">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="jzsxm" class="span2 control-label">项目经理姓名</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="jzsxm" name="jzsxm" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="jzszzh" class="span2 control-label">建造师证证号</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="jzszzh" name="jzszzh" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="cjlxr" class="span2 control-label" >施工单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="cjlxr" name="cjlxr" placeholder="">
												</div>
												<label for="cjlxrdh" class="span2 control-label " >联系人手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="cjlxrdh" name="cjlxrdh" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="jldw" class="span2 control-label">监理单位</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="jldw" name="jldw" placeholder="">
												</div>
												
											</div>
											<div class="form-group">
												<label for="zjxm" class="span2 control-label">总监姓名</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="zjxm" name="zjxm" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="zyzzgzh" class="span2 control-label">执业证资格证号</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="zyzzgzh" name="zyzzgzh" placeholder="">
												</div> 
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="jldwlxr" class="span2 control-label" >监理单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="jldwlxr" name="jldwlxr" placeholder="">
												</div>
												<label for="jldwlxrdh" class="span2 control-label ">联系人电话</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="jldwlxrdh" name="jldwlxrdh" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="cjdw3" class="span2 control-label">参建单位</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="cjdw3" name="cjdw3" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="cj1lxr" class="span2 control-label" >参建单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="cj1lxr" name="cj1lxr" placeholder="">
												</div>
												<label for="cj1lxrdh" class="span2 control-label " >联系人手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="cj1lxrdh" name="cj1lxrdh" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											
											<div class="form-group">
												<label for="gc" class="span2 control-label">建筑面积(平方)</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="gc" name="gc" placeholder="">
												</div>
												<label for="xggm" class="span2 control-label">规模(万元)</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="gm" name="gm" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
												<div class="form-group">
													<label for="jg" class="span2 control-label">结构类型</label>
												<div class="span10 controls">
														<select id="jg" name="jg" class="form-control span12">
															<?php $select=explode("||",$jglx);
											for($i=0;$i<count($select);$i++){?>
											<option><?php echo $select[$i] ?></option>
											<?php } ?>
														</select>
													</div>
													
													
												</div>
												<div class="form-group ">
												<label for="sc" class="span2 control-label">地上</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="sc" name="sc" placeholder="">
												</div>
												<label for="xc" class="span2 control-label">地下</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xc" name="xc" placeholder="">
												</div>
											</div>
											
											<div class="form-group hidden">
												<label for="kgsj" class="span2 control-label">开工时间</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="kgsj" name="kgsj" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="jgsj" class="span2 control-label">计划竣工时间</label>
												<div class="span10">
													<input type="date" class="span12 form-control" id="jgsj" name="jgsj" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xxjd" class="span2 control-label">申报时的工程形象进度</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xxjd" name="xxjd" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="beizhu" class="span2 control-label">备注</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="beizhu" name="beizhu" placeholder=""  />
												</div>
											</div>
											<input class="hidden" id="gcid1" name="gcid1">
												
											<div class="form-group">
			
				                   <lable class="span12 control-label">施工许可或监督文件，重点工程或绿色通道批文图片预览:</lable> 
					             <div id="fileDown1" class="span12" >
					            <div id="location1" ></div>
						          </div>
				                    </div>
				                   <div class="form-group">
					              <lable class="span12 control-label">用工实名制证明文件图片预览:</lable> 
					 
				                  <div id="fileDown2" class="span12" >
					            <div id="location2" ></div>
						          </div>
				                    </div>
				                     
				                    <div class="span12">
				                       <div class="form-group">
										<label class="control-label" for="myfile3">施工许可或监督文件，重点工程或绿色通道批文:</label>
							<div id="container">
	                                <a id="myfile3" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles3" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile3"></div>
										<label class="control-label" for="myfile4">用工实名制证明文件:</label>
							<div id="container">
	                                <a id="myfile4" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles4" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile4"></div>
											  </div> </div>
				     	            	<input id="furl3" name="picture3" type= "hidden" />
								              <input id="furl4" name="picture4" type="hidden"/>

										</div>
										<div class="modal-footer">
											
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
										<button type="submit" class="btn btn-primary" id="save2">保存</button>	
										</div>
									</form>
								</div>
							</div>
						</div>



          </div>
<!--模态框2--> 
<!--汇总-->
<!--模态框3-->
<div class="modal fade" style="width: 1200px; margin-left:-600px; margin-top: -70px;" id="myModal3" tabindex="-1" role="dialog "  aria-labelledby="myModalLabel" aria-hidden="true">
			 <div class="modal-dialog " style="width: 1200px;height:600px; overflow: scroll;" >
				<div class="modal-content">
				    <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
				      <h4 class="modal-title" id="myModalLabel">汇总</h4>
				    </div>
				     
					<div class="block-content collapse in">
						<label for="sjcx" class="span1 control-label">时间查询</label>
								<div class="span4">
									<input type="date" class="span6 form-control" id="qssj" name="qssj" placeholder="">
									<input type="date" class="span6 form-control" id="jssj" name="jssj" placeholder="">
									<input type="text" class="span2 form-control hidden" id="bjm1" name="bjm1" value="<?php echo $bjm ?>">
									<input type="text" class="span2 form-control hidden" id="yhtag1" name="yhtag1" value="<?php echo $yhtag ?>">
									<input type="text" class="span2 form-control hidden" id="cjdw1" name="cjdw1" value="<?php echo $cjdw ?>">
										<button onclick="cx();cx1()">查询</button>
										<a href="data/download.php?name=2.xls"><button type="button" class="" >下载</button></a>
								</div>
                                	<div class="">
  										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="">
											<thead>
												<tr>
													
													<th class="hidden">会员标记码</th>
													<th>工程名称</th>
													<th >承建单位</th>
													<th>项目经理姓名</th>
													<th>建造师证证号</th>
													<th colspan="2" >施工单位联系人/电话</th>
													<th>监理单位</th>
													<th>总监理姓名</th>
													<th>执业资格证号</th>
													<th colspan="2" >监理单位联系人/电话</th>
													<th>参建单位（专业分包单位）</th>
													<th colspan="2" >参建单位联系人/电话</th>
													<th>结构类别</th>
													<th colspan="2" >地上/地下</th>
													<th colspan="2" >建筑面积㎡/规模</th>
													<th>计划竣工时间</th>
													<th>申报时的工程形象进度（主体）</th>
													<th>工程地点（镇街村）</th>
													<th>申报日期</th>
													<th>是否通过省安全标化系统审核）</th>
													<th>备注</th>
												</tr>
											</thead>
											<tbody>
								 <!--<?php
					                   require("conn.php");
					                   $yhtag=$_SESSION["yhtag"];
//					                   $cjdw=$_GET["cjdw"];
					                   if($yhtag=='0h0000001'){
					                     $sql = "select * from 市示范工地 where 工程状态='已受理'";
					                   }elseif($bjm=='1'||$bjm=='2'){
					                   	 $sql = "select * from 市示范工地  where 会员标记码='$yhtag'and 工程状态='已受理' or 承建单位='$cjdw' and 工程状态='已受理'  ";
					                   }else{
					                   	 $sql = "select * from 市示范工地  where 会员标记码='$yhtag'and 工程状态='已受理' ";
					                   }
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {
					                         					
					                   ?>-->
												<tr class="odd gradeX">
													
													<td class="hidden" name="hybjm"></td>
													<td name="gcmchz"></td>
													<td name="cjdwhz"> </td>
													<td name="xmjlxmhz"></td>
													<td name="jzszzhhz"></td>
													<td name="sgdwlxrhz"></td>
													<td name="sgdwlxrdhhz"></td>
													<td name="jldwhz"></td>
												    <td name="zjlxmhz"></td>
												    <td name="zyzgzhhz"></td>
												    <td name="jldwlxrhz"></td>
												    <td name="jldwlxrdhhz"></td>
												    <td name="cjdwhz1"></td>
												    <td name="cjdwlxrhz"></td>
												    <td name="cjdwlxrdhhz"></td>
												    <td name="jghz"></td>
												    <td name="schz"></td>
												    <td name="xchz"></td>
												    <td name="gchz"></td>
												    <td name="gmhz"></td>
												    <td name="jgsjhz"></td>
												    <td name="gcxxjdhz"></td>
												    <td name="gcdzhz"></td>
												    <td name="sbrqhz"></td>
												    <td></td>
												    <td name="beizhuhz"></td>
												    
												</tr>
										<!--<?php
											}
											$conn->close();
																					
										?>		-->
											</tbody>
										</table>
                                	</div>
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
		<script src="vendors/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="vendors/jquery-migrate-1.2.1.min.js"></script>
        <script src="vendors/modernizr.min.js"></script>
        <script src="vendors/jquery.nicescroll.js"></script>
        <!--连接上传所需的类-->
        <script type="text/javascript" src="vendors/plupload.full.min.js"></script>
        <!--连接执行操作的js代码-->
        <script type="text/javascript" src="data/upload_file_xglstd.js"></script>
        <script type="text/javascript" src="data/upload_file_xgzdgc.js"></script>

		<script>
			$(function() {
				// Easy pie charts
				$('.chart').easyPieChart({
					animate: 1000
				});
			});
			 var sbm=document.getElementById("sbm");
		var myclass2=document.getElementsByClassName("myclass2");
		var myclass=document.getElementsByClassName("myclass");
		var myclass5=document.getElementsByClassName("myclass5");
		var myclass9=document.getElementsByClassName("myclass9");
//	     var myclass0=document.getElementsByClassName("myclass0");
//		var myclass8=document.getElementsByClassName("myclass8");
//		var myclass10=document.getElementsByClassName("myclass10");
//		var myclass11=document.getElementsByClassName("myclass11");
//		var myclass12=document.getElementsByClassName("myclass12");
//		var myclass13=document.getElementsByClassName("myclass13");
		if(sbm.value=='0'){
				myclass2[0].setAttribute("class","hidden");
//				 myclass0[0].setAttribute("class","hidden");
//				myclass10[0].setAttribute("class","hidden");
//				myclass12[0].setAttribute("class","hidden");
				
		}else if(sbm.value!='0'){
			myclass[0].setAttribute("class","hidden");
			myclass5[0].setAttribute("class","hidden");
//			myclass8[0].setAttribute("class","hidden");
			myclass9[0].setAttribute("class","hidden");
//			myclass11[0].setAttribute("class","hidden");
//			myclass13[0].setAttribute("class","hidden");
		}
			
			
			
$(function() {
        $(".lii").click(function() {
            //          第一种方法
             $(".lii").removeClass("active");//删除指定的 class 属性
             $(this).addClass("active");//向被选元素添加一个或多个类
             $(this).toggleClass("active");//该函数会对被选元素进行添加/删除类的切换操作
            var text = $(this).text();//获取当前选中的文本
            //或者使用第二种方法
//          $(this).addClass("active").siblings().removeClass("active");
        });
        
        
        $(".lii0").click(function() {
             
             $("#shtg").removeClass("my_none");
             $("#tjly").addClass("my_none");
             
        })
        $(".lii1").click(function() {
        	
              $("#tjly").removeClass("my_none");
              $("#shtg").addClass("my_none");
              
        });
        $(".sx2").click(function(){
        	$("#tjlyys").removeClass("my_none");
        	$("#shtgys").addClass("my_none");
        });

		$(".sx1").click(function(){

			$("#shtgys").removeClass("my_none");
            $("#tjlyys").addClass("my_none");
		});
		
	   $(".sx0").click(function(){
	   	$("#shtgys").removeClass("my_none");
            $("#tjlyys").removeClass("my_none");
	   });
    })
		
</script>	
<script>
//审核		
		
        
//     var sbm=document.getElementById("sbm");
//		var myclass2=document.getElementsByClassName("myclass2");
//		var myclass=document.getElementsByClassName("myclass");
//		var myclass5=document.getElementsByClassName("myclass5");
//		var myclass9=document.getElementsByClassName("myclass9");
//	     var myclass0=document.getElementsByClassName("myclass0");
//		var myclass8=document.getElementsByClassName("myclass8");
//		var myclass10=document.getElementsByClassName("myclass10");
//		var myclass11=document.getElementsByClassName("myclass11");
//		var myclass12=document.getElementsByClassName("myclass12");
//		var myclass13=document.getElementsByClassName("myclass13");
//		
//	
//		if(sbm.value=='0'){
//				myclass2[0].setAttribute("class","hidden");
//		        myclass0[0].setAttribute("class","hidden");
//				myclass10[0].setAttribute("class","hidden");
//				myclass12[0].setAttribute("class","hidden");
//		}
//		if(sbm.value!=='0'){
//			myclass[0].setAttribute("class","hidden");
//			myclass5[0].setAttribute("class","hidden"); 
//			myclass9[0].setAttribute("class","hidden");	
//			myclass8[0].setAttribute("class","hidden");
//			myclass11[0].setAttribute("class","hidden");
//			myclass13[0].setAttribute("class","hidden");	
		</script>	
		<!--查看-->
		<script type="text/javascript">
			function dianji(id){
//				alert(id);
				var gcid=document.getElementById("gcid");
				gcid.value=id;
//				alert(gcid.value);			
				var xggcmc = document.getElementById("xggcmc");
				var xggcdz = document.getElementById("xggcdz");
				var xgsbrq = document.getElementById("xgsbrq");
				var xgcjdw = document.getElementById("xgcjdw");
				var xgcjlxr = document.getElementById("xgcjlxr");
				var xgcjlxrdh = document.getElementById("xgcjlxrdh");
				var xgcjdw1 = document.getElementById("xgcjdw1");
				var xgcj1lxr = document.getElementById("xgcj1lxr");
				var xgcj1lxrdh = document.getElementById("xgcj1lxrdh");
				var xgjzsxm = document.getElementById("xgjzsxm");
				var xgjldw = document.getElementById("xgjldw");
				var xgzjxm = document.getElementById("xgzjxm");
				var xggc = document.getElementById("xggc");
				var xggm = document.getElementById("xggm");
				var xgjg = document.getElementById("xgjg");
				var xgkgsj = document.getElementById("xgkgsj");
				var xgjgsj = document.getElementById("xgjgsj");
				var xgbeizhu =document.getElementById("xgbeizhu");
				var xgjzszzh=document.getElementById("xgjzszzh");
				var xgzyzzgzh=document.getElementById("xgzyzzgzh");
				var xgjldwlxr=document.getElementById("xgjldwlxr");
				var xgjldwlxrdh=document.getElementById("xgjldwlxrdh");
				var xgsc=document.getElementById("xgsc");
				var xgxc=document.getElementById("xgxc");
				var xgxxjd=document.getElementById("xgxxjd");
				
				
				
							
				$.ajax({
					type:"POST",
					url:"data/ssfgdduqu.php",
					data:{
						gcid:gcid.value
					},
					dataType : "json",
					timeout: 10000,
   					success : function(data){
						var length = data.length;			
   						for (var i=0;i<length-1;i++) {
							xggcmc.value = data[i].工程名称;
							xggcdz.value = data[i].项目地址;
							xgsbrq.value = data[i].申报日期;
							xgcjdw.value = data[i].承建单位;
							xgcjlxr.value = data[i].施工单位联系人;
							xgcjlxrdh.value = data[i].施工单位联系人手机;
							xgcjdw1.value = data[i].参建单位;
							xgcj1lxr.value =data[i].参建单位联系人;
							xgcj1lxrdh.value =data[i].参建单位联系人电话;
							xgjzsxm.value = data[i].建造师项目经理;
							xgjldw.value = data[i].监理单位;
							xgzjxm.value = data[i].总监;
							xggc.value = data[i].建筑面积;
							xggm.value = data[i].规模;
							xgjg.value = data[i].结构;
							xgkgsj.value = data[i].开工时间;
							xgjgsj.value = data[i].竣工时间;
							xgbeizhu.value =data[i].备注;
							xgjzszzh.value =data[i].建造师证证号;
							xgzyzzgzh.value =data[i].执业证资格证号;
							xgjldwlxr.value =data[i].监理联系人;
							xgjldwlxrdh.value =data[i].监理联系人电话;
							xgsc.value =data[i].上层;
							xgxc.value =data[i].下层;
							xgxxjd.value =data[i].工程形象进度;
							
							//绿色通道
						   var fileDown3=document.getElementById("fileDown3");
						  
						   var child=document.getElementById("location"); 
						   
                           fileDown3.removeChild(child);//删除指定的div以及子div
                           var obj = document.createElement("div");//创建div标签
							fileDown3.appendChild(obj);//定位obj 
                           obj.id="location"; 
                           var str=data[0].绿色通道; //这是一字符串 
						   var strs=str.split("||"); //字符分割 
						  
						   	for (i=0;i<strs.length-1 ;i++ ) 
                            {
                           
                           var img=document.createElement("img");
                            
                             img.setAttribute("src",strs[i]);
			            	 img.setAttribute("style","width: 150px;height: 100px;");
			             obj.appendChild(img); 
							}  
							//重点工程
						   var fileDown4=document.getElementById("fileDown4");
						   
						   var child4=document.getElementById("location4"); 
						   
                           fileDown4.removeChild(child4);//删除指定的div以及子div
                           var obj4 = document.createElement("div");//创建div标签
						   fileDown4.appendChild(obj4);//定位obj 
                           obj4.id="location4"; 
                           var str4=data[0].中标通知书; //这是一字符串 
						   var strs4=str4.split("||"); //字符分割 
						   
							for (i=0;i<strs4.length-1 ;i++ ) 
                            {
                             
                             var img4=document.createElement("img");
                             img4.setAttribute("src",strs4[i]);
			            	 img4.setAttribute("style","width: 150px;height: 100px;");
			                 obj4.appendChild(img4); 
							}      
                          
							
							
						}
//						 						alert(gcmc.value); 
					},
					error: function(e) {
						alert("ajax数据请求失败，请重新加载！");
					}
				});
			};

//申报
       
			function shenbao(id){
//				alert(id);
				var gcid1=document.getElementById("gcid1");
				gcid1.value=id;
//				alert(gcid.value);			
				var gcmc = document.getElementById("gcmc");
				var gcdz = document.getElementById("gcdz");
				var sbrq = document.getElementById("sbrq");
				var cjdw2 = document.getElementById("cjdw2");
				var cjlxr = document.getElementById("cjlxr");
				var cjlxrdh = document.getElementById("cjlxrdh");
				var cjdw3 = document.getElementById("cjdw3");
				var cj1lxr = document.getElementById("cj1lxr");
				var cj1lxrdh = document.getElementById("cj1lxrdh");
				var jzsxm = document.getElementById("jzsxm");
				var jldw = document.getElementById("jldw");
				var zjxm = document.getElementById("zjxm");
				var gc = document.getElementById("gc");
				var gm = document.getElementById("gm");
				var jg = document.getElementById("jg");
				var kgsj = document.getElementById("kgsj");
				var jgsj = document.getElementById("jgsj");
				var beizhu =document.getElementById("beizhu");
				var jzszzh=document.getElementById("jzszzh");
				var zyzzgzh=document.getElementById("zyzzgzh");
				var jldwlxr=document.getElementById("jldwlxr");
				var jldwlxrdh=document.getElementById("jldwlxrdh");
				var sc=document.getElementById("sc");
				var xc=document.getElementById("xc");
				var xxjd=document.getElementById("xxjd");
				
				
				
				
				
							
				$.ajax({
					type:"POST",
					url:"data/ssfgd1sb.php",
					data:{
						gcid1:gcid1.value
					},
					dataType : "json",
					timeout: 10000,
   					success : function(data){
						var length = data.length;			
   						for (var i=0;i<length-1;i++) {
							gcmc.value = data[i].工程名称;
							gcdz.value = data[i].项目地址;
							sbrq.value = data[i].申报日期;
							cjdw2.value = data[i].承建单位;
							cjlxr.value = data[i].施工单位联系人;
							cjlxrdh.value = data[i].施工单位联系人手机;
							cjdw3.value = data[i].参建单位;
							cj1lxr.value =data[i].参建单位联系人;
							cj1lxrdh.value =data[i].参建单位联系人电话;
							jzsxm.value = data[i].建造师项目经理;
							jldw.value = data[i].监理单位;
							zjxm.value = data[i].总监;
							gc.value = data[i].建筑面积;
							gm.value = data[i].规模;
							jg.value = data[i].结构;
							kgsj.value = data[i].开工时间;
							jgsj.value = data[i].竣工时间;
							beizhu.value =data[i].备注;
							jzszzh.value =data[i].建造师证证号;
							zyzzgzh.value =data[i].执业证资格证号;
							jldwlxr.value =data[i].监理联系人;
							jldwlxrdh.value =data[i].监理联系人电话;
							sc.value =data[i].上层;
							xc.value =data[i].下层;
							xxjd.value =data[i].工程形象进度;
							
							//绿色通道
						   var fileDown1=document.getElementById("fileDown1");
						  
						   var child1=document.getElementById("location1"); 
						   
                           fileDown1.removeChild(child1);//删除指定的div以及子div
                           var obj1 = document.createElement("div");//创建div标签
							fileDown1.appendChild(obj1);//定位obj 
                           obj1.id="location1"; 
                           var str1=data[0].绿色通道; //这是一字符串 
						   var strs1=str1.split("||"); //字符分割 
						  
						   	for (i=0;i<strs1.length-1 ;i++ ) 
                            {
                           
                           var img1=document.createElement("img");
                            
                             img1.setAttribute("src",strs1[i]);
			            	 img1.setAttribute("style","width: 150px;height: 100px;");
			             obj1.appendChild(img1); 
							}  
							//重点工程
						   var fileDown2=document.getElementById("fileDown2");
						   
						   var child2=document.getElementById("location2"); 
						   
                           fileDown2.removeChild(child2);//删除指定的div以及子div
                           var obj2 = document.createElement("div");//创建div标签
						   fileDown2.appendChild(obj2);//定位obj 
                           obj2.id="location2"; 
                           var str2=data[0].中标通知书; //这是一字符串 
						   var strs2=str2.split("||"); //字符分割 
						   
							for (i=0;i<strs2.length-1 ;i++ ) 
                            {
                             
                             var img2=document.createElement("img");
                             img2.setAttribute("src",strs2[i]);
			            	 img2.setAttribute("style","width: 150px;height: 100px;");
			                 obj2.appendChild(img2); 
							}    
							
							
							
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
//撤回		
		function ch(id){ 
//   alert(id);
		
       $.ajax({         
		            cache:true,
					type:"POST",
					url:"data/ssfgd1ch.php",
					data:{
						 id1:id
					},
					async:false,
//					dataType :'json',
					timeout:10000,
   					success :function(data){
   						alert("撤回成功！");
   						window.location.reload();
					},
					error:function (e) {
						alert("Connection error");
					}
				});
				
				
	}		
				
		</script>
<script type="text/javascript">
var shid=document.getElementById("shid");
        var tjid=document.getElementById("tjid");
        function sh(id){
//      	alert(id);
	        shid.value=id;
	        tjid.value =id;
//	      alert(tjid.value);
        };			
			
		function shtg(){
		var flag =1;
//		alert(shid.value);
		var shtg1 =document.getElementById("shtg1");
		shtg1.value ="已受理";
//		shid =document.getElementById("shid");
	
	}
	$("#save1").click(function(){
//				      alert(shid.value);
						$.ajax({
				                cache: true,
				                type: "POST",
				                url:'data/ssfgd1sh.php',
				                data:{
				                	shid:shid.value,
				                	shtg1:shtg1.value,
				                },// 你的formid
				                async: false,
				                error: function(request) {
				                    alert("Connection error");
				                },
				                success: function(data) {
				                    alert("审核成功");
				                    window.location.reload();
				                }
				            }); 
				          });
</script>
<script type="text/javascript">
	function tjly2(){
		var tjly1 =document.getElementById("tjly1");
		var flag =1;
//		alert(shid.value);
		var ytj =document.getElementById("ytj");
		ytj.value ="已退件";
//		shid =document.getElementById("shid");
	
	}
//	 function tjly2(){
//	 	var ytj =document.getElementById("ytj");
//		ytj.value ="已退件";
////	 	var flag = 2;
//	 	alert( tjid.value);
//	 }
	 $("#save4").click(function(){
	 	if(tjly1.value ==''){
	 		alert("退件理由不能为空！");
	 		return false;
	 	}else{
//				      alert(tjid.value);
						$.ajax({
				                cache: true,
				                type: "POST",
				                url:'data/ssfgd1tj.php',
				                data:{
//				                	shid:shid.value,
				                	tjid:tjid.value,
				                	tjly1:tjly1.value
//				                	ytj：ytj.value,
				                },// 你的formid
				                async: false,
				                error: function(request) {
				                    alert("Connection error");
				                },
				                success: function(data) {
				                    alert("退件成功");
				                    window.location.reload();
				                }
				            }); 
				           }
				          });     
//审核	<!--修改后保存-->
	
//			$("#save2").click(function() {
////							alert($('#bdhyform1').serialize())
//				$.ajax({
//					cache: true,
//					type: "POST",
//					url: 'data/ssfgd1bc.php',
//					data: $('#bdhyform1').serialize(), // 你的formid
//					async: false,
//						error: function(jqXHR, textStatus, errorMsg){
//							   alert( "error:" + errorMsg );
//					},
//					success: function(data) {
//						alert("保存成功");
//						window.location.reload();
//					}
//				});
//			});
			</script>
		<!--删除按钮-->
		<script type="text/javascript">
			function shanchu(id) { 
//				alert(id);
				
				$.ajax({
					cache: true,
					type: "POST",
					url: 'data/ssfgdsc.php',
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
		
		<!--提交按钮-->
		
		<script type="text/javascript">
//			
			function tijiao(id){
//				alert(id);
				$.ajax({
					cache: true,
					type: "POST",
					url: 'data/ssfgdtijiao.php',
					data: {
						id2:id
					}, // 你的formid
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert("提交成功");
						
						window.location.reload();
					}
				});
				
			};



//			/审核		
	
	var hybjm=document.getElementsByName("hybjm");
//	var myclass1=document.getElementsByClassName("myclass1");
//	var myclass4=document.getElementsByClassName("myclass4");
	
	for(i=0;i<hybjm.length;i++){
//		alert(hybjm[i].innerHTML);
		if(hybjm[i].innerHTML!=0){
//	  	myclass1[0].setAttribute("class","hidden");
	  	
	  }else 
	  {
//	  	 myclass4[0].setAttribute("class","hidden");
	  }
	}
	var myclass15=document.getElementsByClassName("myclass15");
	var myclass16=document.getElementsByClassName("myclass16");
	var myclass17=document.getElementsByClassName("myclass17");
	
	for(i=0;i<hybjm.length;i++){
		if(hybjm[i].innerHTML!=0){
	  	
	   myclass17[0].setAttribute("class","hidden");
	  }
	}
	
	function cx(){
	var qssj=document.getElementById("qssj");
	var jssj=document.getElementById("jssj");
	var bjm1=document.getElementById("bjm1");
	var yhtag1=document.getElementById("yhtag1");
	var cjdw1=document.getElementById("cjdw1");
	
	var gcmchz=document.getElementsByName("gcmchz");
	var cjdwhz=document.getElementsByName("cjdwhz");
	var xmjlxmhz=document.getElementsByName("xmjlxmhz");
	var jzszzhhz=document.getElementsByName("jzszzhhz");
	var sgdwlxrhz=document.getElementsByName("sgdwlxrhz");
	var sgdwlxrdhhz=document.getElementsByName("sgdwlxrdhhz");
	var jldwhz =document.getElementsByName("jldwhz");
	var zjlxmhz=document.getElementsByName("zjlxmhz");
	var zyzgzhhz=document.getElementsByName("zyzgzhhz");
	var jldwlxrhz=document.getElementsByName("jldwlxrhz");
	var jldwlxrdhhz=document.getElementsByName("jldwlxrdhhz");
	var cjdwhz1=document.getElementsByName("cjdwhz1");
	var cjdwlxrhz=document.getElementsByName("cjdwlxrhz");
	var cjdwlxrdhhz=document.getElementsByName("cjdwlxrdhhz");
	var jghz=document.getElementsByName("jghz");
	var gchz=document.getElementsByName("gchz");
	var gmhz=document.getElementsByName("gmhz");
	var jgsjhz=document.getElementsByName("jgsjhz");
	var gcxxjdhz=document.getElementsByName("gcxxjdhz");
	var gcdzhz=document.getElementsByName("gcdzhz");
	var sbrqhz=document.getElementsByName("sbrqhz");
	var schz=document.getElementsByName("schz");
	var xchz=document.getElementsByName("xchz");
	var beizhuhz=document.getElementsByName("beizhuhz");
//	alert(qssj.value);
//	for(i=0;i<14;i++)
//	alert(gcmchz.innerHTML);
	
	$.ajax({
					type:"POST",
					url:"data/ssfgdhz.php",
					data:{
						qssj:qssj.value,
						jssj:jssj.value,
						bjm1:bjm1.value,
						yhtag1:yhtag1.value,
						cjdw1:cjdw1.value
						
					},
					dataType : "json",
					timeout: 10000,
   					success : function(data){
						var length = data.length;			
   						for (var i=0;i<length-1;i++) {
   							
							gcmchz[i].innerHTML = data[i].工程名称
							cjdwhz[i].innerHTML = data[i].承建单位;
							xmjlxmhz[i].innerHTML = data[i].建造师项目经理;
							jzszzhhz[i].innerHTML = data[i].建造师证证号;
							sgdwlxrhz[i].innerHTML = data[i].施工单位联系人  ;
							sgdwlxrdhhz[i].innerHTML = data[i].施工单位联系人手机  ;
							jldwhz[i].innerHTML = data[i].监理单位;
							zjlxmhz[i].innerHTML = data[i].总监;
							zyzgzhhz[i].innerHTML = data[i].执业证资格证号;
							jldwlxrhz[i].innerHTML = data[i].监理联系人  ;
							jldwlxrdhhz[i].innerHTML = data[i].监理联系人电话  ;
							cjdwhz1[i].innerHTML = data[i].参建单位;
							cjdwlxrhz[i].innerHTML = data[i].参建单位联系人;
							cjdwlxrdhhz[i].innerHTML = data[i].参建单位联系人电话;
							jghz[i].innerHTML = data[i].结构;
							schz[i].innerHTML = data[i].上层;
							xchz[i].innerHTML = data[i].下层;
							gchz[i].innerHTML = data[i].建筑面积;
							gmhz[i].innerHTML = data[i].规模;
							jgsjhz[i].innerHTML = data[i].竣工时间;
							gcxxjdhz[i].innerHTML = data[i].工程形象进度;
							gcdzhz[i].innerHTML = data[i].项目地址;
							sbrqhz[i].innerHTML = data[i].申报日期;
							beizhuhz[i].innerHTML = data[i].备注;
							
						}
//						 						alert(gcmchz.value); 
					},
					error: function(e) {
						alert("ajax数据请求失败，请重新加载！");
					}
				});
			};
		</script>
		
		<script type="text/javascript">
	function cx1(){
	var qssj=document.getElementById("qssj");
	var jssj=document.getElementById("jssj");
	var tag="2";
//	alert(qssj.value);
	$.ajax({        
		            cache:true,
					type:"POST",
					url:"test.php",
					data:{
						qssj:qssj.value,
						jssj:jssj.value,
						tag:tag
					},
					async:false,
					dataType :'json',
					timeout:10000,
   					success :function(data){
					},
					error:function (e) {
					}
				});
			}
</script>
	

	</body>

	</html>