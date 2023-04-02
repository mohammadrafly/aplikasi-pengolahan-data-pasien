<?php

namespace App\Models;

use CodeIgniter\Model;

class StokModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'stok';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'quantity',
        'price',
        'updated_at',
        'created_at',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    function findDataInBetween($start_date, $end_date)
    {
        return $this->db->table('stok')
            ->where("created_at BETWEEN '$start_date' AND '$end_date'")
            ->get()->getResultArray();
    }

    function getStokArray()
    {
        return $this->db->table('stok')
            ->get()->getResultArray();
    }
}
