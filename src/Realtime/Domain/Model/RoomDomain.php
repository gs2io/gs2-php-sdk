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

namespace Gs2\Realtime\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Realtime\Gs2RealtimeRestClient;


class RoomDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2RealtimeRestClient
     */
    private $client;

    /**
     * @var \Gs2\Realtime\Domain\Cache\RoomDomainCache
     */
    private $roomCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $roomName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Realtime\Domain\Cache\RoomDomainCache $roomCache,
        string $namespaceName,
        string $roomName
    ) {
        $this->session = $session;
        $this->client = new Gs2RealtimeRestClient(
            $session
        );
        $this->roomCache = $roomCache;
        $this->namespaceName = $namespaceName;
        $this->roomName = $roomName;
    }

    public function load(
        \Gs2\Realtime\Request\GetRoomRequest $request
    ): \Gs2\Realtime\Result\GetRoomResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setRoomName($this->roomName);
        /**
         * @var \Gs2\Realtime\Result\GetRoomResult
         */
        $r = $this->client->getRoom(
            $request
        );
        $this->roomCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Realtime\Request\DeleteRoomRequest $request
    ): \Gs2\Realtime\Result\DeleteRoomResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setRoomName($this->roomName);
        /**
         * @var \Gs2\Realtime\Result\DeleteRoomResult
         */
        $r = $this->client->deleteRoom(
            $request
        );
        $this->roomCache->delete($r->getItem());
        return $r;
    }

}
