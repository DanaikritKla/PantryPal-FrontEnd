<?php
session_start();
require("function/function.php");
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>Pantry Pal</title>

  <link rel="stylesheet" href="assets/css/maicons.css">

  <link rel="stylesheet" href="assets/css/bootstrap.css">

  <link rel="stylesheet" href="assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="assets/css/theme.css">

  <link href="assets/datepicker/datetimepicker-master/jquery.datetimepicker.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/google-maps.js"></script>

  <script src="assets/vendor/wow/wow.min.js"></script>

  <script src="assets/js/theme.js"></script>

  <script src="assets/datepicker/datetimepicker-master/jquery.datetimepicker.js"></script>
  <!--<script src="assets/js/jquery-3.5.1.min.js"></script>-->
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


</head>
<style>
  div.rating-wrapper {
    display: flex;
    align-items: first baseline;
    flex-direction: column;
    margin: 5rem;
    font-size: 1.5rem;
  }
  div.star-wrapper {
    font-size: 2rem;
  }
  div.star-wrapper i {
    cursor: pointer;
  }
  div.star-wrapper i.yellow {
    color: #FDD835;
  }
  div.star-wrapper i.vote-recorded {
    color: #F57C00;
  }
  p.v-data {
    background: #ccc;
    padding: 0.5rem;
  }

  .checked {
    color: orange;
  }
</style>

<?php 
$role_map = array( 1=>'ผู้ดูแลระบบ',2=>'สมาชิก');
?>