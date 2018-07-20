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
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
       
        
    </head>
	<body>
		  <div class="row-fluid" id="ImgBackground" >
        </div>
            <ul class="nav navbar-inner block-header  nav-tabs">
					  			<li><i class="icon-chevron-left hide-sidebar" style="display: inline-block;"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>
					  			
					  			<i class="icon-chevron-right show-sidebar" style="display: none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i>
					  			</li>
							    <li class="active"><a data-toggle="tab" href="#home">本地会员登记</a></li>
							    <li><a data-toggle="tab" href="#menu1">外地会员登记</a></li>
							    
	     	</ul> 
                <div class="tab-content ">
			     <div id="home" class="tab-pane fade in active">   
					<form id="bdhyform" name="bdhyform" action="data/bdMS.php" method="post" enctype="multipart/form-data"  role="form">
				      <div class="modal-body">
				    	<div class="form-group ">
							<label for="djrq2" class="span2 control-label">登记日期：<p style="color: red;">（必填）</p></label>
							<div class="span4">
								<input type="date" class="span4 form-control" id="djrq2" name="djrq2" placeholder="">							
							</div>
							<label for="hybh2" class="span2 control-label">会员编号：<p style="color: red;">（必填）</p></label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="hybh2" name="hybh2" placeholder="">							
							</div>
						</div>
						
						<div class="span12">
							</div>
				     	<div class="form-group">
							<label for="qymc2" class="span2 control-label">企业名称：<p style="color: red;">（必填）</p></label>
							<div class="span10">
								<input type="text" class="span10 form-control" id="qymc2" name="qymc2" placeholder="">							
							</div>
						</div>
						<div class="span12">
							</div>
						<div class="form-group">
							<label for="qydz2" class="span2 control-label">企业地址：<p style="color: red;">（必填）</p></label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="qydz2" name="qydz2" placeholder="">							
							</div>
							<label for="yzbh2" class="span2 control-label">邮政编号：<p style="color: red;">（必填）</p></label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="yzbh2" name="yzbh2" placeholder="">							
							</div>
						</div>
						<div class="span12">
							</div>
						<div class="form-group">
							<label for="qywz2" class="span2 control-label">企业网址：<p style="color: red;">（必填）</p></label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="qywz2" name="qywz2" placeholder="">							
							</div>
							<label for="dzyx2" class="span2 control-label">电子邮箱：<p style="color: red;">（必填）</p></label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="dzyx2" name="dzyx2" placeholder="">							
							</div>
						</div>
						<div class="span12">
							</div>
						<div class="form-group">
							<label for="gszch2" class="span2 control-label">工商注册号：<p style="color: red;">（必填）</p></label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="gszch2" name="gszch2" placeholder="">							
							</div>
							<label for="zczj2" class="span2 control-label">注册资金：<p style="color: red;">（必填）</p></label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="zczj2" name="zczj2" placeholder="">							
							</div>
						</div>
						<div class="span12">
							</div>
						&nbsp;
				        <div class="form-group">
							<label for="zzzsbh2" class="span2 control-label">资质证书编号：<p style="color: red;">（必填）</p></label>
							<div class="span10">
								<input type="text" class="span10 form-control" id="zzzsbh2" name="zzzsbh2" placeholder="">							
							</div>
						</div>
						<div class="span12">
							</div>
						&nbsp;
						<div class="form-group">
							<label for="djfw2" class="span12 control-label">资质证书等级范围：</label>
							<label for="zxzz2" class="span2 control-label">主项资质：</label>
							<div class="span4">
						<textarea rows="5" class="span4" id="zxzz2" name="zxzz2"></textarea>
						    </div>
						    <label for="fxzz2" class="span2 control-label">副项资质：</label>
							<div class="span4">
						<textarea rows="5" class="span4" id="fxzz2" name="fxzz2"></textarea>
						    </div>
						</div>
						&nbsp;
						<div class="form-group">
							<label for="qyfr2" class="span2 control-label">企业法人：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="qyfr2" name="qyfr2" placeholder="">							
							</div>
							<label for="qydh2" class="span2 control-label">企业电话：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="qydh2" name="qydh2" placeholder="">							
							</div>
							<label for="czhm2" class="span2 control-label">传真号码：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="czhm2" name="czhm2" placeholder="">							
							</div>
						</div>
						<div class="span12">
							</div>
						<div class="form-group">
							<label for="dsz2" class="span2 control-label">董事长：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="dsz2" name="dsz2" placeholder="">							
							</div>
							<label for="dszlxdh2" class="span2 control-label">联系电话：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="dszlxdh2" name="dszlxdh2" placeholder="">							
							</div>
							<label for="dszsjhm2" class="span2 control-label">手机号码：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="dszsjhm2" name="dszsjhm2" placeholder="">							
							</div>
						</div>
						<div class="span12">
							</div>
						<div class="form-group">
							<label for="zjl2" class="span2 control-label">总经理：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="zjl2" name="zjl2" placeholder="">							
							</div>
							<label for="zjllxdh2" class="span2 control-label">联系电话：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="zjllxdh2" name="zjllxdh2" placeholder="">							
							</div>
							<label for="zjlsjhm2" class="span2 control-label">手机号码：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="zjlsjhm2" name="zjlsjhm2" placeholder="">							
							</div>
						</div>
						<div class="span12">
							</div>
						<div class="form-group">
							<label for="lxr2" class="span2 control-label">联系人：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="lxr2" name="lxr2" placeholder="">							
							</div>
							<label for="zw2" class="span2 control-label">职务：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="zw2" name="zw2" placeholder="">							
							</div>
							<label for="lxrsjhm2" class="span2 control-label">手机号码：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="lxrsjhm2" name="lxrsjhm2" placeholder="">							
							</div>
							 <label class="span12 control-label  ">声明:作为会员，本企业将遵守协会章程，履行会员义务，共同为推动行业的发展而努力</label>
						    	
							<label class="span10 control-label">备注:1、填写《入会申请表》一式两份。<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2、附交（工商营业执照、资质证书复印件加盖公章）各一份。
							</label>
						</div>
						<div class="span12">
							</div>
						<div class="span12">
						 <div class="form-group">	
						<div class="control-group ">
						<label class="control-label" for="myfile">工商营业执照:</label>
						<label class="control-label"  style="color: red;">(注意：上传文件为png，jpg，pdf格式，大小2兆以内)</label>	
							<div id="container">
	                                <a id="myfile" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile"></div>
																			
							</div>
							<div class="control-group">
						<label class="control-label" for="myfile1">资质证书:</label>
						<label class="control-label"  style="color: red;">(注意：上传文件为png，jpg，pdf格式，大小2兆以内)</label>	
							
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
						<div class="hidden">
							<label for="hyzt2" class="span2 control-label">会员状态：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="hyzt2" name="hyzt2" placeholder="" value="待审核">							
							</div>
						</div>
				      
				     <div class="span12" align="right">
				        <a href="login.php"><button type="button" class="btn btn-default" data-dismiss="modal" >取消</button></a>
				        <button type="submit"  class="btn btn-primary">保存</button>
				      </div>
				      
				      </div>
				    </form>
				  </div>
				
				  
				  <div id="menu1" class="tab-pane fade">
					<form id="wdhyform" name="wdhyform" action="data/WDMS.php" method="post" enctype="multipart/form-data"  role="form">
				      <div class="modal-body">
				      	<div class="form-group ">
							<label for="djrq3" class="span2 control-label">登记日期：<p style="color: red;">（必填）</p></label>
							<div class="span4">
								<input type="date" class="span4 form-control" id="djrq3" name="djrq3" placeholder="">							
							</div>
							
							<div class="span6">
								<label for="wdhybh3" class="span2 control-label">外地会员编号：<p style="color: red;">（必填）</p></label>
								<input type="text" class="span4 form-control" id="wdhybh3" name="wdhybh3" placeholder="">							
							</div>
						</div>
						<div class="span12">
							</div>
				     	<div class="form-group">
							<label for="dwmc3" class="span2 control-label">企业名称：<p style="color: red;">（必填）</p></label>
							<div class="span10">
								<input type="text" class="span10 form-control" id="dwmc3" name="dwmc3" placeholder="">							
							</div>
						</div>
						<div class="span12">
							</div>
						<div class="form-group">
							<label for="xxdz3" class="span2 control-label">企业地址：<p style="color: red;">（必填）</p></label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="xxdz3" name="xxdz3" placeholder="">							
							</div>
						
							<label for="yzbh3" class="span2 control-label">邮政编号：<p style="color: red;">（必填）</p></label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="yzbh3" name="yzbh3" placeholder="">							
							</div>
							</div>
							<div class="span12">
							</div>
							<div class="form-group">
								<label for="qywz3" class="span2 control-label">企业网址：</label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="qywz3" name="qywz3" placeholder="">							
							</div>
							<label for="qyyx3" class="span2 control-label">电子邮箱：<p style="color: red;">（必填）</p></label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="qyyx3" name="qyyx3" placeholder="">							
							</div>
							</div>
							<div class="span12">
							</div>
							<div class="form-group">
								<label for="gszc3" class="span2 control-label">工商注册号：<p style="color: red;">（必填）</p></label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="gszc3" name="gszc3" placeholder="">							
							</div>
							<label for="zczj3" class="span2 control-label">注册资金：<p style="color: red;">（必填）</p></label>
							<div class="span4">
								<input type="text" class="span4 form-control" id="zczj3" name="zczj3" placeholder="">							
							</div>
							</div>
							<div class="span12">
							</div>
							<div class="form-group">
							<label for="zzzsbh3" class="span2 control-label">资质证书编号：<p style="color: red;">（必填）</p></label>
							<div class="span10">
								<input type="text" class="span10 form-control" id="zzzsbh3" name="zzzsbh3" placeholder="">							
							</div>
							</div>
							<div class="span12">
							</div>
							<div class="form-group">
							<label for="djfw3" class="span12 control-label">资质证书等级范围：</label>
							<label for="zxzz3" class="span2 control-label">主项资质：<p style="color: red;">（必填）</p></label>
							<div class="span4">
						<textarea rows="5" class="span4" id="zxzz3" name="zxzz3"></textarea>
						    </div>
						    <label for="fxzz3" class="span2 control-label">副项资质：<p style="color: red;">（必填）</p></label>
							<div class="span4">
						<textarea rows="5" class="span4" id="fxzz3" name="fxzz3"></textarea>
						    </div>
						</div>
						<div class="control-group">
							<label for="fddbr3" class="span2 control-label">企业法人：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="fddbr3" name="fddbr3" placeholder="">							
							</div>
							<label for="bgdh3" class="span2 control-label">企业电话：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="bgdh3" name="bgdh3" placeholder="">							
							</div>
							<label for="czdh3" class="span2 control-label">传真号码：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="czdh3" name="czdh3" placeholder="">							
							</div>		
						</div>
						<div class="span12">
							</div>
							<div class="control-group">
							<label for="dsz3" class="span2 control-label">董事长：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="dsz3" name="dsz3" placeholder="">							
							</div>
							<label for="dszdh3" class="span2 control-label">联系电话：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="dszdh3" name="dszdh3" placeholder="">							
							</div>
							<label for="dszsj3" class="span2 control-label">手机号码：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="dszsj3" name="dszsj3" placeholder="">							
							</div>		
						</div>
						<div class="span12">
							</div>
						<div class="control-group">
							<label for="zjl3" class="span2 control-label">总经理：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="zjl3" name="zjl3" placeholder="">							
							</div>
							<label for="zjldh3" class="span2 control-label">联系电话：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="zjldh3" name="zjldh3" placeholder="">							
							</div>
							<label for="zjlsj3" class="span2 control-label">手机号码：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="zjlsj3" name="zjlsj3" placeholder="">							
							</div>		
						</div>
						<div class="span12">
							</div>
						<div class="form-group">
							<label for="txy3" class="span2 control-label">联系人：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="txy3" name="txy3" placeholder="">							
							</div>
							<label for="lxrzw3" class="span2 control-label">职务：<p style="color: red;">（必填）</p></label>
							<div class="span2">
								<input type="text" class="span2 form-control" id="lxrzw3" name="lxrzw3" placeholder="">							
							</div>
							<label for="txysjhm1" class="span2 control-label">手机号码：<p style="color: red;">（必填）</p></label>
							<div class="span2">								
								<input type="text" class="span2 form-control" id="txysjhm1" name="txysjhm1" placeholder="">							
							</div>
							</div>
							<div class="span12">
							</div>
						<div class="hidden">
							<label for="hyzt3" class="span2 control-label">会员状态：</label>
							<div class="span2">
								<input type="text" class="span12 form-control" id="hyzt3" name="hyzt3" placeholder="" value="待审核">							
							</div>
						</div>
						
						    <div class="span12">
						    <label class="span10 control-label">备注:1、填写《入会申请表》一式两份。<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2、同意协会章程，按规定交纳会费。<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3、提供在东莞注册《工商营业执照》及《资质证书》复印件各一份。
						    	
</label>    
				    </div>
				   <div class="span12">
				                       <div class="form-group">
				                       	<label class="control-label" for="shuoming" style="color: red;">(注意：上传文件为png，jpg，pdf格式，大小2兆以内)</label>		
										<label class="control-label" for="myfile3">工商营业执照:</label>
							<div id="container">
	                                <a id="myfile3" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles3" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile3"></div>
										<label class="control-label" for="shuoming" style="color: red;">(注意：上传文件为png，jpg，pdf格式，大小2兆以内)</label>		
										<label class="control-label" for="myfile5">资质证书:</label>
							<div id="container">
	                                <a id="myfile5" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles5" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile5"></div>
                                               <input id="furl3" name="picture3" type= "hidden" />
								             
								              <input id="furl5" name="picture5" type="hidden"/>
											  </div> </div>
				    
				   
				        <div class="span12"align="right">
				        <button type="button" class="btn btn-default" data-dismiss="modal"onclick="jump1()">取消</button>
				        <button type="submit" id="save2" class="btn btn-primary" onclick="javascrtpt:jump()">保存</button>
				      </div>
				    </form>
				  </div>
				
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
        <script src="vendors/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="vendors/jquery-migrate-1.2.1.min.js"></script>
        <script src="vendors/modernizr.min.js"></script>
        <script src="vendors/jquery.nicescroll.js"></script>
        <!--连接上传所需的类-->
        <script type="text/javascript" src="vendors/plupload.full.min.js"></script>
        <!--连接执行操作的js代码-->
        <script type="text/javascript" src="data/upload_file_bd.js"></script>
        <script type="text/javascript" src="data/upload_file_zzzs.js"></script>
        <script type="text/javascript" src="data/upload_file_wd.js"></script>
        
        <script type="text/javascript" src="data/upload_file_wdzs.js"></script>
        
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
        <script type="text/javascript">
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
             
             $("#bdhy").removeClass("my_none");
             $("#wdhy").addClass("my_none");
             
        })
        $(".lii1").click(function() {
        	
              $("#wdhy").removeClass("my_none");
              $("#bdhy").addClass("my_none");
              
        });
        
	
    })
</script>
<!--<script type="text/javascript">



$("#save1").click(function() {
var djrq2 = document.getElementById("djrq2").value;
var hybh2 = document.getElementById("hybh2").value;
var qymc2 = document.getElementById("qymc2").value;
var qydz2 = document.getElementById("qydz2").value;
var yzbh2 = document.getElementById("yzbh2").value;
var qywz2 = document.getElementById("qywz2").value;
var dzyx2 = document.getElementById("dzyx2").value;
var gszch2 = document.getElementById("gszch2").value;
var zczj2 = document.getElementById("zczj2").value;
var zzzsbh2 = document.getElementById("zzzsbh2").value;
var zxzz2 = document.getElementById("zxzz2").value;
var fxzz2 = document.getElementById("fxzz2").value;
var qyfr2 = document.getElementById("qyfr2").value;
var qydh2 = document.getElementById("qydh2").value;
var czhm2 = document.getElementById("czhm2").value;
var dsz2 = document.getElementById("dsz2").value;
var dszlxdh2 = document.getElementById("dszlxdh2").value;
var dszsjhm2 = document.getElementById("dszsjhm2").value;
var zjl2 = document.getElementById("zjl2").value;
var zjllxdh2 = document.getElementById("zjllxdh2").value;
var zjlsjhm2 = document.getElementById("zjlsjhm2").value;
var lxr2 = document.getElementById("lxr2").value;
var zw2 = document.getElementById("zw2").value;
var lxrsjhm2 = document.getElementById("lxrsjhm2").value;
var hyzt2 = document.getElementById("hyzt2").value;
var upload_filedDir = document.getElementById("upload_filedDir").value;
var upload_filedDir1 = document.getElementById("upload_filedDir1").value;

	$.ajax({
		type: 'POST',
		url: "data/bdMS.php",
		 data:{
			djrq2:djrq2,
			hybh2:hybh2,
			qymc2:qymc2,
			qydz2:qydz2,
			yzbh2:yzbh2,
			qywz2:qywz2,
			dzyx2:dzyx2,
			gszch2:gszch2,
			zczj2:zczj2,
			zzzsbh2:zzzsbh2,
			zxzz2:zxzz2,
			fxzz2:fxzz2,
			qyfr2:qyfr2,
			qydh2:qydh2,
			czhm2:czhm2,
			dsz2:dsz2,
			dszlxdh2:dszlxdh2,
			dszsjhm2:dszsjhm2,
			zjl2:zjl2,
			zjllxdh2:zjllxdh2,
			zjlsjhm2:zjlsjhm2,
			lxr2:lxr2,
			zw2:zw2,
			lxrsjhm2:lxrsjhm2,
			hyzt2:hyzt2,
			upload_filedDir:upload_filedDir,
			upload_filedDir1:upload_filedDir1,
			
					   },
		dataType: 'JSON', 
		error: function(xhr, type, errorThrown) {
						alert('ajax错误' + type + '---' + errorThrown);
					},
		success: function(data) { 
		//alert(data);
			qcmc.value = data.qcmc;
		}
	});-->
<!--//
//	if (qymc.value == qymc2.value) {
//		alert("企业已注册");
//		return false;
//		}else {
//		$.ajax({
//			cache: true,
//			type: "POST",
//			url: "data/bdMS.php",
//			data: $('#bdhyform').serialize(),
//			async: false,
//			error: function(request) {
//				alert('Connection errr');
//			},
//			success: function(data) {
//				alert("保存成功");
//				window.location.reload();
//
//			}
//		});
//	}
//});-->
	
<script type="text/javascript">
function jump(){
window.location.href="login.php";
}
function jump1(){
window.location.href="login.php";
}
</script>
    </body>

</html>