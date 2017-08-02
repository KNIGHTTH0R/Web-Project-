<html>
    <head>
        <title>Upload Image using form</title>
       <!--  <link rel="stylesheet" href="style.css" /> -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="script.js"></script>
    </head>
    <body> 
        <div id="mainform">
            <div id="innerdiv">
                <br><br>
                <h2>Upload Product Image</h2>
                <!-- Required div starts here -->
                <div id="formdiv">
                    <h3></h3><br/>
                    <form id="form" method="post"enctype="multipart/form-data">

                        <div id="upload">
                            <input type="file" name="file" id="file"/>
                        </div>
                        <br/>
                        <input type="submit" id="submit" name="submit" value="Upload"/>
                    </form>
                    <div id="detail"><b>Note:</b><br/><ul><li>To Choose file Click on folder.</li>
                            <li>You can upload- <b>images(jpeg,jpg,png).</b></li><li>Image should be less than 100kb in size.</li></ul></div>
                
                </div>	
                <div id="clear"></div>
                <div id="preview"><img id="previewimg" src="" /><img id="deleteimg" src="delete.png" />
                     <span class="pre">IMAGE PREVIEW</span></div>
                <div id="message">
                    <?php include 'upload1.php';?>                    
                </div>
                </div>
            <!-- Right side div -->
            <!-- <div id="formget"><a href=http://www.formget.com/app><img src="formget.jpg" alt="Online Form Builder"/></a>
            </div> -->
        </div>
    </body>
</html>
