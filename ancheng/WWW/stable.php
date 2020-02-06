<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap 实例</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"  rel ="stylesheet" type = "text/css" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
   
   
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="jquery.js"></script>
  
  
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"> </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/js/bootstrap-dialog.min.js"></script>
    
    
   <script type="text/javascript">
      window.onload = function(){
	   document.getElementById("add").onclick = addGoods;
	   //document.getElementById("search").onclick = searchGoods;
	   document.getElementById("search").onclick = searchGoods;
	   document.getElementById("btn_submit").onclick = submitgoods;
	   document.getElementById("pre").onclick = showPre;
	   document.getElementById("next").onclick = showNext;
	   var Huser = ReadCookie("user");
	   //if(Huser ==""){
		 //  window.location.href='login.html';
		   //}
	   $.post("RchangePage.php",{user:Huser, page:1},function(data){
		    var str = data.split('!');
		   $('#mytable').append(str[2]);});
	   document.getElementById("btn_submit1").onclick =  addPart; 
	   document.getElementById("btn_submit2").onclick = outPart;
	   document.getElementById("btn_submit3").onclick = fixPart;
	   document.getElementById("shows").onclick = function(){
		   method5('mytable');
		   };
   };
   var tempR = "";
   var tempS = "";
   var tempX = "";
   function openPut(Id){
	   tempR = Id;
	   var page = $('#current').html();
	   var temp = tempR;
	   var id = temp.substring(1,temp.length);
	   $.post('RgetDefault.php',{id:id, page:page},function(data){
		   var str = data.split('!');
		   document.getElementById("Rdate").defaultValue = str[0];
		   document.getElementById("Rshop").defaultValue = str[1];
		   document.getElementById("Rprice").defaultValue = str[2];
		   document.getElementById("Rnum").defaultValue = str[3];
		   $("#myModalLabel1").text("修改信息");
           $('#myModal1').modal();
		   });
	   }
	   
   function openOut(Id){
	   var page = $('#current').html();
	   tempS = Id;
	   $("#myModalLabel2").text("删除入库单");
       $('#myModal2').modal();
	   }
   
   function openFix(Id){
	   var page = $('#current').html();
	   tempX = Id;
	   var temp = Id;
	   var id = temp.substring(1,temp.length);
	   $.post("getDefault.php",{id:id},function(data){
		   var str = data.split('!');
		   document.getElementById("Xname").defaultValue = str[0];
		   document.getElementById("Xnums").defaultValue = str[1];
		   document.getElementById("Xtype").defaultValue = str[2];
		   });
	   $("#myModalLabel3").text("修改库存");
       $('#myModal3').modal();
	   }  
   
   function addPart(){
	    var page = $('#current').html();
	    var temp = tempR;
	    var id = temp.substring(1,temp.length);
	    var user = ReadCookie("user");
	    var date = document.getElementById("Rdate").value;
	    var shop = document.getElementById("Rshop").value;
	    var price = document.getElementById("Rprice").value;
	    var num = document.getElementById("Rnum").value;
		if(date ==""){
			alert('请填写入库时间！');
			return;
			}
		if(shop ==""){
			alert('请填写供应商！');
			return;
			}
		if(price ==""){
			alert('请填写入库价格！');
			return;
			}
		if(num ==""){
			alert('请填写数量！');
			return;
			}
	    $.post("Raddpart.php",{user:user, id:id, date:date, shop:shop, price:price, num:num, page:page},function(data){
			deleteRow();
		       $('#mytable').append(data);
		       alert('修改成功！');
			   //location.reload();
			});
	   }
   function outPart(){
	   var temp = tempS;
	   var id = temp.substring(1,temp.length);
	   var user = ReadCookie("user");
	   var page = $('#current').html();
	   $.post('Rdelete.php',{id:id, user:user, page:page},function(data){
		    deleteRow();
		    $('#mytable').append(data);
		    alert('删除成功！');
			//location.reload();
		   });
	   }
   
   function fixPart(){
	   var user = ReadCookie("user");
	   var temp = tempX;
	   var id = temp.substring(1,temp.length);
	   var name = document.getElementById("Xname").value;
	   var nums = document.getElementById("Xnums").value;
	   var type = document.getElementById("Xtype").value;
	   var page = $('#current').html();
	   if(name ==""){
		   alert('货物名不能为空！');
		   return;
		   }
	    if(nums ==""){
			alert("货物数量不能为空！");
			return;
			}
		if(type ==""){
			alert('货物类型不能为空！');
			return;
			}
		$.post("fixPart.php",{id:id, name:name, type:type, page:page, user:user, num:nums},function(data){
			deleteRow();
		    var str = data.split('!');
			//var ss = str[0];
		    $('#mytable').append(data);
			alert('修改成功！');
			location.reload();
			});
	   }
      
   function showPre(){
	   var Huser = ReadCookie("user");
	   var page = $('#current').html();
	   if(page ==1){return;}
	   $('#current').html(parseInt(page)-1);
	   $.post("RchangePage.php",{user:Huser, page:page-1},function(data){
		   var mytab = document.getElementById("mytable");
		   var len = mytab.rows.length ;
		   for(var i=len-1;i>0;i--){
			   mytab.deleteRow(i);
			   }
		   var str = data.split('!');
		   $('#current').html(str[1]);
		   $('#mytable').append(str[2]);});
	   }
   function showNext(){
	   var Huser = ReadCookie("user");
	   var page = $('#current').html();
	   //if(page ==1){return;}
	   $('#current').html(parseInt(page)+1);
	   $.post("RchangePage.php",{user:Huser, page:parseInt(page)+1},function(data){
		   var mytab = document.getElementById("mytable");
		   var len = mytab.rows.length ;
		   for(var i=len-1;i>0;i--){
			   mytab.deleteRow(i);
			   }
		   //if(data[0] ==0){
			   //$('#current').html(parseInt(page));
			   //data = substr(data,1);
			   //return;
			   //}
		   var str = data.split('!');
		   $('#current').html(str[1]);
		   $('#mytable').append(str[2]);});
	   }
	   
   function deleteRow(){
	   var mytab = document.getElementById("mytable");
		   var len = mytab.rows.length ;
		   for(var i=len-1;i>0;i--){
			   mytab.deleteRow(i);
			   }
	   }
   
   function submitgoods(){
	   var Huser = ReadCookie("user");
	   var Rsno = document.getElementById("Rsno").value;
	   var Hsno = document.getElementById("Hsno").value;
	   var Csno = document.getElementById("Csno").value;
	   var Hname = document.getElementById("Hname").value;
	   var Hprice = document.getElementById("Hprice").value;
	   var Hshop = document.getElementById("Hshop").value;
	   var Hdate = document.getElementById("Hdate").value;
	   var Hnum = document.getElementById("Hnum").value;
	   var Htype = document.getElementById("Htype").value;
	   var page = document.getElementById("current").innerHTML;
	   $.post('Hadd.php',{Huser:Huser, Rsno:Rsno, Hsno:Hsno, Csno:Csno, Hname:Hname, Hprice:Hprice, Hshop:Hshop, Hdate:Hdate, Hnum:Hnum, Htype:Htype, page:page},function(data){
		   var table = document.getElementById("mytable");
		   var str = data.split('!');
		   if(str[0] ==0){
			   alert('单号已存在！');
			   return;
			   }
		   if(str[1] ==0){
			   alert('请填写货物货物编号！');
			   return;
			   }
		   if(str[2] ==0){
			   alert('你没有该仓库，请重新填写！');
			   return;
			   }
		   if(str[3] ==0){
			   alert('请填写货物名称！');
			   return;
			   }
		   if(str[4] ==0){
			   alert('请填写货物价格！');
			   return;
			   }
		   if(str[5] ==0){
			   alert('请填写供应商！');
			   return;
			   }
		   if(str[6] ==0){
			   alert('请填入库时间！');
			   return;
			   }
		   if(str[7] ==0){
			   alert('请填写货物数量！');
			   return;
			   }
		   deleteRow();
		   //alert('入库成功！');
		   $('#mytable').append(str[8]);
		   alert('入库成功！');
		   });
	   /*
	   var xhr = new XMLHttpRequest();
	   xhr.open("GET","Hsearch.php?Huser="+Huser+"&Hsno="+Hsno+"&Csno="+Csno+"&Hname="+Hname+"&Hnum="+Hnum+"&Htype="+Htype+"&Rsno="+Rsno+"&Hprice="+Hprice+"&Hdate="+Hdate+"&Hshop="+Hshop,true);
	   xhr.send(null);
	   xhr.onreadystatechange = function(){
		   if(xhr.readyState == 4 && xhr.status == 200){
			   //document.getElementById("shows").innerHTML = "你好"+xhr.responseText+"你好"+Huser; 
			   if(xhr.responseText == 1){
				   alert('入库成功！');
				   location.href = "ma_user.html";
				   //document.getElementById("shows").innerHTML = "你好"+xhr.responseText+"你好"+Huser;
				   }
			   else{
				   alert('入库失败！');
				   }
			   }
		   }; */
		 
	   }
   
   function searchGoods(){
	   var text = $('#findText').val();
	   var Huser = ReadCookie("user");
	   $.post('Rsearch.php',{text:text ,user:Huser},function(data){
		   var mytab = document.getElementById("mytable");
		   var len = mytab.rows.length ;
		   for(var i=len-1;i>0;i--){
			   mytab.deleteRow(i);
			   }
		   $('#mytable').append(data);
		   });
	   }
   
   function addGoods(){
	   $("#myModalLabel").text("货物入库");
       $('#myModal').modal();
	   
	   }
	   
   function ReadCookie(cookieName) {
       var theCookie = "" + document.cookie;
       var ind = theCookie.indexOf(cookieName);
       if(ind==-1 || cookieName=="") {
        return ""
      };
       var ind1 = theCookie.indexOf(';',ind);
        if(ind1==-1) {
        ind1 = theCookie.length;
       };
    /*读取Cookie值*/
       return unescape(theCookie.substring(ind+cookieName.length+1,ind1));
      } 
	  
		   var idTmr;

        function getExplorer() {
            var explorer = window.navigator.userAgent;
            //ie  
            if(explorer.indexOf("MSIE") >= 0) {
                return 'ie';
            }
            //firefox  
            else if(explorer.indexOf("Firefox") >= 0) {
                return 'Firefox';
            }
            //Chrome  
            else if(explorer.indexOf("Chrome") >= 0) {
                return 'Chrome';
            }
            //Opera  
            else if(explorer.indexOf("Opera") >= 0) {
                return 'Opera';
            }
            //Safari  
            else if(explorer.indexOf("Safari") >= 0) {
                return 'Safari';
            }
        }

        function method5(tableid) {
            if(getExplorer() == 'ie') {
                var curTbl = document.getElementById(tableid);
                var oXL = new ActiveXObject("Excel.Application");
                var oWB = oXL.Workbooks.Add();
                var xlsheet = oWB.Worksheets(1);
                var sel = document.body.createTextRange();
                sel.moveToElementText(curTbl);
                sel.select();
                sel.execCommand("Copy");
                xlsheet.Paste();
                oXL.Visible = true;

                try {
                    var fname = oXL.Application.GetSaveAsFilename("Excel.xls",
                        "Excel Spreadsheets (*.xls), *.xls");
                } catch(e) {
                    print("Nested catch caught " + e);
                } finally {
                    oWB.SaveAs(fname);
                    oWB.Close(savechanges = false);
                    oXL.Quit();
                    oXL = null;
                    idTmr = window.setInterval("Cleanup();", 1);
                }

            } else {
                tableToExcel(tableid)
            }
        }

        function Cleanup() {
            window.clearInterval(idTmr);
            CollectGarbage();
        }
        var tableToExcel = (function() {
            var uri = 'data:application/vnd.ms-excel;base64,',
                template = '<html><head><meta charset="UTF-8"></head><body><table  border="1">{table}</table></body></html>',
                base64 = function(
                    s) {
                    return window.btoa(unescape(encodeURIComponent(s)))
                },
                format = function(s, c) {
                    return s.replace(/{(\w+)}/g, function(m, p) {
                        return c[p];
                    })
                }
            return function(table, name) {
                if(!table.nodeType)
                    table = document.getElementById(table)
                var ctx = {
                    worksheet: name || 'Worksheet',
                    table: table.innerHTML
                }
                window.location.href = uri + base64(format(template, ctx))
            }
        })()
  </script>
  
  <style type="text/css">
     tr,td,th { text-align:center; font-size:9px; line-height:15px;}
  </style>
</head>
<body>

<div class="container">
   <div class="input-group mb-3" style="padding-top:50px; width:400px; margin:0 auto;">
     <input type="text" class="form-control" placeholder="入库单号/仓库号/货物编号/供应商等/模糊查询" id="findText">
     <div class="input-group-append" style="margin:0 auto; width:150px; margin-top:20px;">
      <button type="button" class="btn btn-success" style="margin-top:20px;" id="search">搜索</button>
      <button type="button" class="btn btn-success" style="margin-top:20px;" id="add">添加</button>
     </div>
  </div>
  
  <div style="margin:0 auto; width:120px;">
         <p class="text-muted" id="shows" style="font-size:18px; text-decoration:underline;">生成报表</p> 
  </div>      
  <table class="table table-bordered" id="mytable">
    <thead>
      <tr>
        <th>序号</th>
        <th>入库时间</th>
        <th>入库单号</th>
        <th>仓库号</th>
        <th>货物编号</th>
        <th>供应商</th>
        <th>货物价格</th>
        <th>货物数量</th>
        <th>操作</th>
      </tr>
    </thead>
    <!--
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>Doe</td>
        <td>Doe</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td>Doe</td>
        <td>Doe</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td>Doe</td>
        <td>Doe</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td>Doe</td>
        <td>Doe</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td>Doe</td>
        <td>Doe</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td>Doe</td>
        <td>Doe</td>
        <td>Doe</td>
      </tr>
    </tbody>
    -->
</table>
   <div class="container" style=" margin:0 auto; width:250px;">             
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#" id="pre">上一页</a></li>
        <!-- <li class="page-item"><a class="page-link" href="#">1</a></li> -->
        <li class="page-item active"><a class="page-link" href="#" id="current">1</a></li>
        <!--
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        -->
       <li class="page-item"><a class="page-link" href="#" id="next">下一页</a></li>
      </ul>
   </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h4 id="myModalLabel" style="text-align:left;">新增</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                     
                    <div class="form-group">
                        <label for="txt_departmentname">入库单号</label>
                        <input type="text" name="txt_departmentname" class="form-control" id="Rsno" placeholder="入库单号/必填">
                    </div> 
                     <div class="form-group">
                        <label for="txt_parentdepartment">入库仓号</label>
                        <input type="text" name="txt_parentdepartment" class="form-control" id="Csno" placeholder="所属仓库/必填">
                    </div>
                    <div class="form-group">
                        <label for="txt_departmentname">货物编号</label>
                        <input type="text" name="txt_departmentname" class="form-control" id="Hsno" placeholder="货物编号/必填">
                    </div>
                    <div class="form-group">
                        <label for="txt_departmentlevel">货物名称</label>
                        <input type="text" name="txt_departmentlevel" class="form-control" id="Hname" placeholder="货物名称/必填">
                    </div>
                    <div class="form-group">
                        <label for="txt_statu">入库价格</label>
                        <input type="text" name="txt_statu" class="form-control" id="Hprice" placeholder="入库价格/必填">
                    </div>
                    <div class="form-group">
                        <label for="txt_statu">供应商</label>
                        <input type="text" name="txt_statu" class="form-control" id="Hshop" placeholder="供应商/必填">
                    </div>
                    <div class="form-group">
                        <label for="txt_statu">入库时间</label>
                        <input type="text" name="txt_statu" class="form-control" id="Hdate" placeholder="入库时间/必填">
                    </div>
                    <div class="form-group">
                        <label for="txt_statu">货物数量</label>
                        <input type="text" name="txt_statu" class="form-control" id="Hnum" placeholder="货物数量/必填">
                    </div>
                    <div class="form-group">
                        <label for="txt_statu">货物类型</label>
                        <input type="text" name="txt_statu" class="form-control" id="Htype" placeholder="货物类型">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>关闭</button>
                    <button type="button" id="btn_submit" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>保存</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h4 id="myModalLabel1" style="text-align:left;">新增</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                     
                    <div class="form-group">
                        <label for="txt_departmentname">入库时间</label>
                        <input type="text" name="txt_departmentname" class="form-control" id="Rdate" placeholder="入库时间/必填">
                    </div> 
                     <div class="form-group">
                        <label for="txt_parentdepartment">供应商</label>
                        <input type="text" name="txt_parentdepartment" class="form-control" id="Rshop" placeholder="供应商/必填">
                    </div>
                    <div class="form-group">
                        <label for="txt_departmentname">入库价格</label>
                        <input type="text" name="txt_departmentname" class="form-control" id="Rprice" placeholder="入库价格/必填">
                    </div>
                    <div class="form-group">
                        <label for="txt_departmentlevel">入库数量</label>
                        <input type="text" name="txt_departmentlevel" class="form-control" id="Rnum" placeholder="入库数量/必填">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>关闭</button>
                    <button type="button" id="btn_submit1" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>保存</button>
                </div>
            </div>
        </div>
    </div>
    
    
       <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h4 id="myModalLabel2" style="text-align:left;">新增</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                     
                    <div class="form-group">
                        <label for="txt_departmentname">确定删除此入库单号！</label>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>关闭</button>
                    <button type="button" id="btn_submit2" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>确认</button>
                </div>
            </div>
        </div>
    </div>
    
    
   <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h4 id="myModalLabel3" style="text-align:left;">新增</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                     
                    <div class="form-group">
                        <label for="txt_departmentname">货物名</label>
                        <input type="text" name="txt_departmentname" class="form-control" id="Xname" placeholder="需要请修改">
                    </div> 
                     <div class="form-group">
                        <label for="txt_parentdepartment">货物数量</label>
                        <input type="text" name="txt_parentdepartment" class="form-control" id="Xnums" placeholder="需要请修改">
                    </div>
                    <div class="form-group">
                        <label for="txt_departmentname">货物类型</label>
                        <input type="text" name="txt_departmentname" class="form-control" id="Xtype" placeholder="需要请修改">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>关闭</button>
                    <button type="button" id="btn_submit3" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>保存</button>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>