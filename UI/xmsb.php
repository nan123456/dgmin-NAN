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
        
    </head>
	<body>
		  <div class="row-fluid" id="ImgBackground" >
        </div>
            <ul class="nav navbar-inner block-header  nav-tabs">
					  			<li><i class="icon-chevron-left hide-sidebar" style="display: inline-block;"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>
					  			
					  			<i class="icon-chevron-right show-sidebar" style="display: none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i>
					  			</li>
							    <li class="active"><a data-toggle="tab" href="#home">项目申报</a></li>
							    
							    
	     	</ul> 
                <div class="tab-content ">
			     <div id="home" class="tab-pane fade in active">   
					<form id="xmsbform" name="xmsbform" action="" method="post" class="" role="form" >
				      <div class="modal-body">
				    	<div class="form-group ">
							<label for="xmmc" class="span2 control-label">项目名称：</label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="xmmc" name="xmmc" placeholder="必填信息">							
							</div>
							<label for="xmdz" class="span2 control-label">项目地址：</label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="xmdz" name="xmdz" placeholder="必填信息">							
							</div>
						</div>
				     	
						<div class="form-group">
							<label for="lxr" class="span2 control-label">联系人：</label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="lxr" name="lxr" placeholder="必填信息">							
							</div>
							<label for="sj" class="span2 control-label">手机：</label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="sj" name="sj" placeholder="必填信息">							
							</div>
							<label for="yx" class="span2 control-label">邮箱：</label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="yx" name="yx" placeholder="必填信息">							
							</div>
						</div>
						<label for="sgdw" class="span2 control-label">施工单位：</label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="sgdw" name="sgdw" placeholder="必填信息">							
							</div>
							<div class="form-group">
													<label for="xmlx" class="span2 control-label">申报类型</label>
						<div class="span4 controls">
														<select id="xmlx" name="xmlx" class="form-control span4">
															<option>市优质奖</option>
															<option>市示范工地</option>
															<option>省优质奖</option>
															<option>省优质结构奖</option>
															<option>省优秀qc</option>
															<option>省绿色施工</option>
														</select>
													</div>
													</div>
								
				      </div>
				      <div >
				      <div class="modal-footer">
				        <a href="login.php"><button type="button" class="btn btn-default" >取消</button></a>
				        <button type="button" data-toggle="modal" data-target="#myModal5" id="save1" class="btn btn-primary" >保存</button>
				      </div>
				   </form>  
				  </div>
				  
<!--弹窗-->    
<div class="modal fade" id="myModal5">
			<div class="modal-dialog" >
				<div class="modal-content">
				    <h4  style="text-align: center;">申请帐号密码</h4>
				    
   					
				    <!--<input type="text" class="span4 form-control " id="hybjm" name="hybjm" value="hybjm">-->
				    <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				        <button type="button" data-toggle="modal" data-target="#myModal1" id="save3" class="btn btn-primary myclass" >确定</button>
				    </div>        
				</div>
			</div>
</div>
          
 <!--模态框1-->
                            
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
			 <div class="modal-dialog" >
				<div class="modal-content">
				    <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
				      <h4 class="modal-title" id="myModalLabel">申请帐号密码</h4>
				    </div> 
				    &nbsp;
				    <p style="color: red; font-size: 20px;"  class=" text-center">注意：请记住该帐号密码，用于项目申请的登录</p>
					<form id="zhform" name="zhform" action="" method="post" class="" role="form" >
				      <div class="modal-body">
				    	<div class="form-group">				    		
							<label for="zh" class="span2 ">帐号：</label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="zh" name="zh" placeholder=""value=""  readonly="ture">															
							</div>
							<label for="mm" class="span2 control-label">密码：</label>
							<div class="span4">
								<input type="password" class="span4 form-control " id="mm" name="mm" placeholder="">							
							</div>	
							<label for="qrmm" class="span2 control-label">请确认密码：</label>
							<div class="span4">
								<input type="password" class="span4 form-control " id="qrmm" name="qrmm" placeholder="">	
										
														
													<div class="">
														<!--<input type="button" onClick="setRnd()" value="获得验证码" class="btn btn-default dropdown-toggle "  id="getCode">-->
															<button type="button" class="btn btn-default dropdown-toggle " onclick="setRnd();time(this)"> 获取验证码</button>
														</div>		
														<div class="">	
														<input type="text" class="form-control" id="yzm" name="yzm" placeholder="">							
														</div>	
													<input type="text" id="num" class="hidden">	
										
												
											
									    
								<input type="text" class="span4 form-control hidden " id="hybjm" name="hybjm" value="hybjm">		
									  			
							</div>	
												
						</div>
					  </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				        <button type="button" id="save2"  class="btn btn-primary" >保存</button>
				      </div>        
				    </form>
				    </div>
			</div>
          </div>
          </div>
         
<!--模态框1-->
				  
		        </div>
		       
		  <!--</div>
		</div>
		</div>-->
<!--模态框1-->


        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
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
	var hybjm=document.getElementById("hybjm");
	var myclass=document.getElementsByClassName("myclass");
			$("#save1").click(function(){ 
				var sj =document.getElementById("sj");
				var xmmc = document.getElementById("xmmc");
				var xmdz = document.getElementById("xmdz");
				var lxr = document.getElementById("lxr");
				var yx = document.getElementById("yx");
				var sgdw = document.getElementById("sgdw");
				if(xmmc.value.length!=0&&xmdz.value.length!=0&&lxr.value.length!=0&&yx.value.length!=0&&sgdw.value.length!=0){
						if(sj.value.length!=11){
						alert("您输入的手机号码有误,请重新输入！");
					}else{
					$.ajax({
	                cache: true,
	                type: "POST",
	                url:'data/xmsbbc.php',
//	                dataType : "json",
	                data:$('#xmsbform').serialize(),// 你的formid
	                async: false,
	                error: function(request) {
	                    alert('Connection error');
	                },
	                success: function(data) {
	                    alert("保存成功"); 
//	                    myclass[0].setAttribute("class","hidden");
			   				hybjm.value = data;
//			   				alert(hybjm.value );
	                }
					});
					}
				}else{
					alert("请填写必填信息");
					window.location.reload();
//					myclass[0].setAttribute("class","hidden");
//					sj.value =null;
				}
//			if(sj.value.length!=11)	{
//				myclass[0].setAttribute("class","hidden");
//			}else{
//				
//			}
			 });
			 </script>
			<script type="text/javascript">
			$("#save3").click(function(){ 
			var hybjm=document.getElementById("hybjm");	
//			alert(hybjm.value);
			$.ajax({
						cache: true,
						type: "POST",
						url: "data/slssgxgduqusj.php",
					    data:{
						hybjm:hybjm.value
					   },
					   dataType:'json',
					
						async: false,
						success: function(data) {
//							alert(data);
							zh.value = data[0].phone;
						},
						error: function(request) {
							alert('该手机号码已被注册');
	                    window.location.reload();
							
						},
					});
				});
</script>

<script type="text/javascript">
   var zh=document.getElementById("zh");   	
   var mm=document.getElementById("mm");
   var qrmm=document.getElementById("qrmm");
   
   
     $("#save2").click(function(){ 
     	if(mm.value===qrmm.value && num.value===yzm.value){
					$.ajax({
	                cache: true,
	                type: "POST",
	                url:'data/xmsbzh.php',
	                data:$('#zhform').serialize(),// 你的formid
	                async: false,
	                error: function(request) {
	                    alert("该手机号码已被注册");
	                },
	                success: function(data) {
	                    alert("保存成功");
//	                   alert(zh.value.length);
	                    window.location.href="login.php";
	                    
	                }
			            });
			
	}else if(mm.value!=qrmm.value){
		alert("两次密码输入不同，请重新输入！")
	}else if(num.value!=yzm.value){
		alert("验证码输入不正确，请重新输入！")
	}else{
		
	}
	}); 
//}
</script>
<script type="text/javascript">
//var fsyzmm="验证码为：   num.value"; 
function rnd(min, max){
  return min + Math.floor(Math.random() * (max - min + 1));
}
var num = document.getElementById("num");
var sj = document.getElementById("sj");
function setRnd(){
  document.getElementById("num").value = rnd(1000,9999);
//                  alert(hybjm.value);
$.ajax({
//					
					cache: true,
					type: "POST",
					url: 'Php/yzmSenSms.php',
					data:{
						num:num.value,
						sj:sj.value,
						hybjm:hybjm.value
						
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
    </body>

</html>