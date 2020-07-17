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

namespace Gs2\News\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 現在有効なお知らせを更新します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateCurrentNewsMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペースの名前 */
    private $namespaceName;

    /**
     * ネームスペースの名前を取得
     *
     * @return string|null 現在有効なお知らせを更新します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName 現在有効なお知らせを更新します
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName 現在有効なお知らせを更新します
     * @return UpdateCurrentNewsMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateCurrentNewsMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string アップロード準備で受け取ったトークン */
    private $uploadToken;

    /**
     * アップロード準備で受け取ったトークンを取得
     *
     * @return string|null 現在有効なお知らせを更新します
     */
    public function getUploadToken(): ?string {
        return $this->uploadToken;
    }

    /**
     * アップロード準備で受け取ったトークンを設定
     *
     * @param string $uploadToken 現在有効なお知らせを更新します
     */
    public function setUploadToken(string $uploadToken = null) {
        $this->uploadToken = $uploadToken;
    }

    /**
     * アップロード準備で受け取ったトークンを設定
     *
     * @param string $uploadToken 現在有効なお知らせを更新します
     * @return UpdateCurrentNewsMasterRequest $this
     */
    public function withUploadToken(string $uploadToken = null): UpdateCurrentNewsMasterRequest {
        $this->setUploadToken($uploadToken);
        return $this;
    }

}