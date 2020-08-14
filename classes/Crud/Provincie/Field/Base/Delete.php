<?php 
namespace Crud\Custom\NovumBrp\Provincie\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumBrp\Stam\Provincie;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Provincie)
		{
		     return "/custom/novumbrp/stamtabellen/provincie/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Provincie)
		{
		     return "/custom/novumbrp/provincie?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
