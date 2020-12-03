<?php

namespace Hiberus\Soto\Model;

use Hiberus\Soto\Api\Data\ExamInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Exam
 * @package Hiberus\Soto\Model
 */
class Exam extends AbstractModel implements ExamInterface
{

    protected function _construct()
    {
        $this->_init(\Hiberus\Soto\Model\ResourceModel\Exam::class);
    }

    /**
     * @return int|mixed
     */
    public function getId()
    {
        return $this->_getData(self::ID);
    }

    /**
     * @return mixed|string
     */
    public function getFirstName()
    {
        return $this->_getData(self::FIRST_NAME);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->_getData(self::LAST_NAME);
    }

    /**
     * @return float
     */
    public function getMark()
    {
        return $this->_getData(self::MARK);
    }
    /**
     * @param int|mixed $id
     * @return ExamInterface|Exam|AbstractModel
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @param string $firstname
     * @return ExamInterface|Exam
     */
    public function setFirstName($firstname)
    {
        return $this->setData(self::FIRST_NAME, $firstname);
    }

    /**
     * @param string $lastname
     * @return ExamInterface|Exam
     */
    public function setLastName($lastname)
    {
        return $this->setData(self::LAST_NAME, $lastname);
    }

    /**
     * @param float $mark
     * @return ExamInterface|Exam
     */
    public function setMark($mark)
    {
        return $this->setData(self::MARK, $mark);
    }
     
}
