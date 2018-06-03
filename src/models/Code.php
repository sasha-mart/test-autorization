<?php

namespace SashaMart\TestAutorization\models;

use phpDocumentor\Reflection\Types\Void_;
use SashaMart\TestAutorization\DbConnection;

class Code
{
    private $id;
    private $value = null;
    private $phone;
    private $datetime = null;
    private $mysqli;

    const ACTIVE_PERIOD = 120;

    public function __construct(string $phone)
    {
        $this->phone = $phone;
        $dbInstance = DbConnection::getInstance();
        $this->mysqli = $dbInstance->getConnection();
    }

    public function setValue() : void
    {
        $this->value = (string)mt_rand(100000, 999999);
        $this->datetime = date("Y-m-d H:i:s");
        $this->save();
    }

    private function save() : void
    {
        $stmt = $this->mysqli->prepare("INSERT INTO codes (phone, value, datetime) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $this->phone, $this->value, $this->datetime);
        $stmt->execute();
    }

    public function getCurrentValue()
    {
        $curTime = date("Y-m-d H:i:s");
        $startPeriod = date("Y-m-d H:i:s", strtotime($curTime . ' - 120 seconds'));
        $sql = "SELECT id, value FROM codes WHERE datetime BETWEEN ? AND ? AND phone = ? ORDER BY datetime DESC";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('sss', $startPeriod, $curTime, $this->phone);
        $stmt->execute();
        $mysqliResult = $stmt->get_result();
        $arr = $mysqliResult->fetch_array(MYSQLI_ASSOC);

        if (isset($arr['id']))
            $this->id = $arr['id'];

        if (isset($arr['value']))
            return $arr['value'];
        else
            return null;
    }

    public function setSuccess() : void
    {
        $sql = "UPDATE codes SET success=1 WHERE id=?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $this->id);
        $stmt->execute();
    }
}