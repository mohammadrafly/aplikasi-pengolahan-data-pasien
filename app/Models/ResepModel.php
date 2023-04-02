<?php

namespace App\Models;

use CodeIgniter\Model;

class ResepModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'resep';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_kunjungan',
        'id_stok',
        'updated_at'
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

    function getAssociateItems($id)
    {
        return $this->db->table('resep')
            ->select('
                resep.*,
                stok.*,
                kunjungan.*
            ')
            ->join('kunjungan', 'resep.id_kunjungan = kunjungan.id')
            ->join('stok', 'resep.id_stok = stok.id')
            ->where('kunjungan.id', $id)
            ->get()->getResultArray();
    }
}
