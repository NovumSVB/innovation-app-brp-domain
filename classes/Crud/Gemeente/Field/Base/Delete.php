<?php 
namespace Crud\Custom\NovumBrp\Gemeente\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumBrp\Stam\Gemeente;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Gemeente)
		{
		     return "/custom/novumbrp/stamtabellen/gemeente/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Gemeente)
		{
		     return "/custom/novumbrp/gemeente?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
