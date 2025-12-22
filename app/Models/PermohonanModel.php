<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveyModel extends Model
{
    protected $table      = 'survey';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nilai',
        'komentar',
        'created_at'
    ];

    protected $useTimestamps = false;

    // 🔹 HITUNG RATA-RATA KEPUASAN
    public function getRataRata()
    {
        return $this->selectAvg('nilai')->get()->getRow()->nilai;
    }
}
