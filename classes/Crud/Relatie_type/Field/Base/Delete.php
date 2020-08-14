<?php 
namespace Crud\Custom\NovumBrp\Relatie_type\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumBrp\Stam\Relatie_type;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Relatie_type)
		{
		     return "/custom/novumbrp/stamtabellen/relatie_type/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Relatie_type)
		{
		     return "/custom/novumbrp/relatie_type?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
