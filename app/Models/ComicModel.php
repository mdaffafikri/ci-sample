<?php namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model{
    protected $table = "comics";
    // protected $primarykey = "id";

    protected $useTimeStamps = true;
}