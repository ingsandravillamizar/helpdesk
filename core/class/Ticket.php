<?php

require_once 'DataBase.php';

class Ticket extends DataBase
{

    //------------ READ ----------------------------------------
    public function selectAll()
    {
        $sql = "SELECT * FROM tickets";
        $query = $this->conexion->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function selectById($id)
    {
        $sql = "SELECT * FROM tickets WHERE id = $id LIMIT 1";
        $query = $this->conexion->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function selectDetails($id)
    {
        $sql = "SELECT tickets.area, tickets.title, tickets.status, tickets.user_id, users.name as username, tickets.created_at, ticketdetails.message, ticketdetails.date_message, ticketdetails.response, ticketdetails.date_response 
        FROM tickets INNER JOIN ticketdetails ON ticketdetails.ticket_id = tickets.id 
        INNER JOIN users ON users.id = tickets.user_id
        WHERE tickets.id = $id LIMIT 1";
        $query = $this->conexion->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function myTickets($user_id){
        $sql = "SELECT * FROM tickets WHERE user_id = $user_id";
        $query = $this->conexion->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    // -------------------- CREATE ----------------------
    public function create($data)
    {
        $sql = "INSERT INTO tickets (area, title, created_at, status, user_id) VALUES (\"{$data['area']}\", \"{$data['title']}\",\"{$data['create']}\", \"{$data['status']}\", {$data['user_id']})";
        $response = $this->conexion->query($sql);
        if (!$response) {
            return $response;
        }
        $lastId = $this->conexion->insert_id;
        return $lastId;
    }


    // -------------------- UPDATE -----------------------
    public function update($id, $status)
    {
        $sql = "UPDATE tickets SET status = \"{$status}\" WHERE id = $id";
        $response = $this->conexion->query($sql);
        return $response;
    }

    // -------------------- DELETE -----------------------
    public function delete($id){

        $sqlDetail = "DELETE FROM ticketdetails WHERE ticket_id = $id";
        $responseDetail = $this->conexion->query($sqlDetail);


        $sql = "DELETE FROM tickets WHERE id = $id";
        $response = $this->conexion->query($sql);

        return $responseDetail && $response;
    }

}
