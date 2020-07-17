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
 * ユーザIDを指定してトリガーを削除 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteTriggerByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定してトリガーを削除
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してトリガーを削除
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してトリガーを削除
     * @return DeleteTriggerByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DeleteTriggerByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定してトリガーを削除
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してトリガーを削除
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してトリガーを削除
     * @return DeleteTriggerByUserIdRequest $this
     */
    public function withUserId(string $userId = null): DeleteTriggerByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string トリガーの名前 */
    private $triggerName;

    /**
     * トリガーの名前を取得
     *
     * @return string|null ユーザIDを指定してトリガーを削除
     */
    public function getTriggerName(): ?string {
        return $this->triggerName;
    }

    /**
     * トリガーの名前を設定
     *
     * @param string $triggerName ユーザIDを指定してトリガーを削除
     */
    public function setTriggerName(string $triggerName = null) {
        $this->triggerName = $triggerName;
    }

    /**
     * トリガーの名前を設定
     *
     * @param string $triggerName ユーザIDを指定してトリガーを削除
     * @return DeleteTriggerByUserIdRequest $this
     */
    public function withTriggerName(string $triggerName = null): DeleteTriggerByUserIdRequest {
        $this->setTriggerName($triggerName);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定してトリガーを削除
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してトリガーを削除
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してトリガーを削除
     * @return DeleteTriggerByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): DeleteTriggerByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}