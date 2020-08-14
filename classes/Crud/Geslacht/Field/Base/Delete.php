<?php 
namespace Crud\Custom\NovumBrp\Geslacht\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumBrp\Stam\Geslacht;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Geslacht)
		{
		     return "/custom/novumbrp/stamtabellen/geslacht/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Geslacht)
		{
		     return "/custom/novumbrp/geslacht?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
