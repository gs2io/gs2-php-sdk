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

namespace Gs2\Key\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * GitHub のAPIキーを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateGitHubApiKeyRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null GitHub のAPIキーを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName GitHub のAPIキーを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName GitHub のAPIキーを更新
     * @return UpdateGitHubApiKeyRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateGitHubApiKeyRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string GitHub APIキー名 */
    private $apiKeyName;

    /**
     * GitHub APIキー名を取得
     *
     * @return string|null GitHub のAPIキーを更新
     */
    public function getApiKeyName(): ?string {
        return $this->apiKeyName;
    }

    /**
     * GitHub APIキー名を設定
     *
     * @param string $apiKeyName GitHub のAPIキーを更新
     */
    public function setApiKeyName(string $apiKeyName) {
        $this->apiKeyName = $apiKeyName;
    }

    /**
     * GitHub APIキー名を設定
     *
     * @param string $apiKeyName GitHub のAPIキーを更新
     * @return UpdateGitHubApiKeyRequest $this
     */
    public function withApiKeyName(string $apiKeyName): UpdateGitHubApiKeyRequest {
        $this->setApiKeyName($apiKeyName);
        return $this;
    }

    /** @var string 説明文 */
    private $description;

    /**
     * 説明文を取得
     *
     * @return string|null GitHub のAPIキーを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description GitHub のAPIキーを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description GitHub のAPIキーを更新
     * @return UpdateGitHubApiKeyRequest $this
     */
    public function withDescription(string $description): UpdateGitHubApiKeyRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string APIキー */
    private $apiKey;

    /**
     * APIキーを取得
     *
     * @return string|null GitHub のAPIキーを更新
     */
    public function getApiKey(): ?string {
        return $this->apiKey;
    }

    /**
     * APIキーを設定
     *
     * @param string $apiKey GitHub のAPIキーを更新
     */
    public function setApiKey(string $apiKey) {
        $this->apiKey = $apiKey;
    }

    /**
     * APIキーを設定
     *
     * @param string $apiKey GitHub のAPIキーを更新
     * @return UpdateGitHubApiKeyRequest $this
     */
    public function withApiKey(string $apiKey): UpdateGitHubApiKeyRequest {
        $this->setApiKey($apiKey);
        return $this;
    }

    /** @var string APIキーの暗号化に使用する暗号鍵名 */
    private $encryptionKeyName;

    /**
     * APIキーの暗号化に使用する暗号鍵名を取得
     *
     * @return string|null GitHub のAPIキーを更新
     */
    public function getEncryptionKeyName(): ?string {
        return $this->encryptionKeyName;
    }

    /**
     * APIキーの暗号化に使用する暗号鍵名を設定
     *
     * @param string $encryptionKeyName GitHub のAPIキーを更新
     */
    public function setEncryptionKeyName(string $encryptionKeyName) {
        $this->encryptionKeyName = $encryptionKeyName;
    }

    /**
     * APIキーの暗号化に使用する暗号鍵名を設定
     *
     * @param string $encryptionKeyName GitHub のAPIキーを更新
     * @return UpdateGitHubApiKeyRequest $this
     */
    public function withEncryptionKeyName(string $encryptionKeyName): UpdateGitHubApiKeyRequest {
        $this->setEncryptionKeyName($encryptionKeyName);
        return $this;
    }

}