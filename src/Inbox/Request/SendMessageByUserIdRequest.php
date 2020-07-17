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
use Gs2\Inbox\Model\TimeSpan;
use Gs2\Inbox\Model\AcquireAction;

/**
 * メッセージを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class SendMessageByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null メッセージを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName メッセージを新規作成
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName メッセージを新規作成
     * @return SendMessageByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): SendMessageByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null メッセージを新規作成
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId メッセージを新規作成
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId メッセージを新規作成
     * @return SendMessageByUserIdRequest $this
     */
    public function withUserId(string $userId = null): SendMessageByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string メッセージの内容に相当するメタデータ */
    private $metadata;

    /**
     * メッセージの内容に相当するメタデータを取得
     *
     * @return string|null メッセージを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * メッセージの内容に相当するメタデータを設定
     *
     * @param string $metadata メッセージを新規作成
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * メッセージの内容に相当するメタデータを設定
     *
     * @param string $metadata メッセージを新規作成
     * @return SendMessageByUserIdRequest $this
     */
    public function withMetadata(string $metadata = null): SendMessageByUserIdRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var AcquireAction[] 開封時に実行する入手アクション */
    private $readAcquireActions;

    /**
     * 開封時に実行する入手アクションを取得
     *
     * @return AcquireAction[]|null メッセージを新規作成
     */
    public function getReadAcquireActions(): ?array {
        return $this->readAcquireActions;
    }

    /**
     * 開封時に実行する入手アクションを設定
     *
     * @param AcquireAction[] $readAcquireActions メッセージを新規作成
     */
    public function setReadAcquireActions(array $readAcquireActions = null) {
        $this->readAcquireActions = $readAcquireActions;
    }

    /**
     * 開封時に実行する入手アクションを設定
     *
     * @param AcquireAction[] $readAcquireActions メッセージを新規作成
     * @return SendMessageByUserIdRequest $this
     */
    public function withReadAcquireActions(array $readAcquireActions = null): SendMessageByUserIdRequest {
        $this->setReadAcquireActions($readAcquireActions);
        return $this;
    }

    /** @var int メッセージの有効期限 */
    private $expiresAt;

    /**
     * メッセージの有効期限を取得
     *
     * @return int|null メッセージを新規作成
     */
    public function getExpiresAt(): ?int {
        return $this->expiresAt;
    }

    /**
     * メッセージの有効期限を設定
     *
     * @param int $expiresAt メッセージを新規作成
     */
    public function setExpiresAt(int $expiresAt = null) {
        $this->expiresAt = $expiresAt;
    }

    /**
     * メッセージの有効期限を設定
     *
     * @param int $expiresAt メッセージを新規作成
     * @return SendMessageByUserIdRequest $this
     */
    public function withExpiresAt(int $expiresAt = null): SendMessageByUserIdRequest {
        $this->setExpiresAt($expiresAt);
        return $this;
    }

    /** @var TimeSpan メッセージの有効期限までの差分 */
    private $expiresTimeSpan;

    /**
     * メッセージの有効期限までの差分を取得
     *
     * @return TimeSpan|null メッセージを新規作成
     */
    public function getExpiresTimeSpan(): ?TimeSpan {
        return $this->expiresTimeSpan;
    }

    /**
     * メッセージの有効期限までの差分を設定
     *
     * @param TimeSpan $expiresTimeSpan メッセージを新規作成
     */
    public function setExpiresTimeSpan(TimeSpan $expiresTimeSpan = null) {
        $this->expiresTimeSpan = $expiresTimeSpan;
    }

    /**
     * メッセージの有効期限までの差分を設定
     *
     * @param TimeSpan $expiresTimeSpan メッセージを新規作成
     * @return SendMessageByUserIdRequest $this
     */
    public function withExpiresTimeSpan(TimeSpan $expiresTimeSpan = null): SendMessageByUserIdRequest {
        $this->setExpiresTimeSpan($expiresTimeSpan);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null メッセージを新規作成
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider メッセージを新規作成
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider メッセージを新規作成
     * @return SendMessageByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): SendMessageByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}