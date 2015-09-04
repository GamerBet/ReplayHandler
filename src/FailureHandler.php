<?php

namespace ReplayHandler;

use EloGank\Component\Command\Handler\FailureHandlerInterface;
use EloGank\Replay\ReplayInterface;

class FailureHandler extends ReplayHandler implements FailureHandlerInterface
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
        //Well someone f'ed up
        //TODO publish to channel
    }

}