<?php


namespace Hiberus\Soto\Console\Command;

use Hiberus\Soto\Api\Data\ExamInterface;
use Hiberus\Soto\Api\ExamRepositoryInterface;
use Hiberus\Soto\Console\Command\Input\ShowExams\ListInputValidator;
use Hiberus\Soto\Console\Command\Options\ShowExams\ListOptions;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Console\Cli;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

/**
 * Class ShowExamsCommand
 * @package Hiberus\Soto\Console\Command
 */
class ShowExamsCommand extends Command
{
    const   DETAIL_TAG  =   'detail';

    /**
     * @var ListInputValidator
     */
    protected $validator;

    /**
     * @var ListOptions
     */
    protected $listOptions;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var StudentRepositoryInterface
     */
    private $studentRepository;

    

    /**
     * ShowExamsCommand constructor.
     * @param ListInputValidator $validator
     * @param ListOptions $listOptions
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param ExamRepositoryInterface $examRepository
     * @param string|null $name
     */
    public function __construct(
        ListInputValidator $validator,
        ListOptions $listOptions,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        ExamRepositoryInterface $examRepository,
        string $name = null
    ) {
        $this->validator = $validator;
        $this->listOptions = $listOptions;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->examRepository = $examRepository;

        parent::__construct($name);
    }

    /**
     * Configure
     */
    protected function configure()
    {
        $this->setName('hiberus:soto:show')
            ->setDescription('Show Exams List')
            ->setDefinition($this->listOptions->getOptionsList());

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws LocalizedException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->initFormatter($output);

        $this->process($input, $output);

        return Cli::RETURN_SUCCESS;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    private function process(InputInterface $input, OutputInterface $output)
    {
        $this->validator->validate($input);

        /** @var ExamInterface $exam */
        foreach ($this->getExamsList() as $exam) {
            $output->writeln(
                sprintf(
                    "<%s> >> Name: %s - Mark: %s <%s>",
                    self::DETAIL_TAG,
                    $exam->getFirstName(),
                    $exam->getMark(),
                    self::DETAIL_TAG
                )
            );
        }

    }

    /**
     * @return ExamInterface[]
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    private function getExamsList()
    {
        $searchCriteria = $this->searchCriteriaBuilder->create();

        $examResults = $this->examRepository->getList($searchCriteria)->getItems();

        if (empty($examResults)) {
            throw new NoSuchEntityException(
                __('No exams found.')
            );
        }

        return $examResults;
    }

    /**
     * @param OutputInterface $output
     */
    private function initFormatter(OutputInterface $output)
    {
        /** @var OutputFormatterInterface $outputFormatter */
        $outputFormatter = $output->getFormatter();
        $outputFormatter->setStyle(self::DETAIL_TAG, new OutputFormatterStyle('yellow'));
    }
}
