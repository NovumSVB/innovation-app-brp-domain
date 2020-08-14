<?php
namespace Crud\Custom\NovumBrp\Gemeente\Field\Base;

use Crud\Generic\Field\GenericOpenInApi;
use Crud\IEventField;
use Crud\IFieldHasApi;

/**
 * This code is generated and should not be modified by hand, your changes will be overwritten at the first re-run..
 */
class OpenInApi extends GenericOpenInApi implements IFieldHasApi, IEventField
{
	use \Crud\Custom\NovumBrp\CrudApiTrait;

	public function getModule(): string
	{
		return "Stamtabellen";
	}


	public function getModuleDir(): string
	{
		return "Gemeente";
	}
}
