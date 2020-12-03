<?php

namespace Hiberus\Soto\Setup\Patch\Data;

use Hiberus\Soto\Api\Data\ExamInterface;
use Hiberus\Soto\Api\Data\ExamInterfaceFactory;
use Hiberus\Soto\Api\ExamRepositoryInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;


/**
 * Class PopulateDataModel
 * @package Hiberus\Soto\Setup\Patch\Data
 */
class PopulateDataModel implements DataPatchInterface
{
    const   NUMBER_OF_EXAMS  =   10;

    /**
     * @var ExamRepositoryInterface
     */
    private $examRepository;

    /**
     * @var ExamInterfaceFactory
     */
    private $examFactory;


    /**
     * PopulateDataModel constructor.
     * @param ExamRepositoryInterface $examRepository
     * @param ExamInterfaceFactory $examFactory
     */
    public function __construct(
        ExamRepositoryInterface $examRepository,
        ExamInterfaceFactory $examFactory
    ) {
        $this->examRepository = $examRepository;
        $this->examFactory = $examFactory;
    }

    /**
     * @return DataPatchInterface|void
     */
    public function apply()
    {
        $this->populateData();
    }

    /**
     * Populate Data Model
     */
    private function populateData()
    {
        $this->populateExams();
    }

    /**
     * Populate Exams Data
     */
    private function populateExams()
    {
        for ($i = 0; $i < self::NUMBER_OF_EXAMS; $i++) {
            
            /** @var ExamInterface $exam */
            $examData = $this->examFactory->create();

            $examData->setFirstName('nombre '.$i)
                ->setLastName('apellido '.$i)
                ->setMark(rand(0,1000)/100)
            ;

            $this->examRepository->save(
                $examData
            );
        }
    } 

    /**
     * @return string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @return string[]
     */
    public function getAliases()
    {
        return [];
    }
}
