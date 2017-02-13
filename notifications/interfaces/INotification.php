<?php
namespace app\services\notifications\interfaces;

interface INotification {
    public function getTo();
    public function getFrom();
    public function getBody();
    public function getSubject();

}