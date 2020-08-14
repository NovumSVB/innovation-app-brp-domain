<?php 
namespace Crud\Custom\NovumBrp\Adres\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumBrp\Persoonsgegevens\Adres;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Adres)
		{
		     return "/custom/novumbrp/basisregistratie/adres/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Adres)
		{
		     return "/custom/novumbrp/adres?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
