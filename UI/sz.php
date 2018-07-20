<!DOCTYPE html>
<?php
session_start();
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
        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
     
       
        
    </head>
    

</style>
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
                        <li class="myclass2">
                            <a href="gctz.php"><i class="icon-chevron-right"></i> 工程台账</a>
                           
                        </li>
                        <li class="myclass0">
                            <a href="hyrh.php"><i class="icon-chevron-right"></i>会员入会</a>
                        </li>
                        <li>	
	                            <a href="hyfw.php"><i class="icon-chevron-right"></i> 会员服务</a>
	                            <ul class="">
	                            <li><a href="cygm1.php">活动报名</a></li>
	                            <li><a href="ckpj.php">查看评价</a></li>
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
                        <li class="active ">
                            <a href="sz.php"> 设置</a>
                           
                        </li>
                        <li class="myclass1">
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
					  		<ul class="nav navbar-inner block-header  nav-tabs">
					  			<li><i class="icon-chevron-left hide-sidebar" style="display: inline-block;"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>
					  			
					  			<i class="icon-chevron-right show-sidebar" style="display: none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i>
					  			</li>
							    <li class="active"><a data-toggle="tab" href="#home">设置</a></li>
						  	</ul>
						  <div class="tab-content ">
						    <div id="home" class="tab-pane fade in active">
						      <div class="block ">
	                            <div class="navbar navbar-inner block-header " >
	                                <div class="btn-group">
											<button type="button" class="btn btn-default dropdown-toggle " data-toggle="modal" data-target="#myModal1" > 修改信息</button>
											<button type="button" class="btn btn-default dropdown-toggle " data-toggle="modal" data-target="#myModal2" onclick="dianji()"> 修改密码</button>
											<button type="button" class="btn btn-default dropdown-toggle " data-toggle="modal" data-target="#myModal3" onclick="dianji1()"> 修改账号</button>
											 
									</div>
	                       </div>     
                            	<div class="block-content collapse in">
                                	<div class="span12">
  									<!--模态框1-->
  									
										<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
										  <div class="modal-dialog" >
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title" id="myModalLabel">修改信息</h4>
										      </div>
					             
									      <div class="modal-body">
									      	<form id="sz1form" action="sz2.php" method="post"  role="form">
							 <?php
	   						require("conn.php");
							  $yhtag = $_SESSION["yhtag"];
	   						$sql = "select * from 个人信息   where 会员标记码='$yhtag'";
	   						$result = $conn->query($sql);
	   						while($row = $result->fetch_assoc()) {
   					?>
   					
   												
										    	<div class="form-group">
										    		
													<label for="xm" class="span4 control-label">姓名：</label>
													<div class="span8">
														<input type="text" class="form-control" id="xm" name="xm" value="<?php echo $row["姓名"]; ?>"placeholder="">							
													</div>
												</div>
										     	<div class="form-group">
													<label for="xb" class="span4 control-label">性别：</label>
													<div class="span8">
														<select id="xb" name="xb" class="form-control span3">
															 <option><?php echo $row["性别"]; ?></option>
															<option>男</option>
															<option>女</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label for="lxr" class="span4 control-label">联系人：</label>
													<div class="span8">
														<input type="text" class="form-control" id="lxr" name="lxr" value="<?php echo $row["联系人"]; ?>" placeholder="">							
													</div>
												</div>
												<div class="form-group">
													<label for="lxdh" class="span4 control-label">联系电话：</label>
													<div class="span8">
														<input type="text" class="form-control" id="lxdh" name="lxdh" value="<?php echo $row["联系电话"]; ?>" placeholder="">							
													</div>
												</div>
												<div class="form-group">
													<label for="sj" class="span4 control-label">手机：</label>
													<div class="span8">
														<input type="text" class="form-control " id="sj" name="sj" value="<?php echo $row["手机"]; ?>" placeholder=""   >							
													</div>
												</div>
										        <div class="form-group">
													<label for="dzyx" class="span4 control-label">电子邮箱：</label>
													<div class="span8">
														<input type="text" class="form-control" id="dzyx" name="dzyx" value="<?php echo $row["电子邮箱"]; ?>" placeholder="">							
													</div>
												</div>
												<div class="form-group">
										    		
													<label for="cjdw" class="span4 control-label">承建单位：</label>
													<div class="span8">
														<input type="text" class="form-control" id="cjdw" name="cjdw" value="<?php echo $row["企业名称"]; ?>"placeholder="">							
													</div>
												</div>
						<?php
						}
						$conn->close();
					?>
												</form>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
										        <button id="save1" type="button" onclick="window.location.reload()" class="btn btn-primary">保存</button>
										      </div>
										    </div>
										  </div>
										</div>
  									<!--模态框1-->
  									<!--模态框2-->
										<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
										  <div class="modal-dialog" >
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title" id="myModalLabel" >修改密码</h4>
										      </div>
										      <div class="modal-body">
										      	<form id="sz2form" action="" method=""  role="form">
										      		<input type="text" class="hidden" id="mima" name="mima" placeholder="">		
										    	<div class="form-group">
										    		
													<label for="ymm" class="span4 control-label">原密码：</label>
													<div class="span8">
														<input type="text" class="form-control" id="ymm" name="ymm" placeholder="">							
													</div>
												</div>
												<div class="form-group">
													<label for="passw" class="span4 control-label">新密码：</label>
													<div class="span8">
														<input type="text" class="form-control" id="passw" name="passw" placeholder="">							
													</div>
												</div>
												<div class="form-group">
													<label for="qrmm" class="span4 control-label">确认密码：</label>
													<div class="span8">
														<input type="text" class="form-control" id="qrmm" name="qrmm" placeholder="">	
																
													</div>
												</div>
												<div class="form-group">
													<div class="span4">
														<!--<input type="button" onClick="setRnd()" value="获得验证码" class="btn btn-default dropdown-toggle "  id="getCode">-->
															<button type="button" class="btn btn-default dropdown-toggle " onclick="setRnd();time(this)"> 获取验证码</button>
																</div>
														<div class="span8">	
														<input type="text" class="form-control" id="yzm" name="yzm" placeholder="">	
															</div>						
														</div>	
													<input type="text" id="num" class="hidden">		
												</form>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
										        <button type="button" id="save2"class="btn btn-primary" >保存</button>
										      </div>
										    </div>
										  </div>
										</div>
  									<!--模态框2-->
  									<!--模态框3-->
										<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
										  <div class="modal-dialog" >
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title" id="myModalLabel" >修改账号</h4>
										      </div>
										      <div class="modal-body">
										      	<form id="sz3form" action="" method=""  role="form">
										      		<input type="text" class="hidden" id="zh" name="zh" placeholder="">		
										    	<div class="form-group">
										    		
													<label for="yzh" class="span4 control-label">原账号：</label>
													<div class="span8">
														<input type="text" class="form-control" id="yzh" name="yzh" placeholder="">							
													</div>
												</div>
												<div class="form-group">
													<label for="xzh" class="span4 control-label">新账号：</label>
													<div class="span8">
														<input type="text" class="form-control" id="xzh" name="xzh" placeholder="">							
													</div>
												</div>
												<div class="form-group">
													<label for="qrzh" class="span4 control-label">确认账号：</label>
													<div class="span8">
														<input type="text" class="form-control" id="qrzh" name="qrzh" placeholder="">	
																
													</div>
												</div>
													
												</form>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
										        <button type="button" id="save3"class="btn btn-primary" >保存</button>
										      </div>
										    </div>
										  </div>
										</div>
  									<!--模态框3-->
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
        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="assets/scripts.js"></script>       
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
      <script type="text/javascript">$("#save1").click(function() {
	$.ajax({
		cache: true,
		type: "POST",
		url: "data/sz2.php",
		data: $('#sz1form').serialize(),
		async: false,
		error: function(request) {
			alert('Connection error');
		},
		success: function(data) {
			alert("保存成功");
		}
	});
});

//</script>	
			<script type="text/javascript">
var ymm = document.getElementById("ymm");
var qrmm = document.getElementById("qrmm");
var mima = document.getElementById("mima");
var passw = document.getElementById("passw");
var yzm = document.getElementById("yzm");
var num = document.getElementById("num");
function dianji() {
	//		  	alert(111);
	$.ajax({
		type: 'POST',
		url: "data/sz4.php",
		dataType: 'JSON', 
		error: function(xhr, type, errorThrown) {
						alert('ajax错误' + type + '---' + errorThrown);
					},
		success: function(data) { 
		//alert(data);
			mima.value = data.mima;
		}
	});
}
//				


//	


$("#save2").click(function() {

	//					$.ajax({
	////					alert(data);
	//					type:"POST",
	//					url:"data/sz4.php",
	//					dataType : "json",
	//					timeout: 10000,
	// 				success:function(data){
	//							mima.value =data[0].密码;
	//						},
	//// 						alert(xgjldw.value);
	//						 						 
	//					  error: function(e) {
	//						  alert("ajax数据请求失败，请重新加载！");
	//					}
	//				});




	if (qrmm.value != passw.value) {
		alert("您输入两次密码不一致！");
		return false;
	} else if (ymm.value != mima.value) {

		alert("您输入密码错误！");
		return false;
	} else if (yzm.value =="") {

		alert("您输入验证码错误！");
		return false;
	} 
	else if (yzm.value !=num.value) {

		alert("您输入验证码错误！");
		return false;
	} 
	else {
		$.ajax({
			cache: true,
			type: "POST",
			url: "data/sz5.php",
			data: $('#sz2form').serialize(),
			async: false,
			error: function(request) {
				alert('Connection errr');
			},
			success: function(data) {
				alert("修改成功");
				window.location.reload();

			}
		});
	}
});

function dianji1() {
	//		  	alert(111);
	$.ajax({
		type: 'POST',
		url: "data/sz6.php",
		dataType: 'JSON', 
		error: function(xhr, type, errorThrown) {
						alert('ajax错误' + type + '---' + errorThrown);
					},
		success: function(data) { 
		//alert(data);
			zh.value = data.zh;
		}
	});
}
//				


//	


$("#save3").click(function() {

	//					$.ajax({
	////					alert(data);
	//					type:"POST",
	//					url:"data/sz4.php",
	//					dataType : "json",
	//					timeout: 10000,
	// 				success:function(data){
	//							mima.value =data[0].密码;
	//						},
	//// 						alert(xgjldw.value);
	//						 						 
	//					  error: function(e) {
	//						  alert("ajax数据请求失败，请重新加载！");
	//					}
	//				});




	if (qrzh.value != xzh.value) {
		alert("您输入两次账号不一致！");
		return false;
	} else if (yzh.value != zh.value) {

		alert("您输入账号错误！");
		return false;
//	} else if (yzm.value != num.value) {
//
//		alert("您输入验证码错误！");
//		return false;
	} 
	else {
		$.ajax({
			cache: true,
			type: "POST",
			url: "data/sz7.php",
			data: $('#sz3form').serialize(),
			async: false,
			error: function(request) {
				alert('Connection errr');
			},
			success: function(data) {
				alert(data);
				

			}
		});
	}
});

</script>

<script type="text/javascript">
//var fsyzmm="验证码为：   num.value"; 
function rnd(min, max){
  return min + Math.floor(Math.random() * (max - min + 1));
}
var num = document.getElementById("num");

function setRnd(){
  document.getElementById("num").value = rnd(1000,9999);
//                  alert(hybjm.value);
$.ajax({
//					
					cache: true,
					type: "POST",
					url: 'Php/mmyzm.php',
					data:{
						num:num.value,
						
						
						
//						fsyzmm:fsyzmm
					}, // 你的formid
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						
					}
				});
//alert(num.value);
};

//var getCode = document.getElementById('getCode');
var wait = 60;
function time(btn){
    if (wait===0) {
        btn.removeAttribute("disabled");
        btn.innerHTML = "获取验证码";
        wait = 60;
    }else{
        btn.setAttribute("disabled",true);
        btn.innerHTML = wait + "秒后重试";
        wait--;
        setTimeout(function(){
            time(btn);
        },1000);
    }
}
</script>

<script>
var sbm = document.getElementById("sbm");
var myclass1 = document.getElementsByClassName("myclass1");
var myclass0 = document.getElementsByClassName("myclass0");
var myclass2 = document.getElementsByClassName("myclass2");
//var myclass = document.getElementsByClassName("myclass");
if (sbm.value != '0') {
	myclass1[0].setAttribute("class", "hidden");
	myclass0[0].setAttribute("class", "hidden");

} else {
	myclass2[0].setAttribute("class", "hidden");
   
}</script>
        <script>$(function() {
	// Easy pie charts
	$('.chart').easyPieChart({
		animate: 1000
	});
});</script>
    </body>
</html>