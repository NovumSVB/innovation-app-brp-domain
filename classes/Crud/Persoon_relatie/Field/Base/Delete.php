<?php 
namespace Crud\Custom\NovumBrp\Persoon_relatie\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumBrp\Persoonsgegevens\Persoon_relatie;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Persoon_relatie)
		{
		     return "/custom/novumbrp/basisregistratie/persoon_relatie/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Persoon_relatie)
		{
		     return "/custom/novumbrp/persoon_relatie?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
