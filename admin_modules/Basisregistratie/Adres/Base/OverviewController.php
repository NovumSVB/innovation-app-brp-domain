<?php
namespace AdminModules\Custom\NovumBrp\Basisregistratie\Adres\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Custom\NovumBrp\Adres\CrudAdresManager;
use Crud\FormManager;
use Model\Custom\NovumBrp\Persoonsgegevens\Adres;
use Model\Custom\NovumBrp\Persoonsgegevens\AdresQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumBrp\Basisregistratie\Adres instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "Adressen";
	}


	public function getModule(): string
	{
		return "Adres";
	}


	public function getManager(): FormManager
	{
		return new CrudAdresManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return AdresQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof Adres){
		    LogActivity::register("Basisregistratie", "Adressen verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("Adressen verwijderd.");
		}
		else
		{
		       StatusMessage::warning("Adressen niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit Adressen item wilt verwijderen?");
		$sTitle = Translate::fromCode("Zeker weten?");
		$sOkUrl = $this->getManager()->getOverviewUrl() . "?id=" . $iId . "&_do=Delete";
		$sNOUrl = $this->getRequestUri();
		$sYes = Translate::fromCode("Ja");
		$sCancel = Translate::fromCode("Annuleren");
		$aButtons  = [
		   new StatusMessageButton($sYes, $sOkUrl, $sYes, "warning"),
		   new StatusMessageButton($sCancel, $sNOUrl, $sCancel, "info"),
		];
		StatusModal::warning($sMessage, $sTitle, $aButtons);
	}
}
