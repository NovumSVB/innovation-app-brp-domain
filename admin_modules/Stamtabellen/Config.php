<?php
namespace AdminModules\Custom\NovumBrp\Stamtabellen;

use AdminModules\ModuleConfig;
use Core\Translate;

final class Config extends ModuleConfig
{
	public function isEnabelable(): bool
	{
		return true;
	}


	public function getModuleTitle(): string
	{
		return Translate::fromCode("Stamtabellen");
	}
}