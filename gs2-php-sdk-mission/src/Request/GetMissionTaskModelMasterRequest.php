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
 * ミッションタスクマスターを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetMissionTaskModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ミッションタスクマスターを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ミッションタスクマスターを取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ミッションタスクマスターを取得
     * @return GetMissionTaskModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): GetMissionTaskModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ミッショングループ名 */
    private $missionGroupName;

    /**
     * ミッショングループ名を取得
     *
     * @return string|null ミッションタスクマスターを取得
     */
    public function getMissionGroupName(): ?string {
        return $this->missionGroupName;
    }

    /**
     * ミッショングループ名を設定
     *
     * @param string $missionGroupName ミッションタスクマスターを取得
     */
    public function setMissionGroupName(string $missionGroupName) {
        $this->missionGroupName = $missionGroupName;
    }

    /**
     * ミッショングループ名を設定
     *
     * @param string $missionGroupName ミッションタスクマスターを取得
     * @return GetMissionTaskModelMasterRequest $this
     */
    public function withMissionGroupName(string $missionGroupName): GetMissionTaskModelMasterRequest {
        $this->setMissionGroupName($missionGroupName);
        return $this;
    }

    /** @var string タスク名 */
    private $missionTaskName;

    /**
     * タスク名を取得
     *
     * @return string|null ミッションタスクマスターを取得
     */
    public function getMissionTaskName(): ?string {
        return $this->missionTaskName;
    }

    /**
     * タスク名を設定
     *
     * @param string $missionTaskName ミッションタスクマスターを取得
     */
    public function setMissionTaskName(string $missionTaskName) {
        $this->missionTaskName = $missionTaskName;
    }

    /**
     * タスク名を設定
     *
     * @param string $missionTaskName ミッションタスクマスターを取得
     * @return GetMissionTaskModelMasterRequest $this
     */
    public function withMissionTaskName(string $missionTaskName): GetMissionTaskModelMasterRequest {
        $this->setMissionTaskName($missionTaskName);
        return $this;
    }

}