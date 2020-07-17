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

namespace Gs2\Schedule\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * イベントマスターを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetEventMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null イベントマスターを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName イベントマスターを取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName イベントマスターを取得
     * @return GetEventMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetEventMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string イベントの種類名 */
    private $eventName;

    /**
     * イベントの種類名を取得
     *
     * @return string|null イベントマスターを取得
     */
    public function getEventName(): ?string {
        return $this->eventName;
    }

    /**
     * イベントの種類名を設定
     *
     * @param string $eventName イベントマスターを取得
     */
    public function setEventName(string $eventName = null) {
        $this->eventName = $eventName;
    }

    /**
     * イベントの種類名を設定
     *
     * @param string $eventName イベントマスターを取得
     * @return GetEventMasterRequest $this
     */
    public function withEventName(string $eventName = null): GetEventMasterRequest {
        $this->setEventName($eventName);
        return $this;
    }

}