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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * エントリーモデルマスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateEntryModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null エントリーモデルマスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName エントリーモデルマスターを新規作成
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName エントリーモデルマスターを新規作成
     * @return CreateEntryModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CreateEntryModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string エントリーモデル名 */
    private $name;

    /**
     * エントリーモデル名を取得
     *
     * @return string|null エントリーモデルマスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * エントリーモデル名を設定
     *
     * @param string $name エントリーモデルマスターを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * エントリーモデル名を設定
     *
     * @param string $name エントリーモデルマスターを新規作成
     * @return CreateEntryModelMasterRequest $this
     */
    public function withName(string $name = null): CreateEntryModelMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string エントリーモデルマスターの説明 */
    private $description;

    /**
     * エントリーモデルマスターの説明を取得
     *
     * @return string|null エントリーモデルマスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * エントリーモデルマスターの説明を設定
     *
     * @param string $description エントリーモデルマスターを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * エントリーモデルマスターの説明を設定
     *
     * @param string $description エントリーモデルマスターを新規作成
     * @return CreateEntryModelMasterRequest $this
     */
    public function withDescription(string $description = null): CreateEntryModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string エントリーモデルのメタデータ */
    private $metadata;

    /**
     * エントリーモデルのメタデータを取得
     *
     * @return string|null エントリーモデルマスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * エントリーモデルのメタデータを設定
     *
     * @param string $metadata エントリーモデルマスターを新規作成
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * エントリーモデルのメタデータを設定
     *
     * @param string $metadata エントリーモデルマスターを新規作成
     * @return CreateEntryModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): CreateEntryModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

}