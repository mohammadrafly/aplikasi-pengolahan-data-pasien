<?php

namespace App\Models;

use CodeIgniter\Model;

class KunjunganModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kunjungan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_kunjungan',
        'diagnosa',
        'resep',
        'kode_pasien'
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

    function getAssociateData()
    {
        return $this->db->table('kunjungan')
            ->select('
                users.name as full_name,
                users.kode_pasien as kode_pasien,
                diagnosa.gejala as keluhan,
                kunjungan.diagnosa as diagnosa,
                kunjungan.created_at as tanggal,
                kunjungan.updated_at as diperbarui,
                kunjungan.id as id_kunjungan,
            ')
            ->join('users', 'kunjungan.kode_pasien = users.kode_pasien')
            ->join('diagnosa', 'kunjungan.id = diagnosa.id_kunjungan')
            ->where('role', 'pasien')
            ->get()->getResultArray();
    }

    function getAssociateDataById($id)
    {
        return $this->db->table('kunjungan')
            ->select('
                users.name as full_name,
                users.kode_pasien as kode_pasien,
                diagnosa.gejala as keluhan,
                kunjungan.kode_kunjungan,
                kunjungan.diagnosa as diagnosa,
                kunjungan.created_at as tanggal,
                kunjungan.updated_at as diperbarui,
                kunjungan.id as id_kunjungan,
            ')
            ->join('users', 'kunjungan.kode_pasien = users.kode_pasien')
            ->join('diagnosa', 'kunjungan.id = diagnosa.id_kunjungan')
            ->where('kunjungan.id',$id)
            ->get()->getResult();
    }
}
