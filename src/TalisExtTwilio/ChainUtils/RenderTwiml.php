<?php namespace TalisExtTwilio\ChainUtils;

/**
 * @author itay
 */
class RenderTwiml extends BaseChainLink implements \Talis\commons\iRenderable{
    
    /**
     * {@inheritDoc}
     * @see \Talis\Chain\aChainLink::process()
     */
    public function process():\Talis\Chain\aChainLink{
        return $this;
    }
    
    /**
     * {@inheritDoc}
     * @see \Talis\commons\iRenderable::render()
     */
    public function render(\Talis\commons\iEmitter $emitter):void{
        $res = $this->twiml() . '';
        \ZimLogger\MainZim::$CurrentLogger->debug('PAYLOAD RESPONSE STRINGIFIED');
        \ZimLogger\MainZim::$CurrentLogger->debug($res);
        header('HTTP/1.1 200 Ok');
        $all_other_headers = $this->Response->getHeaders();
        if($all_other_headers){

            \ZimLogger\MainZim::$CurrentLogger->debug('SENDING HEADERS');
            \ZimLogger\MainZim::$CurrentLogger->debug($all_other_headers);
            
            foreach($all_other_headers as $other_header){
                header($other_header);
            }
        }
        echo $res;
    }
}
