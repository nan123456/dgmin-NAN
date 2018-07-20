<!DOCTYPE html>
<?php session_start();
if ($_SESSION['yhtag']) {
	$yhtag = $_SESSION['yhtag'];
} else {
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
		if ($bjm == '1') {
			$sql = "select * from 本地会员 where 会员标记码='$yhtag'";
			$result = $conn -> query($sql);
			while ($row = $result -> fetch_assoc()) {
				$cjdw = $row["企业名称"];
			}

		} else if ($bjm == '2') {
			$sql = "select * from 外地会员 where 会员标记码='$yhtag'";
			$result = $conn -> query($sql);
			while ($row = $result -> fetch_assoc()) {
				$cjdw = $row["申请单位名称"];
			}

		} else if ($bjm == '3') {
			$sql = "select * from 项目申报 where 会员标记码='$yhtag'";
			$result = $conn -> query($sql);
			while ($row = $result -> fetch_assoc()) {
				$cjdw = $row["施工单位"];
			}

		}

		//			消息显示
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

		//提取可添加字段内容
		$sql = "select * from 修改字段内容表 where id='1'";
		$result = $conn -> query($sql);
		while ($row = $result -> fetch_assoc()) {
			$jglx = $row["结构类型"];
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
							 
                       <li>	
	                            <a href="hyfw.php"><i class="icon-chevron-right"></i> 会员服务</a>
	                            <ul class="">
	                            <li><a href="cygm1.php">活动报名</a></li>
	                            <li><a href="ckpj.php">查看评价</a></li>
	                            </ul>
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
									<li class="active">
										<a data-toggle="tab" href="#home">市优质奖</a>
									</li>
									<li>
										<a data-toggle="" href="ssfgd.php">市示范工地</a>
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
									<div id="home" class="tab-pane fade in active">
										<div class="block ">
											<div class="navbar navbar-inner block-header ">
												<div class="btn-group">
													<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1"> 新增</button>
													<!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#"> 删除</button>
													<button type="button" class="btn btn-default" data-toggle="modal" data-target="#"> 提交</button>
													<button type="button" class="btn btn-default" data-toggle="modal" data-target="#"> 打印汇总</button>-->

												</div>
											</div>
											<div class="block-content collapse in">
												<div class="span12">
													<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example1">
														<thead>
															<tr>
																<th>序号</th>
																<th class="hidden">会员标记码</th>
																<th class="hidden">工程状态</th>
																<th>工程名称</th>
																<th>承建单位</th>
																<th>施工单位联系人姓名</th>
																<th>联系电话</th>
																<th>操作</th>
															</tr>
														</thead>
														<tbody>
															<?php
											                   require("conn.php");
											                   $yhtag=$_SESSION["yhtag"];
					//						                   $id=$_GET["id"];
											                   if($bjm=='1'){
											                   	$sql="select * from 市优质奖 where 会员标记码='$yhtag'";
											                   }else if ($bjm=='2'){
											                   	$sql="select * from 市优质奖 where 会员标记码='$yhtag'";
											                   }else if( $bjm=='3'){
											                   	$sql="select * from 市优质奖 where 会员标记码='$yhtag' ";
											                   }
					//						                   $sql = "select * from  市优质奖   ";
											                   $result = $conn->query($sql);
															   $i=1;
											                   while($row = $result->fetch_assoc()) {
											                         					
											                ?>
															<tr class="odd gradeX" >
																<td>
																	<?php echo $i++; ?>
																</td>
																<td class="hidden" name="hybjm"><?php echo $yhtag ?></td>
																<td class="hidden" name="gcztdsl"><?php echo $row["工程状态"]?></td>
																<td>
																	<?php echo $row["工程名称"]?>
																</td>
																<td class="center">
																	<?php echo $row["承建单位"]?>
																</td>
																<td class="center">
																	<?php echo $row["承建联系人"]?>
																</td>
																<td class="center">
																	<?php echo $row["承建联系人电话"]?>
																</td>
																<td class="center" id="btn">
																	<button id="<?php echo $row["id"]; ?>" type="button" class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="dianji(this.id);" >
																		申报
																	</button>
																	<button id="<?php echo $row["id"]; ?>" type="button" class="btn btn-primary myclass1" onclick="shanchu(this.id);" >删除</button>
																	<button id="<?php echo $row["id"]; ?>" type="button" class="btn btn-primary myclass4" onclick="tijiao(this.id);">提交</button>
																	
																</td>
															</tr>

													<?php }
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
									<form id="bdhyform" name="bdhyform" action="data/gctzbg.php" method="post" enctype="multipart/form-data"  role="form">
										<input id="gcfl" value="市优质奖" name="syzj" class="hidden" />
										<input id="gczt" value="" name="" class="hidden" />
										<input class="hidden" id="hybjm" name="hybjm" value="<?php echo $yhtag; ?>">
										<div class="modal-body">
											<div class="form-group">
												<label for="gcmc" class="span2 control-label">工程名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="gcmc" name="gcmc" placeholder="必填信息">
												</div>
											</div>
											<div class="form-group">
												<label for="gcdz" class="span2 control-label">项目地址(镇街村)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="gcdz" name="gcdz" placeholder="必填信息">
												</div>
												<div class="span10">
								                   </div>
											</div>
											<div class="form-group">
												<label for="sbrq" class="span2 control-label">申报日期</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="sbrq" name="sbrq" placeholder="" readonly="true">
												</div>
											</div>
											<div class="form-group">
												<label for="zczh" class="span2 control-label">注册证号</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="zczh" name="zczh" placeholder="必填信息"/>
												</div>
											</div>
											<div class="form-group">
												<label for="cjdw" class="span2 control-label">承建单位(申报)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="cjdw" name="cjdw" placeholder="必填信息"  value="">
												</div>
												<div class="span10">
								                   </div>
											</div>
											<div class="form-group">
												<label for="cjlxr" class="span2 control-label" style="font-size: ">联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="cjlxr" name="cjlxr" placeholder="必填信息">
												</div>
												<label for="cjlxrdh" class="span2 control-label " style="font-size: ">联系人电话</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="cjlxrdh" name="cjlxrdh" placeholder="必填信息">
												</div>
												
											</div>
											<div class="form-group">
												<label for="jzsxm" class="span2 control-label">建造师(项目经理)姓名</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="jzsxm" name="jzsxm" placeholder="必填信息">
												</div>
												<div class="span10">
								                   </div>
											</div>
											<div class="form-group">
												<label for="cjdw1" class="span2 control-label">参建单位</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="cjdw1" name="cjdw1" placeholder="必填信息">
												</div>
											</div>
											<div class="form-group">
												<label for="cjlxr1" class="span2 control-label">联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="cjlxr1" name="cjlxr1" placeholder="必填信息">
												</div>
												<label for="cjlxrdh1" class="span2 control-label " >联系人电话</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="cjlxrdh1" name="cjlxrdh1" placeholder="必填信息">
												</div>
											</div>
											<div class="form-group">
												<label for="jldw" class="span2 control-label">监理单位</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="jldw" name="jldw" placeholder="必填信息">
												</div>
												
											</div>
											<div class="form-group">
												<label for="zjxm" class="span2 control-label">项目总监姓名</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="zjxm" name="zjxm" placeholder="必填信息">
												</div>
												<div class="span10">
								                   </div>
											</div>
											<div class="form-group">
												<label for="kcdw" class="span2 control-label">勘察单位</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="kcdw" name="kcdw" placeholder="必填信息">
												</div>
												
											</div>
											<div class="form-group">
												<label for="sjdw" class="span2 control-label">设计单位</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="sjdw" name="sjdw" placeholder="必填信息">
												</div>
												
											</div>
											<div class="form-group">
												<label for="jllxr" class="span2 control-label">监理单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="jllxr" name="jllxr" placeholder="必填信息">
												</div>
												<label for="jllxrdh" class="span2 control-label" >联系人手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="jllxrdh" name="jllxrdh" placeholder="必填信息">
												</div>
											</div>
											<div class="span12">
								                   </div>
											<div class="form-group">
												<label for="mj" class="span2 control-label">面积(平方)</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="mj" name="mj" placeholder="必填信息">
												</div>
												<label for="gm" class="span2 control-label">规模(万元)</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="gm" name="gm" placeholder="必填信息">
												</div>
												
											</div>
											
												<div class="form-group">
													<label for="jg" class="span2 control-label">结构</label>
													<div class="span4 controls">
														<select id="jg" name="jg" class="form-control span12">
											<?php $select=explode("||",$jglx);
											for($i=0;$i<count($select);$i++){?>
											<option><?php echo $select[$i] ?></option>
											<?php } ?>
														</select>
													</div>
													<label for="jclx" class="span2 control-label">基础类型</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="jclx" name="jclx" placeholder="必填信息">
												</div>
													</div>
													<div class="form-group">
													<label for="sc" class="span2 control-label">地上</label>
													<div class="span4">
														<input type="text" class="span12 form-control" id="sc" name="sc" placeholder="必填信息">
													</div>
													<label for="xc" class="span2 control-label">地下</label>
													<div class="span4">
														<input type="text" class="span12 form-control" id="xc" name="xc" placeholder="必填信息">
													</div>
												</div>
											<div class="form-group">
												
												<div class="span12">
													<label for="kgrq" class="span3 control-label">开工日期</label>
													<input type="date" class="span4 form-control" id="gkrq" name="kgrq" placeholder="必填信息">
													
													</div>
												</div>
											<div class="form-group">
												<label for="jgg" class="span2 control-label">竣工验收</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="jgg" name="jgg" placeholder="必填信息">
												</div>
												<label for="ys" class="span2 control-label">备案时间</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="ys" name="ys" placeholder="必填信息">
												</div>
											    </div>
											    <div class="span12">
											    	 </div>
												<div class="form-group">
												<label for="beizhu" class="span2 control-label">备注</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="beizhu" name="beizhu" placeholder="必填信息"  />
												</div>
											</div>
											
                                                  <div class="form-group">
                                                  	<div class="span12">

												<label class="control-label" for="myfile">验收报告:</label>
							                    <div id="container">
	                                <a id="myfile" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile"></div>
								                   </div>
								                    </div>
								                    <div class="form-group">
                                               <div class="span12">
												<label class="control-label" for="myfile1">监督报告:</label>
							                    <div id="container">
	                                <a id="myfile1" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles1" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile1"></div>
                                               </div>
                                               </div>
                                               <div class="form-group">
                                               <div class="span12">
												<label class="control-label" for="myfile2">备案证:</label>
							                   <div id="container">
	                                <a id="myfile2" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles2" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile2"></div>
                                               </div>
								<input id="furl" name="picture" type= "hidden" />
								<input id="furl1" name="picture1" type="hidden"/>
								<input id="furl2" name="picture2" type="hidden" />
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
									<form id="bdhyform1" name="bdhyform1" action="data/gctzxg.php" method="post" role="form" enctype="multipart/form-data">
										
										<!--<input id="gcfl" value="市优质奖" name="syzj" class="hidden" />-->
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
												<label for="xggcdz" class="span2 control-label">项目地址(镇街村)</label>
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
												<label for="xgcjlxr" class="span2 control-label" style="font-size: 13px;">联系人</label>
												<div class="span3">
													<input type="text" class="span12 form-control" id="xgcjlxr" name="xgcjlxr" placeholder="">
												</div>
												<label for="xgcjlxrdh" class="span2 control-label " style="font-size: 12px;">联系人电话/手机</label>
												<div class="span5">
													<input type="text" class="span12 form-control" id="xgcjlxrdh" name="xgcjlxrdh" placeholder="">
												</div>
												<div class="span12">
								                 </div>
											</div>
											<div class="form-group">
												<label for="xgjzsxm" class="span2 control-label">建造师(项目经理)姓名</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgjzsxm" name="xgjzsxm" placeholder="">
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
												<label for="xgcjlxr1" class="span2 control-label" >联系人</label>
												<div class="span3">
													<input type="text" class="span12 form-control" id="xgcjlxr1" name="xgcjlxr1" placeholder="">
												</div>
												<label for="xgcjlxrdh1" class="span2 control-label " >联系人电话/手机</label>
												<div class="span5">
													<input type="text" class="span12 form-control" id="xgcjlxrdh1" name="xgcjlxrdh1" placeholder="">
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
												<label for="xgzjxm" class="span2 control-label">项目总监姓名</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgzjxm" name="xgzjxm" placeholder="">
												</div>
												<div class="span10">
								                 </div>
											</div>
											<div class="form-group">
												<label for="xgjllxr" class="span2 control-label">监理单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgjllxr" name="xgjllxr" placeholder="">
												</div>
												<label for="xgjllxrdh" class="span2 control-label" >联系人手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgjllxrdh" name="xgjllxrdh" placeholder="">
												</div>
											</div>
											<div class="span12">
								                 </div>
											<div class="form-group">
												<label for="xgmj" class="span2 control-label">面积(平方)</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgmj" name="xgmj" placeholder="">
												</div>
												<label for="xggm" class="span2 control-label">规模(万元)</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xggm" name="xggm" placeholder="">
												</div>
												
											</div>
												<div class="form-group">
													<label for="xgjg" class="span2 control-label">结构</label>
													<div class="span10 controls">
														<select id="xgjg" name="xgjg" class="form-control span12">
											<?php $select=explode("||",$jglx);
											for($i=0;$i<count($select);$i++){?>
											<option><?php echo $select[$i] ?></option>
											<?php } ?>
														</select>
													</div>
													</div>
													<div class="form-group">
													<label for="xgsc" class="span2 control-label">地上</label>
													<div class="span4">
														<input type="text" class="span12 form-control" id="xgsc" name="xgsc" placeholder="">
													</div>
													<label for="xgxc" class="span2 control-label">地下</label>
													<div class="span4">
														<input type="text" class="span12 form-control" id="xgxc" name="xgxc" placeholder="">
													</div>
												</div>
											
											<div class="form-group">
												<label for="xgjgg" class="span2 control-label">竣工验收</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="xgjgg" name="xgjgg" placeholder="">
												</div>
												<label for="xgys" class="span2 control-label">备案时间</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="xgys" name="xgys" placeholder="">
												</div>
												
												
											    </div>
											<div class="form-group">
												<label for="xgbeizhu" class="span2 control-label">备注</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgbeizhu" name="xgbeizhu" placeholder=""  />
												</div>
											</div>
												<input type="type" class="span12 form-control hidden" id="gcid" name="gcid"value="gcid">
												
											<div class="form-group">
			                        
				                   <lable class="span12 control-label">验收报告图片预览:</lable> 
				                  
					             <div id="fileDown1" class="span12" >
					            <div id="location1" ></div>
						          </div>
				                    </div>
				                   <div class="form-group">
					              <lable class="span12 control-label">监督报告图片预览:</lable> 
					 
				                  <div id="fileDown2" class="span12" >
					            <div id="location2" ></div>
						          </div>
				                    </div>
				     	            <div class="form-group">
				               <lable class="span12 control-label">备案证图片预览:</lable> 
					
					
				              <div id="fileDown6" class="span12" >
					            <div id="location6" ></div>
						          </div>
				                    </div>
				                    
				                    <div class="span12">
				                       <div class="form-group">
										<label class="control-label" for="myfile3">验收报告:</label>
							            <div id="container">
	                                <a id="myfile3" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles3" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile3"></div>
										<label class="control-label" for="myfile4">监督报告:</label>
							            <div id="container">
	                                <a id="myfile4" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles4" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile4"></div>
										<label class="control-label" for="myfile5">备案证:</label>
							           <div id="container">
	                                <a id="myfile5" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles5" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile5"></div>
											  </div>
											  <input id="furl3" name="picture3" type= "hidden" />
								              <input id="furl4" name="picture4" type="hidden"/>
								              <input id="furl5" name="picture5" type="hidden" /> 
											  </div>
										</div>
										<div class="modal-footer">
											<!--<button id="sc1" type="button" class="btn btn-primary" onclick="shc()">删除图片</button>-->
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
											<button type="submit" class="btn btn-primary">保存</button>
										</div>
									</form>
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
        <script type="text/javascript" src="data/upload_file_ysbg.js"></script>
        <script type="text/javascript" src="data/upload_file_jdbg.js"></script>
        <script type="text/javascript" src="data/upload_file_baz.js"></script>
        <script type="text/javascript" src="data/upload_file_xgysbg.js"></script>
        <script type="text/javascript" src="data/upload_file_xgjdbg.js"></script>
        <script type="text/javascript" src="data/upload_file_xgbaz.js"></script>
		<script>$(function() {
	// Easy pie charts
	$('.chart').easyPieChart({
		animate: 1000
	});
});</script>
		<!--修改-->
		<script type="text/javascript">var x;

function dianji(id) {
	//				alert(id);
	var gcid = document.getElementById("gcid");
	gcid.value = id;
	//				alert(gcid.value);

	//		
	//

	var xggcmc = document.getElementById("xggcmc");
	var xggcdz = document.getElementById("xggcdz");
	var xgsbrq = document.getElementById("xgsbrq");
	var xgcjdw = document.getElementById("xgcjdw");
	var xgcjlxr = document.getElementById("xgcjlxr");
	var xgcjlxrdh = document.getElementById("xgcjlxrdh");
	var xgjzsxm = document.getElementById("xgjzsxm");
	var xgcjdw1 = document.getElementById("xgcjdw1");
	var xgcjlxr1 = document.getElementById("xgcjlxr1");
	var xgcjlxrdh1 = document.getElementById("xgcjlxrdh1");
	var xgjldw = document.getElementById("xgjldw");
	var xgjllxr = document.getElementById("xgjllxr");
	var xgjllxrdh = document.getElementById("xgjllxrdh");
	var xgzjxm = document.getElementById("xgzjxm");
	var xgmj = document.getElementById("xgmj");
	var xggm = document.getElementById("xggm");
	var xgjg = document.getElementById("xgjg");
	var xgsc = document.getElementById("xgsc");
	var xgxc = document.getElementById("xgxc");
	var xgjgg = document.getElementById("xgjgg");
	var xgys = document.getElementById("xgys");
	var xgbeizhu = document.getElementById("xgbeizhu");

	$.ajax({
		type: "POST",
		url: "data/gctzxgdq.php",
		data: {
			gcid: gcid.value
		},
		dataType: "json",
		timeout: 10000,
		success: function(data) {
			var length = data.length;
			for(var i = 0; i < length - 1; i++) {
				xggcmc.value = data[i].工程名称;
				xggcdz.value = data[i].项目地址;
				xgsbrq.value = data[i].申报日期;
				xgcjdw.value = data[i].承建单位;
				xgcjlxr.value = data[i].承建联系人;
				xgcjlxrdh.value = data[i].承建联系人电话;
				xgjzsxm.value = data[i].建造师姓名;
				xgcjdw1.value = data[i].参建单位;
				xgcjlxr1.value = data[i].参建联系人姓名;
				xgcjlxrdh1.value = data[i].参建联系人电话;
				xgjldw.value = data[i].监理单位;
				xgzjxm.value = data[i].项目总监姓名;
				xgjllxr.value = data[i].监理联系人姓名;
				xgjllxrdh.value = data[i].监理联系人电话;
				xgmj.value = data[i].面积;
				xggm.value = data[i].规模;
				xgjg.value = data[i].结构;
				xgsc.value = data[i].上层;
				xgxc.value = data[i].下层;
				xgjgg.value = data[i].竣工验收;
				xgys.value = data[i].备案时间;
				xgbeizhu.value = data[i].备注;
				var fileDown1 = document.getElementById("fileDown1");

				var child1 = document.getElementById("location1");

				fileDown1.removeChild(child1); //删除指定的div以及子div
				var obj1 = document.createElement("div"); //创建div标签
				fileDown1.appendChild(obj1); //定位obj 
				obj1.id = "location1";
				var str1 = data[0].验收报告; //这是一字符串 
				//                         console.log(str1);
				var strs1 = str1.split("||"); //字符分割 
				//						  	console.log(strs1.length);
				for(i = 0; i < strs1.length - 1; i++) {

					//                          	console.log(strs1[i]);
					var img1 = document.createElement("img");
					img1.setAttribute("src", strs1[i]);
					img1.setAttribute("style", "width: 150px;height: 100px;");
					obj1.appendChild(img1);
					javascript: ;
					//			            	 $(function(){
					//			            	 var q='<input id="ck'+i+'" type="checkbox" />';
					//			            		 $('img').eq(i).before(q);
					//			            		 for(if($("#ck'+i+'").prop("checked")=="true")){
					////			            			for(a=0;a<100;a++){
					////			            				var mycars=new Array();
					////			            				mycars[a]="i"; 
					//                                x=i;
					//			            		 return i;
					//			            				}
					//			            		
					//			            	 })
				}

				//			            		 
				//监督报告
				var fileDown2 = document.getElementById("fileDown2");

				var child2 = document.getElementById("location2");

				fileDown2.removeChild(child2); //删除指定的div以及子div
				var obj2 = document.createElement("div"); //创建div标签
				fileDown2.appendChild(obj2); //定位obj 
				obj2.id = "location2";
				var str2 = data[0].监督报告; //这是一字符串 
				var strs2 = str2.split("||"); //字符分割 

				for(i1 = 0; i1 < strs2.length - 1; i1++) {

					var img2 = document.createElement("img");
					img2.setAttribute("src", strs2[i1]);
					img2.setAttribute("style", "width: 150px;height: 100px;");
					obj2.appendChild(img2);
					$(function() {
						var q1 = '<input id="ckk' + i1 + '" type="checkbox" />';
						$('img').eq(i1 + i).before(q1);

					})
				}
				//备案证
				var fileDown6 = document.getElementById("fileDown6");
				var child6 = document.getElementById("location6");
				fileDown6.removeChild(child6); //删除指定的div以及子div
				var obj6 = document.createElement("div"); //创建div标签
				fileDown6.appendChild(obj6); //定位obj 
				obj6.id = "location6";
				var str6 = data[0].备案证; //这是一字符串 
				var strs6 = str6.split("||"); //字符分割 

				for(i2 = 0; i2 < strs6.length - 1; i2++) {

					var img6 = document.createElement("img");
					img6.setAttribute("src", strs6[i2]);
					img6.setAttribute("style", "width: 150px;height: 100px;");
					obj6.appendChild(img6);
					$(function() {
						var q2 = '<input id="ckkk' + i2 + '" type="checkbox" />';
						$('img').eq(i1 + i + i2).before(q2);

					})
				}

			}
			//						 						alert(gcmc.value); 
		},
		error: function(e) {
			alert("ajax数据请求失败，请重新加载！");
		}
	});
};

function shc() {

	alert(x);

	//								}
	//			            
	//			            $.ajax({
	//						type:"POST",
	//						url:"data/tpsc.php",
	//						data:{
	//						gcid:gcid.value,
	//						mycars:mycars
	//						},
	//			            async: false,
	//						error: function(request) {
	//						alert("Connection error");
	//												},		
	//						success: function(data) {
	//						alert("保存成功");
	//						window.location.reload();
	//												}
	//									})
	////					
}</script>
		
		<!--<script type="text/javascript">
			
		</script>-->
			
		<!--<script type="text/javascript">
			//保存
			function sc() {
				//				alert($('#bdhyform1').serialize())
				$.ajax({
					cache: true,
					type: "POST",
					url: 'data/gctzht.php',
					data: {
						gcfl: gcfl.value,
						hybjm:hybjm.value,
						gczt: gczt.value,
						gcmc: gcmc.value,
						gcdz: gcdz.value,
						sbrq: sbrq.value,
						cjdw: cjdw.value,
						cjlxr: cjlxr.value,
						cjlxrdh: cjlxrdh.value,
						jzsxm: jzsxm.value,
						cjdw1: cjdw1.value,
						cjlxr1: cjlxr1.value,
						cjlxrdh1: cjlxrdh1.value,
						jldw: jldw.value,
						zjxm: zjxm.value,
						jllxr: jllxr.value,
						jllxrdh: jllxrdh.value,
						mj: mj.value,
						gm: gm.value,
						jg: jg.value,
						sc: sc.value,
						xc: xc.value,
						jgg: jgg.value,
						ys: ys.value,
						beizhu:beizhu.value
					},
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert("保存成功");
						window.location.reload();
					}
				});
			});
		</script>-->
		<!--修改后保存-->

<!--//			$("#save2").click(function() {
////							alert($('#bdhyform1').serialize())
//				$.ajax({
//					cache: true,
//					type: "POST",
//					url: 'data/gctzxg.php',
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
//			});-->
		<!--
		<!--删除按钮-->
		<script type="text/javascript">function shanchu(id) {
	//				alert(id);

	$.ajax({
		cache: true,
		type: "POST",
		url: 'data/gctzsc.php',
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

};</script>
		
		<!--提交按钮-->
		
		<script type="text/javascript">
	function tijiao(id) {

	//				alert(id);
	//				var btn =document.getElementById("btn");
	//				var xiugai = document.getElementsByName("xiugai");
	//				alert(111+"  "+b);
	//				xiugai.disabled=true;

	$.ajax({
		cache: true,
		type: "POST",
		url: 'data/gctztj1.php',
		data: {
			id2: id
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

var gcztdsl = document.getElementsByName("gcztdsl");
var myclass = document.getElementsByClassName("myclass");
var myclass1 = document.getElementsByClassName("myclass1");
var myclass4 = document.getElementsByClassName("myclass4");
//			
for(var i = 0; i < gcztdsl.length; i++) {
	//				alert(gcztdsl[i].innerHTML);
	if(gcztdsl[i].innerHTML == "待受理" || gcztdsl[i].innerHTML == "已受理" || gcztdsl[i].innerHTML == "已退件") {
		myclass[i].setAttribute("disabled", "disabled");
		myclass[i].setAttribute("style", "background: #CFCFCF;");
		myclass1[i].setAttribute("disabled", "disabled");
		myclass1[i].setAttribute("style", "background: #CFCFCF;");

		myclass4[i].setAttribute("disabled", "disabled");
		myclass4[i].setAttribute("style", "background: #CFCFCF;");
	}
}</script>
       <!--<script type="text/javascript">
       function jump1(){
       	var furl4 =document.getElementById("furl4").value;
       	var furl5 =document.getElementById("furl5").value;
       		var furl3 =document.getElementById("furl3").value;
       	$.ajax({
					cache: true,
					type: "POST",
					url: 'data/zjtp.php',
					data: {
						
						gcid:gcid
						furl4:furl4
						furl5:furl5
						furl3:furl3
					}, // 你的formid
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert("保存成功");
						
						window.location.reload();
					}
				})
				
				
			}
       	</script>-->
	</body>

	</html>