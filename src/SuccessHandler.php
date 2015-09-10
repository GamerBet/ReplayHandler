<?php

namespace ReplayHandler;

use EloGank\Component\Command\Handler\SuccessHandlerInterface;
use EloGank\Replay\ReplayInterface;
use EloGank\Component\Configuration\Config;

class SuccessHandler extends ReplayHandler implements SuccessHandlerInterface
{

    /**
     * Executed on success. Throws exception to stop the process, then failure handler will be thrown.
     *
     * @param ReplayInterface $replay
     * @param string          $replayFolderPath
     */
    public function onSuccess(ReplayInterface $replay, $replayFolderPath)
    {

        $payload = [
            'foreignId' => (string)$replay->getGameId(),
            'platformId' => (string)$replay->getRegion(),
        ];

        $this->redisClient->publish("/interestmanager/extract", json_encode($payload));
    }
}
