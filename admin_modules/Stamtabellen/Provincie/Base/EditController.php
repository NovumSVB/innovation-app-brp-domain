<?php
namespace AdminModules\Custom\NovumBrp\Stamtabellen\Provincie\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumBrp\Provincie\CrudProvincieManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumBrp\Stamtabellen\Provincie instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudProvincieManager();
	}


	public function getPageTitle(): string
	{
		return "Provincies";
	}
}
