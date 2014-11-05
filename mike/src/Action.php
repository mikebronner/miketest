<?php namespace GeneaLabs\Bones\Keeper;

class Action extends \BaseModel
{
    protected $primaryKey = 'name';
	protected $rulesets = [
        'name' => 'required|min:3|unique:actions,name',
	];

	protected $fillable = [
		'name',
	];

	public function permissions()
	{
		return $this->hasMany('GeneaLabs\Bones\Keeper\Permission', 'action_key');
	}
}
