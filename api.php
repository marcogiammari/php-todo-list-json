<?php 

header('Content-Type: application/json');

$toDoList = file_get_contents("data.json");
$toDoListData = json_decode($toDoList, true);

if (isset($_POST['newTask'])) {
    $toDoListData[] = [
        'name' => $_POST['newTask'],
        'status' => false
    ];
    file_put_contents("data.json", json_encode($toDoListData));
} 
elseif (isset($_POST['updateTask'])) {
    $index = $_POST['updateTask'];
    $toDoListData[$index]['status'] = !$toDoListData[$index]['status'];
    file_put_contents("data.json", json_encode($toDoListData));
}
elseif (isset($_POST['deleteTask'])) {
    $index = $_POST['deleteTask'];
    array_splice( $toDoListData, $index, 1);
    file_put_contents("data.json", json_encode($toDoListData));
}


$toDoList = json_encode($toDoListData);
echo $toDoList;

?>