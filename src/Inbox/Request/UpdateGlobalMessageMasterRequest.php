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
 * 全ユーザに向けたメッセージを開封 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateGlobalMessageMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 全ユーザに向けたメッセージを開封
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 全ユーザに向けたメッセージを開封
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 全ユーザに向けたメッセージを開封
     * @return UpdateGlobalMessageMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateGlobalMessageMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 全ユーザに向けたメッセージ名 */
    private $globalMessageName;

    /**
     * 全ユーザに向けたメッセージ名を取得
     *
     * @return string|null 全ユーザに向けたメッセージを開封
     */
    public function getGlobalMessageName(): ?string {
        return $this->globalMessageName;
    }

    /**
     * 全ユーザに向けたメッセージ名を設定
     *
     * @param string $globalMessageName 全ユーザに向けたメッセージを開封
     */
    public function setGlobalMessageName(string $globalMessageName = null) {
        $this->globalMessageName = $globalMessageName;
    }

    /**
     * 全ユーザに向けたメッセージ名を設定
     *
     * @param string $globalMessageName 全ユーザに向けたメッセージを開封
     * @return UpdateGlobalMessageMasterRequest $this
     */
    public function withGlobalMessageName(string $globalMessageName = null): UpdateGlobalMessageMasterRequest {
        $this->setGlobalMessageName($globalMessageName);
        return $this;
    }

    /** @var string 全ユーザに向けたメッセージの内容に相当するメタデータ */
    private $metadata;

    /**
     * 全ユーザに向けたメッセージの内容に相当するメタデータを取得
     *
     * @return string|null 全ユーザに向けたメッセージを開封
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * 全ユーザに向けたメッセージの内容に相当するメタデータを設定
     *
     * @param string $metadata 全ユーザに向けたメッセージを開封
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * 全ユーザに向けたメッセージの内容に相当するメタデータを設定
     *
     * @param string $metadata 全ユーザに向けたメッセージを開封
     * @return UpdateGlobalMessageMasterRequest $this
     */
    public function withMetadata(string $metadata = null): UpdateGlobalMessageMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var AcquireAction[] 開封時に実行する入手アクション */
    private $readAcquireActions;

    /**
     * 開封時に実行する入手アクションを取得
     *
     * @return AcquireAction[]|null 全ユーザに向けたメッセージを開封
     */
    public function getReadAcquireActions(): ?array {
        return $this->readAcquireActions;
    }

    /**
     * 開封時に実行する入手アクションを設定
     *
     * @param AcquireAction[] $readAcquireActions 全ユーザに向けたメッセージを開封
     */
    public function setReadAcquireActions(array $readAcquireActions = null) {
        $this->readAcquireActions = $readAcquireActions;
    }

    /**
     * 開封時に実行する入手アクションを設定
     *
     * @param AcquireAction[] $readAcquireActions 全ユーザに向けたメッセージを開封
     * @return UpdateGlobalMessageMasterRequest $this
     */
    public function withReadAcquireActions(array $readAcquireActions = null): UpdateGlobalMessageMasterRequest {
        $this->setReadAcquireActions($readAcquireActions);
        return $this;
    }

    /** @var TimeSpan メッセージを受信したあとメッセージが削除されるまでの期間 */
    private $expiresTimeSpan;

    /**
     * メッセージを受信したあとメッセージが削除されるまでの期間を取得
     *
     * @return TimeSpan|null 全ユーザに向けたメッセージを開封
     */
    public function getExpiresTimeSpan(): ?TimeSpan {
        return $this->expiresTimeSpan;
    }

    /**
     * メッセージを受信したあとメッセージが削除されるまでの期間を設定
     *
     * @param TimeSpan $expiresTimeSpan 全ユーザに向けたメッセージを開封
     */
    public function setExpiresTimeSpan(TimeSpan $expiresTimeSpan = null) {
        $this->expiresTimeSpan = $expiresTimeSpan;
    }

    /**
     * メッセージを受信したあとメッセージが削除されるまでの期間を設定
     *
     * @param TimeSpan $expiresTimeSpan 全ユーザに向けたメッセージを開封
     * @return UpdateGlobalMessageMasterRequest $this
     */
    public function withExpiresTimeSpan(TimeSpan $expiresTimeSpan = null): UpdateGlobalMessageMasterRequest {
        $this->setExpiresTimeSpan($expiresTimeSpan);
        return $this;
    }

    /** @var int 全ユーザに向けたメッセージの受信期限 */
    private $expiresAt;

    /**
     * 全ユーザに向けたメッセージの受信期限を取得
     *
     * @return int|null 全ユーザに向けたメッセージを開封
     */
    public function getExpiresAt(): ?int {
        return $this->expiresAt;
    }

    /**
     * 全ユーザに向けたメッセージの受信期限を設定
     *
     * @param int $expiresAt 全ユーザに向けたメッセージを開封
     */
    public function setExpiresAt(int $expiresAt = null) {
        $this->expiresAt = $expiresAt;
    }

    /**
     * 全ユーザに向けたメッセージの受信期限を設定
     *
     * @param int $expiresAt 全ユーザに向けたメッセージを開封
     * @return UpdateGlobalMessageMasterRequest $this
     */
    public function withExpiresAt(int $expiresAt = null): UpdateGlobalMessageMasterRequest {
        $this->setExpiresAt($expiresAt);
        return $this;
    }

}