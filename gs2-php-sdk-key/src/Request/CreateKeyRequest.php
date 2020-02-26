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
 * 暗号鍵を新規作成します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateKeyRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 暗号鍵を新規作成します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 暗号鍵を新規作成します
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 暗号鍵を新規作成します
     * @return CreateKeyRequest $this
     */
    public function withNamespaceName(string $namespaceName): CreateKeyRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 暗号鍵名 */
    private $name;

    /**
     * 暗号鍵名を取得
     *
     * @return string|null 暗号鍵を新規作成します
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * 暗号鍵名を設定
     *
     * @param string $name 暗号鍵を新規作成します
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * 暗号鍵名を設定
     *
     * @param string $name 暗号鍵を新規作成します
     * @return CreateKeyRequest $this
     */
    public function withName(string $name): CreateKeyRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string 説明文 */
    private $description;

    /**
     * 説明文を取得
     *
     * @return string|null 暗号鍵を新規作成します
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description 暗号鍵を新規作成します
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description 暗号鍵を新規作成します
     * @return CreateKeyRequest $this
     */
    public function withDescription(string $description): CreateKeyRequest {
        $this->setDescription($description);
        return $this;
    }

}