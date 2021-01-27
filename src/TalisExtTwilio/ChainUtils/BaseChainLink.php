<?php namespace TalisExtTwilio\ChainUtils;

abstract class BaseChainLink extends \Talis\Chain\aChainLink{
    /**
     * It is the payload
     *
     * @return \Twilio\TwiML\VoiceResponse
     */
    protected function twiml():\Twilio\TwiML\VoiceResponse{
        return $this->Response->getPayload();
    }
    
    /**
     * @return \Twilio\Rest\Client
     */
    protected function TwilioClient():\Twilio\Rest\Client{
        return $this->Request->getBodyParam('twilio_client');
    }
    
    /**
     * Palliative Care Workspace
     *
     * @return \Twilio\Rest\Taskrouter\V1\WorkspaceContext
     */
    protected function TwilioWSClient(string $TW_WORKSPACE_SID):\Twilio\Rest\Taskrouter\V1\WorkspaceContext{
        return $this->Request->getBodyParam('twilio_client')->taskrouter->v1->workspaces($TW_WORKSPACE_SID);
    }
}
