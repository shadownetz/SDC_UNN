<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<?php

        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "sdc";
        $db = mysqli_connect($host,$user,$pass,$database);

        if(!empty($_POST["senders_message"])){

            $messageSender = $_COOKIE["uname"];
            $newmessage = mysqli_real_escape_string($db, $_POST["senders_message"]);

            $my_query = "INSERT INTO public_messages ( Sender, Message ) VALUES ('$messageSender','$newmessage')";

            if($run = mysqli_query(db,$my_query)){
              echo "<embed loop='false' src='sound.wav' autoplay='true' hidden='true'/>";
            }
          }
        ?>
<br><br>
  <body>
	
<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
	
	<div class="posts">
		<div class="container">

			<h2 style="text-align:center;">General Posts</h2>

			<div class="container-fluid" id="main_content">

            <div style="display:none">
            <form method="post" action="" enctype="multipart/form-data">
              <input type="file" name="file" id="my_upload_file"/>
              <input type="submit" name="upload_file" id="upload_file"/>
            </form>
            </div>

      <div class="row">

      <div id="Main_Chat_Box" class="col-md-8">
        <br>
        <div id="get_chatting_user_name">
          <div style="font-weight:bold;font-size:1.2em;float:left;color:rgba(69, 162, 255, 0.93)">General Chats</div>
          <div style="float:right"><img src="../img/upload.png" id="btn_upload" style="cursor:hand;margin-right:15px; margin-top:-10px" height=35px width=35px title="Click here to upload file"/></div>
          <br>
        </div>
        <hr>
      <div id="get_chat_logs">


      </div>

      </div>

      <div id="Right_side_bar" class="col-md-3">

      </br>
        <div><span class="right_side_logo"> Today <hr></span>
          <div class="calendar"></div>
        </div>
        <br>

        <div><span class="right_side_logo"> Uploads </span> <hr></div>
        <div id="get_uploads">

      </div>

      </div>

    </div>

    </div>
		</div>
		

		<div id="get_chat_logs">


		</div>
			<div class="col-md-12">

				<form action="" id="form_send_message">
					<div class="form-group">
                           <input type="text" id="text_area" name="text_area" placeholder="Type Something Here" class="form-control" required="required">
                    </div>
					<button id="btn_Send"><img src="../img/send.png" alt="Send Image" id="send_button"/></button>
				</form>
			</div>
	</div>
		
</div>
</div>
</div>
         <!-- /. PAGE WRAPPER  -->
<?php include("includes/footer.php"); ?>
<script>

$("#send_button").click(function(){
    $("#btn_Send").trigger("click");
    });

$("#btn_Send").click(function(){
      var message = $("#text_area").val();
      $.ajax({
        method:"POST",
        url:"",
        data:{senders_message:message},
      });
    });
	
function get_messages(){
     var old_scroll_height = $("#get_chat_logs").attr("scrollHeight") - 20;
     $.ajax({
        url: "chat.php",
        cache: false,
        success: function(html){
            $("#get_chat_logs").html(html);
            //updateScroll();
        },
    });
   }
   
   window.setInterval(function() {
      var elem = document.getElementById('get_chat_logs');
      elem.scrollTop = elem.scrollHeight;
    });

</script>