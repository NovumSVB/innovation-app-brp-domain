<?php
namespace AdminModules\Custom\NovumBrp\Stamtabellen\Land\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumBrp\Land\CrudLandManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumBrp\Stamtabellen\Land instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudLandManager();
	}


	public function getPageTitle(): string
	{
		return "Landen";
	}
}
