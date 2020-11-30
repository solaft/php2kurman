<?php
namespace app\interfaces;

interface Modelinterface
 {
     function getAll();

     function getById(int $id);

     function getTableName() : string;
 }