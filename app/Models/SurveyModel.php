<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveyModel extends Model
{
    protected $table = 'survey_kepuasan';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'permohonan_id',
        'pekerjaan',
        'q1','q2','q3','q4','q5','q6','q7','q8','q9',
        'kritik',
        'saran'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = false;
}
