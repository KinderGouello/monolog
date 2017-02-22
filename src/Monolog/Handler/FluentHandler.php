<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler;

use Monolog\Logger;
use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\JsonFormatter;
use Fluent\Logger\FluentLogger;

/**
 * Fluent handler
 *
 * @author Rémy Gouello <rigouello@gmail.com>
 */
class FluentHandler extends AbstractProcessingHandler
{
    /**
     * @var FluentLogger
     */
    private $logger;

    /**
     * @param FluentLogger $logger
     * @param int          $level  The minimum logging level at which this handler will be triggered
     * @param boolean      $bubble Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(FluentLogger $logger, int $level = Logger::DEBUG, bool $bubble = true)
    {
        parent::__construct($level, $bubble);

        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function write(array $record)
    {
        $record['severity'] = Logger::getLevelName($record['level']);
        $this->logger->post($record['channel'], $record);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new JsonFormatter();
    }
}