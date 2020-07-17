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
use Gs2\Inbox\Model\Config;

/**
 * ユーザーIDを指定してメッセージを開封 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class ReadMessageByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザーIDを指定してメッセージを開封
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定してメッセージを開封
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定してメッセージを開封
     * @return ReadMessageByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): ReadMessageByUserIdRequest {
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
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザーIDを指定してメッセージを開封
     * @return ReadMessageByUserIdRequest $this
     */
    public function withUserId(string $userId = null): ReadMessageByUserIdRequest {
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
    public function setMessageName(string $messageName = null) {
        $this->messageName = $messageName;
    }

    /**
     * メッセージIDを設定
     *
     * @param string $messageName ユーザーIDを指定してメッセージを開封
     * @return ReadMessageByUserIdRequest $this
     */
    public function withMessageName(string $messageName = null): ReadMessageByUserIdRequest {
        $this->setMessageName($messageName);
        return $this;
    }

    /** @var Config[] スタンプシートの変数に適用する設定値 */
    private $config;

    /**
     * スタンプシートの変数に適用する設定値を取得
     *
     * @return Config[]|null ユーザーIDを指定してメッセージを開封
     */
    public function getConfig(): ?array {
        return $this->config;
    }

    /**
     * スタンプシートの変数に適用する設定値を設定
     *
     * @param Config[] $config ユーザーIDを指定してメッセージを開封
     */
    public function setConfig(array $config = null) {
        $this->config = $config;
    }

    /**
     * スタンプシートの変数に適用する設定値を設定
     *
     * @param Config[] $config ユーザーIDを指定してメッセージを開封
     * @return ReadMessageByUserIdRequest $this
     */
    public function withConfig(array $config = null): ReadMessageByUserIdRequest {
        $this->setConfig($config);
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
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してメッセージを開封
     * @return ReadMessageByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): ReadMessageByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}