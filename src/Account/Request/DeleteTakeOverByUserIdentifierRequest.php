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
 * 引き継ぎ設定を削除 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteTakeOverByUserIdentifierRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 引き継ぎ設定を削除
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 引き継ぎ設定を削除
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 引き継ぎ設定を削除
     * @return DeleteTakeOverByUserIdentifierRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DeleteTakeOverByUserIdentifierRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null 引き継ぎ設定を削除
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 引き継ぎ設定を削除
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 引き継ぎ設定を削除
     * @return DeleteTakeOverByUserIdentifierRequest $this
     */
    public function withUserId(string $userId = null): DeleteTakeOverByUserIdentifierRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int スロット番号 */
    private $type;

    /**
     * スロット番号を取得
     *
     * @return int|null 引き継ぎ設定を削除
     */
    public function getType(): ?int {
        return $this->type;
    }

    /**
     * スロット番号を設定
     *
     * @param int $type 引き継ぎ設定を削除
     */
    public function setType(int $type = null) {
        $this->type = $type;
    }

    /**
     * スロット番号を設定
     *
     * @param int $type 引き継ぎ設定を削除
     * @return DeleteTakeOverByUserIdentifierRequest $this
     */
    public function withType(int $type = null): DeleteTakeOverByUserIdentifierRequest {
        $this->setType($type);
        return $this;
    }

    /** @var string 引き継ぎ用ユーザーID */
    private $userIdentifier;

    /**
     * 引き継ぎ用ユーザーIDを取得
     *
     * @return string|null 引き継ぎ設定を削除
     */
    public function getUserIdentifier(): ?string {
        return $this->userIdentifier;
    }

    /**
     * 引き継ぎ用ユーザーIDを設定
     *
     * @param string $userIdentifier 引き継ぎ設定を削除
     */
    public function setUserIdentifier(string $userIdentifier = null) {
        $this->userIdentifier = $userIdentifier;
    }

    /**
     * 引き継ぎ用ユーザーIDを設定
     *
     * @param string $userIdentifier 引き継ぎ設定を削除
     * @return DeleteTakeOverByUserIdentifierRequest $this
     */
    public function withUserIdentifier(string $userIdentifier = null): DeleteTakeOverByUserIdentifierRequest {
        $this->setUserIdentifier($userIdentifier);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 引き継ぎ設定を削除
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 引き継ぎ設定を削除
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 引き継ぎ設定を削除
     * @return DeleteTakeOverByUserIdentifierRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): DeleteTakeOverByUserIdentifierRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}