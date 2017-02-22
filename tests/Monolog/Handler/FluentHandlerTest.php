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

use Monolog\Test\TestCase;

class FluentHandlerTest extends TestCase
{
    private $logger;

    public function setUp()
    {
        $this->logger = $this->getMockBuilder('Fluent\Logger\FluentLogger')
            ->disableOriginalConstructor()
            ->setMethods(['post'])
            ->getMock();
    }
    
    public function testConstruct()
    {
        $this->assertInstanceOf('Monolog\Handler\FluentHandler', new FluentHandler($this->logger));
    }

    // /**
    //  * @dataProvider provider
    //  */
    // public function testHandle($record, $expectedTag, $expectedData)
    // {
    //     $this->logger->expects($this->once())
    //         ->method('post')
    //         ->with($expectedTag, $expectedData);
    // 
    //     $handler = new FluentHandler($this->logger);
    //     $handler->handle($record);
    // }
    // 
    // public function provider()
    // {
    //     return [
    //         [
    //             [
    //                 'message' => 'Log message',
    //                 'level' => 200,
    //                 'channel' => 'request',
    //             ],
    //             'request',
    //             [
    //                 'message' => 'Log message',
    //                 'level' => 200,
    //                 'channel' => 'request',
    //                 'severity' => 'INFO',
    //             ],
    //         ],
    //         [
    //             [
    //                 'message' => 'Other message',
    //                 'level' => 400,
    //                 'channel' => 'test',
    //             ],
    //             'request',
    //             [
    //                 'message' => 'Log message',
    //                 'level' => 400,
    //                 'channel' => 'test',
    //                 'severity' => 'ERROR',
    //             ],
    //         ],
    //     ];
    // }
}