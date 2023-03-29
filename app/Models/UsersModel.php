<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_pasien',
        'jenis_kelamin',
        'alamat',
        'name',
        'username',
        'email',
        'password',
        'role',
        'token',
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

    function usernameOrEmail($username)
    {
        return $this->db->table('users')
            ->where('username', $username)
            ->orWhere('email', $username)
            ->get()->getResultArray();
    }

    function findDataInBetween($role, $start_date, $end_date)
    {
        if (!$role) {
            return $this->db->table('users')
                ->where("created_at BETWEEN '$start_date' AND '$end_date'")
                ->get()->getResultArray();
        } else {
            return $this->db->table('users')
                ->where("created_at BETWEEN '$start_date' AND '$end_date'")
                ->where('role', $role)
                ->get()->getResultArray();
        }

    }       

    function findDataByRole($role)
    {
        return $this->db->table('users')
            ->where('role', $role)
            ->get()->getResultArray();
    }
}
