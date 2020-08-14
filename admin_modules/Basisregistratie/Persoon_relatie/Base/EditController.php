<?php
namespace AdminModules\Custom\NovumBrp\Basisregistratie\Persoon_relatie\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumBrp\Persoon_relatie\CrudPersoon_relatieManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumBrp\Basisregistratie\Persoon_relatie instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudPersoon_relatieManager();
	}


	public function getPageTitle(): string
	{
		return "";
	}
}
