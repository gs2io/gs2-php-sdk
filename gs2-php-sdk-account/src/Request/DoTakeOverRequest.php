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

namespace Gs2\Account\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 引き継ぎ設定を更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DoTakeOverRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 引き継ぎ設定を更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 引き継ぎ設定を更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 引き継ぎ設定を更新
     * @return DoTakeOverRequest $this
     */
    public function withNamespaceName(string $namespaceName): DoTakeOverRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var int スロット番号 */
    private $type;

    /**
     * スロット番号を取得
     *
     * @return int|null 引き継ぎ設定を更新
     */
    public function getType(): ?int {
        return $this->type;
    }

    /**
     * スロット番号を設定
     *
     * @param int $type 引き継ぎ設定を更新
     */
    public function setType(int $type) {
        $this->type = $type;
    }

    /**
     * スロット番号を設定
     *
     * @param int $type 引き継ぎ設定を更新
     * @return DoTakeOverRequest $this
     */
    public function withType(int $type): DoTakeOverRequest {
        $this->setType($type);
        return $this;
    }

    /** @var string 引き継ぎ用ユーザーID */
    private $userIdentifier;

    /**
     * 引き継ぎ用ユーザーIDを取得
     *
     * @return string|null 引き継ぎ設定を更新
     */
    public function getUserIdentifier(): ?string {
        return $this->userIdentifier;
    }

    /**
     * 引き継ぎ用ユーザーIDを設定
     *
     * @param string $userIdentifier 引き継ぎ設定を更新
     */
    public function setUserIdentifier(string $userIdentifier) {
        $this->userIdentifier = $userIdentifier;
    }

    /**
     * 引き継ぎ用ユーザーIDを設定
     *
     * @param string $userIdentifier 引き継ぎ設定を更新
     * @return DoTakeOverRequest $this
     */
    public function withUserIdentifier(string $userIdentifier): DoTakeOverRequest {
        $this->setUserIdentifier($userIdentifier);
        return $this;
    }

    /** @var string パスワード */
    private $password;

    /**
     * パスワードを取得
     *
     * @return string|null 引き継ぎ設定を更新
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password 引き継ぎ設定を更新
     */
    public function setPassword(string $password) {
        $this->password = $password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password 引き継ぎ設定を更新
     * @return DoTakeOverRequest $this
     */
    public function withPassword(string $password): DoTakeOverRequest {
        $this->setPassword($password);
        return $this;
    }

}