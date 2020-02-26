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

namespace Gs2\Inbox\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ユーザーIDを指定してメッセージを開封 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class OpenMessageByUserIdRequest extends Gs2BasicRequest {

    /** @var string プレゼントボックス名 */
    private $namespaceName;

    /**
     * プレゼントボックス名を取得
     *
     * @return string|null ユーザーIDを指定してメッセージを開封
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * プレゼントボックス名を設定
     *
     * @param string $namespaceName ユーザーIDを指定してメッセージを開封
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * プレゼントボックス名を設定
     *
     * @param string $namespaceName ユーザーIDを指定してメッセージを開封
     * @return OpenMessageByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): OpenMessageByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザーIDを指定してメッセージを開封
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザーIDを指定してメッセージを開封
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザーIDを指定してメッセージを開封
     * @return OpenMessageByUserIdRequest $this
     */
    public function withUserId(string $userId): OpenMessageByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string メッセージID */
    private $messageName;

    /**
     * メッセージIDを取得
     *
     * @return string|null ユーザーIDを指定してメッセージを開封
     */
    public function getMessageName(): ?string {
        return $this->messageName;
    }

    /**
     * メッセージIDを設定
     *
     * @param string $messageName ユーザーIDを指定してメッセージを開封
     */
    public function setMessageName(string $messageName) {
        $this->messageName = $messageName;
    }

    /**
     * メッセージIDを設定
     *
     * @param string $messageName ユーザーIDを指定してメッセージを開封
     * @return OpenMessageByUserIdRequest $this
     */
    public function withMessageName(string $messageName): OpenMessageByUserIdRequest {
        $this->setMessageName($messageName);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザーIDを指定してメッセージを開封
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してメッセージを開封
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してメッセージを開封
     * @return OpenMessageByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): OpenMessageByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}