<?php

require_once 'DataBase.php';

class TicketDetail extends DataBase
{

    //------------ READ ----------------------------------------
    public function selectAll()
    {
        $sql = "SELECT * FROM ticketdetails";
        $query = $this->conexion->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function selectById($id)
    {
        $sql = "SELECT * FROM ticketdetails WHERE id = $id LIMIT 1";
        $query = $this->conexion->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    // -------------------- CREATE ----------------------
    public function create($data)
    {
        $sql = "INSERT INTO ticketdetails (message, date_message, ticket_id) VALUES (\"{$data['message']}\", \"{$data['date_message']}\",\"{$data['ticket_id']}\")";
        $response = $this->conexion->query($sql);
        return $response;
    }

    // -------------------- UPDATE -----------------------
    public function update($id, $data)
    {
        $sql = "UPDATE ticketdetails SET response = \"{$data['response']}\", date_response = \"{$data['date']}\" WHERE ticket_id = $id";
        $response = $this->conexion->query($sql);
        return $response;
    }
}
