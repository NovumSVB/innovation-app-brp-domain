<?php 
namespace Crud\Custom\NovumBrp\Persoon\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumBrp\Persoonsgegevens\Persoon;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Persoon)
		{
		     return "/custom/novumbrp/basisregistratie/persoon/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Persoon)
		{
		     return "/custom/novumbrp/persoon?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
