<?php
include('conection.php');
$caractere=array("computer","Electrical","Mechanical");
$total_row=get_total_rows($pdo);
$output='';
if($total_row > 0)
{
foreach($caractere as $row)
{
$query="select * from objet_voter where caractere='".$row."'";
$res=$pdo->prepare($query);
$res->execute();
$total_row_v=$res->rowCount();
$prsg_vote=round(($total_row_v/$total_row)*100);
$prg_bar_class='';
if($prsg_vote>=40)
{
    $prg_bar_class='progress-bar-succes';  
}
else if($prsg_vote>=25 && $prsg_vote<40)
{
    $prg_bar_class='progress-bar-info';
}
else if($prsg_vote>=10 && $prsg_vote<25)
{
    $prg_bar_class='progress-bar-warning';
}
else
{
    $prg_bar_class='progress-bar-danger';
}
$output .= '
   <div class="row">
    <div class="col-md-2" align="right">
     <label>'.$row.'</label>
    </div>
    <div class="col-md-10">
     <div class="progress">
      <div class="progress-bar '.$progress_bar.'" role="progressbar" aria-valuenow="'.$prsg_vote.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$prsg_vote.'%">
       '.$prsg_vote.' % programmer like <b>'.$row.'</b>  caractere
      </div>
     </div>
    </div>
   </div>
  ';
}
}
echo $output;

?>
<script>
$(document).ready(function() {


    $('#vote_form').on('submit', function(event) {
        event.preventDefault();
        var vote_option = '';
        $('.vote_option').each(function() {
            if ($(this).prop("checked")) {
                vote_option = $(this).val();
            }
        });
        if (vote_option != '') {
            $('#vote_button').attr("disabled", "disabled");
            var form_data = $(this).serialize();
            $.ajax({
                data: form_data,
                success: function(data) {
                    $('#vote_form')[0].reset();
                    $('#vote_button').attr('disabled', false);
                    fetch_poll_data();
                    alert("vote Submitted Successfully");
                }
            });
        } else {
            alert("Please Select Option");
        }
    });

});
</script>
<script>
$(document).ready(function() {

    fetch_vote_data();

    function fetch_vote_data() {
        $.ajax({

            success: function(data) {
                $('#res_vote').html(data);
            }
        })
    }

});
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<style type="text/css">
body {
    background-image: url(images/bg-01.jpg);
    background-size: cover;
    background-attachment: fixed;
}

div.div1 {
    margin: 30px;
    border: 4px solid black;
    margin-left: 350px;
    margin-right: 90px;
    width: 550px;
    height: 370px;
    padding-left: 30PX;
}

label {
    padding-right: 100px;
    padding-left: 100px;
    padding-top: 10px;
}
</style>

<body>

    <div class="content">
        <div class="div1">
            <form action="" method="post" id="vote_form">
                <p>
                    <img src="images/computer.png" alt="100" width="100" height="100">
                    <font color="red"><label for="">Computer</label></font>
                    <input type="radio" value="vote" class="vote_option" width="50px" height="50px">
                </p>
                <br>
                <p>
                    <img src="images/electrical.png" alt="100" width="100" height="100">

                    <centre>
                        <font color="red"><label for="">Electrical</label></font>
                    </centre>
                    <input type="radio" value="vote" class="vote_option" width="50px" height="50px">
                </p>
                <br>

                <p>
                    <img src="images/mechanic.jpg" alt="100" width="100" height="100">

                    <centre>
                        <font color="red"><label for="">Mechanical</label></font>
                    </centre>
                    <input type="radio" value="vote" class="vote_option" width="50px" height="50px">
                </p>
                <input type="submit" name="vote_button" id="vote_button" class="btn btn-primary" />
            </form>
            <br />
        </div>
        <div class="col-md-6">
            <br />
            <br />
            <br />
            <h1> resulta du vote </h1>
            <div id="res_vote"></div>

        </div>




</body>

</html>