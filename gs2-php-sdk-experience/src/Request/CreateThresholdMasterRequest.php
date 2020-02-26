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
 * ランクアップ閾値マスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateThresholdMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ランクアップ閾値マスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ランクアップ閾値マスターを新規作成
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ランクアップ閾値マスターを新規作成
     * @return CreateThresholdMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): CreateThresholdMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ランクアップ閾値名 */
    private $name;

    /**
     * ランクアップ閾値名を取得
     *
     * @return string|null ランクアップ閾値マスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * ランクアップ閾値名を設定
     *
     * @param string $name ランクアップ閾値マスターを新規作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * ランクアップ閾値名を設定
     *
     * @param string $name ランクアップ閾値マスターを新規作成
     * @return CreateThresholdMasterRequest $this
     */
    public function withName(string $name): CreateThresholdMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string ランクアップ閾値マスターの説明 */
    private $description;

    /**
     * ランクアップ閾値マスターの説明を取得
     *
     * @return string|null ランクアップ閾値マスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ランクアップ閾値マスターの説明を設定
     *
     * @param string $description ランクアップ閾値マスターを新規作成
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * ランクアップ閾値マスターの説明を設定
     *
     * @param string $description ランクアップ閾値マスターを新規作成
     * @return CreateThresholdMasterRequest $this
     */
    public function withDescription(string $description): CreateThresholdMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string ランクアップ閾値のメタデータ */
    private $metadata;

    /**
     * ランクアップ閾値のメタデータを取得
     *
     * @return string|null ランクアップ閾値マスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * ランクアップ閾値のメタデータを設定
     *
     * @param string $metadata ランクアップ閾値マスターを新規作成
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * ランクアップ閾値のメタデータを設定
     *
     * @param string $metadata ランクアップ閾値マスターを新規作成
     * @return CreateThresholdMasterRequest $this
     */
    public function withMetadata(string $metadata): CreateThresholdMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var int[] ランクアップ経験値閾値リスト */
    private $values;

    /**
     * ランクアップ経験値閾値リストを取得
     *
     * @return int[]|null ランクアップ閾値マスターを新規作成
     */
    public function getValues(): ?array {
        return $this->values;
    }

    /**
     * ランクアップ経験値閾値リストを設定
     *
     * @param int[] $values ランクアップ閾値マスターを新規作成
     */
    public function setValues(array $values) {
        $this->values = $values;
    }

    /**
     * ランクアップ経験値閾値リストを設定
     *
     * @param int[] $values ランクアップ閾値マスターを新規作成
     * @return CreateThresholdMasterRequest $this
     */
    public function withValues(array $values): CreateThresholdMasterRequest {
        $this->setValues($values);
        return $this;
    }

}