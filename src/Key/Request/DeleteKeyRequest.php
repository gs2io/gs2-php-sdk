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
 * 暗号鍵を削除します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteKeyRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 暗号鍵を削除します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 暗号鍵を削除します
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 暗号鍵を削除します
     * @return DeleteKeyRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DeleteKeyRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 暗号鍵名 */
    private $keyName;

    /**
     * 暗号鍵名を取得
     *
     * @return string|null 暗号鍵を削除します
     */
    public function getKeyName(): ?string {
        return $this->keyName;
    }

    /**
     * 暗号鍵名を設定
     *
     * @param string $keyName 暗号鍵を削除します
     */
    public function setKeyName(string $keyName = null) {
        $this->keyName = $keyName;
    }

    /**
     * 暗号鍵名を設定
     *
     * @param string $keyName 暗号鍵を削除します
     * @return DeleteKeyRequest $this
     */
    public function withKeyName(string $keyName = null): DeleteKeyRequest {
        $this->setKeyName($keyName);
        return $this;
    }

}