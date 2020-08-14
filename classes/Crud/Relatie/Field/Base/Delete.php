<?php 
namespace Crud\Custom\NovumBrp\Relatie\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumBrp\Persoonsgegevens\Relatie;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Relatie)
		{
		     return "/custom/novumbrp/basisregistratie/relatie/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Relatie)
		{
		     return "/custom/novumbrp/relatie?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
