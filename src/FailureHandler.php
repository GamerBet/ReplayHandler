<?php

namespace ReplayHandler;

use EloGank\Component\Command\Handler\FailureHandlerInterface;
use Symfony\Component\Console\Output\OutputInterface;
use EloGank\Replay\ReplayInterface;
use EloGank\Replay\Downloader\Exception\ReplayFolderAlreadyExistsException;


class FailureHandler extends ReplayHandler implements FailureHandlerInterface
{

    /**
     * Executed on failure (error, exception, ...)
     *
     * @param OutputInterface $output
     * @param string     $region
     * @param int        $gameId
     * @param string     $encryptionKey
     * @param string     $replayFolderPath
     * @param \Exception $exception
     */
    public function onFailure(OutputInterface $output, $region, $gameId, $encryptionKey, $replayFolderPath, \Exception $exception)
    {
        //Don't care about ReplayFolderAlreadyExistsException
        if ($exception instanceof ReplayFolderAlreadyExistsException) {
            return false;
        }

        $this->statsdClient->increment("replay.onFailure");

        return true;
    }

}