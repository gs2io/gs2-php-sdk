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
use Gs2\Quest\Model\Contents;
use Gs2\Quest\Model\ConsumeAction;
use Gs2\Quest\Model\AcquireAction;

/**
 * クエストモデルマスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateQuestModelMasterRequest extends Gs2BasicRequest {

    /** @var string カテゴリ名 */
    private $namespaceName;

    /**
     * カテゴリ名を取得
     *
     * @return string|null クエストモデルマスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName クエストモデルマスターを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName クエストモデルマスターを更新
     * @return UpdateQuestModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateQuestModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string クエストグループモデル名 */
    private $questGroupName;

    /**
     * クエストグループモデル名を取得
     *
     * @return string|null クエストモデルマスターを更新
     */
    public function getQuestGroupName(): ?string {
        return $this->questGroupName;
    }

    /**
     * クエストグループモデル名を設定
     *
     * @param string $questGroupName クエストモデルマスターを更新
     */
    public function setQuestGroupName(string $questGroupName) {
        $this->questGroupName = $questGroupName;
    }

    /**
     * クエストグループモデル名を設定
     *
     * @param string $questGroupName クエストモデルマスターを更新
     * @return UpdateQuestModelMasterRequest $this
     */
    public function withQuestGroupName(string $questGroupName): UpdateQuestModelMasterRequest {
        $this->setQuestGroupName($questGroupName);
        return $this;
    }

    /** @var string クエスト名 */
    private $questName;

    /**
     * クエスト名を取得
     *
     * @return string|null クエストモデルマスターを更新
     */
    public function getQuestName(): ?string {
        return $this->questName;
    }

    /**
     * クエスト名を設定
     *
     * @param string $questName クエストモデルマスターを更新
     */
    public function setQuestName(string $questName) {
        $this->questName = $questName;
    }

    /**
     * クエスト名を設定
     *
     * @param string $questName クエストモデルマスターを更新
     * @return UpdateQuestModelMasterRequest $this
     */
    public function withQuestName(string $questName): UpdateQuestModelMasterRequest {
        $this->setQuestName($questName);
        return $this;
    }

    /** @var string クエストモデルの説明 */
    private $description;

    /**
     * クエストモデルの説明を取得
     *
     * @return string|null クエストモデルマスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * クエストモデルの説明を設定
     *
     * @param string $description クエストモデルマスターを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * クエストモデルの説明を設定
     *
     * @param string $description クエストモデルマスターを更新
     * @return UpdateQuestModelMasterRequest $this
     */
    public function withDescription(string $description): UpdateQuestModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string クエストのメタデータ */
    private $metadata;

    /**
     * クエストのメタデータを取得
     *
     * @return string|null クエストモデルマスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * クエストのメタデータを設定
     *
     * @param string $metadata クエストモデルマスターを更新
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * クエストのメタデータを設定
     *
     * @param string $metadata クエストモデルマスターを更新
     * @return UpdateQuestModelMasterRequest $this
     */
    public function withMetadata(string $metadata): UpdateQuestModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var Contents[] クエストの内容 */
    private $contents;

    /**
     * クエストの内容を取得
     *
     * @return Contents[]|null クエストモデルマスターを更新
     */
    public function getContents(): ?array {
        return $this->contents;
    }

    /**
     * クエストの内容を設定
     *
     * @param Contents[] $contents クエストモデルマスターを更新
     */
    public function setContents(array $contents) {
        $this->contents = $contents;
    }

    /**
     * クエストの内容を設定
     *
     * @param Contents[] $contents クエストモデルマスターを更新
     * @return UpdateQuestModelMasterRequest $this
     */
    public function withContents(array $contents): UpdateQuestModelMasterRequest {
        $this->setContents($contents);
        return $this;
    }

    /** @var string 挑戦可能な期間を指定するイベントマスター のGRN */
    private $challengePeriodEventId;

    /**
     * 挑戦可能な期間を指定するイベントマスター のGRNを取得
     *
     * @return string|null クエストモデルマスターを更新
     */
    public function getChallengePeriodEventId(): ?string {
        return $this->challengePeriodEventId;
    }

    /**
     * 挑戦可能な期間を指定するイベントマスター のGRNを設定
     *
     * @param string $challengePeriodEventId クエストモデルマスターを更新
     */
    public function setChallengePeriodEventId(string $challengePeriodEventId) {
        $this->challengePeriodEventId = $challengePeriodEventId;
    }

    /**
     * 挑戦可能な期間を指定するイベントマスター のGRNを設定
     *
     * @param string $challengePeriodEventId クエストモデルマスターを更新
     * @return UpdateQuestModelMasterRequest $this
     */
    public function withChallengePeriodEventId(string $challengePeriodEventId): UpdateQuestModelMasterRequest {
        $this->setChallengePeriodEventId($challengePeriodEventId);
        return $this;
    }

    /** @var ConsumeAction[] クエストの参加料 */
    private $consumeActions;

    /**
     * クエストの参加料を取得
     *
     * @return ConsumeAction[]|null クエストモデルマスターを更新
     */
    public function getConsumeActions(): ?array {
        return $this->consumeActions;
    }

    /**
     * クエストの参加料を設定
     *
     * @param ConsumeAction[] $consumeActions クエストモデルマスターを更新
     */
    public function setConsumeActions(array $consumeActions) {
        $this->consumeActions = $consumeActions;
    }

    /**
     * クエストの参加料を設定
     *
     * @param ConsumeAction[] $consumeActions クエストモデルマスターを更新
     * @return UpdateQuestModelMasterRequest $this
     */
    public function withConsumeActions(array $consumeActions): UpdateQuestModelMasterRequest {
        $this->setConsumeActions($consumeActions);
        return $this;
    }

    /** @var AcquireAction[] クエスト失敗時の報酬 */
    private $failedAcquireActions;

    /**
     * クエスト失敗時の報酬を取得
     *
     * @return AcquireAction[]|null クエストモデルマスターを更新
     */
    public function getFailedAcquireActions(): ?array {
        return $this->failedAcquireActions;
    }

    /**
     * クエスト失敗時の報酬を設定
     *
     * @param AcquireAction[] $failedAcquireActions クエストモデルマスターを更新
     */
    public function setFailedAcquireActions(array $failedAcquireActions) {
        $this->failedAcquireActions = $failedAcquireActions;
    }

    /**
     * クエスト失敗時の報酬を設定
     *
     * @param AcquireAction[] $failedAcquireActions クエストモデルマスターを更新
     * @return UpdateQuestModelMasterRequest $this
     */
    public function withFailedAcquireActions(array $failedAcquireActions): UpdateQuestModelMasterRequest {
        $this->setFailedAcquireActions($failedAcquireActions);
        return $this;
    }

    /** @var string[] クエストに挑戦するためにクリアしておく必要のあるクエスト名 */
    private $premiseQuestNames;

    /**
     * クエストに挑戦するためにクリアしておく必要のあるクエスト名を取得
     *
     * @return string[]|null クエストモデルマスターを更新
     */
    public function getPremiseQuestNames(): ?array {
        return $this->premiseQuestNames;
    }

    /**
     * クエストに挑戦するためにクリアしておく必要のあるクエスト名を設定
     *
     * @param string[] $premiseQuestNames クエストモデルマスターを更新
     */
    public function setPremiseQuestNames(array $premiseQuestNames) {
        $this->premiseQuestNames = $premiseQuestNames;
    }

    /**
     * クエストに挑戦するためにクリアしておく必要のあるクエスト名を設定
     *
     * @param string[] $premiseQuestNames クエストモデルマスターを更新
     * @return UpdateQuestModelMasterRequest $this
     */
    public function withPremiseQuestNames(array $premiseQuestNames): UpdateQuestModelMasterRequest {
        $this->setPremiseQuestNames($premiseQuestNames);
        return $this;
    }

}