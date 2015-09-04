<?php

namespace ReplayHandler;

use EloGank\Component\Command\Handler;

class SuccessHandler implements SuccessHandlerInterface
{

    /**
     * Executed on success. Throws exception to stop the process, then failure handler will be thrown.
     *
     * @param ReplayInterface $replay
     * @param string          $replayFolderPath
     */
    public function onSuccess(ReplayInterface $replay, $replayFolderPath)
    {

    }
}