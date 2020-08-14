<?php
namespace AdminModules\Custom\NovumBrp\Stamtabellen\Geslacht\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumBrp\Geslacht\CrudGeslachtManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumBrp\Stamtabellen\Geslacht instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudGeslachtManager();
	}


	public function getPageTitle(): string
	{
		return "Geslachten";
	}
}
