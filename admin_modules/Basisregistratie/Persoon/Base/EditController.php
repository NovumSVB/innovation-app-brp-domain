<?php
namespace AdminModules\Custom\NovumBrp\Basisregistratie\Persoon\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumBrp\Persoon\CrudPersoonManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumBrp\Basisregistratie\Persoon instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudPersoonManager();
	}


	public function getPageTitle(): string
	{
		return "Personen";
	}
}
