<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Accounts</title>
  <script type='text/javascript' src="js/jquery-3.3.1.min.js"></script>
  		<link rel="icon" href="img/favicon.ico">
		<!-- CSS FILES -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style2.css">
</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION['U_id'])) {
  ?>
    <style media="screen">
      .adduser {
        float: left;
        margin-top: 20px;
        margin-bottom: -39px;
        margin-left: 18px;
      }
	  .uk-navbar-container{
		  background-color:#2d2d2d  !important;
	  }
	  *{
	font-family: "Hacen", Tunisia Lt_0 !important;
  }
  @font-face {
	  font-family: 'Hacen';
	  src:url('fonts/Hacen Tunisia_0.ttf');
  }

    </style>

    <div id="content" data-uk-height-viewport="expand: true" style="background-color:white;">

  <nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav uk-margin-left" >
            <li><a href="add.php" style="color:white;">إضافة حساب<span data-uk-icon="plus-circle" style="margin-left: 3px;"></span></a></li>
        </ul>

    </div>
    <div class="uk-navbar-right ">

        <ul class="uk-navbar-nav">
           <li>  <form class="uk-search uk-search-default" style="margin-top: 10px;width: auto;margin-bottom: 10px;right: 52px;" method="POST">
            <span uk-search-icon></span>
            <input class="uk-search-input" type="search" style="border-radius: 16px;" id="search_text" name="search_text" placeholder="أبحث عن حساب" dir="rtl" autofocus>
          </form></li>
        </ul>
    </div>
</nav>

        <div class="uk-container" dir="rtl">
          <div id="result"></div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.7/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.7/js/uikit-icons.min.js"></script>
</body>
<?php } else {
    header("Location:login.php");
  }
?>

</html>
<script language="JavaScript" type="text/javascript">
  function checkDelete() {
    return confirm('هل تريد بالتأكيد حذف الحساب؟');
  }
</script>
<script>
  $(document).ready(function() {
    load_data();

    function load_data(query) {
      $.ajax({
        url: "fetch_accounts.php",
        method: "POST",
        data: {
          query: query
        },
        success: function(data) {
          $('#result').html(data);
        }
      });
    }
    $('#search_text').keyup(function() {
      var search = $(this).val();
      if (search != '') {
        load_data(search);
      } else {
        load_data();
      }
    });
  });
</script>