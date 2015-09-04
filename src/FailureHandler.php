<?php

namespace ReplayHandler;

use EloGank\Component\Command\Handler;

class SuccessHandler implements SuccessHandlerInterface
{

    /**
     * Executed on failure (error, exception, ...)
     *
     * @param string     $region
     * @param int        $gameId
     * @param string     $encryptionKey
     * @param string     $replayFolderPath
     * @param \Exception $exception
     */
    public function onFailure($region, $gameId, $encryptionKey, $replayFolderPath, \Exception $exception)
    {
        
    }

}