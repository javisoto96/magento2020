<?php


namespace Hiberus\Soto\Console\Command\Input\ShowExams;

use Symfony\Component\Console\Input\InputInterface;

/**
 * Class ListInputValidator
 * @package Hiberus\Soto\Console\Command\Input\ShowExams
 */
class ListInputValidator
{
    /**
     * Validate input options
     *
     * @param InputInterface $input
     * @return InputInterface
     */
    public function validate(InputInterface $input)
    {
        return $input;
    }
}
