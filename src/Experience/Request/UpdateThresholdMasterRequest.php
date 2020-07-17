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

namespace Gs2\Experience\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ランクアップ閾値マスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateThresholdMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ランクアップ閾値マスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ランクアップ閾値マスターを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ランクアップ閾値マスターを更新
     * @return UpdateThresholdMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateThresholdMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ランクアップ閾値名 */
    private $thresholdName;

    /**
     * ランクアップ閾値名を取得
     *
     * @return string|null ランクアップ閾値マスターを更新
     */
    public function getThresholdName(): ?string {
        return $this->thresholdName;
    }

    /**
     * ランクアップ閾値名を設定
     *
     * @param string $thresholdName ランクアップ閾値マスターを更新
     */
    public function setThresholdName(string $thresholdName = null) {
        $this->thresholdName = $thresholdName;
    }

    /**
     * ランクアップ閾値名を設定
     *
     * @param string $thresholdName ランクアップ閾値マスターを更新
     * @return UpdateThresholdMasterRequest $this
     */
    public function withThresholdName(string $thresholdName = null): UpdateThresholdMasterRequest {
        $this->setThresholdName($thresholdName);
        return $this;
    }

    /** @var string ランクアップ閾値マスターの説明 */
    private $description;

    /**
     * ランクアップ閾値マスターの説明を取得
     *
     * @return string|null ランクアップ閾値マスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ランクアップ閾値マスターの説明を設定
     *
     * @param string $description ランクアップ閾値マスターを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * ランクアップ閾値マスターの説明を設定
     *
     * @param string $description ランクアップ閾値マスターを更新
     * @return UpdateThresholdMasterRequest $this
     */
    public function withDescription(string $description = null): UpdateThresholdMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string ランクアップ閾値のメタデータ */
    private $metadata;

    /**
     * ランクアップ閾値のメタデータを取得
     *
     * @return string|null ランクアップ閾値マスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * ランクアップ閾値のメタデータを設定
     *
     * @param string $metadata ランクアップ閾値マスターを更新
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * ランクアップ閾値のメタデータを設定
     *
     * @param string $metadata ランクアップ閾値マスターを更新
     * @return UpdateThresholdMasterRequest $this
     */
    public function withMetadata(string $metadata = null): UpdateThresholdMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var int[] ランクアップ経験値閾値リスト */
    private $values;

    /**
     * ランクアップ経験値閾値リストを取得
     *
     * @return int[]|null ランクアップ閾値マスターを更新
     */
    public function getValues(): ?array {
        return $this->values;
    }

    /**
     * ランクアップ経験値閾値リストを設定
     *
     * @param int[] $values ランクアップ閾値マスターを更新
     */
    public function setValues(array $values = null) {
        $this->values = $values;
    }

    /**
     * ランクアップ経験値閾値リストを設定
     *
     * @param int[] $values ランクアップ閾値マスターを更新
     * @return UpdateThresholdMasterRequest $this
     */
    public function withValues(array $values = null): UpdateThresholdMasterRequest {
        $this->setValues($values);
        return $this;
    }

}