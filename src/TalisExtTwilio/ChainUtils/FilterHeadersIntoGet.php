<?php namespace TalisExtTwilio\ChainUtils;
/**
 * Puts Twilio headers in the GET params
 * 
 * @author itay
 * @date 2020-09-10
 */
class FilterHeadersIntoGet extends \Talis\Chain\Filters\aFilter{
    /**
     * {@inheritDoc}
     * @see \Talis\Chain\Filters\aFilter::filter()
     */
    public function filter(\Talis\Message\Request $Request):void{
        $all_get_params = $this->Request->getAllGetParams();
        $new_all_get_params = array_merge($all_get_params,[
            'HTTP_X_TWILIO_SIGNATURE'           => $_SERVER['HTTP_X_TWILIO_SIGNATURE'] ?? 'FAKE',
            'HTTP_I_TWILIO_IDEMPOTENCY_TOKEN'   => $_SERVER['HTTP_I_TWILIO_IDEMPOTENCY_TOKEN'] ?? 'FAKE'
        ]);
        $this->Request = new \Talis\Message\Request($Request->getUri(), $new_all_get_params, $Request->getBody());
    }
}
