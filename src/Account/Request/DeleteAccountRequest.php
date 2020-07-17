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
 * ゲームプレイヤーアカウントを削除 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteAccountRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ゲームプレイヤーアカウントを削除
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ゲームプレイヤーアカウントを削除
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ゲームプレイヤーアカウントを削除
     * @return DeleteAccountRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DeleteAccountRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string アカウントID */
    private $userId;

    /**
     * アカウントIDを取得
     *
     * @return string|null ゲームプレイヤーアカウントを削除
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * アカウントIDを設定
     *
     * @param string $userId ゲームプレイヤーアカウントを削除
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * アカウントIDを設定
     *
     * @param string $userId ゲームプレイヤーアカウントを削除
     * @return DeleteAccountRequest $this
     */
    public function withUserId(string $userId = null): DeleteAccountRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ゲームプレイヤーアカウントを削除
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ゲームプレイヤーアカウントを削除
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ゲームプレイヤーアカウントを削除
     * @return DeleteAccountRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): DeleteAccountRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}