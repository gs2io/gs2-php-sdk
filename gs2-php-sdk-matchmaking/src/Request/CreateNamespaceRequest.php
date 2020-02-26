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

namespace Gs2\Matchmaking\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Matchmaking\Model\NotificationSetting;
use Gs2\Matchmaking\Model\LogSetting;

/**
 * ネームスペースを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateNamespaceRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $name;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $name ネームスペースを新規作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $name ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withName(string $name): CreateNamespaceRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string ネームスペースの説明 */
    private $description;

    /**
     * ネームスペースの説明を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withDescription(string $description): CreateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string ギャザリング新規作成時のアクション */
    private $createGatheringTriggerType;

    /**
     * ギャザリング新規作成時のアクションを取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getCreateGatheringTriggerType(): ?string {
        return $this->createGatheringTriggerType;
    }

    /**
     * ギャザリング新規作成時のアクションを設定
     *
     * @param string $createGatheringTriggerType ネームスペースを新規作成
     */
    public function setCreateGatheringTriggerType(string $createGatheringTriggerType) {
        $this->createGatheringTriggerType = $createGatheringTriggerType;
    }

    /**
     * ギャザリング新規作成時のアクションを設定
     *
     * @param string $createGatheringTriggerType ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withCreateGatheringTriggerType(string $createGatheringTriggerType): CreateNamespaceRequest {
        $this->setCreateGatheringTriggerType($createGatheringTriggerType);
        return $this;
    }

    /** @var string ギャザリング新規作成時 にルームを作成するネームスペース のGRN */
    private $createGatheringTriggerRealtimeNamespaceId;

    /**
     * ギャザリング新規作成時 にルームを作成するネームスペース のGRNを取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getCreateGatheringTriggerRealtimeNamespaceId(): ?string {
        return $this->createGatheringTriggerRealtimeNamespaceId;
    }

    /**
     * ギャザリング新規作成時 にルームを作成するネームスペース のGRNを設定
     *
     * @param string $createGatheringTriggerRealtimeNamespaceId ネームスペースを新規作成
     */
    public function setCreateGatheringTriggerRealtimeNamespaceId(string $createGatheringTriggerRealtimeNamespaceId) {
        $this->createGatheringTriggerRealtimeNamespaceId = $createGatheringTriggerRealtimeNamespaceId;
    }

    /**
     * ギャザリング新規作成時 にルームを作成するネームスペース のGRNを設定
     *
     * @param string $createGatheringTriggerRealtimeNamespaceId ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withCreateGatheringTriggerRealtimeNamespaceId(string $createGatheringTriggerRealtimeNamespaceId): CreateNamespaceRequest {
        $this->setCreateGatheringTriggerRealtimeNamespaceId($createGatheringTriggerRealtimeNamespaceId);
        return $this;
    }

    /** @var string ギャザリング新規作成時 に実行されるスクリプト のGRN */
    private $createGatheringTriggerScriptId;

    /**
     * ギャザリング新規作成時 に実行されるスクリプト のGRNを取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getCreateGatheringTriggerScriptId(): ?string {
        return $this->createGatheringTriggerScriptId;
    }

    /**
     * ギャザリング新規作成時 に実行されるスクリプト のGRNを設定
     *
     * @param string $createGatheringTriggerScriptId ネームスペースを新規作成
     */
    public function setCreateGatheringTriggerScriptId(string $createGatheringTriggerScriptId) {
        $this->createGatheringTriggerScriptId = $createGatheringTriggerScriptId;
    }

    /**
     * ギャザリング新規作成時 に実行されるスクリプト のGRNを設定
     *
     * @param string $createGatheringTriggerScriptId ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withCreateGatheringTriggerScriptId(string $createGatheringTriggerScriptId): CreateNamespaceRequest {
        $this->setCreateGatheringTriggerScriptId($createGatheringTriggerScriptId);
        return $this;
    }

    /** @var string マッチメイキング完了時のアクション */
    private $completeMatchmakingTriggerType;

    /**
     * マッチメイキング完了時のアクションを取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getCompleteMatchmakingTriggerType(): ?string {
        return $this->completeMatchmakingTriggerType;
    }

    /**
     * マッチメイキング完了時のアクションを設定
     *
     * @param string $completeMatchmakingTriggerType ネームスペースを新規作成
     */
    public function setCompleteMatchmakingTriggerType(string $completeMatchmakingTriggerType) {
        $this->completeMatchmakingTriggerType = $completeMatchmakingTriggerType;
    }

    /**
     * マッチメイキング完了時のアクションを設定
     *
     * @param string $completeMatchmakingTriggerType ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withCompleteMatchmakingTriggerType(string $completeMatchmakingTriggerType): CreateNamespaceRequest {
        $this->setCompleteMatchmakingTriggerType($completeMatchmakingTriggerType);
        return $this;
    }

    /** @var string マッチメイキング完了時 にルームを作成するネームスペース のGRN */
    private $completeMatchmakingTriggerRealtimeNamespaceId;

    /**
     * マッチメイキング完了時 にルームを作成するネームスペース のGRNを取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getCompleteMatchmakingTriggerRealtimeNamespaceId(): ?string {
        return $this->completeMatchmakingTriggerRealtimeNamespaceId;
    }

    /**
     * マッチメイキング完了時 にルームを作成するネームスペース のGRNを設定
     *
     * @param string $completeMatchmakingTriggerRealtimeNamespaceId ネームスペースを新規作成
     */
    public function setCompleteMatchmakingTriggerRealtimeNamespaceId(string $completeMatchmakingTriggerRealtimeNamespaceId) {
        $this->completeMatchmakingTriggerRealtimeNamespaceId = $completeMatchmakingTriggerRealtimeNamespaceId;
    }

    /**
     * マッチメイキング完了時 にルームを作成するネームスペース のGRNを設定
     *
     * @param string $completeMatchmakingTriggerRealtimeNamespaceId ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withCompleteMatchmakingTriggerRealtimeNamespaceId(string $completeMatchmakingTriggerRealtimeNamespaceId): CreateNamespaceRequest {
        $this->setCompleteMatchmakingTriggerRealtimeNamespaceId($completeMatchmakingTriggerRealtimeNamespaceId);
        return $this;
    }

    /** @var string マッチメイキング完了時 に実行されるスクリプト のGRN */
    private $completeMatchmakingTriggerScriptId;

    /**
     * マッチメイキング完了時 に実行されるスクリプト のGRNを取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getCompleteMatchmakingTriggerScriptId(): ?string {
        return $this->completeMatchmakingTriggerScriptId;
    }

    /**
     * マッチメイキング完了時 に実行されるスクリプト のGRNを設定
     *
     * @param string $completeMatchmakingTriggerScriptId ネームスペースを新規作成
     */
    public function setCompleteMatchmakingTriggerScriptId(string $completeMatchmakingTriggerScriptId) {
        $this->completeMatchmakingTriggerScriptId = $completeMatchmakingTriggerScriptId;
    }

    /**
     * マッチメイキング完了時 に実行されるスクリプト のGRNを設定
     *
     * @param string $completeMatchmakingTriggerScriptId ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withCompleteMatchmakingTriggerScriptId(string $completeMatchmakingTriggerScriptId): CreateNamespaceRequest {
        $this->setCompleteMatchmakingTriggerScriptId($completeMatchmakingTriggerScriptId);
        return $this;
    }

    /** @var NotificationSetting ギャザリングに新規プレイヤーが参加したときのプッシュ通知 */
    private $joinNotification;

    /**
     * ギャザリングに新規プレイヤーが参加したときのプッシュ通知を取得
     *
     * @return NotificationSetting|null ネームスペースを新規作成
     */
    public function getJoinNotification(): ?NotificationSetting {
        return $this->joinNotification;
    }

    /**
     * ギャザリングに新規プレイヤーが参加したときのプッシュ通知を設定
     *
     * @param NotificationSetting $joinNotification ネームスペースを新規作成
     */
    public function setJoinNotification(NotificationSetting $joinNotification) {
        $this->joinNotification = $joinNotification;
    }

    /**
     * ギャザリングに新規プレイヤーが参加したときのプッシュ通知を設定
     *
     * @param NotificationSetting $joinNotification ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withJoinNotification(NotificationSetting $joinNotification): CreateNamespaceRequest {
        $this->setJoinNotification($joinNotification);
        return $this;
    }

    /** @var NotificationSetting ギャザリングからプレイヤーが離脱したときのプッシュ通知 */
    private $leaveNotification;

    /**
     * ギャザリングからプレイヤーが離脱したときのプッシュ通知を取得
     *
     * @return NotificationSetting|null ネームスペースを新規作成
     */
    public function getLeaveNotification(): ?NotificationSetting {
        return $this->leaveNotification;
    }

    /**
     * ギャザリングからプレイヤーが離脱したときのプッシュ通知を設定
     *
     * @param NotificationSetting $leaveNotification ネームスペースを新規作成
     */
    public function setLeaveNotification(NotificationSetting $leaveNotification) {
        $this->leaveNotification = $leaveNotification;
    }

    /**
     * ギャザリングからプレイヤーが離脱したときのプッシュ通知を設定
     *
     * @param NotificationSetting $leaveNotification ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withLeaveNotification(NotificationSetting $leaveNotification): CreateNamespaceRequest {
        $this->setLeaveNotification($leaveNotification);
        return $this;
    }

    /** @var NotificationSetting マッチメイキングが完了したときのプッシュ通知 */
    private $completeNotification;

    /**
     * マッチメイキングが完了したときのプッシュ通知を取得
     *
     * @return NotificationSetting|null ネームスペースを新規作成
     */
    public function getCompleteNotification(): ?NotificationSetting {
        return $this->completeNotification;
    }

    /**
     * マッチメイキングが完了したときのプッシュ通知を設定
     *
     * @param NotificationSetting $completeNotification ネームスペースを新規作成
     */
    public function setCompleteNotification(NotificationSetting $completeNotification) {
        $this->completeNotification = $completeNotification;
    }

    /**
     * マッチメイキングが完了したときのプッシュ通知を設定
     *
     * @param NotificationSetting $completeNotification ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withCompleteNotification(NotificationSetting $completeNotification): CreateNamespaceRequest {
        $this->setCompleteNotification($completeNotification);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null ネームスペースを新規作成
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを新規作成
     */
    public function setLogSetting(LogSetting $logSetting) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting): CreateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}