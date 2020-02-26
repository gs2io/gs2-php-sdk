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
 * クエストモデルマスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateQuestModelMasterRequest extends Gs2BasicRequest {

    /** @var string カテゴリ名 */
    private $namespaceName;

    /**
     * カテゴリ名を取得
     *
     * @return string|null クエストモデルマスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName クエストモデルマスターを新規作成
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName クエストモデルマスターを新規作成
     * @return CreateQuestModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): CreateQuestModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string クエストグループモデル名 */
    private $questGroupName;

    /**
     * クエストグループモデル名を取得
     *
     * @return string|null クエストモデルマスターを新規作成
     */
    public function getQuestGroupName(): ?string {
        return $this->questGroupName;
    }

    /**
     * クエストグループモデル名を設定
     *
     * @param string $questGroupName クエストモデルマスターを新規作成
     */
    public function setQuestGroupName(string $questGroupName) {
        $this->questGroupName = $questGroupName;
    }

    /**
     * クエストグループモデル名を設定
     *
     * @param string $questGroupName クエストモデルマスターを新規作成
     * @return CreateQuestModelMasterRequest $this
     */
    public function withQuestGroupName(string $questGroupName): CreateQuestModelMasterRequest {
        $this->setQuestGroupName($questGroupName);
        return $this;
    }

    /** @var string クエスト名 */
    private $name;

    /**
     * クエスト名を取得
     *
     * @return string|null クエストモデルマスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * クエスト名を設定
     *
     * @param string $name クエストモデルマスターを新規作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * クエスト名を設定
     *
     * @param string $name クエストモデルマスターを新規作成
     * @return CreateQuestModelMasterRequest $this
     */
    public function withName(string $name): CreateQuestModelMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string クエストモデルの説明 */
    private $description;

    /**
     * クエストモデルの説明を取得
     *
     * @return string|null クエストモデルマスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * クエストモデルの説明を設定
     *
     * @param string $description クエストモデルマスターを新規作成
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * クエストモデルの説明を設定
     *
     * @param string $description クエストモデルマスターを新規作成
     * @return CreateQuestModelMasterRequest $this
     */
    public function withDescription(string $description): CreateQuestModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string クエストのメタデータ */
    private $metadata;

    /**
     * クエストのメタデータを取得
     *
     * @return string|null クエストモデルマスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * クエストのメタデータを設定
     *
     * @param string $metadata クエストモデルマスターを新規作成
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * クエストのメタデータを設定
     *
     * @param string $metadata クエストモデルマスターを新規作成
     * @return CreateQuestModelMasterRequest $this
     */
    public function withMetadata(string $metadata): CreateQuestModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var Contents[] クエストの内容 */
    private $contents;

    /**
     * クエストの内容を取得
     *
     * @return Contents[]|null クエストモデルマスターを新規作成
     */
    public function getContents(): ?array {
        return $this->contents;
    }

    /**
     * クエストの内容を設定
     *
     * @param Contents[] $contents クエストモデルマスターを新規作成
     */
    public function setContents(array $contents) {
        $this->contents = $contents;
    }

    /**
     * クエストの内容を設定
     *
     * @param Contents[] $contents クエストモデルマスターを新規作成
     * @return CreateQuestModelMasterRequest $this
     */
    public function withContents(array $contents): CreateQuestModelMasterRequest {
        $this->setContents($contents);
        return $this;
    }

    /** @var string 挑戦可能な期間を指定するイベントマスター のGRN */
    private $challengePeriodEventId;

    /**
     * 挑戦可能な期間を指定するイベントマスター のGRNを取得
     *
     * @return string|null クエストモデルマスターを新規作成
     */
    public function getChallengePeriodEventId(): ?string {
        return $this->challengePeriodEventId;
    }

    /**
     * 挑戦可能な期間を指定するイベントマスター のGRNを設定
     *
     * @param string $challengePeriodEventId クエストモデルマスターを新規作成
     */
    public function setChallengePeriodEventId(string $challengePeriodEventId) {
        $this->challengePeriodEventId = $challengePeriodEventId;
    }

    /**
     * 挑戦可能な期間を指定するイベントマスター のGRNを設定
     *
     * @param string $challengePeriodEventId クエストモデルマスターを新規作成
     * @return CreateQuestModelMasterRequest $this
     */
    public function withChallengePeriodEventId(string $challengePeriodEventId): CreateQuestModelMasterRequest {
        $this->setChallengePeriodEventId($challengePeriodEventId);
        return $this;
    }

    /** @var ConsumeAction[] クエストの参加料 */
    private $consumeActions;

    /**
     * クエストの参加料を取得
     *
     * @return ConsumeAction[]|null クエストモデルマスターを新規作成
     */
    public function getConsumeActions(): ?array {
        return $this->consumeActions;
    }

    /**
     * クエストの参加料を設定
     *
     * @param ConsumeAction[] $consumeActions クエストモデルマスターを新規作成
     */
    public function setConsumeActions(array $consumeActions) {
        $this->consumeActions = $consumeActions;
    }

    /**
     * クエストの参加料を設定
     *
     * @param ConsumeAction[] $consumeActions クエストモデルマスターを新規作成
     * @return CreateQuestModelMasterRequest $this
     */
    public function withConsumeActions(array $consumeActions): CreateQuestModelMasterRequest {
        $this->setConsumeActions($consumeActions);
        return $this;
    }

    /** @var AcquireAction[] クエスト失敗時の報酬 */
    private $failedAcquireActions;

    /**
     * クエスト失敗時の報酬を取得
     *
     * @return AcquireAction[]|null クエストモデルマスターを新規作成
     */
    public function getFailedAcquireActions(): ?array {
        return $this->failedAcquireActions;
    }

    /**
     * クエスト失敗時の報酬を設定
     *
     * @param AcquireAction[] $failedAcquireActions クエストモデルマスターを新規作成
     */
    public function setFailedAcquireActions(array $failedAcquireActions) {
        $this->failedAcquireActions = $failedAcquireActions;
    }

    /**
     * クエスト失敗時の報酬を設定
     *
     * @param AcquireAction[] $failedAcquireActions クエストモデルマスターを新規作成
     * @return CreateQuestModelMasterRequest $this
     */
    public function withFailedAcquireActions(array $failedAcquireActions): CreateQuestModelMasterRequest {
        $this->setFailedAcquireActions($failedAcquireActions);
        return $this;
    }

    /** @var string[] クエストに挑戦するためにクリアしておく必要のあるクエスト名 */
    private $premiseQuestNames;

    /**
     * クエストに挑戦するためにクリアしておく必要のあるクエスト名を取得
     *
     * @return string[]|null クエストモデルマスターを新規作成
     */
    public function getPremiseQuestNames(): ?array {
        return $this->premiseQuestNames;
    }

    /**
     * クエストに挑戦するためにクリアしておく必要のあるクエスト名を設定
     *
     * @param string[] $premiseQuestNames クエストモデルマスターを新規作成
     */
    public function setPremiseQuestNames(array $premiseQuestNames) {
        $this->premiseQuestNames = $premiseQuestNames;
    }

    /**
     * クエストに挑戦するためにクリアしておく必要のあるクエスト名を設定
     *
     * @param string[] $premiseQuestNames クエストモデルマスターを新規作成
     * @return CreateQuestModelMasterRequest $this
     */
    public function withPremiseQuestNames(array $premiseQuestNames): CreateQuestModelMasterRequest {
        $this->setPremiseQuestNames($premiseQuestNames);
        return $this;
    }

}