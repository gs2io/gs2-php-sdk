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

namespace Gs2\Distributor\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 配信設定マスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateDistributorModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 配信設定マスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 配信設定マスターを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 配信設定マスターを更新
     * @return UpdateDistributorModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateDistributorModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 配信設定名 */
    private $distributorName;

    /**
     * 配信設定名を取得
     *
     * @return string|null 配信設定マスターを更新
     */
    public function getDistributorName(): ?string {
        return $this->distributorName;
    }

    /**
     * 配信設定名を設定
     *
     * @param string $distributorName 配信設定マスターを更新
     */
    public function setDistributorName(string $distributorName) {
        $this->distributorName = $distributorName;
    }

    /**
     * 配信設定名を設定
     *
     * @param string $distributorName 配信設定マスターを更新
     * @return UpdateDistributorModelMasterRequest $this
     */
    public function withDistributorName(string $distributorName): UpdateDistributorModelMasterRequest {
        $this->setDistributorName($distributorName);
        return $this;
    }

    /** @var string 配信設定マスターの説明 */
    private $description;

    /**
     * 配信設定マスターの説明を取得
     *
     * @return string|null 配信設定マスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 配信設定マスターの説明を設定
     *
     * @param string $description 配信設定マスターを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * 配信設定マスターの説明を設定
     *
     * @param string $description 配信設定マスターを更新
     * @return UpdateDistributorModelMasterRequest $this
     */
    public function withDescription(string $description): UpdateDistributorModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 配信設定のメタデータ */
    private $metadata;

    /**
     * 配信設定のメタデータを取得
     *
     * @return string|null 配信設定マスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * 配信設定のメタデータを設定
     *
     * @param string $metadata 配信設定マスターを更新
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * 配信設定のメタデータを設定
     *
     * @param string $metadata 配信設定マスターを更新
     * @return UpdateDistributorModelMasterRequest $this
     */
    public function withMetadata(string $metadata): UpdateDistributorModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string 所持品がキャパシティをオーバーしたときに転送するプレゼントボックスのネームスペース のGRN */
    private $inboxNamespaceId;

    /**
     * 所持品がキャパシティをオーバーしたときに転送するプレゼントボックスのネームスペース のGRNを取得
     *
     * @return string|null 配信設定マスターを更新
     */
    public function getInboxNamespaceId(): ?string {
        return $this->inboxNamespaceId;
    }

    /**
     * 所持品がキャパシティをオーバーしたときに転送するプレゼントボックスのネームスペース のGRNを設定
     *
     * @param string $inboxNamespaceId 配信設定マスターを更新
     */
    public function setInboxNamespaceId(string $inboxNamespaceId) {
        $this->inboxNamespaceId = $inboxNamespaceId;
    }

    /**
     * 所持品がキャパシティをオーバーしたときに転送するプレゼントボックスのネームスペース のGRNを設定
     *
     * @param string $inboxNamespaceId 配信設定マスターを更新
     * @return UpdateDistributorModelMasterRequest $this
     */
    public function withInboxNamespaceId(string $inboxNamespaceId): UpdateDistributorModelMasterRequest {
        $this->setInboxNamespaceId($inboxNamespaceId);
        return $this;
    }

    /** @var string[] ディストリビューターを通して処理出来る対象のリソースGRNのホワイトリスト */
    private $whiteListTargetIds;

    /**
     * ディストリビューターを通して処理出来る対象のリソースGRNのホワイトリストを取得
     *
     * @return string[]|null 配信設定マスターを更新
     */
    public function getWhiteListTargetIds(): ?array {
        return $this->whiteListTargetIds;
    }

    /**
     * ディストリビューターを通して処理出来る対象のリソースGRNのホワイトリストを設定
     *
     * @param string[] $whiteListTargetIds 配信設定マスターを更新
     */
    public function setWhiteListTargetIds(array $whiteListTargetIds) {
        $this->whiteListTargetIds = $whiteListTargetIds;
    }

    /**
     * ディストリビューターを通して処理出来る対象のリソースGRNのホワイトリストを設定
     *
     * @param string[] $whiteListTargetIds 配信設定マスターを更新
     * @return UpdateDistributorModelMasterRequest $this
     */
    public function withWhiteListTargetIds(array $whiteListTargetIds): UpdateDistributorModelMasterRequest {
        $this->setWhiteListTargetIds($whiteListTargetIds);
        return $this;
    }

}