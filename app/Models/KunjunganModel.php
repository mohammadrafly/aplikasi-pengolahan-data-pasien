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
        'kode_pasien',
        'kode_pembayaran',
        'diagnosa',
        'resep',
        'created_at',
        'updated_at',
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
                gejala.gejala as gejala,
                kunjungan.*
            ')
            ->join('users', 'kunjungan.kode_pasien = users.kode_pasien')
            ->join('gejala', 'kunjungan.kode_kunjungan = gejala.kode_kunjungan')
            ->join('item', 'kunjungan.kode_kunjungan = item.kode_kunjungan')
            ->where('role', 'pasien')
            ->get()->getResultArray();
    }

    function getAssociateDataById($id)
    {
        return $this->db->table('kunjungan')
            ->select('
                users.name as full_name,
                users.kode_pasien as kode_pasien,
                gejala.gejala as keluhan,
                kunjungan.kode_kunjungan,
                kunjungan.diagnosa,
                kunjungan.created_at as tanggal,
                kunjungan.updated_at as diperbarui,
                kunjungan.id as id_kunjungan,
                item.*,
                item.quantity as jumlah_obat,
                stok.name as nama_obat,
                stok.price as harga
            ')
            ->join('item', 'kunjungan.kode_kunjungan = item.kode_kunjungan')
            ->join('stok', 'item.id_stok = stok.id')
            ->join('users', 'kunjungan.kode_pasien = users.kode_pasien')
            ->join('gejala', 'kunjungan.kode_kunjungan = gejala.kode_kunjungan')
            ->where('kunjungan.id',$id)
            ->get()->getResult();
    }

    function getAllAssociateData($start, $end)
    {
        return $this->db->table('kunjungan')
            ->select('
                users.name as full_name,
                users.kode_pasien as kode_pasien,
                gejala.gejala as keluhan,
                kunjungan.kode_kunjungan as kode_kunjungan,
                kunjungan.diagnosa,
                kunjungan.created_at as tanggal,
                kunjungan.updated_at as diperbarui,
                kunjungan.id as id_kunjungan,
                item.*,
                item.quantity as jumlah_obat,
                stok.name as nama_obat,
                stok.price as harga
            ')
            ->join('item', 'kunjungan.kode_kunjungan = item.kode_kunjungan')
            ->join('stok', 'item.id_stok = stok.id')
            ->join('users', 'kunjungan.kode_pasien = users.kode_pasien')
            ->join('gejala', 'kunjungan.kode_kunjungan = gejala.kode_kunjungan')
            ->where("kunjungan.created_at BETWEEN '$start' AND '$end'")
            ->get()->getResult();
    }
}
