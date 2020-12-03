<?php

namespace Hiberus\Soto\Api\Data;

/**
 * Interface ExamInterface
 * @package Hiberus\Soto\Api\Data
 */
interface ExamInterface
{
    const TABLE = 'hiberus_exam';
    const ID = 'entity_id';
    const FIRST_NAME = 'firstname';
    const LAST_NAME = 'lastname';
    const MARK = 'mark';


    /**
     * Get Exam ID
     *
     * @return int
     */
    public function getId();

    /**
     * Set Exam ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get Exam FirstName
     *
     * @return string
     */
    public function getFirstName();

    /**
     * Set Exam FirstName
     *
     * @param string $firstname
     * @return $this
     */
    public function setFirstName($firstname);

    /**
     * Get Exam LastName
     *
     * @return string
     */
    public function getLastName();

    /**
     * Set Exam LastName
     *
     * @param string $lastname
     * @return $this
     */
    public function setLastName($lastname);

    /**
     * Get Exam Mark
     *
     * @return float
     */
    public function getMark();

    /**
     * Set Exam Mark
     *
     * @param string $mark
     * @return $this
     */
    public function setMark($mark);
}
