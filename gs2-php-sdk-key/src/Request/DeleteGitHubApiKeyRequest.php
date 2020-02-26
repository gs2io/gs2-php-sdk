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
 * GitHub のAPIキーを削除します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteGitHubApiKeyRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null GitHub のAPIキーを削除します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName GitHub のAPIキーを削除します
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName GitHub のAPIキーを削除します
     * @return DeleteGitHubApiKeyRequest $this
     */
    public function withNamespaceName(string $namespaceName): DeleteGitHubApiKeyRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string GitHub APIキー名 */
    private $apiKeyName;

    /**
     * GitHub APIキー名を取得
     *
     * @return string|null GitHub のAPIキーを削除します
     */
    public function getApiKeyName(): ?string {
        return $this->apiKeyName;
    }

    /**
     * GitHub APIキー名を設定
     *
     * @param string $apiKeyName GitHub のAPIキーを削除します
     */
    public function setApiKeyName(string $apiKeyName) {
        $this->apiKeyName = $apiKeyName;
    }

    /**
     * GitHub APIキー名を設定
     *
     * @param string $apiKeyName GitHub のAPIキーを削除します
     * @return DeleteGitHubApiKeyRequest $this
     */
    public function withApiKeyName(string $apiKeyName): DeleteGitHubApiKeyRequest {
        $this->setApiKeyName($apiKeyName);
        return $this;
    }

}