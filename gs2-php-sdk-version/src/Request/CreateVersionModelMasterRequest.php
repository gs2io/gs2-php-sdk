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

namespace Gs2\Version\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Version\Model\Version;

/**
 * バージョンマスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateVersionModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null バージョンマスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName バージョンマスターを新規作成
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName バージョンマスターを新規作成
     * @return CreateVersionModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): CreateVersionModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string バージョン名 */
    private $name;

    /**
     * バージョン名を取得
     *
     * @return string|null バージョンマスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * バージョン名を設定
     *
     * @param string $name バージョンマスターを新規作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * バージョン名を設定
     *
     * @param string $name バージョンマスターを新規作成
     * @return CreateVersionModelMasterRequest $this
     */
    public function withName(string $name): CreateVersionModelMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string バージョンマスターの説明 */
    private $description;

    /**
     * バージョンマスターの説明を取得
     *
     * @return string|null バージョンマスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * バージョンマスターの説明を設定
     *
     * @param string $description バージョンマスターを新規作成
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * バージョンマスターの説明を設定
     *
     * @param string $description バージョンマスターを新規作成
     * @return CreateVersionModelMasterRequest $this
     */
    public function withDescription(string $description): CreateVersionModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string バージョンのメタデータ */
    private $metadata;

    /**
     * バージョンのメタデータを取得
     *
     * @return string|null バージョンマスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * バージョンのメタデータを設定
     *
     * @param string $metadata バージョンマスターを新規作成
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * バージョンのメタデータを設定
     *
     * @param string $metadata バージョンマスターを新規作成
     * @return CreateVersionModelMasterRequest $this
     */
    public function withMetadata(string $metadata): CreateVersionModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var Version バージョンアップを促すバージョン */
    private $warningVersion;

    /**
     * バージョンアップを促すバージョンを取得
     *
     * @return Version|null バージョンマスターを新規作成
     */
    public function getWarningVersion(): ?Version {
        return $this->warningVersion;
    }

    /**
     * バージョンアップを促すバージョンを設定
     *
     * @param Version $warningVersion バージョンマスターを新規作成
     */
    public function setWarningVersion(Version $warningVersion) {
        $this->warningVersion = $warningVersion;
    }

    /**
     * バージョンアップを促すバージョンを設定
     *
     * @param Version $warningVersion バージョンマスターを新規作成
     * @return CreateVersionModelMasterRequest $this
     */
    public function withWarningVersion(Version $warningVersion): CreateVersionModelMasterRequest {
        $this->setWarningVersion($warningVersion);
        return $this;
    }

    /** @var Version バージョンチェックを蹴るバージョン */
    private $errorVersion;

    /**
     * バージョンチェックを蹴るバージョンを取得
     *
     * @return Version|null バージョンマスターを新規作成
     */
    public function getErrorVersion(): ?Version {
        return $this->errorVersion;
    }

    /**
     * バージョンチェックを蹴るバージョンを設定
     *
     * @param Version $errorVersion バージョンマスターを新規作成
     */
    public function setErrorVersion(Version $errorVersion) {
        $this->errorVersion = $errorVersion;
    }

    /**
     * バージョンチェックを蹴るバージョンを設定
     *
     * @param Version $errorVersion バージョンマスターを新規作成
     * @return CreateVersionModelMasterRequest $this
     */
    public function withErrorVersion(Version $errorVersion): CreateVersionModelMasterRequest {
        $this->setErrorVersion($errorVersion);
        return $this;
    }

    /** @var string 判定に使用するバージョン値の種類 */
    private $scope;

    /**
     * 判定に使用するバージョン値の種類を取得
     *
     * @return string|null バージョンマスターを新規作成
     */
    public function getScope(): ?string {
        return $this->scope;
    }

    /**
     * 判定に使用するバージョン値の種類を設定
     *
     * @param string $scope バージョンマスターを新規作成
     */
    public function setScope(string $scope) {
        $this->scope = $scope;
    }

    /**
     * 判定に使用するバージョン値の種類を設定
     *
     * @param string $scope バージョンマスターを新規作成
     * @return CreateVersionModelMasterRequest $this
     */
    public function withScope(string $scope): CreateVersionModelMasterRequest {
        $this->setScope($scope);
        return $this;
    }

    /** @var Version 現在のバージョン */
    private $currentVersion;

    /**
     * 現在のバージョンを取得
     *
     * @return Version|null バージョンマスターを新規作成
     */
    public function getCurrentVersion(): ?Version {
        return $this->currentVersion;
    }

    /**
     * 現在のバージョンを設定
     *
     * @param Version $currentVersion バージョンマスターを新規作成
     */
    public function setCurrentVersion(Version $currentVersion) {
        $this->currentVersion = $currentVersion;
    }

    /**
     * 現在のバージョンを設定
     *
     * @param Version $currentVersion バージョンマスターを新規作成
     * @return CreateVersionModelMasterRequest $this
     */
    public function withCurrentVersion(Version $currentVersion): CreateVersionModelMasterRequest {
        $this->setCurrentVersion($currentVersion);
        return $this;
    }

    /** @var bool 判定するバージョン値に署名検証を必要とするか */
    private $needSignature;

    /**
     * 判定するバージョン値に署名検証を必要とするかを取得
     *
     * @return bool|null バージョンマスターを新規作成
     */
    public function getNeedSignature(): ?bool {
        return $this->needSignature;
    }

    /**
     * 判定するバージョン値に署名検証を必要とするかを設定
     *
     * @param bool $needSignature バージョンマスターを新規作成
     */
    public function setNeedSignature(bool $needSignature) {
        $this->needSignature = $needSignature;
    }

    /**
     * 判定するバージョン値に署名検証を必要とするかを設定
     *
     * @param bool $needSignature バージョンマスターを新規作成
     * @return CreateVersionModelMasterRequest $this
     */
    public function withNeedSignature(bool $needSignature): CreateVersionModelMasterRequest {
        $this->setNeedSignature($needSignature);
        return $this;
    }

    /** @var string 署名検証に使用する暗号鍵 のGRN */
    private $signatureKeyId;

    /**
     * 署名検証に使用する暗号鍵 のGRNを取得
     *
     * @return string|null バージョンマスターを新規作成
     */
    public function getSignatureKeyId(): ?string {
        return $this->signatureKeyId;
    }

    /**
     * 署名検証に使用する暗号鍵 のGRNを設定
     *
     * @param string $signatureKeyId バージョンマスターを新規作成
     */
    public function setSignatureKeyId(string $signatureKeyId) {
        $this->signatureKeyId = $signatureKeyId;
    }

    /**
     * 署名検証に使用する暗号鍵 のGRNを設定
     *
     * @param string $signatureKeyId バージョンマスターを新規作成
     * @return CreateVersionModelMasterRequest $this
     */
    public function withSignatureKeyId(string $signatureKeyId): CreateVersionModelMasterRequest {
        $this->setSignatureKeyId($signatureKeyId);
        return $this;
    }

}