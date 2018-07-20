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
					                   if($bjm=='0'){
					                   	$cjdw='';
					                   }
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
									?>			
		<div class="row-fluid" id="ImgBackground">
			<input type="text" class="span12 form-control hidden" id="sbm" name="sbm" value="<?php echo $bjm?>" />
			
</div>
			<!------->
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span3" id="sidebar">
						<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
							<li class="active ">
	                            <a href="xmgl.php"><i class="icon-chevron-right"></i> 项目管理</a>
	                            <ul class="">
	                            	<li ><a href="sqyzj1.php">市优质奖</a></li>
	                            	<li><a href="ssfgd1.php">市示范工地</a></li>
	                            	<li><a href="syzj1.php">省优质奖</a></li>
	                            	<li><a href="syzjgj1.php">省优质结构奖</a></li>
	                            	<li style="background: bisque;"><a href="syzqc1.php">省优秀QC</a></li>
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
	                                <div class="btn-group">
											
											<!--<button type="button"  class="btn btn-default dropdown-toggle" data-toggle="modal" data-target="#myModal3">汇总<!--<span class="caret"></span>--></button>-->
											<!--<ul class=" dropdown-menu"  role="menu" aria-labelledby="dropdownMenu1">
											<li class=""><a href="#aqx7" tabindex="-1" data-toggle="tab">全年</a></li>
											<li class=""><a href="#aqx7" tabindex="-1" data-toggle="tab">上半年</a></li>
											<li class=""><a href="#aqx7" tabindex="-1" data-toggle="tab">下半年</a></li>
											</ul>-->
									</div>
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
												</tr>
											</thead>
											<tbody>
								  <?php
					                   require("conn.php");
					                   $yhtag=$_SESSION["yhtag"];
//					                   $cjdw=$_GET["cjdw"];
					                    if($yhtag=='0h0000001'){
					                     $sql = "select * from 省优秀qc where 工程状态='待受理'order by Id1 asc ";
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
													<!--<td class="center">-->
													<td class="center">
														<button id="<?php echo $row["id"] ?> " type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" onclick="dianji(this.id)">查看</button>
														<button type="submit" id="<?php echo $row["id"] ?>" class="btn btn-primary " data-toggle="modal" data-target="#myModal4" onclick="sh(this.id)">审核</button>
														
														<!--<a href="upload/qcupload/<?php echo $row['通知书或合同'];?>"><button type="button" class="btn btn-primary">下载</button></a>-->
												    </td>
												</tr>
												<?php
												}
												}else{
									   if($bjm=='1'||$bjm=='2'){
					                   	 $sql = "select * from 省优秀qc  where 会员标记码='$yhtag'and 工程状态='待受理'  order by Id1 asc  ";
					                   }else{
					                   	 $sql = "select * from 省优秀qc  where 会员标记码='$yhtag'and 工程状态='待受理'order by Id1 asc  ";
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
													<!--<td class="center">-->
													<td class="center">
														<button id="<?php echo $row["id"] ?> " type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" onclick="dianji(this.id)">查看</button>
														
														<button type="submit" id="<?php echo $row["id"]?>" class="btn btn-primary " data-toggle="modal" data-target="#" onclick="ch(this.id)">撤回</button>
														<!--a href="upload/qcupload/<?php echo $row['通知书或合同'];?>"><button type="button" class="btn btn-primary">下载</button></a>-->
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
						    <div id="menu1" class="tab-pane fade">
						      	<div class="block ">
	                            	<div class="navbar navbar-inner block-header " >
	                                	<div class="btn-group">
											
											<button type="button"  class="btn btn-default dropdown-toggle myclass5" data-toggle="modal" data-target="#myModal3">汇总</button>
											
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
					                     $sql = "select * from 省优秀qc where 工程状态='已受理'order by Id1 asc ";
					                   }elseif($bjm=='1'||$bjm=='2'){
					                   	 $sql = "select * from 省优秀qc  where 会员标记码='$yhtag'and 工程状态='已受理' or 承建单位='$cjdw' and 工程状态='已受理' order by Id1 asc  ";
					                   }else{
					                   	 $sql = "select * from 省优秀qc  where 会员标记码='$yhtag'and 工程状态='已受理' order by Id1 asc ";
					                   }
					                   $result = $conn->query($sql);
					                   $i=1;
					                   while($row = $result->fetch_assoc()) {
					                         					
					             ?>
												<tr class="odd gradeX">
													<td class=""><?php if($yhtag!='0h0000001'){echo $i++;}else{echo $row["Id1"];}?></td>
													<td class="hidden" name="hybjm"><?php echo $bjm ?></td>
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
					                     $sql = "select * from 省优秀qc where 工程状态='已退件' order by Id1 asc ";
					                  
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
					                         					
					             ?>
												<tr class="odd gradeX">
													<td class=""><?php if($yhtag!='0h0000001'){echo $i++;}else{echo $row["Id1"];}?></td>
													<td><?php echo $row["工程名称"]?></td>
													
<!--//													<td id="ytj3" name="ytj3" ><?php echo $row["工程状态"]?></td>-->
													<td><?php echo $row["退件理由"]?></td>
													<td class="center">
													<button id="<?php echo $row["id"] ?> " type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" onclick="dianji(this.id)">查看</button>	
														
														
													</td>
												</tr>
									    <?php
										}	
									   }else{
									    if($bjm=='1'||$bjm=='2'){
					                   	 $sql = "select * from 省优秀qc  where 会员标记码='$yhtag'and 工程状态='已退件' or 承建单位='$cjdw' and 工程状态='已退件' order by Id1 asc  ";
					                   }else if($bjm=='3'){
					                   	 $sql = "select * from 省优秀qc  where 会员标记码='$yhtag'and 工程状态='已退件'order by Id1 asc  ";
					                   }
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
					                         					
					             ?>
												<tr class="odd gradeX">
													<td class=""><?php if($yhtag!='0h0000001'){echo $i++;}else{echo $row["Id1"];}?></td>
													<td><?php echo $row["工程名称"]?></td>
													
<!--//													<td id="ytj3" name="ytj3" ><?php echo $row["工程状态"]?></td>-->
													<td><?php echo $row["退件理由"]?></td>
													<td class="center">
														
														<button id="<?php  echo $row["id"] ?> " type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal9" onclick="shenbao(this.id)">修改</button>
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

<!--审核-->
<!--模态框2-->

		
		
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
							<div class="span8 hidden">
						<textarea rows="5" class="span12" id="shtg1" name="shtg1" value=""></textarea>
						<input id="shid" value="" class=""/>
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

						<!--模态框2-->
					<!--查看-->
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
										<div class="modal-body">
											<div class="form-group">
												<label for="xggcmc4" class="span2 control-label">工程名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xggcmc4" name="xggcmc4" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xggcdz4" class="span2 control-label">项目地址(镇街村)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xggcdz4" name="xggcdz4" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgsbrq4" class="span2 control-label">申报日期</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgsbrq4" name="xgsbrq4" placeholder="" />
												</div>
											</div>
											<div class="form-group">
												<label for="xgcjdw4" class="span2 control-label">承建单位(申报)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgcjdw4" name="xgcjdw4" placeholder="" readonly="true" value="<?php echo $cjdw?>">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgcjlxr4" class="span2 control-label" >施工单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgcjlxr4" name="xgcjlxr4" placeholder="">
												</div>
												<label for="xgcjlxrdh4" class="span2 control-label " >联系人手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgcjlxrdh4" name="xgcjlxrdh4" placeholder="">
												</div>
												<div class="span12">
								                    </div>
											</div>
											<div class="form-group">
												<label for="xgxzmc4" class="span2 control-label">小组名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgxzmc4" name="xgxzmc4" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgktmc4" class="span2 control-label">课题名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgktmc4" name="xgktmc4" placeholder="">
												</div>
												
											</div>
											<div class="form-group">
												<label for="xgktlx4" class="span2 control-label">课题类型</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgktlx4" name="xgktlx4" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgktksrq4" class="span2 control-label">课题开始日期</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="xgktksrq4" name="xgktksrq4" placeholder="">
												</div>
										
												<label for="xgktjsrq4" class="span2 control-label">课题结束日期</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="xgktjsrq4" name="xgktjsrq4" placeholder="">
												</div>
												<div class="span12">
								                    </div>
											</div>
											
											<div class="form-group">
												<label for="xgfbr4" class="span2 control-label">发表人</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgfbr4" name="xgfbr4" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgtxdz4" class="span2 control-label">通讯地址</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgtxdz4" name="xgtxdz4" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgemail4" class="span2 control-label">E-mail</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgemail4" name="xgemail4" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgbeizhu44" class="span2 control-label">备注</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgbeizhu4" name="xgbeizhu4" placeholder=""  />
												</div>
											</div>
											
											<input class="hidden" id="gcid1" name="gcid1"/> 
                                              <div class="span12">
				               <lable class="span2 control-label">通知书或合同:</lable> 
					
					
				              <div  id="fileDown1">
				              	<div id="local"></div>
				              	</div>
				      
				              </div>
										</div>
										<div class="modal-footer">
													<button type="button" class="btn btn-default " data-dismiss="modal">取消</button>
											<!--<button type="button" class="btn btn-primary" id="save2">保存</button>-->
										</div>
									</form>
								</div>
							</div>
						</div>
						<!--申报-->
<!--模态框1-->
						<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  						 &times;
	                  					</button>
										<h4 class="modal-title" id="myModalLabel">修改</h4>
									</div>
									<form id="bdhyform1" name="bdhyform1" action="data/syzqcbc1.php" method="post" class="" role="form" enctype="multipart/form-data">
										<div class="modal-body">
											<div class="form-group">
												<label for="xggcmc" class="span2 control-label">工程名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xggcmc" name="xggcmc" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xggcdz" class="span2 control-label">项目地址(镇街村)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xggcdz" name="xggcdz" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgsbrq" class="span2 control-label">申报日期</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgsbrq" name="xgsbrq" placeholder="" readonly="true">
												</div>
											</div>
											<div class="form-group">
												<label for="xgcjdw" class="span2 control-label">承建单位(申报)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgcjdw" name="xgcjdw" placeholder=""  value="<?php echo $cjdw?>">
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
												<label for="xgxzmc" class="span2 control-label">小组名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgxzmc" name="xgxzmc" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgktmc" class="span2 control-label">课题名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgktmc" name="xgktmc" placeholder="">
												</div>
												
											</div>
											<div class="form-group">
												<label for="xgktlx" class="span2 control-label">课题类型</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgktlx" name="xgktlx" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgktksrq" class="span2 control-label">课题开始日期</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="xgktksrq" name="xgktksrq" placeholder="">
												</div>
										
												<label for="xgktjsrq" class="span2 control-label">课题结束日期</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="xgktjsrq" name="xgktjsrq" placeholder="">
												</div>
												<div class="span12">
								                    </div>
											</div>
											
											<div class="form-group">
												<label for="xgfbr" class="span2 control-label">发表人</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgfbr" name="xgfbr" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgtxdz" class="span2 control-label">通讯地址</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgtxdz" name="xgtxdz" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgemail" class="span2 control-label">E-mail</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgemail" name="xgemail" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgbeizhu" class="span2 control-label">备注</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgbeizhu" name="xgbeizhu" placeholder=""  />
												</div>
												<div class="span10">
												   <lable class="span12 control-label">通知书或合同图片预览:</lable> 
				                               <div  id="fileDown2">
				              	                <div id="local2"></div>
				              	               </div>
				                                </div>
				                                 
				                                <div class="span12">
										   <div class="form-group">
						                     <label class="control-label" for="myfile1">中标通知书或合同有效部分:</label>
							                  <div id="container">
	                                <a id="myfile1" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles1" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile1"></div>
                                               <input id="furl1" name="picture1" type="hidden"/>
							               </div>
                                          </div>
												</div>
												
											</div>
											<input class="hidden" id="gcid" name="gcid"/> 

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default " data-dismiss="modal">取消</button>
											<button type="submit" class="btn btn-primary" id="save2">保存</button>
										</div>
									</form>
								</div>
							</div>
						</div>
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
										<a href="data/download.php?name=5.xls"><button type="button" class="" >下载</button></a>
								</div>
                                	<div class="">
  										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="">
											<thead>
												<tr>
												
													<th class="hidden">会员标记码</th>
													<th>工程名称</th>
													<th >承建单位</th>
													<th >施工单位联系人</th>
													<th>施工单位联系人手机</th>
													<th >小组名称</th>
													<th >课题名称</th>
													<th >课题类型</th>
													<th>课题起止期</th>
													<th >发表人</th>
													<th >通讯地址</th>
													<th >E-mail</th>
													<th >项目地址(镇街村)</th>
													<th>申报日期</th>
													<th>备注</th>
													
												</tr>
											</thead>
											<tbody>
								 <!--<?php
					                   require("conn.php");
					                   $yhtag=$_SESSION["yhtag"];
//					                   $cjdw=$_GET["cjdw"];
					                   if($yhtag=='0h0000001'){
					                     $sql = "select * from 市优质奖 where 工程状态='已受理'";
					                   }else{
					                   	 $sql = "select * from 市优质奖  where 会员标记码='$yhtag'and 工程状态='已受理' or 工程名称='$cjdw' and 工程状态='已受理'  ";
					                   }
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {
					                         					
					                   ?>-->
												<tr class="odd gradeX">
													
													<td name="hybjm" class="hidden"></td>
													<td name="gcmchz"></td>
													<td name="cjdwhz"></td>
													<td name="sgdwlxrhz"></td>
													<td name="sgdwlxrsjhz"></td>
													<td name="xzmchz"></td>
													<td name="ktmchz"></td>
													<td name="ktlxhz"></td>
													<td name="ktksrqhz"></td>
													<td name="ktjsrqhz"></td>
													<td name="fbrhz"></td>
													<td name="txdzhz"></td>
													<td name="emailhz"></td>
													<td name="xmdzhz"></td>
													<td name="sbrqhz"></td>
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
			</div>
          </div>
          </div>
<!--模态框3--> 
					</div>
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
        <script type="text/javascript" src="data/upload_file_xgyxqc.js"></script>
        

		<script>
			$(function() {
				// Easy pie charts
				$('.chart').easyPieChart({
					animate: 1000
				});
			});
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
		


//审核		
		var shid=document.getElementById("shid");
        var tjid=document.getElementById("tjid");
        function sh(id){
//      	alert(id);
	        shid.value=id;
	        tjid.value =id;
//	      alert(tjid.value);
        };			
			
//			
		var sbm=document.getElementById("sbm");
		var myclass2=document.getElementsByClassName("myclass2");
		var myclass=document.getElementsByClassName("myclass");
		var myclass5=document.getElementsByClassName("myclass5");
		var myclass9=document.getElementsByClassName("myclass9");
		
//	    var myclass0=document.getElementsByClassName("myclass0");
//		var myclass8=document.getElementsByClassName("myclass8");
//		var myclass10=document.getElementsByClassName("myclass10");
//		var myclass11=document.getElementsByClassName("myclass11");
//		var myclass12=document.getElementsByClassName("myclass12");
//		var myclass13=document.getElementsByClassName("myclass13");
//		
	
		if(sbm.value=='0'){
				myclass2[0].setAttribute("class","hidden");
//			   myclass0[0].setAttribute("class","hidden");
//				myclass10[0].setAttribute("class","hidden");
//				myclass12[0].setAttribute("class","hidden");
				
		}else if(sbm.value!='0'){
			myclass[0].setAttribute("class","hidden");
			myclass5[0].setAttribute("class","hidden");
			myclass9[0].setAttribute("class","hidden");
//			myclass8[0].setAttribute("class","hidden");
//			myclass11[0].setAttribute("class","hidden");
//			myclass13[0].setAttribute("class","hidden");
		}
		</script>
		<!--查看-->
		<script type="text/javascript">
			function dianji(id){
//				alert(id);
				var gcid1=document.getElementById("gcid1");
				gcid1.value=id;
//						
				var xggcmc4 = document.getElementById("xggcmc4");
				var xggcdz4 = document.getElementById("xggcdz4");
				var xgsbrq4 = document.getElementById("xgsbrq4");
				var xgcjdw4 = document.getElementById("xgcjdw4");
				var xgcjlxr4 = document.getElementById("xgcjlxr4");
				var xgcjlxrdh4 = document.getElementById("xgcjlxrdh4");
				var xgxzmc4 = document.getElementById("xgxzmc4");
				var xgktmc4 = document.getElementById("xgktmc4");
				var xgktlx4 = document.getElementById("xgktlx4");
				var xgktksrq4 = document.getElementById("xgktksrq4");
				var xgktjsrq4 = document.getElementById("xgktjsrq4");
				var xgfbr4 = document.getElementById("xgfbr4");
				var xgtxdz4 = document.getElementById("xgtxdz4");
				var xgemail4 = document.getElementById("xgemail4");
				var xgbeizhu4 =document.getElementById("xgbeizhu4");			
				$.ajax({
					type:"POST",
					url:"data/syzqc1sb.php",
					data:{
						gcid1:gcid1.value
					},
					dataType : "json",
					timeout: 10000,
   					success : function(data){
						var length = data.length;			
   						for (var i=0;i<length-1;i++) {
							xggcmc4.value = data[i].工程名称;
							xggcdz4.value = data[i].项目地址;
							xgsbrq4.value = data[i].申报日期;
							xgcjdw4.value = data[i].承建单位;
							xgcjlxr4.value = data[i].施工单位联系人;
							xgcjlxrdh4.value = data[i].施工单位联系人手机;
							xgxzmc4.value = data[i].小组名称;
							xgktmc4.value = data[i].课题名称;
							xgktlx4.value = data[i].课题类型;
							xgktksrq4.value = data[i].课题开始日期;
							xgktjsrq4.value = data[i].课题结束日期;
							xgfbr4.value = data[i].发表人;
							xgtxdz4.value = data[i].通讯地址;
							xgemail4.value = data[i].email;
							xgbeizhu4.value =data[i].备注;
						
						var str=data[0].通知书或合同;//一串字符串
						var strs=str.split("||");//字符串分割
						var fileDown1=document.getElementById("fileDown1");
						var local=document.getElementById("local");
						fileDown1.removeChild(local);
						var obj=document.createElement("div");
						fileDown1.appendChild(obj);
						obj.id="local";
						for(i=0;i<strs.length-1;i++){
							
							var img=document.createElement("img");
							obj.appendChild(img);
							img.setAttribute("src",strs[i]);
							img.setAttribute("style","width: 150px;height: 100px;");
						}
						
						
						
//							var fujian1="upload/qcupload/"+data[0].通知书或合同;
//							var fileDown1=document.getElementById("fileDown1");
//							fileDown1.setAttribute("src",fujian1);
//							
//							fileDown1.setAttribute("style","width: 150px;height: 100px;");
							
							
						}
//						 						alert(gcmc.value); 
					},
					error: function(e) {
						alert("ajax数据请求失败，请重新加载！");
					}
				});
			};
//// 
			function shenbao(id){
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
				var xgxzmc = document.getElementById("xgxzmc");
				var xgktmc = document.getElementById("xgktmc");
				var xgktlx = document.getElementById("xgktlx");
				var xgktksrq = document.getElementById("xgktksrq");
				var xgktjsrq = document.getElementById("xgktjsrq");
				var xgfbr = document.getElementById("xgfbr");
				var xgtxdz = document.getElementById("xgtxdz");
				var xgemail = document.getElementById("xgemail");
				var xgbeizhu =document.getElementById("xgbeizhu");			
				$.ajax({
					type:"POST",
					url:"data/syzqcxgduqu.php",
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
							xgxzmc.value = data[i].小组名称;
							xgktmc.value = data[i].课题名称;
							xgktlx.value = data[i].课题类型;
							xgktksrq.value = data[i].课题开始日期;
							xgktjsrq.value = data[i].课题结束日期;
							xgfbr.value = data[i].发表人;
							xgtxdz.value = data[i].通讯地址;
							xgemail.value = data[i].email;
							xgbeizhu.value =data[i].备注;
						
						var str=data[0].通知书或合同;//一串字符串
						var strs=str.split("||");//字符串分割
						var fileDown2=document.getElementById("fileDown2");
						var local2=document.getElementById("local2");
						fileDown2.removeChild(local2);
						var obj=document.createElement("div");
						fileDown2.appendChild(obj);
						obj.id="local2";
						for(i=0;i<strs.length-1;i++){
							
							var img=document.createElement("img");
							obj.appendChild(img);
							img.setAttribute("src",strs[i]);
							img.setAttribute("style","width: 150px;height: 100px;");
						}
						}
//						 						alert(gcmc.value); 
					},
					error: function(e) {
						alert("ajax数据请求失败，请重新加载！");
					}
				});
			};
			
撤回
	function ch(id){ 
//   alert(id);
		
       $.ajax({         
		            cache:true,
					type:"POST",
					url:"data/syzqc1ch.php",
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
				                url:'data/syzqc1sh.php',
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
						$.ajax({
				                cache: true,
				                type: "POST",
				                url:'data/syxqc1tj.php',
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
//					url: 'data/syzqcbc.php',
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
//提交
function tijiao(id){
				
//			alert
				
				$.ajax({
					cache: true,
					type: "POST",
					url: 'data/syzqctj.php',
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
			
		</script>
		<script type="text/javascript">	


	var hybjm=document.getElementsByName("hybjm");
//	var myclass1=document.getElementsByClassName("myclass1");
//	var myclass4=document.getElementsByClassName("myclass4");
//	var myclass7=document.getElementsByClassName("myclass7");

	
	for(i=0;i<hybjm.length;i++){
//		alert(hybjm[i].innerHTML!=0);
		if(hybjm[i].innerHTML!=0){
//	  	myclass1[0].setAttribute("class","hidden");
//	  myclass4[0].setAttribute("class","hidden");
	 }else {
//	 	myclass4[0].setAttribute("class","hidden");
//	  	myclass7[0].setAttribute("class","hidden");
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
		var sgdwlxrhz=document.getElementsByName("sgdwlxrhz");
		var sgdwlxrsjhz=document.getElementsByName("sgdwlxrsjhz");
		var xzmchz=document.getElementsByName("xzmchz");
		var ktmchz=document.getElementsByName("ktmchz");
		var ktlxhz=document.getElementsByName("ktlxhz");
		var ktksrqhz=document.getElementsByName("ktksrqhz");
		var ktjsrqhz=document.getElementsByName("ktjsrqhz");
		var fbrhz=document.getElementsByName("fbrhz");
		var txdzhz=document.getElementsByName("txdzhz");
		var emailhz=document.getElementsByName("emailhz");
		var xmdzhz=document.getElementsByName("xmdzhz");
		var sbrqhz=document.getElementsByName("sbrqhz");
		var beizhuhz=document.getElementsByName("beizhuhz");
//		alert(qssj.value);
		
		
		$.ajax({
					type:"POST",
					url:"data/syzqchz.php",
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
   							
							gcmchz[i].innerHTML = data[i].工程名称;
							cjdwhz[i].innerHTML = data[i].承建单位;
							sgdwlxrhz[i].innerHTML = data[i].施工单位联系人;
							sgdwlxrsjhz[i].innerHTML = data[i].施工单位联系人手机;
							xzmchz[i].innerHTML = data[i].小组名称;
							ktmchz[i].innerHTML = data[i].课题名称;
							ktlxhz[i].innerHTML = data[i].课题类型;
							ktksrqhz[i].innerHTML = data[i].课题开始日期;
							ktjsrqhz[i].innerHTML = data[i].课题结束日期;
							fbrhz[i].innerHTML = data[i].发表人;
							txdzhz[i].innerHTML = data[i].通讯地址;
							emailhz[i].innerHTML = data[i].email;
							xmdzhz[i].innerHTML = data[i].项目地址;
							sbrqhz[i].innerHTML = data[i].申报日期;
							beizhuhz[i].innerHTML = data[i].备注;
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
	function cx1(){
	var qssj=document.getElementById("qssj");
	var jssj=document.getElementById("jssj");
	var tag="5";
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