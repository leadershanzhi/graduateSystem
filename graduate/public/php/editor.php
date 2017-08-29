<!DOCUMENT TYPE>
<html>

<head>

   <meta http-equiv="Content-type" content="text/html; charset=gbk">

   <title>CKEditor</title>
<script type="text/javascript" src='js/jquery.js'></script>
<script src="ckeditor/ckeditor.js"></script>

</head>

<body>


   <table width="80%" align="center">
  <tr>
    <td><select>
        <option>成绩信息</option>
        <option>通知信息</option>
        </select></td>
  </tr>
  <tr>
    <td><form action="b.php" method="post">

   <textarea name="editor1"></textarea>

   <input type="submit" value="登录"/>

   </form></td>
    
  </tr>
</table>
   

</body>

 
<script type="text/javascript">

   // 启用 CKEitor 的上传功能，使用了 CKFinder 插件

   CKEDITOR.replace( 'editor1', {

   filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

   filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',

   filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',

   filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

   filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

   filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

   });

</script>

</html>