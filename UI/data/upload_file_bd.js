cessid = ''
accesskey = ''
host = ''
policyBase64 = ''
signature = ''
callbackbody = ''
filename = ''
key = ''
expire = 0
g_object_name = ''
g_object_name_type = ''
now = timestamp = Date.parse(new Date()) / 1000;
body=''

//获取选择那种上传方式
function check_object_radio() {
    var tt = document.getElementsByName('myradio');
    for (var i = 0; i < tt.length ; i++ )
    {
        if(tt[i].checked)
        {
            g_object_name_type = tt[i].value;
            break;
        }
    }
}

function get_signature()
{
    //可以判断当前expire是否超过了当前时间,如果超过了当前时间,就重新取一下.3s 做为缓冲
    now = timestamp = Date.parse(new Date()) / 1000; 
    if (expire < now + 3)
    {
		$.ajax({
			type:"post",
//			url:"test_0.php",
			url:"http://files.mall126.com/files/aliyunoss/imgSign?path=dgjx&user=sunxiaofeng&pass=54107fb410807287059f28e2e54145a4",
//			url:"test_getossClient.php",
			dataType:"json",

			success:function(data){
				/*
				retcode->1
				msg->请求成功
				fileNm->101020171102152343614505
				sign->[object Object]
				rootUrl->http://mor-eyoo.img-cn-shenzhen.aliyuncs.com
				*/
				/*sign->[object Object]
				accessid->LsBbv8YlGb6GAw3h
				host->http://mor-eyoo.oss-cn-shenzhen.aliyuncs.com
				policy->eyJleHBpcmF0aW9uIjoiMjAxNy0xMS0wMlQxNTozNDoyN1oiLCJjb25kaXRpb25zIjpbWyJjb250ZW50LWxlbmd0aC1yYW5nZSIsMCwxMDQ4NTc2MDAwXSxbInN0YXJ0cy13aXRoIiwiJGtleSIsImRnanhcLyJdXX0=
				signature->6en0hD/ddclZDs1uYSLmGhHlEhc=
				expire->1509608067
				callback->eyJjYWxsYmFja1VybCI6Imh0dHA6XC9cL2ZpbGVzLm1hbGwxMjYuY29tXC9maWxlc1wvYWxpeXVub3NzdmFsaWRcL3ZhbGlkYXRlIiwiY2FsbGJhY2tCb2R5IjoiZmlsZW5hbWU9JHtvYmplY3R9JnNpemU9JHtzaXplfSZtaW1lVHlwZT0ke21pbWVUeXBlfSZoZWlnaHQ9JHtpbWFnZUluZm8uaGVpZ2h0fSZ3aWR0aD0ke2ltYWdlSW5mby53aWR0aH0iLCJjYWxsYmFja0JvZHlUeXBlIjoiYXBwbGljYXRpb25cL3gtd3d3LWZvcm0tdXJsZW5jb2RlZCJ9
				dir->dgjx 
				*/
				//上传文件夹设定
				body = data['sign'];
				body['dir'] = body['dir'] + "\/" +"hyupload" + "\/"; //这样才得到路径：dgjx/hyupload/;"\/"指"/";
				
				
//					alert(body);
			},			
			error:function(x,s,t){
				alert("ajax error!");
				console.log(s);
			}
		});		
//		alert(body+"dd");
		var obj = body;
        host = obj['host']
        policyBase64 = obj['policy']
        accessid = obj['accessid']
        signature = obj['signature']
        expire = parseInt(obj['expire'])
//      callbackbody = obj['callback'] 
        key = obj['dir']
        
        return true;
    }
    return false;
};

function random_string(len) {
　　len = len || 32;
　　var chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678';   
　　var maxPos = chars.length;
　　var pwd = '';
　　for (i = 0; i < len; i++) {
    　　pwd += chars.charAt(Math.floor(Math.random() * maxPos));
    }
    return pwd;
}

function get_suffix(filename) {
    pos = filename.lastIndexOf('.')
    suffix = ''
    if (pos != -1) {
        suffix = filename.substring(pos)
    }
    return suffix;
}

function calculate_object_name(filename)
{
   
    {
        suffix = get_suffix(filename)
        g_object_name = key + random_string(10) + suffix
    }
    return ''
}

function get_uploaded_object_name(filename)
{
   
    {
        return g_object_name
    }
}

function set_upload_param(up, filename, ret)
{
    if (ret == false)
    {
        ret = get_signature()
    }
    g_object_name = key;
    if (filename != '') {
        suffix = get_suffix(filename)
        calculate_object_name(filename)
    }
    new_multipart_params = {
        'key' : g_object_name,
        'policy': policyBase64,
        'OSSAccessKeyId': accessid, 
        'success_action_status' : '200', //让服务端返回200,不然，默认会返回204
        'callback' : callbackbody,
        'signature': signature,
        'Content-Disposition' : 'attachment;'//加http头,添加这一句代码为了以后的href可以下载
//      'Content-Language' : 'zh-CN',
//      'Cache-Control' : 'utf-8',
    };

	
    up.setOption({
        'url': host,
        'multipart_params': new_multipart_params,
        
    });
	
    up.start();
}

var uploader = new plupload.Uploader({//这个冲突了
	runtimes : 'html5,flash,silverlight,html4',
	browse_button : 'myfile', 
    multi_selection: true,//多张上传为true
	container: document.getElementById('container'),

    url : 'http://oss.aliyuncs.com',

    filters: {
        mime_types : [ //只允许上传图片文件
        { title : "Image files", extensions : "jpg,gif,png,bmp" }, 
        { title : "PDF files", extensions : "pdf" },
        
        ],
        max_file_size : '2mb', //最大只能上传2mb的文件
        prevent_duplicates : true //不允许选取重复文件
    },

	init: {
		PostInit: function() {
			
			//上传按钮点击事件
			document.getElementById('postfiles').onclick = function() {
	            set_upload_param(uploader, '', false);
	            return false;
			};
		},
		//选择文件
		FilesAdded: function(up, files) {
			plupload.each(files, function(file) {
				document.getElementById('ossfile').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ')<b></b>'
				+'<div class="progress"><div class="progress-bar" style="width: 0%"></div></div>'
				+'</div>';
			});
		},
		//上传前文件名设置,获取临时端口
		BeforeUpload: function(up, file) {
            check_object_radio();
            set_upload_param(up, file.name, true);
        },
		//上传中
		UploadProgress: function(up, file) {
			var d = document.getElementById(file.id);
			d.getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            var prog = d.getElementsByTagName('div')[0];
			var progBar = prog.getElementsByTagName('div')[0]
			progBar.style.width= 2*file.percent+'px';
			progBar.setAttribute('aria-valuenow', file.percent);
		},
		//上传完后
		FileUploaded: function(up, file, info) {
            if (info.status == 200)
            {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = 'upload to oss success, object name:' + get_uploaded_object_name(file.name);
                
                
                geturl = host+"/"+get_uploaded_object_name(file.name);
                var furl = document.getElementById("furl");
                furl.value += geturl+"||";
                  

               
            }
            else
            {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = info.response;
            }
            alert(geturl);
          
		},
		Error: function(up, err) {
            if (err.code == -600) {
                document.getElementById('console').appendChild(document.createTextNode("\n选择的文件太大了,可以根据应用情况，在upload.js 设置一下上传的最大大小"));
            }
            else if (err.code == -601) {
                document.getElementById('console').appendChild(document.createTextNode("\n选择的文件后缀不对,可以根据应用情况，在upload.js进行设置可允许的上传文件类型"));
            }
            else if (err.code == -602) {
                document.getElementById('console').appendChild(document.createTextNode("\n这个文件已经上传过一遍了"));
            }
            else 
            {
                document.getElementById('console').appendChild(document.createTextNode("\nError xml:" + err.response));
            }
		}
	}
});

uploader.init();





