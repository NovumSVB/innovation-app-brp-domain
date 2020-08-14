<?php 
namespace Crud\Custom\NovumBrp\Voornaam\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumBrp\Data\Voornaam;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Voornaam)
		{
		     return "/custom/novumbrp/datageneratie/data_voornaam/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Voornaam)
		{
		     return "/custom/novumbrp/data_voornaam?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
