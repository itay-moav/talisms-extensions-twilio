<?php namespace TalisExtTwilio\ChainUtils;

class InitTwiml extends \Talis\Chain\aChainLink{
    public function process():\Talis\Chain\aChainLink{
        $this->Response->setPayload(new \Twilio\TwiML\VoiceResponse);
        return $this;
    }
}
