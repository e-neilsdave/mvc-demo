<?php
namespace Sofid\CommercantBundle\Services;

/**
 * Export - Services 
 *
 * @package    Symfony2
 * @subpackage Cashback
 * 
 */
class Export
{
    /**
     * @var container object
     */
    private $container;

    /**
     * Construct method for Export Service - to be changed latter
     *
     * @param Object $container
     */
    public function __construct($container)
    {
        $this->container = $container;

    }

    /**
     * Service Method for importing products
     *
     * @param string  $networkName - name of the network for which we will do the
     * import
     * @param boolean $force       - used to force the import of products
     *
     * @return produc feed
     */
    public function files($type, $fileName, array $columns, array $hooks=null, $exporter)
    {

            $exporter->setOptions($type, array('fileName' =>'userExport_' . $fileName->format('Y.m.d/H:i:s'), 'separator' => ';'));
            $exporter->setColumns($columns);
            if($hooks!=null)
            {
                $f = function($param) {
                        if ($param instanceof \DateTime) {
                            return $param->format('Y.m.d/H:i:s');
                        } else {
                            return '';
                        }
                    };
                foreach($hooks as $hook) {
                    $exporter->addHook($f, $hook);
                }
            }
    }
}
