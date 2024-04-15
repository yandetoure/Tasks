<?PHP
Interface CRUD{
    public function addTask($title, $description, $creation_date, $id_user, $end, $priority, $state);
    // public function deleteTask($id);
    // public function updateTask($id,$title, $description, $creation_date, $id_user, $end, $priority, $state);
    public function readTask();
    
}