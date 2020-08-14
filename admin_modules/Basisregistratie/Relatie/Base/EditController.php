<?php
namespace AdminModules\Custom\NovumBrp\Basisregistratie\Relatie\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumBrp\Relatie\CrudRelatieManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumBrp\Basisregistratie\Relatie instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudRelatieManager();
	}


	public function getPageTitle(): string
	{
		return "Relaties";
	}
}
