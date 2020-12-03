<?php

namespace Hiberus\Soto\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface ExamSearchResultsInterface
 * @package Hiberus\Soto\Api\Data
 */
interface ExamSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get exam list.
     *
     * @return \Hiberus\Soto\Api\Data\ExamInterface[]
     */
    public function getItems();

    /**
     * Set exam list.
     *
     * @param \Hiberus\Soto\Api\Data\ExamInterface[] $items
     * @return \Hiberus\Soto\Api\Data\ExamSearchResultsInterface
     */
    public function setItems(array $items);
}
