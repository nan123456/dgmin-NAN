<!DOCTYPE html>
<?php
session_start();
?>
<html class="no-js">
	<body>
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
</body> 
      </html>	