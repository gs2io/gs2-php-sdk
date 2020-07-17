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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Mission\Model\ScriptSetting;
use Gs2\Mission\Model\NotificationSetting;
use Gs2\Mission\Model\LogSetting;

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

    /** @var ScriptSetting ミッションを達成したときに実行するスクリプト */
    private $missionCompleteScript;

    /**
     * ミッションを達成したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getMissionCompleteScript(): ?ScriptSetting {
        return $this->missionCompleteScript;
    }

    /**
     * ミッションを達成したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $missionCompleteScript ネームスペースを更新
     */
    public function setMissionCompleteScript(ScriptSetting $missionCompleteScript = null) {
        $this->missionCompleteScript = $missionCompleteScript;
    }

    /**
     * ミッションを達成したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $missionCompleteScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withMissionCompleteScript(ScriptSetting $missionCompleteScript = null): UpdateNamespaceRequest {
        $this->setMissionCompleteScript($missionCompleteScript);
        return $this;
    }

    /** @var ScriptSetting カウンターを上昇したときに実行するスクリプト */
    private $counterIncrementScript;

    /**
     * カウンターを上昇したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getCounterIncrementScript(): ?ScriptSetting {
        return $this->counterIncrementScript;
    }

    /**
     * カウンターを上昇したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $counterIncrementScript ネームスペースを更新
     */
    public function setCounterIncrementScript(ScriptSetting $counterIncrementScript = null) {
        $this->counterIncrementScript = $counterIncrementScript;
    }

    /**
     * カウンターを上昇したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $counterIncrementScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withCounterIncrementScript(ScriptSetting $counterIncrementScript = null): UpdateNamespaceRequest {
        $this->setCounterIncrementScript($counterIncrementScript);
        return $this;
    }

    /** @var ScriptSetting 報酬を受け取ったときに実行するスクリプト */
    private $receiveRewardsScript;

    /**
     * 報酬を受け取ったときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getReceiveRewardsScript(): ?ScriptSetting {
        return $this->receiveRewardsScript;
    }

    /**
     * 報酬を受け取ったときに実行するスクリプトを設定
     *
     * @param ScriptSetting $receiveRewardsScript ネームスペースを更新
     */
    public function setReceiveRewardsScript(ScriptSetting $receiveRewardsScript = null) {
        $this->receiveRewardsScript = $receiveRewardsScript;
    }

    /**
     * 報酬を受け取ったときに実行するスクリプトを設定
     *
     * @param ScriptSetting $receiveRewardsScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withReceiveRewardsScript(ScriptSetting $receiveRewardsScript = null): UpdateNamespaceRequest {
        $this->setReceiveRewardsScript($receiveRewardsScript);
        return $this;
    }

    /** @var string 報酬付与処理をジョブとして追加するキューネームスペース のGRN */
    private $queueNamespaceId;

    /**
     * 報酬付与処理をジョブとして追加するキューネームスペース のGRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getQueueNamespaceId(): ?string {
        return $this->queueNamespaceId;
    }

    /**
     * 報酬付与処理をジョブとして追加するキューネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId ネームスペースを更新
     */
    public function setQueueNamespaceId(string $queueNamespaceId = null) {
        $this->queueNamespaceId = $queueNamespaceId;
    }

    /**
     * 報酬付与処理をジョブとして追加するキューネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withQueueNamespaceId(string $queueNamespaceId = null): UpdateNamespaceRequest {
        $this->setQueueNamespaceId($queueNamespaceId);
        return $this;
    }

    /** @var string 報酬付与処理のスタンプシートで使用する暗号鍵GRN */
    private $keyId;

    /**
     * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId ネームスペースを更新
     */
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withKeyId(string $keyId = null): UpdateNamespaceRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var NotificationSetting ミッションのタスクを達成したときのプッシュ通知 */
    private $completeNotification;

    /**
     * ミッションのタスクを達成したときのプッシュ通知を取得
     *
     * @return NotificationSetting|null ネームスペースを更新
     */
    public function getCompleteNotification(): ?NotificationSetting {
        return $this->completeNotification;
    }

    /**
     * ミッションのタスクを達成したときのプッシュ通知を設定
     *
     * @param NotificationSetting $completeNotification ネームスペースを更新
     */
    public function setCompleteNotification(NotificationSetting $completeNotification = null) {
        $this->completeNotification = $completeNotification;
    }

    /**
     * ミッションのタスクを達成したときのプッシュ通知を設定
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