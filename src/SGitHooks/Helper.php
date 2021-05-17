<?php

namespace SGitHooks;

/**
 * Class MainHelper
 * @package PHPHelperCollection
 * @author Πέτρος <it.specialist@hotmail.com>
 */
class Helper
{
    /**
     * @var array
     */
    protected $helperResponse;

    /**
     * MainHelper constructor.
     */
    public function __construct()
    {
        $this->initResponse();
    }

    /**
     * @return void
     */
    protected function initResponse()
    {
        $this->helperResponse = array(
            'status' => '',
            'message' => '',
            'data' => array(),
            'code' => null,
        );
    }

    /**
     * @param array $something
     * @return array
     */
    public function sample(array $something = array())
    {
        return $something;
    }
}
