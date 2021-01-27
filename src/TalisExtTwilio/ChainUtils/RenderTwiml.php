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
        dbgr('PAYLOAD RESPONSE STRINGIFIED',$res);
        header('HTTP/1.1 200 Ok');
        $all_other_headers = $this->Response->getHeaders();
        if($all_other_headers){
            \dbgr('SENDING HEADERS',$all_other_headers);
            
            foreach($all_other_headers as $other_header){
                header($other_header);
            }
        }
        echo $res;
    }
}
