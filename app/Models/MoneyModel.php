<?php

namespace App\Models;

use CodeIgniter\Model;

class MoneyModel extends Model
{
	protected $table                = 'money';
	protected $primaryKey           = 'id_money';
	protected $returnType           = 'object';
	protected $allowedFields        = ['id_gawe', 'detail', 'nominal', 'date_money', 'description', 'type_money'];
	protected $useTimestamps		= true;
	protected $useSoftDeletes		= true;


	public function getAll($type = null)
	{
		$builder = $this->join('gawe', 'gawe.id_gawe = money.id_gawe');
		if ($type != null) {
			$this->where('type_money', $type);
		}
		return $builder->findAll();
	}
}
