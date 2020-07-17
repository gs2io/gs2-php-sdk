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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ミッションタスクを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetMissionTaskModelRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ミッションタスクを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ミッションタスクを取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ミッションタスクを取得
     * @return GetMissionTaskModelRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetMissionTaskModelRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string グループ名 */
    private $missionGroupName;

    /**
     * グループ名を取得
     *
     * @return string|null ミッションタスクを取得
     */
    public function getMissionGroupName(): ?string {
        return $this->missionGroupName;
    }

    /**
     * グループ名を設定
     *
     * @param string $missionGroupName ミッションタスクを取得
     */
    public function setMissionGroupName(string $missionGroupName = null) {
        $this->missionGroupName = $missionGroupName;
    }

    /**
     * グループ名を設定
     *
     * @param string $missionGroupName ミッションタスクを取得
     * @return GetMissionTaskModelRequest $this
     */
    public function withMissionGroupName(string $missionGroupName = null): GetMissionTaskModelRequest {
        $this->setMissionGroupName($missionGroupName);
        return $this;
    }

    /** @var string タスク名 */
    private $missionTaskName;

    /**
     * タスク名を取得
     *
     * @return string|null ミッションタスクを取得
     */
    public function getMissionTaskName(): ?string {
        return $this->missionTaskName;
    }

    /**
     * タスク名を設定
     *
     * @param string $missionTaskName ミッションタスクを取得
     */
    public function setMissionTaskName(string $missionTaskName = null) {
        $this->missionTaskName = $missionTaskName;
    }

    /**
     * タスク名を設定
     *
     * @param string $missionTaskName ミッションタスクを取得
     * @return GetMissionTaskModelRequest $this
     */
    public function withMissionTaskName(string $missionTaskName = null): GetMissionTaskModelRequest {
        $this->setMissionTaskName($missionTaskName);
        return $this;
    }

}