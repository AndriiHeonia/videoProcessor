<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/uploadify.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/uploadify/swfobject.js"></script>
        <script type="text/javascript" src="js/uploadify/jquery.uploadify.v2.1.4.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
              $('#movie').uploadify({
                'uploader'  : 'flash/uploadify.swf',
                'script'    : 'VideoProcessingApplication.php',
                'cancelImg' : 'images/cancel.png',
                'folder'    : 'videos',
                'auto'      : true,
                'fileDataName' : 'movie'
              });
            });
        </script>
    </head>
    <body>
		<input id="movie" name="movie" type="file" />
    </body>
</html>