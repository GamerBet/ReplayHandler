<?php

namespace ReplayHandler;

use EloGank\Component\Command\Handler\SuccessHandlerInterface;
use EloGank\Replay\ReplayInterface;
use Symfony\Component\Console\Output\OutputInterface;
use EloGank\Component\Configuration\Config;

class SuccessHandler extends ReplayHandler implements SuccessHandlerInterface
{

    /**
     * Executed on success. Throws exception to stop the process, then failure handler will be thrown.
     *
     * @param ReplayInterface $replay
     * @param string          $replayFolderPath
     */
    public function onSuccess(OutputInterface $output, ReplayInterface $replay, $replayFolderPath)
    {

        $payload = [
            'foreignId' => (string)$replay->getGameId(),
            'platformId' => (string)$replay->getRegion(),
        ];

        $this->statsdClient->increment("replay.onSuccess");

        $this->redisClient->publish("/interestmanager/extract", json_encode($payload));
    }
}
