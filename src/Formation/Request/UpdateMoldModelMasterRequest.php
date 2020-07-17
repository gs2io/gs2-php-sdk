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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * フォームの保存領域マスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateMoldModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null フォームの保存領域マスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName フォームの保存領域マスターを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName フォームの保存領域マスターを更新
     * @return UpdateMoldModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateMoldModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string フォームの保存領域名 */
    private $moldName;

    /**
     * フォームの保存領域名を取得
     *
     * @return string|null フォームの保存領域マスターを更新
     */
    public function getMoldName(): ?string {
        return $this->moldName;
    }

    /**
     * フォームの保存領域名を設定
     *
     * @param string $moldName フォームの保存領域マスターを更新
     */
    public function setMoldName(string $moldName = null) {
        $this->moldName = $moldName;
    }

    /**
     * フォームの保存領域名を設定
     *
     * @param string $moldName フォームの保存領域マスターを更新
     * @return UpdateMoldModelMasterRequest $this
     */
    public function withMoldName(string $moldName = null): UpdateMoldModelMasterRequest {
        $this->setMoldName($moldName);
        return $this;
    }

    /** @var string フォームの保存領域マスターの説明 */
    private $description;

    /**
     * フォームの保存領域マスターの説明を取得
     *
     * @return string|null フォームの保存領域マスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * フォームの保存領域マスターの説明を設定
     *
     * @param string $description フォームの保存領域マスターを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * フォームの保存領域マスターの説明を設定
     *
     * @param string $description フォームの保存領域マスターを更新
     * @return UpdateMoldModelMasterRequest $this
     */
    public function withDescription(string $description = null): UpdateMoldModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string フォームの保存領域のメタデータ */
    private $metadata;

    /**
     * フォームの保存領域のメタデータを取得
     *
     * @return string|null フォームの保存領域マスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * フォームの保存領域のメタデータを設定
     *
     * @param string $metadata フォームの保存領域マスターを更新
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * フォームの保存領域のメタデータを設定
     *
     * @param string $metadata フォームの保存領域マスターを更新
     * @return UpdateMoldModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): UpdateMoldModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string フォーム名 */
    private $formModelName;

    /**
     * フォーム名を取得
     *
     * @return string|null フォームの保存領域マスターを更新
     */
    public function getFormModelName(): ?string {
        return $this->formModelName;
    }

    /**
     * フォーム名を設定
     *
     * @param string $formModelName フォームの保存領域マスターを更新
     */
    public function setFormModelName(string $formModelName = null) {
        $this->formModelName = $formModelName;
    }

    /**
     * フォーム名を設定
     *
     * @param string $formModelName フォームの保存領域マスターを更新
     * @return UpdateMoldModelMasterRequest $this
     */
    public function withFormModelName(string $formModelName = null): UpdateMoldModelMasterRequest {
        $this->setFormModelName($formModelName);
        return $this;
    }

    /** @var int フォームを保存できる初期キャパシティ */
    private $initialMaxCapacity;

    /**
     * フォームを保存できる初期キャパシティを取得
     *
     * @return int|null フォームの保存領域マスターを更新
     */
    public function getInitialMaxCapacity(): ?int {
        return $this->initialMaxCapacity;
    }

    /**
     * フォームを保存できる初期キャパシティを設定
     *
     * @param int $initialMaxCapacity フォームの保存領域マスターを更新
     */
    public function setInitialMaxCapacity(int $initialMaxCapacity = null) {
        $this->initialMaxCapacity = $initialMaxCapacity;
    }

    /**
     * フォームを保存できる初期キャパシティを設定
     *
     * @param int $initialMaxCapacity フォームの保存領域マスターを更新
     * @return UpdateMoldModelMasterRequest $this
     */
    public function withInitialMaxCapacity(int $initialMaxCapacity = null): UpdateMoldModelMasterRequest {
        $this->setInitialMaxCapacity($initialMaxCapacity);
        return $this;
    }

    /** @var int フォームを保存できるキャパシティ */
    private $maxCapacity;

    /**
     * フォームを保存できるキャパシティを取得
     *
     * @return int|null フォームの保存領域マスターを更新
     */
    public function getMaxCapacity(): ?int {
        return $this->maxCapacity;
    }

    /**
     * フォームを保存できるキャパシティを設定
     *
     * @param int $maxCapacity フォームの保存領域マスターを更新
     */
    public function setMaxCapacity(int $maxCapacity = null) {
        $this->maxCapacity = $maxCapacity;
    }

    /**
     * フォームを保存できるキャパシティを設定
     *
     * @param int $maxCapacity フォームの保存領域マスターを更新
     * @return UpdateMoldModelMasterRequest $this
     */
    public function withMaxCapacity(int $maxCapacity = null): UpdateMoldModelMasterRequest {
        $this->setMaxCapacity($maxCapacity);
        return $this;
    }

}