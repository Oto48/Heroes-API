<?php

function insert_data($value, $conn){
  $name = $value;
  $api = file_get_contents("https://www.superheroapi.com/api.php/101669372574306/search/{$name}");
  $data = json_decode($api, true);
  if($data["response"] == "success"){
    $hero = $data["results"][0];
    $image = $hero['image']['url'];
    $hero_name = $hero["name"];
    $intelligence = $hero["powerstats"]["intelligence"];
    $strength = $hero["powerstats"]["strength"];
    $speed = $hero["powerstats"]["speed"];
    $durability = $hero["powerstats"]["durability"];
    $power = $hero["powerstats"]["power"];
    $combat = $hero["powerstats"]["combat"];
    $gender = $hero["appearance"]["gender"];
    $race = $hero["appearance"]["race"];
    $occupation = $hero["work"]["occupation"];
    $group_affiliation = $hero["connections"]["group-affiliation"];
    $sql = "INSERT INTO heroes (name, gender, race, intelligence, strength, speed, durability, power, combat, occupation, group_affiliation, image)
    VALUES ('$hero_name', '$gender', '$race', '$intelligence', '$strength', '$speed', '$durability', '$power', '$combat', '$occupation', '$group_affiliation', '$image')";
    if ($conn->query($sql) === FALSE) {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

function fetch_data($data){
  ?>
  <div class="flex flex-wrap gap-10 justify-center">
    <?php
      while($row = $data->fetch_assoc()){
    ?>
      <div class="bg-red-500 rounded w-1/3 p-5 text-yellow-100 border-2">
        <h1 class="text-5xl font-bold text-center mb-7 text-white"><?php echo $row["name"]; ?></h1>
        <div class="flex gap-x-5 mb-5">
          <img class="w-1/2" src="<?php echo $row["image"]; ?>">
          <div>
            <p class="mb-5"><span class="text-white font-bold">Occupation:</span> <?php echo $row["occupation"]; ?></p>
            <p><span class="text-white font-bold">Group Affiliation:</span> <?php echo $row["group_affiliation"]; ?></p>
          </div>
        </div>
        <div class="flex gap-x-8">
          <div>
            <p><span class="text-white font-bold">Intelligence:</span> <?php echo $row["intelligence"]; ?></p>
            <p><span class="text-white font-bold">Power:</span> <?php echo $row["power"]; ?></p>
            <p><span class="text-white font-bold">Strength:</span> <?php echo $row["strength"]; ?></p>
            <p><span class="text-white font-bold">Speed:</span> <?php echo $row["speed"]; ?></p>
            <p><span class="text-white font-bold">Durability:</span> <?php echo $row["durability"]; ?></p>
            <p><span class="text-white font-bold">Combat:</span> <?php echo $row["combat"]; ?></p>
          </div>
          <div>
            <p><span class="text-white font-bold">Gender:</span> <?php echo $row["gender"]; ?></p>
            <p><span class="text-white font-bold">Race:</span> <?php echo $row["race"]; ?></p>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
  <?php
}

function output_data($hero_name, $servername, $username, $password, $dbname){

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if ($hero_name == "list"){
    $sql = "SELECT * FROM heroes";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      fetch_data($result);
    }
  } else {
    $sql = "SELECT * FROM heroes WHERE name='$hero_name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      fetch_data($result);
    } else {
      $name = $hero_name;
      insert_data($name, $conn);
      $sql = "SELECT * FROM heroes WHERE name='$hero_name'";
      $result = $conn->query($sql);
      fetch_data($result);
    }
  }

  $conn->close(); 

}

?>