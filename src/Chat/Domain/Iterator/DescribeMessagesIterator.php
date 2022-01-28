<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Chat\Domain\Iterator;

use Gs2\Chat\Gs2ChatRestClient;
use Gs2\Chat\Domain\Cache\MessageDomainCache;
use Gs2\Chat\Model\Message;
use Gs2\Chat\Request\DescribeMessagesRequest;
use Gs2\Chat\Result\DescribeMessagesResult;

use Iterator;

class DescribeMessagesIterator implements Iterator {

    /**
     * @var MessageDomainCache
     */
    private $messageCache;

    /**
     * @var Gs2ChatRestClient
     */
    private $client;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $roomName;

    /**
     * @var string
     */
    private $password;

    /**
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    /**
     * @var ?number
     */
    private $startAt;

    /**
     * @var bool
     */
    private $last;

    /**
     * @var array<Message>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        MessageDomainCache $messageCache,
        Gs2ChatRestClient $client,
        string $namespaceName,
        string $roomName,
        ?string $password,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->messageCache = $messageCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->roomName = $roomName;
        $this->password = $password;
        $this->accessToken = $accessToken;
        $this->startAt = null;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeMessagesResult
         */
         $r = $this->client->describeMessages(
            (new DescribeMessagesRequest())
                ->withNamespaceName($this->namespaceName)
                ->withRoomName($this->roomName)
                ->withPassword($this->password)
                ->withAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null)
                ->withStartAt($this->startAt)
                ->withLimit($this->fetchSize)
        );
        foreach ($r->getItems() as $item) {
            $this->messageCache->update($item);
        }
        $this->result = $r->getItems();
        if (count($this->result) > 0) {
            $this->startAt = $this->result[count($this->result)-1]->getCreatedAt() + 1;
        }
    }

    public function current()
    {
        if (count($this->result) == 0 && !$this->last) {
            $this->load();
        }
        if (count($this->result) == 0) {
            return null;
        }
        return $this->result[0];
    }

    public function key()
    {
        throw new \BadFunctionCallException();
    }

    public function valid()
    {
        return count($this->result) != 0 || !$this->last;
    }

    public function next()
    {
        $this->result = array_slice($this->result, 1);
        if (count($this->result) == 0 && !$this->last) {
            $this->load();
        }
    }

    public function rewind()
    {
        $this->startAt = null;
        $this->last = false;
        $this->result = [];
    }
}
