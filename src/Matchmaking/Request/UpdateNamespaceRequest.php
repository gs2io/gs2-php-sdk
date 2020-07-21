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
 * ネームスペースを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateNamespaceRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ネームスペースを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateNamespaceRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ネームスペースの説明 */
    private $description;

    /**
     * ネームスペースの説明を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withDescription(string $description = null): UpdateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var bool レーティング計算機能を使用するか */
    private $enableRating;

    /**
     * レーティング計算機能を使用するかを取得
     *
     * @return bool|null ネームスペースを更新
     */
    public function getEnableRating(): ?bool {
        return $this->enableRating;
    }

    /**
     * レーティング計算機能を使用するかを設定
     *
     * @param bool $enableRating ネームスペースを更新
     */
    public function setEnableRating(bool $enableRating = null) {
        $this->enableRating = $enableRating;
    }

    /**
     * レーティング計算機能を使用するかを設定
     *
     * @param bool $enableRating ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withEnableRating(bool $enableRating = null): UpdateNamespaceRequest {
        $this->setEnableRating($enableRating);
        return $this;
    }

    /** @var string ギャザリング新規作成時のアクション */
    private $createGatheringTriggerType;

    /**
     * ギャザリング新規作成時のアクションを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getCreateGatheringTriggerType(): ?string {
        return $this->createGatheringTriggerType;
    }

    /**
     * ギャザリング新規作成時のアクションを設定
     *
     * @param string $createGatheringTriggerType ネームスペースを更新
     */
    public function setCreateGatheringTriggerType(string $createGatheringTriggerType = null) {
        $this->createGatheringTriggerType = $createGatheringTriggerType;
    }

    /**
     * ギャザリング新規作成時のアクションを設定
     *
     * @param string $createGatheringTriggerType ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withCreateGatheringTriggerType(string $createGatheringTriggerType = null): UpdateNamespaceRequest {
        $this->setCreateGatheringTriggerType($createGatheringTriggerType);
        return $this;
    }

    /** @var string ギャザリング新規作成時 にルームを作成するネームスペース のGRN */
    private $createGatheringTriggerRealtimeNamespaceId;

    /**
     * ギャザリング新規作成時 にルームを作成するネームスペース のGRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getCreateGatheringTriggerRealtimeNamespaceId(): ?string {
        return $this->createGatheringTriggerRealtimeNamespaceId;
    }

    /**
     * ギャザリング新規作成時 にルームを作成するネームスペース のGRNを設定
     *
     * @param string $createGatheringTriggerRealtimeNamespaceId ネームスペースを更新
     */
    public function setCreateGatheringTriggerRealtimeNamespaceId(string $createGatheringTriggerRealtimeNamespaceId = null) {
        $this->createGatheringTriggerRealtimeNamespaceId = $createGatheringTriggerRealtimeNamespaceId;
    }

    /**
     * ギャザリング新規作成時 にルームを作成するネームスペース のGRNを設定
     *
     * @param string $createGatheringTriggerRealtimeNamespaceId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withCreateGatheringTriggerRealtimeNamespaceId(string $createGatheringTriggerRealtimeNamespaceId = null): UpdateNamespaceRequest {
        $this->setCreateGatheringTriggerRealtimeNamespaceId($createGatheringTriggerRealtimeNamespaceId);
        return $this;
    }

    /** @var string ギャザリング新規作成時 に実行されるスクリプト のGRN */
    private $createGatheringTriggerScriptId;

    /**
     * ギャザリング新規作成時 に実行されるスクリプト のGRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getCreateGatheringTriggerScriptId(): ?string {
        return $this->createGatheringTriggerScriptId;
    }

    /**
     * ギャザリング新規作成時 に実行されるスクリプト のGRNを設定
     *
     * @param string $createGatheringTriggerScriptId ネームスペースを更新
     */
    public function setCreateGatheringTriggerScriptId(string $createGatheringTriggerScriptId = null) {
        $this->createGatheringTriggerScriptId = $createGatheringTriggerScriptId;
    }

    /**
     * ギャザリング新規作成時 に実行されるスクリプト のGRNを設定
     *
     * @param string $createGatheringTriggerScriptId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withCreateGatheringTriggerScriptId(string $createGatheringTriggerScriptId = null): UpdateNamespaceRequest {
        $this->setCreateGatheringTriggerScriptId($createGatheringTriggerScriptId);
        return $this;
    }

    /** @var string マッチメイキング完了時のアクション */
    private $completeMatchmakingTriggerType;

    /**
     * マッチメイキング完了時のアクションを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getCompleteMatchmakingTriggerType(): ?string {
        return $this->completeMatchmakingTriggerType;
    }

    /**
     * マッチメイキング完了時のアクションを設定
     *
     * @param string $completeMatchmakingTriggerType ネームスペースを更新
     */
    public function setCompleteMatchmakingTriggerType(string $completeMatchmakingTriggerType = null) {
        $this->completeMatchmakingTriggerType = $completeMatchmakingTriggerType;
    }

    /**
     * マッチメイキング完了時のアクションを設定
     *
     * @param string $completeMatchmakingTriggerType ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withCompleteMatchmakingTriggerType(string $completeMatchmakingTriggerType = null): UpdateNamespaceRequest {
        $this->setCompleteMatchmakingTriggerType($completeMatchmakingTriggerType);
        return $this;
    }

    /** @var string マッチメイキング完了時 にルームを作成するネームスペース のGRN */
    private $completeMatchmakingTriggerRealtimeNamespaceId;

    /**
     * マッチメイキング完了時 にルームを作成するネームスペース のGRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getCompleteMatchmakingTriggerRealtimeNamespaceId(): ?string {
        return $this->completeMatchmakingTriggerRealtimeNamespaceId;
    }

    /**
     * マッチメイキング完了時 にルームを作成するネームスペース のGRNを設定
     *
     * @param string $completeMatchmakingTriggerRealtimeNamespaceId ネームスペースを更新
     */
    public function setCompleteMatchmakingTriggerRealtimeNamespaceId(string $completeMatchmakingTriggerRealtimeNamespaceId = null) {
        $this->completeMatchmakingTriggerRealtimeNamespaceId = $completeMatchmakingTriggerRealtimeNamespaceId;
    }

    /**
     * マッチメイキング完了時 にルームを作成するネームスペース のGRNを設定
     *
     * @param string $completeMatchmakingTriggerRealtimeNamespaceId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withCompleteMatchmakingTriggerRealtimeNamespaceId(string $completeMatchmakingTriggerRealtimeNamespaceId = null): UpdateNamespaceRequest {
        $this->setCompleteMatchmakingTriggerRealtimeNamespaceId($completeMatchmakingTriggerRealtimeNamespaceId);
        return $this;
    }

    /** @var string マッチメイキング完了時 に実行されるスクリプト のGRN */
    private $completeMatchmakingTriggerScriptId;

    /**
     * マッチメイキング完了時 に実行されるスクリプト のGRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getCompleteMatchmakingTriggerScriptId(): ?string {
        return $this->completeMatchmakingTriggerScriptId;
    }

    /**
     * マッチメイキング完了時 に実行されるスクリプト のGRNを設定
     *
     * @param string $completeMatchmakingTriggerScriptId ネームスペースを更新
     */
    public function setCompleteMatchmakingTriggerScriptId(string $completeMatchmakingTriggerScriptId = null) {
        $this->completeMatchmakingTriggerScriptId = $completeMatchmakingTriggerScriptId;
    }

    /**
     * マッチメイキング完了時 に実行されるスクリプト のGRNを設定
     *
     * @param string $completeMatchmakingTriggerScriptId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withCompleteMatchmakingTriggerScriptId(string $completeMatchmakingTriggerScriptId = null): UpdateNamespaceRequest {
        $this->setCompleteMatchmakingTriggerScriptId($completeMatchmakingTriggerScriptId);
        return $this;
    }

    /** @var NotificationSetting ギャザリングに新規プレイヤーが参加したときのプッシュ通知 */
    private $joinNotification;

    /**
     * ギャザリングに新規プレイヤーが参加したときのプッシュ通知を取得
     *
     * @return NotificationSetting|null ネームスペースを更新
     */
    public function getJoinNotification(): ?NotificationSetting {
        return $this->joinNotification;
    }

    /**
     * ギャザリングに新規プレイヤーが参加したときのプッシュ通知を設定
     *
     * @param NotificationSetting $joinNotification ネームスペースを更新
     */
    public function setJoinNotification(NotificationSetting $joinNotification = null) {
        $this->joinNotification = $joinNotification;
    }

    /**
     * ギャザリングに新規プレイヤーが参加したときのプッシュ通知を設定
     *
     * @param NotificationSetting $joinNotification ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withJoinNotification(NotificationSetting $joinNotification = null): UpdateNamespaceRequest {
        $this->setJoinNotification($joinNotification);
        return $this;
    }

    /** @var NotificationSetting ギャザリングからプレイヤーが離脱したときのプッシュ通知 */
    private $leaveNotification;

    /**
     * ギャザリングからプレイヤーが離脱したときのプッシュ通知を取得
     *
     * @return NotificationSetting|null ネームスペースを更新
     */
    public function getLeaveNotification(): ?NotificationSetting {
        return $this->leaveNotification;
    }

    /**
     * ギャザリングからプレイヤーが離脱したときのプッシュ通知を設定
     *
     * @param NotificationSetting $leaveNotification ネームスペースを更新
     */
    public function setLeaveNotification(NotificationSetting $leaveNotification = null) {
        $this->leaveNotification = $leaveNotification;
    }

    /**
     * ギャザリングからプレイヤーが離脱したときのプッシュ通知を設定
     *
     * @param NotificationSetting $leaveNotification ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withLeaveNotification(NotificationSetting $leaveNotification = null): UpdateNamespaceRequest {
        $this->setLeaveNotification($leaveNotification);
        return $this;
    }

    /** @var NotificationSetting マッチメイキングが完了したときのプッシュ通知 */
    private $completeNotification;

    /**
     * マッチメイキングが完了したときのプッシュ通知を取得
     *
     * @return NotificationSetting|null ネームスペースを更新
     */
    public function getCompleteNotification(): ?NotificationSetting {
        return $this->completeNotification;
    }

    /**
     * マッチメイキングが完了したときのプッシュ通知を設定
     *
     * @param NotificationSetting $completeNotification ネームスペースを更新
     */
    public function setCompleteNotification(NotificationSetting $completeNotification = null) {
        $this->completeNotification = $completeNotification;
    }

    /**
     * マッチメイキングが完了したときのプッシュ通知を設定
     *
     * @param NotificationSetting $completeNotification ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withCompleteNotification(NotificationSetting $completeNotification = null): UpdateNamespaceRequest {
        $this->setCompleteNotification($completeNotification);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null ネームスペースを更新
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを更新
     */
    public function setLogSetting(LogSetting $logSetting = null) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting = null): UpdateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}