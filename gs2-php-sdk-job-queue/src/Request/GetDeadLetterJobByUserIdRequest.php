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

namespace Gs2\JobQueue\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * デッドレタージョブを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetDeadLetterJobByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null デッドレタージョブを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName デッドレタージョブを取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName デッドレタージョブを取得
     * @return GetDeadLetterJobByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): GetDeadLetterJobByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null デッドレタージョブを取得
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId デッドレタージョブを取得
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId デッドレタージョブを取得
     * @return GetDeadLetterJobByUserIdRequest $this
     */
    public function withUserId(string $userId): GetDeadLetterJobByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string ジョブの名前 */
    private $deadLetterJobName;

    /**
     * ジョブの名前を取得
     *
     * @return string|null デッドレタージョブを取得
     */
    public function getDeadLetterJobName(): ?string {
        return $this->deadLetterJobName;
    }

    /**
     * ジョブの名前を設定
     *
     * @param string $deadLetterJobName デッドレタージョブを取得
     */
    public function setDeadLetterJobName(string $deadLetterJobName) {
        $this->deadLetterJobName = $deadLetterJobName;
    }

    /**
     * ジョブの名前を設定
     *
     * @param string $deadLetterJobName デッドレタージョブを取得
     * @return GetDeadLetterJobByUserIdRequest $this
     */
    public function withDeadLetterJobName(string $deadLetterJobName): GetDeadLetterJobByUserIdRequest {
        $this->setDeadLetterJobName($deadLetterJobName);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null デッドレタージョブを取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider デッドレタージョブを取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider デッドレタージョブを取得
     * @return GetDeadLetterJobByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): GetDeadLetterJobByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}