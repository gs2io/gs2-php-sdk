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

namespace Gs2\Deploy\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 発生したイベントを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetEventRequest extends Gs2BasicRequest {

    /** @var string スタック名 */
    private $stackName;

    /**
     * スタック名を取得
     *
     * @return string|null 発生したイベントを取得
     */
    public function getStackName(): ?string {
        return $this->stackName;
    }

    /**
     * スタック名を設定
     *
     * @param string $stackName 発生したイベントを取得
     */
    public function setStackName(string $stackName = null) {
        $this->stackName = $stackName;
    }

    /**
     * スタック名を設定
     *
     * @param string $stackName 発生したイベントを取得
     * @return GetEventRequest $this
     */
    public function withStackName(string $stackName = null): GetEventRequest {
        $this->setStackName($stackName);
        return $this;
    }

    /** @var string イベント名 */
    private $eventName;

    /**
     * イベント名を取得
     *
     * @return string|null 発生したイベントを取得
     */
    public function getEventName(): ?string {
        return $this->eventName;
    }

    /**
     * イベント名を設定
     *
     * @param string $eventName 発生したイベントを取得
     */
    public function setEventName(string $eventName = null) {
        $this->eventName = $eventName;
    }

    /**
     * イベント名を設定
     *
     * @param string $eventName 発生したイベントを取得
     * @return GetEventRequest $this
     */
    public function withEventName(string $eventName = null): GetEventRequest {
        $this->setEventName($eventName);
        return $this;
    }

}