<?php

namespace Hiberus\Soto\Block\Bloque;

use Hiberus\Soto\Model\ExamRepository;
use Hiberus\Soto\Helper\Config;
use Psr\Log\LoggerInterface;

class ExamList extends \Magento\Framework\View\Element\Template
{
    protected $examRepository;

    protected $_searchCriteriaBuilder;

    protected $_sortOrderBuilder;
     /**
     * @var LoggerInterface
     */
    protected $logger;


    /**
     * @var Config
     */
    private $config;



    
    public function __construct(
        \Hiberus\Soto\Model\ExamRepository $examRepository,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        LoggerInterface $logger,
        Config $config,
        array $data = []
    ) {
        $this->examRepository=$examRepository;
        $this->_sortOrderBuilder=$sortOrderBuilder;
        $this->_searchCriteriaBuilder=$searchCriteriaBuilder;
        $this->config = $config;
        $this->logger=$logger;

        parent::__construct($context, $data);
    }

    public function getLastExams(){
        $examenes = $this->examRepository->getList(
            $this->_searchCriteriaBuilder
            ->addSortOrder($this->_sortOrderBuilder->setField('mark')->setDirection('DESC')->create())
            ->setPageSize($this->config->getElementos())
            ->create()
        )->getItems();
        
        $contador=0;
        $suma=0;
        foreach($examenes as $exam){
            $suma+=$exam->getMark();
            $contador++;
        }

        $this->logger->info('Se ha accedido a la hora:'.time());
        $this->logger->info('El numero de examenes es:'.count($examenes));
        $this->logger->info('La nota media es:'.($suma/$contador));



        return $examenes;
        
    }

    public function getNotaCorte(){
        return $this->config->getNotacorte();
    }

    
}