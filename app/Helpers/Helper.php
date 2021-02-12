<?php
if (!function_exists('lpApiResponse')) {
    /**
     * Returns an array for Api Response
     *
     * @param boolean $error    [true | false]
     * @param string $message   [the message]
     * @param array $data       [array of data]
     * @return array
     */
    function lpApiResponse(bool $error, string $message, $data = [])
    {
        $arrRet = array(
            'error'   => $error,
            'message' => $message,
        );

        if (is_array($data) && count($data) > 0) {
            $arrRet['data'] = $data;
        }

        return $arrRet;
    }
}
