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
 * データを復号します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DecryptRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null データを復号します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName データを復号します
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName データを復号します
     * @return DecryptRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DecryptRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 暗号鍵名 */
    private $keyName;

    /**
     * 暗号鍵名を取得
     *
     * @return string|null データを復号します
     */
    public function getKeyName(): ?string {
        return $this->keyName;
    }

    /**
     * 暗号鍵名を設定
     *
     * @param string $keyName データを復号します
     */
    public function setKeyName(string $keyName = null) {
        $this->keyName = $keyName;
    }

    /**
     * 暗号鍵名を設定
     *
     * @param string $keyName データを復号します
     * @return DecryptRequest $this
     */
    public function withKeyName(string $keyName = null): DecryptRequest {
        $this->setKeyName($keyName);
        return $this;
    }

    /** @var string None */
    private $data;

    /**
     * Noneを取得
     *
     * @return string|null データを復号します
     */
    public function getData(): ?string {
        return $this->data;
    }

    /**
     * Noneを設定
     *
     * @param string $data データを復号します
     */
    public function setData(string $data = null) {
        $this->data = $data;
    }

    /**
     * Noneを設定
     *
     * @param string $data データを復号します
     * @return DecryptRequest $this
     */
    public function withData(string $data = null): DecryptRequest {
        $this->setData($data);
        return $this;
    }

}