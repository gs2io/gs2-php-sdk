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

namespace Gs2\Schedule\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ユーザIDを指定してトリガーを登録 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class TriggerByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定してトリガーを登録
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してトリガーを登録
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してトリガーを登録
     * @return TriggerByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): TriggerByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string トリガーの名前 */
    private $triggerName;

    /**
     * トリガーの名前を取得
     *
     * @return string|null ユーザIDを指定してトリガーを登録
     */
    public function getTriggerName(): ?string {
        return $this->triggerName;
    }

    /**
     * トリガーの名前を設定
     *
     * @param string $triggerName ユーザIDを指定してトリガーを登録
     */
    public function setTriggerName(string $triggerName) {
        $this->triggerName = $triggerName;
    }

    /**
     * トリガーの名前を設定
     *
     * @param string $triggerName ユーザIDを指定してトリガーを登録
     * @return TriggerByUserIdRequest $this
     */
    public function withTriggerName(string $triggerName): TriggerByUserIdRequest {
        $this->setTriggerName($triggerName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定してトリガーを登録
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してトリガーを登録
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してトリガーを登録
     * @return TriggerByUserIdRequest $this
     */
    public function withUserId(string $userId): TriggerByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string トリガーの引き方の方針 */
    private $triggerStrategy;

    /**
     * トリガーの引き方の方針を取得
     *
     * @return string|null ユーザIDを指定してトリガーを登録
     */
    public function getTriggerStrategy(): ?string {
        return $this->triggerStrategy;
    }

    /**
     * トリガーの引き方の方針を設定
     *
     * @param string $triggerStrategy ユーザIDを指定してトリガーを登録
     */
    public function setTriggerStrategy(string $triggerStrategy) {
        $this->triggerStrategy = $triggerStrategy;
    }

    /**
     * トリガーの引き方の方針を設定
     *
     * @param string $triggerStrategy ユーザIDを指定してトリガーを登録
     * @return TriggerByUserIdRequest $this
     */
    public function withTriggerStrategy(string $triggerStrategy): TriggerByUserIdRequest {
        $this->setTriggerStrategy($triggerStrategy);
        return $this;
    }

    /** @var int トリガーの有効期限(秒) */
    private $ttl;

    /**
     * トリガーの有効期限(秒)を取得
     *
     * @return int|null ユーザIDを指定してトリガーを登録
     */
    public function getTtl(): ?int {
        return $this->ttl;
    }

    /**
     * トリガーの有効期限(秒)を設定
     *
     * @param int $ttl ユーザIDを指定してトリガーを登録
     */
    public function setTtl(int $ttl) {
        $this->ttl = $ttl;
    }

    /**
     * トリガーの有効期限(秒)を設定
     *
     * @param int $ttl ユーザIDを指定してトリガーを登録
     * @return TriggerByUserIdRequest $this
     */
    public function withTtl(int $ttl): TriggerByUserIdRequest {
        $this->setTtl($ttl);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定してトリガーを登録
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してトリガーを登録
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してトリガーを登録
     * @return TriggerByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): TriggerByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}