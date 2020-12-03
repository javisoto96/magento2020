<?php


namespace Hiberus\Soto\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Class Config
 * @package Hiberus\Soto\Helper
 */
class Config extends AbstractHelper
{
    const   XML_PATH_ELEMENTOS =   'hiberus_soto/general_config/elementos';
    const   XML_PATH_NOTACORTE =   'hiberus_soto/general_config/notacorte';

    /**
     * @return mixed
     */
    public function getElementos()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_ELEMENTOS
        );
    }

    /**
     * @return mixed
     */
    public function getNotacorte()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_NOTACORTE
        );
    }
}