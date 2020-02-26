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
use Gs2\Formation\Model\SlotModel;

/**
 * フォームマスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateFormModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null フォームマスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName フォームマスターを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName フォームマスターを更新
     * @return UpdateFormModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateFormModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string フォーム名 */
    private $formModelName;

    /**
     * フォーム名を取得
     *
     * @return string|null フォームマスターを更新
     */
    public function getFormModelName(): ?string {
        return $this->formModelName;
    }

    /**
     * フォーム名を設定
     *
     * @param string $formModelName フォームマスターを更新
     */
    public function setFormModelName(string $formModelName) {
        $this->formModelName = $formModelName;
    }

    /**
     * フォーム名を設定
     *
     * @param string $formModelName フォームマスターを更新
     * @return UpdateFormModelMasterRequest $this
     */
    public function withFormModelName(string $formModelName): UpdateFormModelMasterRequest {
        $this->setFormModelName($formModelName);
        return $this;
    }

    /** @var string フォームマスターの説明 */
    private $description;

    /**
     * フォームマスターの説明を取得
     *
     * @return string|null フォームマスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * フォームマスターの説明を設定
     *
     * @param string $description フォームマスターを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * フォームマスターの説明を設定
     *
     * @param string $description フォームマスターを更新
     * @return UpdateFormModelMasterRequest $this
     */
    public function withDescription(string $description): UpdateFormModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string フォームのメタデータ */
    private $metadata;

    /**
     * フォームのメタデータを取得
     *
     * @return string|null フォームマスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * フォームのメタデータを設定
     *
     * @param string $metadata フォームマスターを更新
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * フォームのメタデータを設定
     *
     * @param string $metadata フォームマスターを更新
     * @return UpdateFormModelMasterRequest $this
     */
    public function withMetadata(string $metadata): UpdateFormModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var SlotModel[] スロットリスト */
    private $slots;

    /**
     * スロットリストを取得
     *
     * @return SlotModel[]|null フォームマスターを更新
     */
    public function getSlots(): ?array {
        return $this->slots;
    }

    /**
     * スロットリストを設定
     *
     * @param SlotModel[] $slots フォームマスターを更新
     */
    public function setSlots(array $slots) {
        $this->slots = $slots;
    }

    /**
     * スロットリストを設定
     *
     * @param SlotModel[] $slots フォームマスターを更新
     * @return UpdateFormModelMasterRequest $this
     */
    public function withSlots(array $slots): UpdateFormModelMasterRequest {
        $this->setSlots($slots);
        return $this;
    }

}