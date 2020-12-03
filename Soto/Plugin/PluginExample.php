<?php

namespace Hiberus\Soto\Plugin;

use Hiberus\Soto\Api\Data\ExamInterface;
use Hiberus\Soto\Api\Data\ExamSearchResultsInterface;
use Hiberus\Soto\Api\ExamRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class PluginExample
 * @package Hiberus\Soto\Plugin
 */
class PluginExample
{

    /**
     * @param ExamRepositoryInterface $subject
     * @param ExamSearchResultsInterface $result
     * @return ExamSearchResultsInterface
     */
    public function afterGetList(
        ExamRepositoryInterface $subject,
        $result
    ) {
        foreach($result->getItems() as $exam){
            if($exam->getMark()<5){
                $exam->setMark(4.9);
            }
        }

        return $result;
    }
}
