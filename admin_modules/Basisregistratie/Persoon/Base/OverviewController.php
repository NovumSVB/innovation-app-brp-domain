<?php
namespace AdminModules\Custom\NovumBrp\Basisregistratie\Persoon\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Custom\NovumBrp\Persoon\CrudPersoonManager;
use Crud\FormManager;
use Model\Custom\NovumBrp\Persoonsgegevens\Persoon;
use Model\Custom\NovumBrp\Persoonsgegevens\PersoonQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumBrp\Basisregistratie\Persoon instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "Personen";
	}


	public function getModule(): string
	{
		return "Persoon";
	}


	public function getManager(): FormManager
	{
		return new CrudPersoonManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return PersoonQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof Persoon){
		    LogActivity::register("Basisregistratie", "Personen verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("Personen verwijderd.");
		}
		else
		{
		       StatusMessage::warning("Personen niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit Personen item wilt verwijderen?");
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
