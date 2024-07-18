<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$currentFood = getCurrentFood($_GET["id"]);
$allMaterial = getAllMaterial();
$allFoodMaterial = getAllFoodMaterial($_GET["id"]);
$currentCook = getCurrentCook($_GET["id"]);

if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    $materials_id = $_POST["materials_id"];
    $amount = $_POST["amount"];
    $units = $_POST["unit"];
    saveFood($_POST["menu_name"],$_POST["food_category"],$_POST["food_type"],$_FILES["menu_image"]["name"],$materials_id,$amount,$units,$_POST["cook"]);
  }else{
    $materials_id = $_POST["materials_id"];
    $amount = $_POST["amount"];
    $cook = $_POST["cook"];
    $units = $_POST["unit"];
    editFood($_POST["id"],$_POST["menu_name"],$_POST["food_category"],$_POST["food_type"],$_FILES["menu_image"]["name"],$materials_id,$amount,$units,$_POST["cook"]);
  }
  
}
if($_GET["id"] == ""){
  $txtHead = "Add menu";
}else{
  $txtHead = "Edit menu";
}
?>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <?php
    require_once("nav.php");
    ?>

  </header>

  <div class="page-section">
    <div class="container">

      <form action="" method="post" enctype="multipart/form-data">
        <div class="row align-items-center">

          <div class="col-lg-6 py-3">
            <h2 class="title-section"><?php echo $txtHead;?></h2>
            <div class="divider"></div>
            <input type="hidden" id="id" name="id" value="<?php echo $currentFood['id'];?>">
            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="lname">Name</label>
                <input type="text" name="menu_name" class="form-control" value="<?php echo $currentFood['menu_name'];?>" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="lname">Category</label>
                <select name="food_category" class="form-control" required>
                  <option value="">-- Please specify category --</option>
                  <option value="อาหารคาว" <?php if($currentFood['food_category'] == "อาหารคาว"){ ?> selected<?php } ?>>meat dish</option>
                  <option value="อาหารหวาน" <?php if($currentFood['food_category'] == "อาหารหวาน"){ ?> selected<?php } ?>>sweet dish</option>
                  <option value="อาหารชุด" <?php if($currentFood['food_category'] == "อาหารชุด"){ ?> selected<?php } ?>>set meal</option>
                  <option value="อาหารจานเดียว" <?php if($currentFood['food_category'] == "อาหารจานเดียว"){ ?> selected<?php } ?>>single meal</option>
                </select>
              </div>
              <div class="col-md-12">
                <label class="text-black" for="lname">Type</label>
                <select name="food_type" class="form-control" required>
                  <option value="">-- Please specify type --</option>
                  <option value="ต้ม" <?php if($currentFood['food_type'] == "ต้ม"){ ?> selected<?php } ?>>boiled</option>
                  <option value="ต้มยำ" <?php if($currentFood['food_type'] == "ต้มยำ"){ ?> selected<?php } ?>>tomyam</option>
                  <option value="ผัด" <?php if($currentFood['food_type'] == "ผัด"){ ?> selected<?php } ?>>stir-fried</option>
                  <option value="แกง" <?php if($currentFood['food_type'] == "แกง"){ ?> selected<?php } ?>>curry</option>
                  <option value="ทอด" <?php if($currentFood['food_type'] == "ทอด"){ ?> selected<?php } ?>>fried</option>
                  <option value="ยำ" <?php if($currentFood['food_type'] == "ยำ"){ ?> selected<?php } ?>>salad</option>
                  <option value="ตุ๋น" <?php if($currentFood['food_type'] == "ตุ๋น"){ ?> selected<?php } ?>>stewed</option>
                  <option value="นึ่ง" <?php if($currentFood['food_type'] == "นึ่ง"){ ?> selected<?php } ?>>steamed</option>
                  <option value="ย่าง" <?php if($currentFood['food_type'] == "ย่าง"){ ?> selected<?php } ?>>grilled</option>
                  <option value="เครื่องจิ้ม" <?php if($currentFood['food_type'] == "เครื่องจิ้ม"){ ?> selected<?php } ?>>dip</option>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="lname">Upload Image</label>
                <input type="file" id="imgInp" name="menu_image" class="form-control" accept="image/jpeg, image/png">
              </div>
            </div>

            

            
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-fluid py-3 text-center">
              <?php if($currentFood['menu_image'] == ""){?>
                <img src="assets/img/meat.png" id="blah" alt="" class="img-fluid">
              <?php }else{ ?>
                <img src="food/<?php echo $currentFood['menu_image'];?>" alt="" id="blah" class="img-fluid">
              <?php } ?>
            </div>
          </div>

          <div class="col-lg-12">
            <fieldset>
              <legend>Ingredients</legend> 
              <input type="button" style="float:right;margin-right:50px;" value="Delete" class="btn btn-danger" onclick="deleteRow('dataTable')" />
              <input type="button" style="float:right;margin-right:50px;" id="add_row" value="Add" class="btn btn-success" onclick="addRow('dataTable')" />
              <table class="table table-striped" id="dataTable">
                <thead>
                  <th></th>
                  <th style="text-align:center;"><label>Ingredients Name</label></th>
                  <th style="text-align:center;"><label>Quantity</label></th>
                  <th style="text-align:center;"><label>Unit</label></th>
                </thead>
                <tbody>

                  <?php if(empty($allFoodMaterial)){ ?>
                    <?php for($i=0;$i<5;$i++){ ?>
                      <tr>
                        <td style="width:5%;"><input type="checkbox" name="chk2"/></td>
                        <td style="width:55%;">
                          <select name="materials_id[]" class="form-control materials_id" id="materials_id<?php echo $i;?>" >
                            <option value="">-- Please select --</option>
                            <?php foreach($allMaterial as $dataMat){ ?>
                              <option value="<?php echo $dataMat['id'];?>" <?php echo $selected;?>><?php echo $dataMat['mat_name'];?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td style="width:20%;"><input type="text" class="form-control border-input" name="amount[]" id="amount<?php echo $i;?>" placeholder="จำนวน"></td>
                        <td style="width:20%;"><input type="text" class="form-control border-input" name="unit[]" id="unit<?php echo $i;?>" placeholder="หน่วย"></td>
                      </tr>
                    <?php } ?>
                  <?php }else{?>
                    <?php foreach($allFoodMaterial as $dataFoodMat){ ?>
                      <tr>
                        <td style="width:5%;"><input type="checkbox" name="chk2"/></td>
                        <td style="width:45%;">
                          <select name="materials_id[]" class="form-control materials_id" id="materials_id<?php echo $i;?>" >
                            <option value="">-- Please select --</option>
                            <?php foreach($allMaterial as $dataMat2){ ?>
                              <?php $selected = ""; 
                              if($dataFoodMat['materials_id'] == $dataMat2['id']){
                                $selected = " selected"; 

                              } 
                              ?> 
                              <option value="<?php echo $dataMat2['id'];?>" <?php echo $selected;?>><?php echo $dataMat2['mat_name'];?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td style="width:25%;"><input type="text" class="form-control border-input" name="amount[]" id="amount<?php echo $i;?>" placeholder="จำนวน" value="<?php echo $dataFoodMat['amount'];?>"></td>
                        <td style="width:25%;"><input type="text" class="form-control border-input" name="unit[]" id="unit<?php echo $i;?>" placeholder="หน่วย" value="<?php echo $dataFoodMat['units'];?>"></td>
                      </tr>
                    <?php } ?>
                  <?php } ?>



                </tbody>
              </table>
            </fieldset>
          </div>


          <div class="col-lg-12">
            <fieldset>
              <legend>Reciepe</legend> 
              <textarea name="cook" id="your_summernote" rows="6"><?php echo $currentCook["cook"];?></textarea>
            </fieldset>
          </div>


        </div>
        <div class="row form-group mt-4" style="text-align:center;">
          <div class="col-md-12">
            <input type="submit" name="submit" value="Save" class="btn btn-primary">
          </div>
        </div>

      </form>
    </div>
  </div>

  <script>
    var today = new Date();
    
    $('#date_expired').datetimepicker({
      lang:'th',
      minDate:today,
      timepicker:false,
      format:'d/m/Y'
    });
  </script>

  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgInp").change(function() {
      readURL(this);
    });
  </script>

  <script language="javascript">

    function addRow(tableID) {

      var table = document.getElementById(tableID);

      var rowCount = table.rows.length;

      var row = table.insertRow(rowCount);

      var cell0 = row.insertCell(0);
      var element0 = document.createElement("input");
      element0.type = "checkbox";
      element0.name="chkbox";
      cell0.appendChild(element0);


      var cell1 = row.insertCell(1);
      var element1 = document.createElement("select");
      element1.id = 'materials_id'+rowCount;
      element1.name = 'materials_id[]';
      element1.setAttribute('class', 'form-control materials_id');
      element1.addEventListener('change', getDataFromDropdown);
      cell1.appendChild(element1);

      var option = document.createElement("option");
      option.value = '';
      option.appendChild(document.createTextNode("-- โปรดระบุ --"));
      element1.appendChild(option);
      <?php foreach($allMaterial as $dataNew){ ?>
        var option = document.createElement("option");
        option.value = '<?php echo $dataNew["id"]?>';
        option.appendChild(document.createTextNode("<?php echo $dataNew['mat_name']?>"));
        element1.appendChild(option);
      <?php } ?>

      var cell2 = row.insertCell(2);
      var element2 = document.createElement("input");
      element2.type = "text";
      element2.name = "amount[]";
      element2.id = "amount"+rowCount;
      element2.className = "form-control";
      cell2.appendChild(element2);

      var cell3 = row.insertCell(3);
      var element3 = document.createElement("input");
      element3.type = "text";
      element3.name = "unit[]";
      element3.id = "unit"+rowCount;
      element3.className = "form-control";
      cell3.appendChild(element3);

    }

    function deleteRow(tableID) {
      try {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        for(var i=0; i<rowCount; i++) {
          var row = table.rows[i];
          var chkbox = row.cells[0].childNodes[0];
          if(null != chkbox && true == chkbox.checked) {
            table.deleteRow(i);
            rowCount--;
            i--;
          }


        }
      }catch(e) {
        alert(e);
      }
    }
  </script>


  <script language="javascript">

    function addRow2(tableID) {

      var table = document.getElementById(tableID);

      var rowCount = table.rows.length;

      var row = table.insertRow(rowCount);

      var cell0 = row.insertCell(0);
      var element0 = document.createElement("input");
      element0.type = "checkbox";
      element0.name="chkbox";
      cell0.appendChild(element0);

      var cell1 = row.insertCell(1);
      var element1 = document.createElement("input");
      element1.type = "text";
      element1.name = "cook[]";
      element1.id = "cook"+rowCount;
      element1.className = "form-control";
      cell1.appendChild(element1);

    }

    function deleteRow2(tableID) {
      try {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        for(var i=0; i<rowCount; i++) {
          var row = table.rows[i];
          var chkbox = row.cells[0].childNodes[0];
          if(null != chkbox && true == chkbox.checked) {
            table.deleteRow(i);
            rowCount--;
            i--;
          }


        }
      }catch(e) {
        alert(e);
      }
    }



  </script>

  <script>


    $(document).ready(function(){

      $('.materials_id').on('change', function() {
        if ($(this).val() != ""){
          var id = $(this).attr('id');
          var sub_id = id.substring(12, 14);
          var materials_id = $('#materials_id'+sub_id).val();
          $.get('api/api.php?load=material_data&materials_id='+materials_id,function(data){
            equ_line = jQuery.parseJSON(data);
            for (var i = 0, len = equ_line.length; i < len; i++) {
              $('#unit'+sub_id).val(equ_line[i].mat_unit);
            }


          });
        }

      });

    });

  </script>

  <script>
    function getDataFromDropdown(){

      if ($(this).val() != ""){
        var id = $(this).attr('id');
        var sub_id = id.substring(12,14);
        var materials_id = $('#materials_id'+sub_id).val();
        $.get('api/api.php?load=material_data&materials_id='+materials_id,function(data){
          equ_line = jQuery.parseJSON(data);
          for (var i = 0, len = equ_line.length; i < len; i++) {
            $('#unit'+sub_id).val(equ_line[i].mat_unit);
          }


        });
      }


    }

  </script>

  <script>
    $(document).ready(function() {
      $("#your_summernote").summernote();
      $('.dropdown-toggle').dropdown();
    });
  </script>

  <?php
  require_once("footer.php");
  ?>


  
</body>
</html>