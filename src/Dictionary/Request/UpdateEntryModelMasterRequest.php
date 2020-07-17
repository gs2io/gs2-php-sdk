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
 * エントリーモデルマスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateEntryModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null エントリーモデルマスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName エントリーモデルマスターを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName エントリーモデルマスターを更新
     * @return UpdateEntryModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateEntryModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string エントリーモデル名 */
    private $entryName;

    /**
     * エントリーモデル名を取得
     *
     * @return string|null エントリーモデルマスターを更新
     */
    public function getEntryName(): ?string {
        return $this->entryName;
    }

    /**
     * エントリーモデル名を設定
     *
     * @param string $entryName エントリーモデルマスターを更新
     */
    public function setEntryName(string $entryName = null) {
        $this->entryName = $entryName;
    }

    /**
     * エントリーモデル名を設定
     *
     * @param string $entryName エントリーモデルマスターを更新
     * @return UpdateEntryModelMasterRequest $this
     */
    public function withEntryName(string $entryName = null): UpdateEntryModelMasterRequest {
        $this->setEntryName($entryName);
        return $this;
    }

    /** @var string エントリーモデルマスターの説明 */
    private $description;

    /**
     * エントリーモデルマスターの説明を取得
     *
     * @return string|null エントリーモデルマスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * エントリーモデルマスターの説明を設定
     *
     * @param string $description エントリーモデルマスターを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * エントリーモデルマスターの説明を設定
     *
     * @param string $description エントリーモデルマスターを更新
     * @return UpdateEntryModelMasterRequest $this
     */
    public function withDescription(string $description = null): UpdateEntryModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string エントリーモデルのメタデータ */
    private $metadata;

    /**
     * エントリーモデルのメタデータを取得
     *
     * @return string|null エントリーモデルマスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * エントリーモデルのメタデータを設定
     *
     * @param string $metadata エントリーモデルマスターを更新
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * エントリーモデルのメタデータを設定
     *
     * @param string $metadata エントリーモデルマスターを更新
     * @return UpdateEntryModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): UpdateEntryModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

}