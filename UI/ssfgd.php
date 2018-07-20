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
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			
		
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <style>
        	input::-webkit-input-placeholder{ /*WebKit browsers*/
			color: red;
			}

			input::-moz-input-placeholder{ /*Mozilla Firefox*/
			color: red;
			}

			input::-ms-input-placeholder{ /*Internet Explorer*/ 
			color: red;
			}

        </style>
		<script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>

	</head>

	<body>
		<?php
			require("conn.php");
			$yhtag=$_SESSION["yhtag"];
			$fenge=explode("h","$yhtag");
			$bjm=$fenge[0];
			if($bjm=='1'){
				$sql="select * from 本地会员 where 会员标记码= '$yhtag'";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
					$cjdw=$row["企业名称"];
                }
                
			}else if($bjm=='2'){
				$sql="select * from 外地会员 where 会员标记码= '$yhtag'";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
					$cjdw=$row["申请单位名称"];
                }
                
			}else if($bjm=='3'){
				$sql="select * from 项目申报 where 会员标记码='$yhtag'";
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
		
		<!--headbackground-->
		<div class="row-fluid" id="ImgBackground">
			<input type="text" class="span12 form-control hidden" id="sbm" name="sbm" value="<?php echo $bjm?>" />
			
		</div>
			<!------->
			
			<div class="container-fluid">
				
				<div class="row-fluid">
					<div class="span3" id="sidebar">
						<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
							<li>
								<a href="xmgl.php"><i class="icon-chevron-right"></i> 项目管理</a>
								<ul>
									<li><a href="sqyzj1.php">市优质奖</a></li>
	                            	<li><a href="ssfgd1.php">市示范工地</a></li>
	                            	<li><a href="syzj1.php">省优质奖</a></li>
	                            	<li><a href="syzjgj1.php">省优质结构奖</a></li>
	                            	<li><a href="syzqc1.php">省优秀QC</a></li>
	                            	<li><a href="slssg1.php">省绿色施工</a></li>
								</ul>
							</li>
							<li class="active ">
								<a href="gctz.php"><i class="icon-chevron-right"></i> 工程台账</a>
								<!--<ul>
									<li>市优质奖</li>
									<li>市示范工地</li>
									<li>省优质奖</li>
									<li>省优质结构奖</li>
									<li>省优秀QC</li>
									<li>省绿色施工</li>
								</ul>-->
							</li>
							<!--<li>
								<a href="hyrh.php"><i class="icon-chevron-right"></i>会员入会</a>
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
								<ul class="nav navbar-inner block-header  nav-tabs" id="myUl">
									<li><i class="icon-chevron-left hide-sidebar" style="display: inline-block;"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>

										<i class="icon-chevron-right show-sidebar" style="display: none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i>
									</li>
									<li >
										<a data-toggle="" href="gctz.php">市优质奖</a>
									</li>
									<li class="active">
										<a data-toggle="tab" href="#menu3">市示范工地</a>
									</li>
									<li>
										<a data-toggle="" href="syzj.php">省优质奖</a>
									</li>
									<li>
										<a data-toggle="" href="syzjgj.php">省优质结构奖</a>
									</li>
									<li>
										<a data-toggle="" href="syzqc.php">省优质QC</a>
									</li>
									<li>
										<a data-toggle="" href="slssg.php">省绿色施工</a>
									</li>
								</ul>
								<div class="tab-content ">
									

									

									

									
									<div id="menu3" class="tab-pane fade in active">
										<div class="block ">
											<div class="navbar navbar-inner block-header ">
												<div class="btn-group">
													<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1"> 新增</button>
													<!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#"> 删除</button>
													<button type="button" class="btn btn-default" data-toggle="modal" data-target="#"> 提交</button>
													<button type="button" class="btn btn-default" data-toggle="modal" data-target="#"> 打印汇总</button>-->
												</div>
											</div>
										</div>
										<div class="block-content collapse in">
											<div class="span12">
												<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example4">
													<thead>
														<tr>
															<th>序号</th>
															<th class="hidden">会员标记码</th>
															<th class="hidden">工程状态</th>
															<th>工程名称</th>
															<th>承建单位</th>
															<th>施工单位联系人姓名</th>
															<th>联系电话</th>
															<!--<th>手机号码</th>-->
															<th>操作</th>
														</tr>
													</thead>
													<tbody>
														<?php
						                   require("conn.php");
						                  $yhtag=$_SESSION["yhtag"];
						                  if($bjm=='1'){
						                  	$sql="select * from 市示范工地 where 会员标记码='$yhtag'";
						                  }else if ($bjm=='2'){
						                   	$sql="select * from 市示范工地 where 会员标记码='$yhtag'";
						                   }else if ($bjm=='3'){
						                   	$sql="select * from 市示范工地 where 会员标记码='$yhtag'";
						                   }
//						                   $sql = "select * from 市示范工地  "; 
						                   $result = $conn->query($sql);
										   $i=1;
						                   while($row = $result->fetch_assoc()) {
						                         					
						                ?>
															<tr class="odd gradeX">
																<td>
																	<?php echo $i++;?>
																</td>
																<td class="hidden" name="hybjm"><?php echo $bjm ?></td>
																<td class="hidden" name="gcztdsl"><?php echo $row["工程状态"]?></td>
																<td>
																	
																		<?php echo $row["工程名称"]?>
																	
																</td>
																<td class="center">
																	<?php echo $row["承建单位"]?>
																</td>
																<td class="center">
																	<?php echo $row["施工单位联系人"]?>
																</td>
																<td class="center">
																	<?php echo $row["施工单位联系人手机"]?>
																</td>
																<td class="center">
																	<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="dianji(this.id);">申报</button>
																	<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass1" onclick="shanchu(this.id);">删除</button>
																	<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass4"  onclick="tijiao(this.id)">提交</button>
																	
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
									<form id="bdhyform" name="bdhyform" action="data/ssfgdxz.php" method="post" enctype="multipart/form-data"  role="form">
										<input id="gcfl" value="市示范工地" name="gcfl" class="hidden" />
										<input id="gczt" value="" name="" class="hidden" />
										<input class="hidden" id="hybjm" name="hybjm" value="<?php echo $yhtag;?>">
										<div class="modal-body">
											<div class="form-group">
												<label for="gcmc" class="span2 control-label">工程名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="gcmc" name="gcmc" placeholder="必填信息">
												</div>
											</div>
											<div class="form-group">
												<label for="gcdz" class="span2 control-label">工程地址(镇街村)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="gcdz" name="gcdz" placeholder="必填信息">
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
												<label for="cjdw" class="span2 control-label">承建单位(申报)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="cjdw" name="cjdw" placeholder="必填信息"  value="">
												</div>
												<div class="span12">
								                 </div>
											</div>
											<div class="form-group">
												<label for="jzsxm" class="span2 control-label">项目经理姓名</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="jzsxm" name="jzsxm" placeholder="必填信息">
												</div>
												<div class="span12">
								                 </div>
											</div>
											<div class="form-group">
												<label for="jzszzh" class="span2 control-label">建造师证证号</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="jzszzh" name="jzszzh" placeholder="必填信息">
												</div>
												<div class="span12">
								                 </div>
											</div>
											<div class="form-group">
												<label for="cjlxr" class="span2 control-label" style="font-size: 13px;">施工单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="cjlxr" name="cjlxr" placeholder="必填信息">
												</div>
												<label for="cjlxrdh" class="span2 control-label " style="font-size: ;">联系人电话</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="cjlxrdh" name="cjlxrdh" placeholder="必填信息">
												</div>
												<div class="span12">
								                 </div>
											</div>
											<div class="form-group">
												<label for="jldw" class="span2 control-label">监理单位</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="jldw" name="jldw" placeholder="必填信息">
												</div>
												
											</div>
											<div class="form-group">
												<label for="zjxm" class="span2 control-label">总监姓名</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="zjxm" name="zjxm" placeholder="必填信息">
												</div>
											</div>
											<div class="form-group">
												<label for="zyzzgzh" class="span2 control-label">执业证资格证号</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="zyzzgzh" name="zyzzgzh" placeholder="必填信息">
												</div>
												 <div class="span12">
								                 </div>
											</div>
											<div class="form-group">
												<label for="jldwlxr" class="span2 control-label" style="font-size: 13px;">监理单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="jldwlxr" name="jldwlxr" placeholder="必填信息">
												</div>
												<label for="jldwlxrdh" class="span2 control-label " style="font-size: ;">联系人电话</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="jldwlxrdh" name="jldwlxrdh" placeholder="必填信息">
												</div>
												<div class="span12">
								                 </div>
											</div>
											<div class="form-group">
												<label for="cjdw1" class="span2 control-label">参建单位</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="cjdw1" name="cjdw1" placeholder="必填信息">
												</div>
											</div>
											<div class="form-group">
												<label for="cjlxr1" class="span2 control-label" style="font-size: 13px;">参建单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="cjlxr1" name="cjlxr1" placeholder="必填信息">
												</div>
												<label for="cjlxrdh1" class="span2 control-label " style="font-size: ;">联系人电话</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="cjlxrdh1" name="cjlxrdh1" placeholder="必填信息">
												</div>
												<div class="span12">
								                 </div>
											</div>
											
											<div class="form-group">
												<label for="gc" class="span2 control-label">建筑面积(平方)</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="gc" name="gc" placeholder="必填信息">
												</div>
												<label for="gm" class="span2 control-label">规模(万元)</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="gm" name="gm" placeholder="必填信息">
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
													<!--<label for="cs" class="span2 control-label">层数</label>
													<div class="span4">
														<input type="text" class="span12 form-control" id="cs" name="cs" placeholder="">
													</div>-->
											     <div class="span12">
								                 </div>
												</div>
											
											<div class="form-group hidden">
												<label for="kgsj" class="span4 control-label">开工时间</label>
												<div class="span6">
													<input type="date" class="span12 form-control" id="kgsj" name="kgsj" placeholder="必填信息">
												</div>
											</div>
											<div class="form-group ">
												<label for="sc" class="span2 control-label">地上</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="sc" name="sc" placeholder="必填信息">
												</div>
												<label for="xc" class="span2 control-label">地下</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xc" name="xc" placeholder="必填信息">
												</div>
											</div>
											<div class="form-group ">
												<label for="jgsj" class="span2 control-label">计划竣工时间</label>
												<div class="span10">
													<input type="date" class="span12 form-control" id="jgsj" name="jgsj" placeholder="必填信息">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xxjd" class="span2 control-label">申报时的工程形象进度</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xxjd" name="xxjd" placeholder="必填信息">
												</div>
												<div class="span12">
								                </div>
											  </div>
											
											   <div class="form-group">
												<label for="beizhu" class="span2 control-label">备注</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="beizhu" name="beizhu" placeholder="必填信息"  />
												</div>
											</div>
											<div class="span12">
											 <div class="form-group">
												<label class="control-label" for="myfile">施工许可或监督文件，重点工程或绿色通道批文:</label>
							<div id="container">
	                                <a id="myfile" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile"></div>
												<label class="control-label" for="myfile1">用工实名制证明文件:</label>
							<div id="container">
	                                <a id="myfile1" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles1" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile1"></div>
							    <input id="furl" name="picture" type= "hidden" />
								<input id="furl1" name="picture1" type="hidden"/>
                                         </div>
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
										<h4 class="modal-title" id="myModalLabel">申报</h4>
									</div>
									<form id="bdhyform1" name="bdhyform1" action="data/ssfgdxgbc.php" method="post" class="" role="form" enctype="multipart/form-data">
										<!--<input id="gcfl" value="省优质结构奖" name="syzjgj" class="hidden" />-->
										<!--<input id="gczt" value="" name="" class="hidden" />-->
										<!--<input class="hidden " id="hybjm" name="hybjm" value="<?php echo $yhtag;?>">-->
										<div class="modal-body">
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
												<div class="span10">
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
												<div class="span10">
								                   </div>
											</div>
											<div class="form-group">
												<label for="xgjzsxm" class="span2 control-label">项目经理姓名</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgjzsxm" name="xgjzsxm" placeholder="">
												</div>
											
												<label for="xgjzszzh" class="span2 control-label">建造师证证号</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgjzszzh" name="xgjzszzh" placeholder="">
												</div>
												<div class="span12">
								                   </div>
											</div>
											<div class="form-group">
												<label for="xgcjlxr" class="span2 control-label" style="font-size: ;">施工单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgcjlxr" name="xgcjlxr" placeholder="">
												</div>
												<label for="xgcjlxrdh" class="span2 control-label " style="font-size: ;">联系人手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgcjlxrdh" name="xgcjlxrdh" placeholder="">
												</div>
												<div class="span10">
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
												<label for="xgjldwlxr" class="span2 control-label" style="font-size: 13px;">监理单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgjldwlxr" name="xgjldwlxr" placeholder="">
												</div>
												<label for="xgjldwlxrdh" class="span2 control-label " style="font-size: ;">联系人电话</label>
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
												<label for="xgcj1lxr" class="span2 control-label" style="font-size: 13px;">参建单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgcj1lxr" name="xgcj1lxr" placeholder="">
												</div>
												<label for="xgcj1lxrdh" class="span2 control-label " style="font-size: ;">联系人手机</label>
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
													<div class="span10 controls">
														<select id="xgjg" name="xgjg" class="form-control span12">
											<?php $select=explode("||",$jglx);
											for($i=0;$i<count($select);$i++){?>
											<option><?php echo $select[$i] ?></option>
											<?php } ?>
														</select>
													</div>
													<!--<label for="cs" class="span2 control-label">层数</label>
													<div class="span4">
														<input type="text" class="span12 form-control" id="cs" name="cs" placeholder="">
													</div>-->
													<div class="span12">
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
												<div class="span10">
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
											<input class="hidden" id="gcid" name="gcid"/>
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

						<!--模态框2-->
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
        <script type="text/javascript" src="data/upload_file_lstd.js"></script>
        <script type="text/javascript" src="data/upload_file_zdgc.js"></script>
        <script type="text/javascript" src="data/upload_file_xglstd.js"></script>
        <script type="text/javascript" src="data/upload_file_xgzdgc.js"></script>
		<script>
			$(function() {
				// Easy pie charts
				$('.chart').easyPieChart({
					animate: 1000
				});
			});
		</script>
		<!--修改-->
		<script type="text/javascript">
			function dianji(id){
//				alert(id);
				var gcid=document.getElementById("gcid");
				gcid.value=id;
//				alert(gcid.value);

				//		
				//
								
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
// 						alert(data);
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
							
							//施工许可证
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
							//重点工程批文
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
		<!--<script type="text/javascript">
			var navTabs = document.getElementsByClassName("nav-tabs");
			var gcfl = document.getElementById("gcfl");
			//      	alert(navTabs[0].innerHTML)
			var myLi = navTabs[0].getElementsByTagName("li");
			for(var i = 1; i < myLi.length; i++) {
				myLi[i].onclick = function() {
					var myValue = this.getElementsByTagName("a")[0].innerHTML;
					gcfl.value = myValue;
					//					
				}
			}
		</script>-->
			
		<script type="text/javascript">
			//保存
//			$("#save1").click(function() {
//				//				alert($('#bdhyform1').serialize())
//				$.ajax({
//					cache: true,
//					type: "POST",
//					url: 'data/ssfgdxz.php',
//					data:$('#bdhyform').serialize() ,
//					async: false,
//					error: function(request) {
//						alert("Connection error");
//					},
//					success: function(data) {
//						alert("保存成功");
//						window.location.reload();
//					}
//				});
//			});
		</script>
		<!--修改后保存-->
		<script type="text/javascript">
//			$("#save2").click(function() {
////							alert($('#bdhyform1').serialize())
//				$.ajax({
//					cache: true,
//					type: "POST",
//					url: 'data/ssfgdxgbc.php',
//					data: $('#bdhyform1').serialize(), // 你的formid
//					async: false,
//					error: function(request) {
//						alert("Connection error");
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
			
			var gcztdsl=document.getElementsByName("gcztdsl");
			var myclass =document.getElementsByClassName("myclass");
			var myclass1 =document.getElementsByClassName("myclass1");
			var myclass4 =document.getElementsByClassName("myclass4");
			for(var i=0;i<gcztdsl.length;i++){
//				alert(gcztdsl[i].innerHTML);
	  			if(gcztdsl[i].innerHTML=="待受理"||gcztdsl[i].innerHTML=="已受理"||gcztdsl[i].innerHTML=="已退件"){
	  			myclass[i].setAttribute("disabled","disabled");
	  		    myclass[i].setAttribute("style","background: #CFCFCF;");
	  			myclass1[i].setAttribute("disabled","disabled");
	  			myclass1[i].setAttribute("style","background: #CFCFCF;");
	  			
	  	       	myclass4[i].setAttribute("disabled","disabled");
	  			myclass4[i].setAttribute("style","background: #CFCFCF;");
	  			}
	  		}
		</script>

	</body>

	</html>