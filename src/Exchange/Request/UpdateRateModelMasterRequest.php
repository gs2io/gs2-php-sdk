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

namespace Gs2\Exchange\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Exchange\Model\ConsumeAction;
use Gs2\Exchange\Model\AcquireAction;

/**
 * 交換レートマスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateRateModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 交換レートマスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 交換レートマスターを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 交換レートマスターを更新
     * @return UpdateRateModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateRateModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 交換レート名 */
    private $rateName;

    /**
     * 交換レート名を取得
     *
     * @return string|null 交換レートマスターを更新
     */
    public function getRateName(): ?string {
        return $this->rateName;
    }

    /**
     * 交換レート名を設定
     *
     * @param string $rateName 交換レートマスターを更新
     */
    public function setRateName(string $rateName = null) {
        $this->rateName = $rateName;
    }

    /**
     * 交換レート名を設定
     *
     * @param string $rateName 交換レートマスターを更新
     * @return UpdateRateModelMasterRequest $this
     */
    public function withRateName(string $rateName = null): UpdateRateModelMasterRequest {
        $this->setRateName($rateName);
        return $this;
    }

    /** @var string 交換レートマスターの説明 */
    private $description;

    /**
     * 交換レートマスターの説明を取得
     *
     * @return string|null 交換レートマスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 交換レートマスターの説明を設定
     *
     * @param string $description 交換レートマスターを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * 交換レートマスターの説明を設定
     *
     * @param string $description 交換レートマスターを更新
     * @return UpdateRateModelMasterRequest $this
     */
    public function withDescription(string $description = null): UpdateRateModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 交換レートのメタデータ */
    private $metadata;

    /**
     * 交換レートのメタデータを取得
     *
     * @return string|null 交換レートマスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * 交換レートのメタデータを設定
     *
     * @param string $metadata 交換レートマスターを更新
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * 交換レートのメタデータを設定
     *
     * @param string $metadata 交換レートマスターを更新
     * @return UpdateRateModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): UpdateRateModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string 交換の種類 */
    private $timingType;

    /**
     * 交換の種類を取得
     *
     * @return string|null 交換レートマスターを更新
     */
    public function getTimingType(): ?string {
        return $this->timingType;
    }

    /**
     * 交換の種類を設定
     *
     * @param string $timingType 交換レートマスターを更新
     */
    public function setTimingType(string $timingType = null) {
        $this->timingType = $timingType;
    }

    /**
     * 交換の種類を設定
     *
     * @param string $timingType 交換レートマスターを更新
     * @return UpdateRateModelMasterRequest $this
     */
    public function withTimingType(string $timingType = null): UpdateRateModelMasterRequest {
        $this->setTimingType($timingType);
        return $this;
    }

    /** @var int 交換実行から実際に報酬を受け取れるようになるまでの待ち時間（分） */
    private $lockTime;

    /**
     * 交換実行から実際に報酬を受け取れるようになるまでの待ち時間（分）を取得
     *
     * @return int|null 交換レートマスターを更新
     */
    public function getLockTime(): ?int {
        return $this->lockTime;
    }

    /**
     * 交換実行から実際に報酬を受け取れるようになるまでの待ち時間（分）を設定
     *
     * @param int $lockTime 交換レートマスターを更新
     */
    public function setLockTime(int $lockTime = null) {
        $this->lockTime = $lockTime;
    }

    /**
     * 交換実行から実際に報酬を受け取れるようになるまでの待ち時間（分）を設定
     *
     * @param int $lockTime 交換レートマスターを更新
     * @return UpdateRateModelMasterRequest $this
     */
    public function withLockTime(int $lockTime = null): UpdateRateModelMasterRequest {
        $this->setLockTime($lockTime);
        return $this;
    }

    /** @var bool スキップをすることができるか */
    private $enableSkip;

    /**
     * スキップをすることができるかを取得
     *
     * @return bool|null 交換レートマスターを更新
     */
    public function getEnableSkip(): ?bool {
        return $this->enableSkip;
    }

    /**
     * スキップをすることができるかを設定
     *
     * @param bool $enableSkip 交換レートマスターを更新
     */
    public function setEnableSkip(bool $enableSkip = null) {
        $this->enableSkip = $enableSkip;
    }

    /**
     * スキップをすることができるかを設定
     *
     * @param bool $enableSkip 交換レートマスターを更新
     * @return UpdateRateModelMasterRequest $this
     */
    public function withEnableSkip(bool $enableSkip = null): UpdateRateModelMasterRequest {
        $this->setEnableSkip($enableSkip);
        return $this;
    }

    /** @var ConsumeAction[] 時短消費アクションリスト */
    private $skipConsumeActions;

    /**
     * 時短消費アクションリストを取得
     *
     * @return ConsumeAction[]|null 交換レートマスターを更新
     */
    public function getSkipConsumeActions(): ?array {
        return $this->skipConsumeActions;
    }

    /**
     * 時短消費アクションリストを設定
     *
     * @param ConsumeAction[] $skipConsumeActions 交換レートマスターを更新
     */
    public function setSkipConsumeActions(array $skipConsumeActions = null) {
        $this->skipConsumeActions = $skipConsumeActions;
    }

    /**
     * 時短消費アクションリストを設定
     *
     * @param ConsumeAction[] $skipConsumeActions 交換レートマスターを更新
     * @return UpdateRateModelMasterRequest $this
     */
    public function withSkipConsumeActions(array $skipConsumeActions = null): UpdateRateModelMasterRequest {
        $this->setSkipConsumeActions($skipConsumeActions);
        return $this;
    }

    /** @var AcquireAction[] 入手アクションリスト */
    private $acquireActions;

    /**
     * 入手アクションリストを取得
     *
     * @return AcquireAction[]|null 交換レートマスターを更新
     */
    public function getAcquireActions(): ?array {
        return $this->acquireActions;
    }

    /**
     * 入手アクションリストを設定
     *
     * @param AcquireAction[] $acquireActions 交換レートマスターを更新
     */
    public function setAcquireActions(array $acquireActions = null) {
        $this->acquireActions = $acquireActions;
    }

    /**
     * 入手アクションリストを設定
     *
     * @param AcquireAction[] $acquireActions 交換レートマスターを更新
     * @return UpdateRateModelMasterRequest $this
     */
    public function withAcquireActions(array $acquireActions = null): UpdateRateModelMasterRequest {
        $this->setAcquireActions($acquireActions);
        return $this;
    }

    /** @var ConsumeAction[] 消費アクションリスト */
    private $consumeActions;

    /**
     * 消費アクションリストを取得
     *
     * @return ConsumeAction[]|null 交換レートマスターを更新
     */
    public function getConsumeActions(): ?array {
        return $this->consumeActions;
    }

    /**
     * 消費アクションリストを設定
     *
     * @param ConsumeAction[] $consumeActions 交換レートマスターを更新
     */
    public function setConsumeActions(array $consumeActions = null) {
        $this->consumeActions = $consumeActions;
    }

    /**
     * 消費アクションリストを設定
     *
     * @param ConsumeAction[] $consumeActions 交換レートマスターを更新
     * @return UpdateRateModelMasterRequest $this
     */
    public function withConsumeActions(array $consumeActions = null): UpdateRateModelMasterRequest {
        $this->setConsumeActions($consumeActions);
        return $this;
    }

}