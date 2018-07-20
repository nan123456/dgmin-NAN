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
													
												</div>
											</div>
                <div class="block-content collapse in " >
                                	<div class="span12">
                                		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example" >
                                			<thead>
												<tr>
													<th>序号</th>
													
													<th>活动名称</th>
													<th>会员名称</th>
													<th>操作</th>
														</tr>
											</thead>
											
											<tbody id="" class="">
												
											<?php
											require("conn.php");
//					                   $yhtag=$_SESSION["yhtag"];
                                        
                                        
					                     $sql = "select * from 会员评价" ;
										
					                   $result = $conn->query($sql);
									   
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
					                   	 ?>
					                   	 															 
										    
										     <tr class="even gradeC " id="">
											<td><?php echo $i++;?></td>
													<!--<td><input type="checkbox"></td>-->
													
													<td><?php echo "建筑学习交流会";?></td>
													<td><?php echo $row["会员单位"];?></td>
													<td class="center">
														<button id="<?php echo "建筑学习交流会";?>" type="button" class="btn btn-primary myclass7" data-toggle="modal" data-target="#myModal6" onclick="bmqy(this.id);" >
																			报名
																		</button>
																		<button id="<?php echo $row["会员标记码"];?>" type="button" class="btn btn-primary myclass7" data-toggle="modal" data-target="#myModal7" onclick="cmqy(this.id);" >
																			修改报名信息
																		</button>
																		<button id="<?php echo $row["会员标记码"];?>" type="button" class="btn btn-primary myclass7" data-toggle="modal" data-target="#myModal8" onclick="cmqy1(this.id);" >
																			签到信息
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
										<!--模态框3-->
							<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
													<input type="text" class="span10 form-control" id="bmdw" name="bmdw" placeholder="单位名应与承建单位信息一致">
												</div>
											</div>
											<div class="form-group">
												
												<div class="span6">
													<label for="bmrs" class="span4 control-label">报名人数</label>
													<input type="text" class="span8 form-control" id="bmrs" name="bmrs" placeholder="">
														</div>
														<div class="span6">
														
												</div>
											</div>
											<div class="span12" id="ry">
												</div>
												<div class="span12">
												<button type="button" class="btn btn-default" onclick="add()">填写人员信息</button>
											</div>
											
											<input type="type" class="span12 form-control hidden" id="gcid1" name="gcid1">
												<input type="type" class="span12 form-control hidden" id="gcid2" name="gcid2"value="gcid2">
											</div>
											<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
											<button type="button" class="btn btn-primary" onclick="bc()" >保存</button>
										</div>
									</form>
									</div>
							</div>
						</div>	
						<!--模态框4-->
							<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
										<h4 class="modal-title" id="myModalLabel">报名信息修改</h4>
									</div>
									<form id="bmqy1" name="bmqy1" action="" method="post" role="form" enctype="multipart/form-data">		
									<div class="modal-body">		
								   <div class="form-group">
												
												<div class="span12">
													<label for="bmdw1" class="span2 control-label">报名单位</label>
													<input type="text" class="span10 form-control" id="bmdw1" name="bmdw1" placeholder="单位名应与承建单位信息一致">
												</div>
											</div>
											<div class="form-group">
												
												<div class="span6">
													<label for="bmrs1" class="span4 control-label">报名人数</label>
													<input type="text" class="span8 form-control" id="bmrs1" name="bmrs1" placeholder="">
														</div>
														<div class="span6">
														
												</div>
											</div>
											<div class="span12">
												</div>
											<div class="form-group">
												
											<div class="span4" id="ry1">
												</div>
												<div class="span4" id="ry2">
												</div>
												<div class="span4" id="ry3">
												</div>
												
												</div>
											<div class="span12" id="ry4">
												</div>
												<div class="span12">
												<button type="button" class="btn btn-default" onclick="add1()">填写人员信息</button>
											</div>
											
											<input type="type" class="span12 form-control hidden" id="gcid1" name="gcid1">
												<input type="type" class="span12 form-control hidden" id="gcid2" name="gcid2"value="gcid2">
											</div>
											<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
											<button type="button" class="btn btn-primary" onclick="bc1()">保存</button>
										</div>
									</form>
									</div>
							</div>
						</div>
						</div>
						<!--模态框4-->
							<div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
										<h4 class="modal-title" id="myModalLabel">签到信息查看</h4>
									</div>
									<form id="bmqy2" name="bmqy2" action="" method="post" role="form" enctype="multipart/form-data">		
									<div class="modal-body">		
								   <div class="form-group">
												
												<div class="span12">
													<label for="bmdw2" class="span2 control-label">报名单位</label>
													<input type="text" class="span10 form-control" id="bmdw2" name="bmdw2" placeholder="单位名应与承建单位信息一致">
												</div>
											</div>
											<div class="form-group">
												
												<div class="span6">
													<label for="bmrs2" class="span4 control-label">报名人数</label>
													<input type="text" class="span8 form-control" id="bmrs2" name="bmrs2" placeholder="">
														</div>
														<div class="span6">
														
												</div>
											</div>
											<div class="span12">
												</div>
											<div class="form-group">
												
											<div class="span4" id="ry5">
												</div>
												<div class="span4" id="ry6">
												</div>
												<div class="span4" id="ry7">
												</div>
												
												</div>
											</div>
											<div class="modal-footer">
											
											<button type="button" class="btn btn-default">确认</button>
											
										</div>
									</form>
									</div>
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
       var sl="";
		var gcid4="建筑学习交流会";	
		function cmqy1(id){
			var bmdw2=document.getElementById("bmdw2");
			var bmrs2=document.getElementById("bmrs2");	
			
				$.ajax({
					type:"POST",
					url:"data/gmhdbm2.php",
					data:{
						gcid:gcid4,
						bcid:id,
					},
					dataType : "json",
					timeout: 10000,
   					success : function(data){
   						
						var length = data.length;			
   						for (var i=0;i<length-1;i++) {
   							bmdw2.value = data[i].会员单位;
							bmrs2.value = data[i].报名人数;
							
							var abc=data[0].报名人姓名;
							var strs1=abc.split("|");
							var abc1=data[0].报名人手机号码;
							var strs2=abc1.split("|");
							var abc2=data[0].报名人职务;
							var strs3=abc2.split("|");
								for (i=0;i<strs1.length-1 ;i++ ) 
                            {    var q=document.createElement("input");
							     q.setAttribute("type","checkbox");
							     
                            	var label1=document.createElement("label");
                                 
                                label1.setAttribute("id","bm1");
                                label1.setAttribute("class","span12 control-label");
                               label1.innerText = "报名人姓名";
                               label1.insertBefore(q,label1.childNodes[0]);
                            	var input1=document.createElement("input");
							     input1.setAttribute("value",strs1[i]);
							     input1.setAttribute("type","text");
							     input1.setAttribute("id","bmrxm"+i+"");
							     input1.setAttribute("class","span12 form-control");
							    label1.appendChild(input1);
							    
							  
							     ry5.appendChild(label1);
							     
							    }
							    
							    for (i1=0;i1<strs2.length-1 ;i1++ ) {
							    var label2=document.createElement("label");
                                 
                                label2.setAttribute("id","bm2");
                                label2.setAttribute("class","span12 control-label");
                               label2.innerText = "手机号码";
                            	var input2=document.createElement("input");
							     input2.setAttribute("value",strs2[i1]);
							     input2.setAttribute("type","text");
							     input2.setAttribute("id","bmrsj"+i1+"");
							     input2.setAttribute("class","span12 form-control");
							    label2.appendChild(input2);
							     ry6.appendChild(label2);
							    }
							    for (i2=0;i2<strs3.length-1 ;i2++ ) 
							    {
							    var label3=document.createElement("label");
                                 
                                label3.setAttribute("id","bm3");
                                label3.setAttribute("class","span12 control-label");
                               label3.innerText = "职务";
                            	var input3=document.createElement("input");
							     input3.setAttribute("value",strs3[i2]);
							     input3.setAttribute("type","text");
							     input3.setAttribute("id","bmrzw"+i2+"");
							     input3.setAttribute("class","span12 form-control");
							    label3.appendChild(input3);
							   
							     ry7.appendChild(label3);
							   
							     }
//							      label1.append(label2.append(label3));
							  
				}
//						 						alert(gcmc.value); 
					},
					error: function(e) {
						alert("ajax数据请求失败，请重新加载！");
					}
				});
				
			}	
			function cmqy(id){
			var bmdw1=document.getElementById("bmdw1");
			var bmrs1=document.getElementById("bmrs1");	
			
				$.ajax({
					type:"POST",
					url:"data/gmhdbm2.php",
					data:{
						gcid:gcid4,
						bcid:id,
					},
					dataType : "json",
					timeout: 10000,
   					success : function(data){
   						
						var length = data.length;			
   						for (var i=0;i<length-1;i++) {
   							bmdw1.value = data[i].会员单位;
							bmrs1.value = data[i].报名人数;
							
							var abc=data[0].报名人姓名;
							var strs1=abc.split("|");
							var abc1=data[0].报名人手机号码;
							var strs2=abc1.split("|");
							var abc2=data[0].报名人职务;
							var strs3=abc2.split("|");
								for (i=0;i<strs1.length-1 ;i++ ) 
                            {   
                            	var label1=document.createElement("label");
                                 
                                label1.setAttribute("id","bm1");
                                label1.setAttribute("class","span12 control-label");
                               label1.innerText = "报名人姓名";
                            	var input1=document.createElement("input");
							     input1.setAttribute("value",strs1[i]);
							     input1.setAttribute("type","text");
							     input1.setAttribute("id","bmrxm"+i+"");
							     input1.setAttribute("class","span12 form-control");
							    label1.appendChild(input1);
							     ry1.appendChild(label1);
							     sl+=i;
							    }
							    
							    for (i1=0;i1<strs2.length-1 ;i1++ ) {
							    var label2=document.createElement("label");
                                 
                                label2.setAttribute("id","bm2");
                                label2.setAttribute("class","span12 control-label");
                               label2.innerText = "手机号码";
                            	var input2=document.createElement("input");
							     input2.setAttribute("value",strs2[i1]);
							     input2.setAttribute("type","text");
							     input2.setAttribute("id","bmrsj"+i1+"");
							     input2.setAttribute("class","span12 form-control");
							    label2.appendChild(input2);
							     ry2.appendChild(label2);
							    }
							    for (i2=0;i2<strs3.length-1 ;i2++ ) 
							    {
							    var label3=document.createElement("label");
                                 
                                label3.setAttribute("id","bm3");
                                label3.setAttribute("class","span12 control-label");
                               label3.innerText = "职务";
                            	var input3=document.createElement("input");
							     input3.setAttribute("value",strs3[i2]);
							     input3.setAttribute("type","text");
							     input3.setAttribute("id","bmrzw"+i2+"");
							     input3.setAttribute("class","span12 form-control");
							    label3.appendChild(input3);
							     ry3.appendChild(label3);
							   
							     }
//							      label1.append(label2.append(label3));
							  
				}
//						 						alert(gcmc.value); 
					},
					error: function(e) {
						alert("ajax数据请求失败，请重新加载！");
					}
				});
				
			}
		
		 var count = 0;
		 var arr="";
		 var brr="";
		 var crr="";
		 function add(){
		 	count = count + 1;
		 	var htmladd="";
		 	 htmladd +='<div class="form-group">';
			
			htmladd +='<div class="span4"><label for="bmxm" class="span6 control-label">报名人姓名</label><input type="text" class="span6 form-control" id="bmxm'+count+'" name="bmxm'+count+'" placeholder=""></div>';
			
			
			htmladd +='<div class="span4">';
			htmladd +='<label for="bmdh" class="span6 control-label">手机号码</label><input type="text" class="span6 form-control" id="bmdh'+count+'" name="bmdh'+count+'" placeholder="">';
			
			htmladd +='</div>';
			htmladd +='<div class="span4">';
			htmladd +='<label for="bmzw" class="span6 control-label">职务</label><input type="text" class="span6 form-control" id="bmzw'+count+'" name="bmzw'+count+'" placeholder="">';
			
			htmladd +='</div>';	
		    htmladd +='</div>';
		 	
		    
			
			$('div#ry').append(htmladd);
			
		
		 }
		 function bc(){
		 	for(i=1;i<=count;i++){
		 		var a=document.getElementById("bmxm"+i).value;
		 		var b=document.getElementById("bmdh"+i).value;
		 		var c=document.getElementById("bmzw"+i).value;
		 		arr+=a+"|";
		 		brr+=b+"|";
		 		crr+=c+"|";
		 	
		 	}
		 	var bmdw =document.getElementById("bmdw").value;
		    var bmrs =document.getElementById("bmrs").value;
		     var gcid1 =document.getElementById("gcid1").value;
		    $.ajax({
					cache: true,
					type: "POST",
					url: 'data/gmhdbm1.php',
					data: {
					bmxm:arr,
					bmdh:brr,
					bmzw:crr,
					bmdw:bmdw,
					bmrs:bmrs,
					gcid1:gcid1,	
					},
//		                },
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert("保存成功");
						window.location.reload();
					}
				});
		}
		
		var count1 =  0;
		 var ar="";
		 var br="";
		 var cr="";
		 var ar1="";
		 var br1="";
		 var cr1="";
		 function add1(){
		 	count1 = count1 + 1;
		 	var htmladd1="";
		 	 htmladd1 +='<div class="form-group">';
			
			htmladd1 +='<div class="span4"><label for="bmxma" class="span6 control-label">报名人姓名</label><input type="text" class="span6 form-control" id="bmxma'+count1+'" name="bmxma'+count1+'" placeholder=""></div>';
			
			
			htmladd1 +='<div class="span4">';
			htmladd1 +='<label for="bmdhb" class="span6 control-label">手机号码</label><input type="text" class="span6 form-control" id="bmdhb'+count1+'" name="bmdhb'+count1+'" placeholder="">';
			
			htmladd1 +='</div>';
			htmladd1 +='<div class="span4">';
			htmladd1 +='<label for="bmzwc" class="span6 control-label">职务</label><input type="text" class="span6 form-control" id="bmzwc'+count1+'" name="bmzwc'+count1+'" placeholder="">';
			
			htmladd1 +='</div>';	
		    htmladd1 +='</div>';
		 	
		    
			
			$('div#ry4').append(htmladd1);
			
		
		 }
		 function bc1(){
		 	for(i=1;i<=count1;i++){
		 		
		 		var a=document.getElementById("bmxma"+i).value;
		 		
		 		var b=document.getElementById("bmdhb"+i).value;
		 		
		 		var c=document.getElementById("bmzwc"+i).value;
		 		
		 		ar+=a+"|";
		 		br+=b+"|";
		 		cr+=c+"|";
		 	
		 	}
		 	var bb="";
		 	var cc="";
		 	var dd="";
		 	for(a=0;a<=sl;a++){
		 	var bmrxm=document.getElementById("bmrxm"+a).value;
		 	var bmrsj=document.getElementById("bmrsj"+a).value;
		 	var bmrzw=document.getElementById("bmrzw"+a).value;
		 	bb+=bmrxm+"|";
		 	cc+=bmrsj+"|"; 
		 	dd+=bmrzw+"|"; 
		 	}
		 	 ar1=bb+ar;
		 	 br1=cc+br;
		 	 cr1=dd+cr;
		 	
		 	var bmdw1 =document.getElementById("bmdw1").value;
		    var bmrs1 =document.getElementById("bmrs1").value;
		    
		    $.ajax({
					cache: true,
					type: "POST",
					url: 'data/gmhdbm1a.php',
					data: {
					bmxm1:ar1,
					bmdh1:br1,
					bmzw1:cr1,
					bmdw1:bmdw1,
					bmrs1:bmrs1,
					gcid1:gcid4,	
					},
//		                },
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert(data);
						window.location.reload();
					}
				});
		}
		 	</script>
		 	<script type="text/javascript">
			function bmqy(id){
			
			var gcid1=document.getElementById("gcid1");
				gcid1.value=id;
//			$.ajax({
//					type:"POST",
//					url:"data/gmhdbm2.php",
//					data:{
//						gcid1:gcid1.value
//					},
//					dataType : "json",
//					timeout: 10000,
// 					success : function(data){
//						var length = data.length;			
// 						for (var i=0;i<length-1;i++) {
// 							bmdw.value = data[i].会员单位;
//							bmrs.value = data[i].报名人数;
//							
//							
//							
//				}
////						 						alert(gcmc.value); 
//					},
//					error: function(e) {
//						alert("ajax数据请求失败，请重新加载！");
//					}
//				});
			}
			
				</script>
</body> 
      </html>	