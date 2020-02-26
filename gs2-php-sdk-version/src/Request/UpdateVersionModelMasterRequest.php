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
 * バージョンマスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateVersionModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null バージョンマスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName バージョンマスターを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName バージョンマスターを更新
     * @return UpdateVersionModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateVersionModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string バージョン名 */
    private $versionName;

    /**
     * バージョン名を取得
     *
     * @return string|null バージョンマスターを更新
     */
    public function getVersionName(): ?string {
        return $this->versionName;
    }

    /**
     * バージョン名を設定
     *
     * @param string $versionName バージョンマスターを更新
     */
    public function setVersionName(string $versionName) {
        $this->versionName = $versionName;
    }

    /**
     * バージョン名を設定
     *
     * @param string $versionName バージョンマスターを更新
     * @return UpdateVersionModelMasterRequest $this
     */
    public function withVersionName(string $versionName): UpdateVersionModelMasterRequest {
        $this->setVersionName($versionName);
        return $this;
    }

    /** @var string バージョンマスターの説明 */
    private $description;

    /**
     * バージョンマスターの説明を取得
     *
     * @return string|null バージョンマスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * バージョンマスターの説明を設定
     *
     * @param string $description バージョンマスターを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * バージョンマスターの説明を設定
     *
     * @param string $description バージョンマスターを更新
     * @return UpdateVersionModelMasterRequest $this
     */
    public function withDescription(string $description): UpdateVersionModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string バージョンのメタデータ */
    private $metadata;

    /**
     * バージョンのメタデータを取得
     *
     * @return string|null バージョンマスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * バージョンのメタデータを設定
     *
     * @param string $metadata バージョンマスターを更新
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * バージョンのメタデータを設定
     *
     * @param string $metadata バージョンマスターを更新
     * @return UpdateVersionModelMasterRequest $this
     */
    public function withMetadata(string $metadata): UpdateVersionModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var Version バージョンアップを促すバージョン */
    private $warningVersion;

    /**
     * バージョンアップを促すバージョンを取得
     *
     * @return Version|null バージョンマスターを更新
     */
    public function getWarningVersion(): ?Version {
        return $this->warningVersion;
    }

    /**
     * バージョンアップを促すバージョンを設定
     *
     * @param Version $warningVersion バージョンマスターを更新
     */
    public function setWarningVersion(Version $warningVersion) {
        $this->warningVersion = $warningVersion;
    }

    /**
     * バージョンアップを促すバージョンを設定
     *
     * @param Version $warningVersion バージョンマスターを更新
     * @return UpdateVersionModelMasterRequest $this
     */
    public function withWarningVersion(Version $warningVersion): UpdateVersionModelMasterRequest {
        $this->setWarningVersion($warningVersion);
        return $this;
    }

    /** @var Version バージョンチェックを蹴るバージョン */
    private $errorVersion;

    /**
     * バージョンチェックを蹴るバージョンを取得
     *
     * @return Version|null バージョンマスターを更新
     */
    public function getErrorVersion(): ?Version {
        return $this->errorVersion;
    }

    /**
     * バージョンチェックを蹴るバージョンを設定
     *
     * @param Version $errorVersion バージョンマスターを更新
     */
    public function setErrorVersion(Version $errorVersion) {
        $this->errorVersion = $errorVersion;
    }

    /**
     * バージョンチェックを蹴るバージョンを設定
     *
     * @param Version $errorVersion バージョンマスターを更新
     * @return UpdateVersionModelMasterRequest $this
     */
    public function withErrorVersion(Version $errorVersion): UpdateVersionModelMasterRequest {
        $this->setErrorVersion($errorVersion);
        return $this;
    }

    /** @var string 判定に使用するバージョン値の種類 */
    private $scope;

    /**
     * 判定に使用するバージョン値の種類を取得
     *
     * @return string|null バージョンマスターを更新
     */
    public function getScope(): ?string {
        return $this->scope;
    }

    /**
     * 判定に使用するバージョン値の種類を設定
     *
     * @param string $scope バージョンマスターを更新
     */
    public function setScope(string $scope) {
        $this->scope = $scope;
    }

    /**
     * 判定に使用するバージョン値の種類を設定
     *
     * @param string $scope バージョンマスターを更新
     * @return UpdateVersionModelMasterRequest $this
     */
    public function withScope(string $scope): UpdateVersionModelMasterRequest {
        $this->setScope($scope);
        return $this;
    }

    /** @var Version 現在のバージョン */
    private $currentVersion;

    /**
     * 現在のバージョンを取得
     *
     * @return Version|null バージョンマスターを更新
     */
    public function getCurrentVersion(): ?Version {
        return $this->currentVersion;
    }

    /**
     * 現在のバージョンを設定
     *
     * @param Version $currentVersion バージョンマスターを更新
     */
    public function setCurrentVersion(Version $currentVersion) {
        $this->currentVersion = $currentVersion;
    }

    /**
     * 現在のバージョンを設定
     *
     * @param Version $currentVersion バージョンマスターを更新
     * @return UpdateVersionModelMasterRequest $this
     */
    public function withCurrentVersion(Version $currentVersion): UpdateVersionModelMasterRequest {
        $this->setCurrentVersion($currentVersion);
        return $this;
    }

    /** @var bool 判定するバージョン値に署名検証を必要とするか */
    private $needSignature;

    /**
     * 判定するバージョン値に署名検証を必要とするかを取得
     *
     * @return bool|null バージョンマスターを更新
     */
    public function getNeedSignature(): ?bool {
        return $this->needSignature;
    }

    /**
     * 判定するバージョン値に署名検証を必要とするかを設定
     *
     * @param bool $needSignature バージョンマスターを更新
     */
    public function setNeedSignature(bool $needSignature) {
        $this->needSignature = $needSignature;
    }

    /**
     * 判定するバージョン値に署名検証を必要とするかを設定
     *
     * @param bool $needSignature バージョンマスターを更新
     * @return UpdateVersionModelMasterRequest $this
     */
    public function withNeedSignature(bool $needSignature): UpdateVersionModelMasterRequest {
        $this->setNeedSignature($needSignature);
        return $this;
    }

    /** @var string 署名検証に使用する暗号鍵 のGRN */
    private $signatureKeyId;

    /**
     * 署名検証に使用する暗号鍵 のGRNを取得
     *
     * @return string|null バージョンマスターを更新
     */
    public function getSignatureKeyId(): ?string {
        return $this->signatureKeyId;
    }

    /**
     * 署名検証に使用する暗号鍵 のGRNを設定
     *
     * @param string $signatureKeyId バージョンマスターを更新
     */
    public function setSignatureKeyId(string $signatureKeyId) {
        $this->signatureKeyId = $signatureKeyId;
    }

    /**
     * 署名検証に使用する暗号鍵 のGRNを設定
     *
     * @param string $signatureKeyId バージョンマスターを更新
     * @return UpdateVersionModelMasterRequest $this
     */
    public function withSignatureKeyId(string $signatureKeyId): UpdateVersionModelMasterRequest {
        $this->setSignatureKeyId($signatureKeyId);
        return $this;
    }

}