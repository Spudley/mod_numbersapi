<?php
/**
 * @package  mod_numbersapi
 *
 * @copyright   Copyright (C) 2016 Simon Champion.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$processor = new numbersAPIProcessor($params);

$result = $processor->getResponse();

$headingText = htmlspecialchars(JText::_('MOD_NUMBERSAPI_HEADING_'.strtoupper($result['type'])));
$currentPath = JURI::getInstance()->toString();

require JModuleHelper::getLayoutPath('mod_numbersapi', 'default');


class numbersAPIProcessor
{
    const ROOT_API = "http://numbersapi.com/";

    private $fullURL = '';

    public function __construct($params)
    {
        switch ($params->get('numberOpt', 'random')) {
            case 'random' :
                $number = 'random';
                break;
            case 'fromArg' :
                $jinput = JFactory::getApplication()->input;
                $number = urlencode($jinput->get('number', 'random'));
                break;
            case 'fixed' :
                $number = urlencode($params->get('number', 'random'));
                break;
            default :
                throw new Exception(JText::_('MOD_NUMBERSAPI_BADOPT_ERROR'), 403);
        }

        $type   = urlencode($params->get('type', 'year'));

        $this->fullURL = self::ROOT_API.$number.'/'.$type.'?json';
    }

    public function getResponse()
    {
        $http = JHttpFactory::getHttp();
        $response = $http->get($this->fullURL);

        if ($response->code == 200 || $response->code == 100) {
            $data = json_decode($response->body, true);
            if (isset($data['text']) && isset($data['number']) && isset($data['type'])) {
                if ($data['type'] === 'year' && (int)$data['number'] < 0) {
                    $data['number'] = abs($data['number']) . ' BC';
                }
                $data['headingText'] = $this->getHeadingText($data['type'], $data['number']);
                return $data;
            }
        }
        return [
            'text' => JText::_('MOD_NUMBERSAPI_RESPONSE_ERROR'),
            'number' => '0',
            'found' => false,
            'type' => 'error',
            'headingText' => htmlspecialchars(JText::_('MOD_NUMBERSAPI_HEADING_ERROR'))
        ];
   }

   private function getHeadingText($type, $number)
   {
        $headingLang = JText::_('MOD_NUMBERSAPI_HEADING_'.strtoupper($type));
        $heading = sprintf($headingLang, $number);
        return htmlspecialchars($heading);
   }
}