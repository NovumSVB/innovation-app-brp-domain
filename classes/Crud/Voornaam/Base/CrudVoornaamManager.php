<?php
namespace Crud\Custom\NovumBrp\Voornaam\Base;

use Crud\Custom\NovumBrp;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumBrp\Data\Map\VoornaamTableMap;
use Model\Custom\NovumBrp\Data\Voornaam;
use Model\Custom\NovumBrp\Data\VoornaamQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Voornaam instead if you need to override or add functionality.
 */
abstract class CrudVoornaamManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumBrp\CrudTrait;
	use NovumBrp\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return VoornaamQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumBrp\Data\Map\VoornaamTableMap();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat voornamen.";
	}


	public function getEntityTitle(): string
	{
		return "Voornaam";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumbrp/datageneratie/data_voornaam/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumbrp/datageneratie/data_voornaam/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Voornamen toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Voornamen aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['Naam', 'GeslachtId', 'Aantal', 'PopulariteitPositie', 'Delete', 'Edit'];
	}


	public function getDefaultEditFields(): array
	{
		return ['Naam', 'GeslachtId', 'Aantal', 'PopulariteitPositie'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return Voornaam
	 */
	public function getModel(array $aData = null): Voornaam
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oVoornaamQuery = VoornaamQuery::create();
		     $oVoornaam = $oVoornaamQuery->findOneById($aData['id']);
		     if (!$oVoornaam instanceof Voornaam) {
		         throw new LogicException("Voornaam should be an instance of Voornaam but got something else." . __METHOD__);
		     }
		     $oVoornaam = $this->fillVo($aData, $oVoornaam);
		} else {
		     $oVoornaam = new Voornaam();
		     if (!empty($aData)) {
		         $oVoornaam = $this->fillVo($aData, $oVoornaam);
		     }
		}
		return $oVoornaam;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Voornaam
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Voornaam
	{
		$oVoornaam = $this->getModel($aData);


		 if(!empty($oVoornaam))
		 {
		     $oVoornaam = $this->fillVo($aData, $oVoornaam);
		     $oVoornaam->save();
		 }
		return $oVoornaam;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Voornaam $oModel
	 * @return Voornaam
	 */
	protected function fillVo(array $aData, Voornaam $oModel): Voornaam
	{
		isset($aData['naam']) ? $oModel->setNaam($aData['naam']) : null;
		isset($aData['geslacht_id']) ? $oModel->setGeslachtId($aData['geslacht_id']) : null;
		isset($aData['aantal']) ? $oModel->setAantal($aData['aantal']) : null;
		isset($aData['populariteit_positie']) ? $oModel->setPopulariteitPositie($aData['populariteit_positie']) : null;
		return $oModel;
	}
}
