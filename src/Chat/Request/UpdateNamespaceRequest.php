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

namespace Gs2\Chat\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Chat\Model\ScriptSetting;
use Gs2\Chat\Model\NotificationSetting;
use Gs2\Chat\Model\LogSetting;

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

    /** @var bool ゲームプレイヤーによるルームの作成を許可するか */
    private $allowCreateRoom;

    /**
     * ゲームプレイヤーによるルームの作成を許可するかを取得
     *
     * @return bool|null ネームスペースを更新
     */
    public function getAllowCreateRoom(): ?bool {
        return $this->allowCreateRoom;
    }

    /**
     * ゲームプレイヤーによるルームの作成を許可するかを設定
     *
     * @param bool $allowCreateRoom ネームスペースを更新
     */
    public function setAllowCreateRoom(bool $allowCreateRoom = null) {
        $this->allowCreateRoom = $allowCreateRoom;
    }

    /**
     * ゲームプレイヤーによるルームの作成を許可するかを設定
     *
     * @param bool $allowCreateRoom ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withAllowCreateRoom(bool $allowCreateRoom = null): UpdateNamespaceRequest {
        $this->setAllowCreateRoom($allowCreateRoom);
        return $this;
    }

    /** @var ScriptSetting メッセージを投稿したときに実行するスクリプト */
    private $postMessageScript;

    /**
     * メッセージを投稿したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getPostMessageScript(): ?ScriptSetting {
        return $this->postMessageScript;
    }

    /**
     * メッセージを投稿したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $postMessageScript ネームスペースを更新
     */
    public function setPostMessageScript(ScriptSetting $postMessageScript = null) {
        $this->postMessageScript = $postMessageScript;
    }

    /**
     * メッセージを投稿したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $postMessageScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withPostMessageScript(ScriptSetting $postMessageScript = null): UpdateNamespaceRequest {
        $this->setPostMessageScript($postMessageScript);
        return $this;
    }

    /** @var ScriptSetting ルームを作成したときに実行するスクリプト */
    private $createRoomScript;

    /**
     * ルームを作成したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getCreateRoomScript(): ?ScriptSetting {
        return $this->createRoomScript;
    }

    /**
     * ルームを作成したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $createRoomScript ネームスペースを更新
     */
    public function setCreateRoomScript(ScriptSetting $createRoomScript = null) {
        $this->createRoomScript = $createRoomScript;
    }

    /**
     * ルームを作成したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $createRoomScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withCreateRoomScript(ScriptSetting $createRoomScript = null): UpdateNamespaceRequest {
        $this->setCreateRoomScript($createRoomScript);
        return $this;
    }

    /** @var ScriptSetting ルームを削除したときに実行するスクリプト */
    private $deleteRoomScript;

    /**
     * ルームを削除したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getDeleteRoomScript(): ?ScriptSetting {
        return $this->deleteRoomScript;
    }

    /**
     * ルームを削除したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $deleteRoomScript ネームスペースを更新
     */
    public function setDeleteRoomScript(ScriptSetting $deleteRoomScript = null) {
        $this->deleteRoomScript = $deleteRoomScript;
    }

    /**
     * ルームを削除したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $deleteRoomScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withDeleteRoomScript(ScriptSetting $deleteRoomScript = null): UpdateNamespaceRequest {
        $this->setDeleteRoomScript($deleteRoomScript);
        return $this;
    }

    /** @var ScriptSetting ルームを購読したときに実行するスクリプト */
    private $subscribeRoomScript;

    /**
     * ルームを購読したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getSubscribeRoomScript(): ?ScriptSetting {
        return $this->subscribeRoomScript;
    }

    /**
     * ルームを購読したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $subscribeRoomScript ネームスペースを更新
     */
    public function setSubscribeRoomScript(ScriptSetting $subscribeRoomScript = null) {
        $this->subscribeRoomScript = $subscribeRoomScript;
    }

    /**
     * ルームを購読したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $subscribeRoomScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withSubscribeRoomScript(ScriptSetting $subscribeRoomScript = null): UpdateNamespaceRequest {
        $this->setSubscribeRoomScript($subscribeRoomScript);
        return $this;
    }

    /** @var ScriptSetting ルームの購読を解除したときに実行するスクリプト */
    private $unsubscribeRoomScript;

    /**
     * ルームの購読を解除したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getUnsubscribeRoomScript(): ?ScriptSetting {
        return $this->unsubscribeRoomScript;
    }

    /**
     * ルームの購読を解除したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $unsubscribeRoomScript ネームスペースを更新
     */
    public function setUnsubscribeRoomScript(ScriptSetting $unsubscribeRoomScript = null) {
        $this->unsubscribeRoomScript = $unsubscribeRoomScript;
    }

    /**
     * ルームの購読を解除したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $unsubscribeRoomScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withUnsubscribeRoomScript(ScriptSetting $unsubscribeRoomScript = null): UpdateNamespaceRequest {
        $this->setUnsubscribeRoomScript($unsubscribeRoomScript);
        return $this;
    }

    /** @var NotificationSetting 購読しているルームに新しい投稿がきたときのプッシュ通知 */
    private $postNotification;

    /**
     * 購読しているルームに新しい投稿がきたときのプッシュ通知を取得
     *
     * @return NotificationSetting|null ネームスペースを更新
     */
    public function getPostNotification(): ?NotificationSetting {
        return $this->postNotification;
    }

    /**
     * 購読しているルームに新しい投稿がきたときのプッシュ通知を設定
     *
     * @param NotificationSetting $postNotification ネームスペースを更新
     */
    public function setPostNotification(NotificationSetting $postNotification = null) {
        $this->postNotification = $postNotification;
    }

    /**
     * 購読しているルームに新しい投稿がきたときのプッシュ通知を設定
     *
     * @param NotificationSetting $postNotification ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withPostNotification(NotificationSetting $postNotification = null): UpdateNamespaceRequest {
        $this->setPostNotification($postNotification);
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