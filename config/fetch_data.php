<?php

//fetch_data.php

$connect = new PDO("mysql:host=192.168.1.17;dbname=tablaquirurgica", "rebsolll", "iopa2018");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET')
{
 $data = array(
  ':rut'   => "%" . $_GET['rut'] . "%",
  ':nombre'   => "%" . $_GET['nombre'] . "%",
  ':medico'     => "%" . $_GET['medico'] . "%",
  ':cirugia'    => "%" . $_GET['cirugia'] . "%"
 );
 //$query = "SELECT * FROM sample_data WHERE first_name LIKE :first_name AND last_name LIKE :last_name AND age LIKE :age AND gender LIKE :gender ORDER BY id DESC";

 $query="SELECT * FROM solicitud";

 $statement = $connect->prepare($query);
 $statement->execute($data);
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'id'    => $row['id'],   
   'rut'  => $row['rut'],
   'nombre'   => $row['nombre'],
   'medico'    => $row['medico'],
   'cirugia'   => $row['cirugia'],
   //  'ojo'   => $row['ojo'],
       'fechasp'   => $row['fechasp']
  );
 }
 header("Content-Type: application/json");
 echo json_encode($output);
}

if($method == "POST")
{
 $data = array(
  ':first_name'  => $_POST['first_name'],
  ':last_name'  => $_POST["last_name"],
  ':age'    => $_POST["age"],
  ':gender'   => $_POST["gender"]
 );

 $query = "INSERT INTO sample_data (first_name, last_name, age, gender) VALUES (:first_name, :last_name, :age, :gender)";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == 'PUT')
{
 parse_str(file_get_contents("php://input"), $_PUT);
 $data = array(
  ':id'   => $_PUT['id'],
  ':first_name' => $_PUT['first_name'],
  ':last_name' => $_PUT['last_name'],
  ':age'   => $_PUT['age'],
  ':gender'  => $_PUT['gender']
 );
 $query = "
 UPDATE sample_data 
 SET first_name = :first_name, 
 last_name = :last_name, 
 age = :age, 
 gender = :gender 
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == "DELETE")
{
 parse_str(file_get_contents("php://input"), $_DELETE);
 $query = "DELETE FROM sample_data WHERE id = '".$_DELETE["id"]."'";
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>