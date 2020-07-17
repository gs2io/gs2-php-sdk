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

namespace Gs2\Quest\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * クエストグループマスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateQuestGroupModelMasterRequest extends Gs2BasicRequest {

    /** @var string カテゴリ名 */
    private $namespaceName;

    /**
     * カテゴリ名を取得
     *
     * @return string|null クエストグループマスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName クエストグループマスターを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName クエストグループマスターを更新
     * @return UpdateQuestGroupModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateQuestGroupModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string クエストグループモデル名 */
    private $questGroupName;

    /**
     * クエストグループモデル名を取得
     *
     * @return string|null クエストグループマスターを更新
     */
    public function getQuestGroupName(): ?string {
        return $this->questGroupName;
    }

    /**
     * クエストグループモデル名を設定
     *
     * @param string $questGroupName クエストグループマスターを更新
     */
    public function setQuestGroupName(string $questGroupName = null) {
        $this->questGroupName = $questGroupName;
    }

    /**
     * クエストグループモデル名を設定
     *
     * @param string $questGroupName クエストグループマスターを更新
     * @return UpdateQuestGroupModelMasterRequest $this
     */
    public function withQuestGroupName(string $questGroupName = null): UpdateQuestGroupModelMasterRequest {
        $this->setQuestGroupName($questGroupName);
        return $this;
    }

    /** @var string クエストグループマスターの説明 */
    private $description;

    /**
     * クエストグループマスターの説明を取得
     *
     * @return string|null クエストグループマスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * クエストグループマスターの説明を設定
     *
     * @param string $description クエストグループマスターを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * クエストグループマスターの説明を設定
     *
     * @param string $description クエストグループマスターを更新
     * @return UpdateQuestGroupModelMasterRequest $this
     */
    public function withDescription(string $description = null): UpdateQuestGroupModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string クエストグループのメタデータ */
    private $metadata;

    /**
     * クエストグループのメタデータを取得
     *
     * @return string|null クエストグループマスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * クエストグループのメタデータを設定
     *
     * @param string $metadata クエストグループマスターを更新
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * クエストグループのメタデータを設定
     *
     * @param string $metadata クエストグループマスターを更新
     * @return UpdateQuestGroupModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): UpdateQuestGroupModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string 挑戦可能な期間を指定するイベントマスター のGRN */
    private $challengePeriodEventId;

    /**
     * 挑戦可能な期間を指定するイベントマスター のGRNを取得
     *
     * @return string|null クエストグループマスターを更新
     */
    public function getChallengePeriodEventId(): ?string {
        return $this->challengePeriodEventId;
    }

    /**
     * 挑戦可能な期間を指定するイベントマスター のGRNを設定
     *
     * @param string $challengePeriodEventId クエストグループマスターを更新
     */
    public function setChallengePeriodEventId(string $challengePeriodEventId = null) {
        $this->challengePeriodEventId = $challengePeriodEventId;
    }

    /**
     * 挑戦可能な期間を指定するイベントマスター のGRNを設定
     *
     * @param string $challengePeriodEventId クエストグループマスターを更新
     * @return UpdateQuestGroupModelMasterRequest $this
     */
    public function withChallengePeriodEventId(string $challengePeriodEventId = null): UpdateQuestGroupModelMasterRequest {
        $this->setChallengePeriodEventId($challengePeriodEventId);
        return $this;
    }

}