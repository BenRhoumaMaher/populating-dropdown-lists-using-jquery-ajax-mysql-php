<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DropDown List</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style/style.css" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
      integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
  </head>
  <body>
    <div class="container mt-5">
      <form action="" class="form-horizontal">
        <div class="form-group">
          <label for="country" class="col-sm-2 text-primary mb-2"
            >Country :</label
          >
          <div class="col-sm-4">
            <select name="country" id="country" class="form-control" onchange="getStates(this.value)">
              <option value="" selected hidden disabled>Select country ...</option>
              <?php 
              foreach($countries as $country){
                echo "<option value='" . $country['id'] . "'>" .$country['country'] . "</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group mt-3" id="state">
          <label for="state" class="col-sm-2 text-primary mb-2">State :</label>
          <div class="col-sm-4">
            <select
              name="state"
              id="stateDropdown"
              class="form-control"
            ></select>
          </div>
        </div>
      </form>
    </div>

    <script>
      function getStates(countryID){
        $("#state").show();
        $("#stateDropdown").html("<option selected hidden disabled>Loading...</option>");
        $.ajax({
          method:"POST",
          url:"getStates.php",
          dataType:"html",
          data: {country: countryID}
        })
        .done(function(data){
          $("#stateDropdown").html(data);
        })
      }
    </script>
  </body>
</html>
