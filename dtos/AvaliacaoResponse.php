<?php

final class AvaliacaoResponse {
    private $status;
    private $message;

    function __construct($status, $message) 
    {
        $this->status = $status;
        $this->message = $message;
    }

    function getStatus()
    {
        return $this->status;
    }

    function getMessage()
    {
        return $this->message;
    }

    }
?>