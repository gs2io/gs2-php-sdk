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
 * フォームマスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateFormModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null フォームマスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName フォームマスターを新規作成
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName フォームマスターを新規作成
     * @return CreateFormModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CreateFormModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string フォーム名 */
    private $name;

    /**
     * フォーム名を取得
     *
     * @return string|null フォームマスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * フォーム名を設定
     *
     * @param string $name フォームマスターを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * フォーム名を設定
     *
     * @param string $name フォームマスターを新規作成
     * @return CreateFormModelMasterRequest $this
     */
    public function withName(string $name = null): CreateFormModelMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string フォームマスターの説明 */
    private $description;

    /**
     * フォームマスターの説明を取得
     *
     * @return string|null フォームマスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * フォームマスターの説明を設定
     *
     * @param string $description フォームマスターを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * フォームマスターの説明を設定
     *
     * @param string $description フォームマスターを新規作成
     * @return CreateFormModelMasterRequest $this
     */
    public function withDescription(string $description = null): CreateFormModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string フォームのメタデータ */
    private $metadata;

    /**
     * フォームのメタデータを取得
     *
     * @return string|null フォームマスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * フォームのメタデータを設定
     *
     * @param string $metadata フォームマスターを新規作成
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * フォームのメタデータを設定
     *
     * @param string $metadata フォームマスターを新規作成
     * @return CreateFormModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): CreateFormModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var SlotModel[] スロットリスト */
    private $slots;

    /**
     * スロットリストを取得
     *
     * @return SlotModel[]|null フォームマスターを新規作成
     */
    public function getSlots(): ?array {
        return $this->slots;
    }

    /**
     * スロットリストを設定
     *
     * @param SlotModel[] $slots フォームマスターを新規作成
     */
    public function setSlots(array $slots = null) {
        $this->slots = $slots;
    }

    /**
     * スロットリストを設定
     *
     * @param SlotModel[] $slots フォームマスターを新規作成
     * @return CreateFormModelMasterRequest $this
     */
    public function withSlots(array $slots = null): CreateFormModelMasterRequest {
        $this->setSlots($slots);
        return $this;
    }

}