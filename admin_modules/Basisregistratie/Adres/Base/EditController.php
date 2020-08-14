<?php
namespace AdminModules\Custom\NovumBrp\Basisregistratie\Adres\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumBrp\Adres\CrudAdresManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumBrp\Basisregistratie\Adres instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudAdresManager();
	}


	public function getPageTitle(): string
	{
		return "Adressen";
	}
}
