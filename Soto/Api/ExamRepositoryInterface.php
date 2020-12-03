<?php

namespace Hiberus\Soto\Api;

use Hiberus\Soto\Api\Data\ExamInterface;
use Hiberus\Soto\Api\Data\ExamSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Interface ExamRepositoryInterface
 * @package Hiberus\Soto\Api
 */
interface ExamRepositoryInterface
{
    /**
     * Save a Exam
     *
     * @param \Hiberus\Soto\Api\Data\ExamInterface $exam
     * @return \Hiberus\Soto\Api\Data\ExamInterface
     */
    public function save(\Hiberus\Soto\Api\Data\ExamInterface $exam);

    /**
     * Get Exam by an Id
     *
     * @param int $examId
     * @return \Hiberus\Soto\Api\Data\ExamInterface
     */
    public function getById($examId);

    /**
     * Retrieve exam matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Hiberus\Soto\Api\Data\ExamSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete a Exam
     *
     * @param \Hiberus\Soto\Api\Data\ExamInterface $exam
     * @return \Hiberus\Soto\Api\Data\ExamInterface
     */
    public function delete(\Hiberus\Soto\Api\Data\ExamInterface $exam);

    /**
     * Delete a Exam by an Id
     *
     * @param int $examId
     * @return \Hiberus\Soto\Api\Data\ExamInterface
     */
    public function deleteById($examId);
}
